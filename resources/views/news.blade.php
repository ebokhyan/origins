@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="inner_page">
            <div class="page_container">
                <div class="page_head">
{{--                    <h1 class="page_title">{{__('news.title')}}</h1>--}}
                    <h1 class="page_title">{{$content['name']}}</h1>
                    <form class="inner_search" method="GET" action="{{route('news',['locale' => app()->getLocale()])}}">
                        <label>
                            <span class="label">{{__('main.search')}}</span>
                            <input type="text" id="search" name="search" placeholder="{{__('news.search')}}"
                                   value="{{isset($content['search']) ? $content['search'] : ''}}"/>
                        </label>
                        <button type="submit" class="icon_search" aria-label="search"></button>
                    </form>
                </div>
                @if(isset($content['search']))
                    <x-latest-component :type="'news_inner'"
                                        :items="$content['searchNews']['news']"
                                        :banners="$content['searchNews']['banners']"
                                        :search="true">
                    </x-latest-component>
                @else
                    <x-top-news-component :topNews="$content['topNews']"
                                          :banner="$content['banner']"
                                          :latest="$content['latestNews']['latest3']">
                    </x-top-news-component>
                    <x-latest-component :type="'news_inner'"
                                        :items="$content['latestNews']['news']"
                                        :banners="$content['latestNews']['banners']"
                                        :search="false">
                    </x-latest-component>
                @endif
            </div>
        </div>
    </div>
@endsection
