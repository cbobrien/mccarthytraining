<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<style>
		body {
			font-family: sans-serif;
		}
		h2 {
			color:#10044c;
		}
	</style>
	<body>
		<h2>Application from Bidvest Automotive Artisan Academy website</h2>
		<div>
			<a href="{{$url}}">{{ $url }}</a>
			<br><br>
			<b>Name:</b> {{ $name }}<br>
			<b>Tel:</b> {{ $tel }}<br>
			<b>Email:</b> {{ $email }}<br>
			<b>Date:</b> {{ $date }}<br>
			<b>Time:</b> {{ $time }}<br>
			<b>Message:</b><br>
			{{ nl2br($app_message) }}<br>
		</div>
	</body>
</html>
