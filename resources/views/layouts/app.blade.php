<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0, viewport-fit=cover"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta name="description" content="Origins Wine Website">
    <title>Origins Wine</title>
    <link rel="stylesheet" href="{{asset("css/main.css")}}">
    <link rel="stylesheet" href="{{asset("css/index.css")}}">
{{--    @include('partials.favicons')--}}
    @include('partials.google_analitics')
</head>
<body>

@if(isset($content) && Arr::exists($content, 'top_ad'))
    <x-top-banner-component :image="$content['top_ad']"></x-top-banner-component>
@endif
    @include('partials.header')
    @yield('content')
    @include('partials.footer')

    <script src="{{asset("js/jquery-3.6.0.min.js")}}"></script>
    <script src="{{asset("js/jquery.form-validator.js")}}"></script>
    <script src="{{asset("js/main.js")}}"></script>
</body>
</html>
