<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Calendar Demo</title>
	<script src="{{ URL::asset('https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js') }}"></script>
	<link rel="{{ URL::asset('stylesheet" href="/assets/arkhas/calendar/calendar.css') }}">
	<script src="{ URL::asset('/assets/arkhas/calendar/calendar.js') }}"></script>
</head>
<body>
	$calendar = Calendar::generate();
	{!! $calendar !!}
</body>
</html>