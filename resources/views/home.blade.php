<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Fonts -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="{{ elixir('css/app.css') }}">

        <title>Entropia - @yield('title')</title>

    </head>

    <body>
			@section('sidebar')
				@include('sidepanel.sidepanel')
			@show

			<div class="container col-md-9 col-md-offset-3">
				@yield('content')
				@yield('script')
			</div>
<!------ Include the above in your HEAD tag ---------->

    </body>
</html>
