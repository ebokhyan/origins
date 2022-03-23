@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="inner_page">
            <div class="page_container">
                <div class="page_head">
                    <h1 class="page_title">Features</h1>
                    <form class="inner_search">
                        <label>
                            <span class="label">search</span>
                            <input type="text" name="search[]" placeholder="Search Features"/>
                        </label>
                        <button type="submit" class="icon_search" aria-label="search"></button>
                    </form>
                </div>
                <x-top-news-component :topNews="$content['topNews']"
                                      :banner="$content['banner']"
                                      :latest="$content['latestNews']['latest3']">
                </x-top-news-component>
                <x-latest-component :articles="$content['latestNews']['news']" :banners="$content['latestNews']['banners']"></x-latest-component>
            </div>
        </div>
    </div>
@endsection
