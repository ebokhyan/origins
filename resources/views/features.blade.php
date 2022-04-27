@extends('layouts.app')
@section('content')
<div class="content">
    <div class="inner_page">
        <div class="page_container">
            <div class="page_head">
{{--                <h1 class="page_title">{{__('features.title')}}</h1>--}}
                <h1 class="page_title">{{$content['name']}}</h1>
                <form class="inner_search" method="GET" action="{{route('features',['locale' => app()->getLocale()])}}">
                    <label>
                        <span class="label">{{__('main.search')}}</span>
                        <input type="text" id="search" name="search" placeholder="{{__('features.search')}}" value="{{isset($content['search']) ? $content['search'] : ''}}"/>
                    </label>
                    <button type="submit" class="icon_search" aria-label="search"></button>
                </form>
            </div>
            @if(isset($content['search']))
                <x-latest-component :type="'features'"
                                    :items="$content['searchFeatures']['articles']"
                                    :banners="$content['searchFeatures']['banners']"
                                    :search="true">
                </x-latest-component>
            @else
                <x-top-features-component :topFeatures="$content['topFeatures']"></x-top-features-component>
                <x-horizontal_banner-component :banner="$content['banner']"></x-horizontal_banner-component>
                <x-latest-component :type="'features'"
                                    :items="$content['latestFeatures']['articles']"
                                    :banners="$content['latestFeatures']['banners']"
                                    :search="false">
                </x-latest-component>
            @endif
        </div>
    </div>
</div>
@endsection
