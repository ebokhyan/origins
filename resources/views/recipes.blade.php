@extends('layouts.app')
@section('content')
<div class="content">
    <div class="inner_page">
        <div class="page_container">
            <div class="page_head">
                <h1 class="page_title">Recipes</h1>
                <form class="inner_search">
                    <label>
                        <span class="label">search</span>
                        <input type="text" name="search[]" placeholder="Search Recipes"/>
                    </label>
                    <button type="submit" class="icon_search" aria-label="search"></button>
                </form>
            </div>
            <div class="latest_recipes">
                <div class="section_head">
                    <h2 class="section_title">Latest Recipes</h2>
                </div>
                @if(!empty($content['recipes']))
                <div class="recipes_list">
                    <ul>
                        @foreach($content['recipes'] as $recipe)
                            <li>
                                <div class="recipe_block">
                                    <a  class="image_block" href="{{url('recipes/'.$recipe->slug)}}">
                                        <img src="{{asset('storage/'.$recipe->image)}}" width="536" height="500" alt="" title=""/>
                                        article title
                                    </a>
                                    <div class="info_block">
                                        <div class="title_block">
                                            <a href="{{url('recipes/'.$recipe->slug)}}">{{$recipe->title}}</a>
                                        </div>
                                        @if($recipe->auther)
                                        <div class="author_block">
                                            Created by  <span class="author_name">{{$recipe->auther}}</span>
                                        </div>
                                        @endif
                                        <div class="description_block">{{$recipe->short_description}}</div>
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
