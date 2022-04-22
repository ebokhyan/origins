@extends('layouts.app')
@section('content')
<div class="content">
    <div class="inner_page">
        <div class="page_container">
            <div class="page_head">
                <h1 class="page_title">{{__('recipes.title')}}</h1>
                <form class="inner_search" method="GET" action="{{route('recipes',['locale' => app()->getLocale()])}}">
                    <label>
                        <span class="label">{{__('main.search')}}</span>
                        <input type="text" id="search" name="search" placeholder="{{__('recipes.search')}}"
                        value="{{!empty($content['search']) ? $content['search'] : ''}}"/>
                    </label>
                    <button type="submit" class="icon_search" aria-label="search"></button>
                </form>
            </div>
            <div class="latest_recipes">
                @if(empty($content['search']))
                    <div class="section_head">
                        <h2 class="section_title">{{__('recipes.latest_recipes')}}</h2>
                    </div>
                @endif
                @if($content['recipes']->total() > 0)
                <div class="recipes_list">
                    <ul class="search_listing">
                        @include('pagination_partials.recipes',['recipes' => $content['recipes']])
                    </ul>
                </div>
                @else
                    <div class="guides_list">
                        <div class="description_block ">No results found</div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
