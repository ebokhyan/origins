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
    {{-- @include('partials.favicons') --}}
    @include('partials.google_analitics')
</head>
<body>

    @if(isset($content) && Arr::exists($content, 'top_ad'))
        <x-top-banner-component :image="$content['top_ad']"></x-top-banner-component>
    @endif

    @include('partials.header')
    @yield('content')
    @include('partials.footer')

    @if(Route::currentRouteName() == 'about')
        <div id="popup-content"></div>
    @endif

    <script src="{{asset("js/jquery-3.6.0.min.js")}}"></script>
    <script src="{{asset("js/jquery.form-validator.js")}}"></script>
    <script src="{{asset("js/main.js")}}"></script>
    @if(Route::currentRouteName() == 'guides.inner' || Route::currentRouteName() == 'about'
        || Route::currentRouteName() == 'feature' || Route::currentRouteName() == 'recipes.inner')
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-589071e66b72346f"></script>
    @endif
</body>
</html>
