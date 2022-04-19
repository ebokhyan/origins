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
                        <input type="text" name="search" placeholder="{{__('recipes.search')}}"
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
                @if(!empty($content['recipes']))
                <div class="recipes_list">
                    <ul>
                        @foreach($content['recipes'] as $recipe)
                            <li>
                                <div class="recipe_block">
                                    <a  class="image_block" href="{{route('recipes.inner',['locale' => app()->getLocale(), 'slug' => $recipe->slug])}}">
                                        <img src="{{asset('storage/'.$recipe->image)}}" width="536" height="500" alt="" title=""/>
                                    </a>
                                    <div class="info_block">
                                        <div class="title_block">
                                            <a href="{{route('recipes.inner',['locale' => app()->getLocale(), 'slug' => $recipe->slug])}}">{{$recipe->title}}</a>
                                        </div>
                                        @if(!empty($recipe->author))
                                        <div class="author_block">
                                            @if(app()->getLocale() == 'en')
                                                {{Str::ucfirst(__('recipes.created'))}} {{Str::lower(__('main.by'))}}
                                                <span class="author_name">{{@$recipe['author'][app()->getLocale()]}}</span>
                                            @endif
                                            @if(app()->getLocale() == 'hy')
                                                {{Str::ucfirst(__('recipes.created'))}}  <span class="author_name">{{$recipe->author}}</span> {{Str::lower(__('main.by'))}}
                                            @endif
                                        </div>
                                        @endif
                                        <div class="description_block">{{@$recipe->short_description}}</div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
