<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0, viewport-fit=cover"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta name="description" content="Origins Wine Website">
    <title>{{__('main.meta_title')}}</title>
    <link rel="stylesheet" href="{{asset("css/main.css")}}">
    <link rel="stylesheet" href="{{asset("css/index.css")}}">
     @include('partials.favicons')
     @include('partials.google_analitics')
</head>
<body style="background-image: url({{asset('images/page_bg.jpg')}})">
    @include('partials.header')
    @yield('content')

    <script src="{{asset("js/jquery-3.6.0.min.js")}}"></script>
    <script src="{{asset("js/jquery.form-validator.js")}}"></script>
    <script src="{{asset("js/main.js")}}"></script>
</body>
</html>
