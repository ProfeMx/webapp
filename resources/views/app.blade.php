<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

	<head>
		
		<meta charset="utf-8">
		
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<meta name="csrf-token" content="{{ csrf_token() }}">

        <meta name="usr" content="{{ base64_encode(@user()->id) }}">
		
		<title></title>

		@vite('resources/css/app.css')

	</head>

	<body>

		<div id="app"></div>

		@vite('resources/js/app.js')

	</body>

</html>