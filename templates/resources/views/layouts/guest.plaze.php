<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>	
		<meta charset="utf-8">		
		<meta http-equiv="X-UA-Compatible" content="IE=edge">		
		<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrfToken() }}">
		
		<title><@give('title')</title>
		
		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Heebo:100,200,300,400,600,700,800,900" rel="stylesheet">
		
		<!-- Styles -->
		<style type="text/css">
			<@php 
				echo preg_replace('#[\r\n\t ]+#', ' ', file_get_contents(resourcePath('css/app.css')));
			<@endphp
		</style>
	</head>
    <body>

        <@give('content')

        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous" type="text/javascript"></script>
        <script type="text/javascript">
            <@php 
                echo preg_replace('#[\r\n\t ]+#', ' ', file_get_contents(resourcePath('js/app.js')));
            <@endphp
        </script>
    </body>
</html>