<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Customer Name</title>
</head>
<body>
	<p>Id: {{ $id }}</p>
	
	@if($id == 1)
		Your Id 1
	@else
		Your Id isnt 1
	@endif

	<p>Name: {{ $name }}</p>
	<p>Phone: {{ $phone }}</p>
	<p>Age: {{ $age }}</p>
	<p>City: {{ $city }}</p>
</body>
</html>