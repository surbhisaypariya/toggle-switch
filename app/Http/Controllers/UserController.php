<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\HtmlString;

class UserController extends Controller
{
	public function index()
	{
		$users = User::all();
		return view('welcome',compact('users'));
	}

	public function create()
	{
		return view('user_create');
	}

	public function store(Request $request)
	{
		$image = $request->file('image_name');
		$image_name = time().'.'.$image->extension();

		$image->move(public_path('backend/uploads'),$image_name);


		$user = new User;

		$user->create([ 
			'name' => $request->name,
			'email' => $request->email,
			'image_name' => $image_name,
		]);
		return redirect()->route('showUser');
	}

	public function changeStatus(Request $request)
	{
		$user = User::find($request->user_id);
		$user->status = $request->status;
		$user->save();

		return response()->json(['success'=>'Status change successfully.']);

	}

	public function destroy($id)
	{
		$user = User::find($id);

		unlink("public/backend/uploads/".$user->image_name);

		User::where("id", $user->id)->delete();

		return back()->with("success", "Image deleted successfully.");
	}

	public function htmlToString()
	{
		$html = "<p>In addition to support for sending email, Laravel provides support for sending notifications across a variety of delivery channels, including email, SMS (via Vonage, formerly known as Nexmo), and Slack. In addition, a variety of community built notification channels have been created to send notification over dozens of different channels! <b>Notifications</b> may also be stored in a database so they may be displayed in your web interface.</p>

		<p>Typically, notifications should be short, informational messages that notify users of something that occurred in your application. For example, if you are writing a billing application, you might send an notification to your users via the email and SMS channels.</p>";

		$string = new HtmlString($html);

		return view('htmlToString',compact('string'));
	}
}
