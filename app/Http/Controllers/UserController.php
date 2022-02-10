<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
}
