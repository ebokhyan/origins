@extends('layouts.app')
@section('content')
<div class="content">
    <div class="inner_page">
        <div class="page_container">
            <div class="page_head">
                <h1 class="page_title">{{__('features.title')}}</h1>
                <form class="inner_search">
                    <label>
                        <span class="label">{{__('main.search')}}</span>
                        <input type="text" name="search[]" placeholder="{{__('features.search')}}"/>
                    </label>
                    <button type="submit" class="icon_search" aria-label="search"></button>
                </form>
            </div>
           <x-top-features-component :topFeatures="$content['topFeatures']"></x-top-features-component>
           <x-horizontal_banner-component :banner="$content['banner']"></x-horizontal_banner-component>
           <x-latest-component :type="'features'"
                               :items="$content['latestFeatures']['articles']"
                               :banners="$content['latestFeatures']['banners']">
           </x-latest-component>
        </div>
    </div>
</div>
@endsection
