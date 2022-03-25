@extends('layouts.app')
@section('content')
<div class="content">
    <div class="inner_page">
        <div class="page_container">
            <div class="recipe_inner">
                <div class="recipe_main">
                    <div class="image_block">
                        <img src="{{asset('storage/'.$recipe->inner_main_image)}}" alt="" title="" width="800" height="630"/>
                    </div>
                    <div class="info_block">
                        <h1 class="inner_title">{{$recipe->title}}</h1>
                        @if($recipe->author)
                            <div class="author_block">Created by <span class="author_name">{{$recipe->author}}</span></div>
                        @endif
                        @if($recipe->type)
                            <div class="category_block">{{$recipe->type}}</div>
                        @endif
                        <div class="stats_list">
                            <ul>
                                <li>
                                    <div class="stat_type">Serves</div>
                                    <div class="stat_info">{{$recipe->saves}}</div>
                                </li>
                                <li>
                                    <div class="stat_type">Cooks in</div>
                                    <div class="stat_info">{{$recipe->cooks_in}}</div>
                                </li>
                                <li>
                                    <div class="stat_type">Difficulty</div>
                                    <div class="stat_info">{{$recipe->difficulty}}</div>
                                </li>
                            </ul>
                        </div>
                        <div class="text_block">{!! $recipe->description !!}</div>
                    </div>
                </div>

                <div class="ingredients">
                    <div class="section_head">
                        <h2 class="section_title">Ingredients</h2>
                    </div>
                    <ul class="ingredients_list">
                        @foreach($recipe->ingredients as $key=>$value)
                            <li>
                                <div class="type_block">
                                    <span>{{$key}}</span>
                                </div>
                                <div class="info_block">{{$value}}</div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="instructions">
                    <div class="image_block">
                        <img src="{{asset('storage/'.$recipe->instruction_image)}}" alt="" title="" width="784" height="1035"/>
                    </div>
                    <div class="info_block">
                        <div class="section_head">
                            <h2 class="section_title">Instructions</h2>
                        </div>
                        <div class="text_block">
                            {!! $recipe->instruction !!}
                        </div>
                        <div class="share_btns">
                            <div class="addthis_inline_share_toolbox_dg5a"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="latest_recipes">
                <div class="section_head">
                    <h2 class="section_title">Other Recipes</h2>
                </div>
                <div class="recipes_list">
                    @if($otherRecipes)
                    <ul>
                        @foreach($otherRecipes as $recipe)
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
                                    @if($recipe->author)
                                    <div class="author_block">
                                        Created by  <span class="author_name">{{$recipe->author}}</span>
                                    </div>
                                    @endif
                                    <div class="description_block">{{$recipe->short_description}}</div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
