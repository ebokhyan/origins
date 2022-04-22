@extends('layouts.app')
@section('content')
<div class="content">
    <div class="inner_page">
        <div class="page_container">
            <div class="recipe_inner">
                <div class="recipe_main">
                    @if(!empty($recipe->inner_main_image))
                        <div class="image_block">
                            <img src="{{asset('storage/'.$recipe->inner_main_image)}}" alt="" title="" width="800" height="630"/>
                        </div>
                    @endif
                    <div class="info_block">
                        <h1 class="inner_title">{{$recipe->title}}</h1>
                        @if($recipe->author)
                            <div class="author_block">
                                @if(app()->getLocale() == 'en')
                                    {{Str::ucfirst(__('recipes.created'))}} {{Str::lower(__('main.by'))}}
                                    <span class="author_name">{{$recipe->author}}</span>
                                @endif
                                @if(app()->getLocale() == 'hy')
                                    {{Str::ucfirst(__('recipes.created'))}} <span class="author_name">{{$recipe->author}}</span> {{Str::lower(__('main.by'))}}
                                @endif
                            </div>
                        @endif
                        @if($recipe->type)
                            <div class="category_block">{{$recipe->type}}</div>
                        @endif
                        <div class="stats_list">
                            <ul>
                                <li>
                                    <div class="stat_type">{{__('recipes.serves')}}</div>
                                    <div class="stat_info">{{$recipe->serves}}</div>
                                </li>
                                <li>
                                    <div class="stat_type">{{__('recipes.cooks_in')}}</div>
                                    <div class="stat_info">{{$recipe->cooks_in}}</div>
                                </li>
                                <li>
                                    <div class="stat_type">{{__('recipes.difficulty')}}</div>
                                    <div class="stat_info">{{$recipe->difficulty}}</div>
                                </li>
                            </ul>
                        </div>
                        <div class="text_block">{!! $recipe->description !!}</div>
                    </div>
                </div>

                <div class="ingredients">
                    <div class="section_head">
                        <h2 class="section_title">{{__('recipes.ingredients')}}</h2>
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
                    @if(!empty($recipe->instruction_image))
                        <div class="image_block">
                            <img src="{{asset('storage/'.$recipe->instruction_image)}}" alt="" title="" width="784" height="1035"/>
                        </div>
                    @endif
                    <div class="info_block">
                        <div class="section_head">
                            <h2 class="section_title">{{__('recipes.instructions')}}</h2>
                        </div>
                        <div class="text_block">
                            {!! $recipe->instruction !!}
                        </div>
                        <div class="share_btns">
                            <div class="addthis_inline_share_toolbox_dg5a"></div>
                        </div>
                    </div>
                </div>
                @if(!empty($recipe->credits))
                    <div class="article_content" style="margin-top: 75px;">
                        {!! $recipe->credits !!}
                    </div>
                @endif
            </div>

            <div class="latest_recipes">
                <div class="section_head">
                    <h2 class="section_title">{{__('recipes.other_recipes')}}</h2>
                </div>
                <div class="recipes_list">
                    @if($otherRecipes)
                    <ul>
                        @foreach($otherRecipes as $recipe)
                        <li>
                            <div class="recipe_block">
                                <a  class="image_block" href="{{route('recipes.inner',['locale' => app()->getLocale(), 'slug' => $recipe->slug])}}">
                                    <img src="{{asset('storage/'.$recipe->image)}}" width="536" height="500" alt="" title=""/>
                                    article title
                                </a>
                                <div class="info_block">
                                    <div class="title_block">
                                        <a href="{{route('recipes.inner',['locale' => app()->getLocale(), 'slug' => $recipe->slug])}}">{{$recipe->title}}</a>
                                    </div>
                                    @if(!empty($recipe->author))
                                    <div class="author_block">
                                        @if(app()->getLocale() == 'en')
                                            {{Str::ucfirst(__('recipes.created'))}} {{Str::lower(__('main.by'))}}
                                            <span class="author_name">{{$recipe->author}}</span>
                                        @endif
                                        @if(app()->getLocale() == 'hy')
                                            {{Str::ucfirst(__('recipes.created'))}} <span class="author_name">{{$recipe->author}}</span> {{Str::lower(__('main.by'))}}
                                        @endif
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
