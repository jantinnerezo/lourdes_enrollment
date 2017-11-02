<!--
    
    Project Name: Lourdes College BUSAC-IT Enrollement System
    Programmer: Lyn Lee Mae Herrera BSIT-4
    Documentation: Angel Mae Pablico BSIT-4
    

-->


<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="{{asset('img/logo.ico')}}">

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/global.css')}}">
        <link rel="stylesheet" href="{{asset('css/materialize.css')}}">
        <link rel="stylesheet" href="{{asset('css/materialize.min.css')}}">

        <!-- Icon fonts -->
        <link rel="stylesheet" href="{{asset('css/foundation-icons.css')}}">
        <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
        <!-- Scripts -->
        <script src="{{asset('js/app.js')}}"></script>
        <script src="{{asset('js/jquery-2.1.1.min.js')}}"></script>
        <script src="{{asset('js/materialize.js')}}"></script>
        <script src="{{asset('js/init.js')}}"></script>
       

        <title>Lourdes College BUSAC-IT Enrollment System</title>

    </head>
    <body>
        @include('includes.header')
            @yield('content')
        @include('includes.footer')
    </body>

</html>
