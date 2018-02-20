<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
 		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Nanum+Pen+Script" rel="stylesheet">
		<link href="/css/app.css" rel="stylesheet" type="text/css">
		<script src="/js/app.js"></script>
		<!-- ckeditor plugin -->
		<script src="/js/ckeditor/ckeditor.js"></script>

		<title>@yield('title')</title>
	</head>
	<body>
		@section('container')
			Every content, from header to footer. 
			@show
	</body>
</html>

