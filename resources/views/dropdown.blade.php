<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Toggle-switch</title>

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body class="antialiased">
	<div class="col-md-3 offset-3">
		<select class="form-control" name="dropdown" id="catalog_id">
			<option value="1">Abc</option>
			<option value="2">Def</option>
			<option value="3">Ghi</option>
		</select>

		<select class="form-control" name="dropdown" id="category_id">
			<option value="1">Abc</option>
			<option value="2">Def</option>
			<option value="3">Ghi</option>
		</select>
	</div>
</body>
<script type="text/javascript">

	$(document).ready(function(){
		var catalog_id = $("#catalog_id").find(":selected").val();
		var category_id = $("#category_id").find(":selected").val();
		
		$.ajax({
			type : "POST",
			url : '{{ route('passcatalogid') }}',
			data : { 'catalog_id': catalog_id , 'category_id' : category_id , "_token":"{{ csrf_token() }}" },
		});

	});
	$("#catalog_id").change(function(){
		var id = $(this).val();
		$.ajax({
			type : "POST",
			url : '{{ route('passcatalogid') }}',
			data : { 'catalog_id': id , "_token":"{{ csrf_token() }}" },
		});
	});

	$("#category_id").change(function(){
		var id = $(this).val();
		$.ajax({
			type : "POST",
			url : '{{ route('passcatalogid') }}',
			data : { 'category_id': id , "_token":"{{ csrf_token() }}" },
		});
	});

</script>
</html>
