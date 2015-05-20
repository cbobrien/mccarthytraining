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
		<h2>Enquiry from Bidvest Automotive Artisan Academy website</h2>
		<div>
			<b>Name:</b> {{ $name }}<br>
			<b>Tel:</b> {{ $tel }}<br>
			<b>Email:</b> {{ $email }}<br>
			<b>Date:</b> {{ $date }}<br>
			<b>Time:</b> {{ $time }}<br>
			<b>Questions:</b><br>
			{{ nl2br($questions) }}<br>
		</div>
	</body>
</html>
