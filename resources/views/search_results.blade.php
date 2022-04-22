@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="inner_page">
            <div class="page_container">
                <div class="page_head">
                    <h1 class="page_title">Results</h1>
                    <form class="inner_search" method="GET" action="{{route('search',['locale' => app()->getLocale()])}}">
                        <label>
                            <span class="label">{{__('main.search')}}</span>
                            <input type="text" id="search" name="search" placeholder="Search"
                                   value="{{isset($search) ? $search : ''}}"/>
                        </label>
                        <button type="submit" class="icon_search" aria-label="search"></button>
                    </form>
                </div>
                <div class="latest_features">
                    @if(!$search)
                        <div class="section_head">
                            <h2 class="section_title">{{__('main.latest')}}</h2>
                            <form class="inner_search" method="GET"
                                  @switch($type)
                                  @case('features')
                                  action="{{route('features',['locale' => app()->getLocale()])}}"
                                  @break
                                  @case('news')
                                  action="{{route('news',['locale' => app()->getLocale()])}}"
                                  @breack
                                  @defoult
                                  action="{{route('search',['locale' => app()->getLocale()])}}"
                                @endSwitch
                            >
                                <label>
                                    <span class="label">{{__('main.search')}}</span>
                                    <input type="text" name="search" placeholder="{{__('main.form.placeholders.search')}}"/>
                                </label>
                                <button type="submit" class="icon_search" aria-label="search"></button>
                            </form>
                        </div>
                    @endif
                    @if(!empty($results_html))
                        <div class="features_list">
                            <ul class="search_listing">
                               {!! $results_html !!}
                            </ul>
                            @if(!empty($banners))
                                <x-vertical_banner-component :banners="$banners"></x-vertical_banner-component>
                            @endif
                        </div>
                    @else
                            {{-- TODO:: show empty results text--}}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
