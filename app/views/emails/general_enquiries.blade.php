<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<style>
		body {
			font-family: sans-serif;
			background: #ffffff;
		}
		h2 {
			color:#c71444;
		}
	</style>
	<body>
		<h2>General Enquiry from the McCarthy Nissan website</h2>
		<div>
			<br>Dealership: </b>: {{ $dealer }}<br><br>
			<b>Name:</b> {{ $firstname }} {{ $surname }}<br>
			<b>Tel:</b> {{ $tel }}<br>
			<b>Email:</b> {{ $email }}<br>
			<b>Date:</b> {{ $date }}<br>
			<b>Time:</b> {{ $time }}<br>
			<b>Message:</b><br>
			{{ nl2br($message) }}<br>
		</div>
	</body>
</html>
