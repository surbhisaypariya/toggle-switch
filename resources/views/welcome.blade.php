<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Toggle-switch</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>

    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="antialiased">
    <div class="container" style="padding-top: 20px;">

        <div class="card-header">
            <a class="btn btn-success" href="{{ route('showUser') }}">Users</a>
            <a class="btn btn-success" href="{{ route('createUser') }}">createUser</a>
        </div>
        <div class="card-body">
            <table class="table table-striped table-secondary" >
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Image</td>
                        <td>Status</td>
                        <td>Action</td>
                    </tr> 
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{  $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td><img src="{{ URL::to('public/backend/uploads/', $user->image_name ) }}" class="img-fluid" style="height:50px"></td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input " type="checkbox" role="switch" data-id="{{$user->id}}" data-value="{{ $user->status }}" {{ $user->status ? 'checked' : '' }} >
                            </div>
                        </td>
                        <td>
                            <form method="post" action="{{ route('delete_record',[$user->id] )}}">
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

        
    </div>
</body>
<script type="text/javascript">
    $(function() {
        $('.form-check-input').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0; 
            var user_id = $(this).data('id'); 

            $.ajax({
                type: "POST",
                url: '{{ route('changeStatus') }}',
                data: {'status': status, 'user_id': user_id , "_token":"{{ csrf_token() }}",},
                success: function(data){
                  console.log(data.success)
              }
          });
        })
    })
</script>
</html>
