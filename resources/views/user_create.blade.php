<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Toggle-switch</title>

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

	<style>
		body {
			font-family: 'Nunito', sans-serif;
		}
	</style>
</head>
<body class="antialiased">
	<div class="container">
		<a class="btn btn-success" href="{{ route('showUser') }}">Users</a>
		<a class="btn btn-success" href="{{ route('createUser') }}">createUser</a>
	</div>

	<div class="col-md-6 offset-3">
		<form action="{{ route('storeUser') }}" method="POST" enctype="multipart/form-data">
			@csrf

			<div class="form-group">
				<label for="name"> Enter Name</label>
				<input type="text" name="name" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="email">Enter Email</label>
				<input type="email" name="email" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="image_name">Choose Image</label>
				<input type="file" name="image_name" class="form-control" required >
			</div>
			<button class="btn btn-success" >Submit</button>
		</form>
	</div>
</body>
</html>
