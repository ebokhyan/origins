@extends('layouts.app')
@section('content')
<div class="content">
    <div class="main_screen">
        <picture>
            <source media="(min-width:1440px)" srcset="{{asset('storage/'.$content['mainBanner']['image_1440'])}}">
            <source media="(min-width:960px)" srcset="{{asset('storage/'.$content['mainBanner']['image_960'])}}">
            <source media="(min-width:375px)" srcset="{{asset('storage/'.$content['mainBanner']['image_375'])}}">
            <img src="{{asset('storage/'.$content['mainBanner']['image_375'])}}" alt="" title="" width="750" height="1116">
        </picture>
        <div class="inner_block">
            <div class="page_container">
                <div class="text_block">{{$content['mainBanner']['title']}}</div>
            </div>
        </div>
    </div>

    <div class="articles_section">
        <div class="page_container">
            <div class="section_head">
                <h2 class="section_title">Latest Articles</h2>
                <a href="{{route('features')}}" class="view_all">View All</a>
            </div>

            @if(!empty($content['latestArticles']['articles']))
                <ul class="articles_list">
                    @foreach($content['latestArticles']['articles'] as $article)
                        <li>
                            <div class="article_block">
                                <a  class="image_block" href="{{route('feature',['locale' => 'en', 'slug' => $article['slug']])}}">
                                    <img src="{{asset('storage/'.$article['image'])}}" width="400" height="250" alt="" title=""/> article title
                                </a>
                                <div class="info_block">
                                    <div class="date_block">{{$article['created_at']}}</div>
                                    <div class="title_block">
{{--                                        <a href="{{route('feature',['locale' => 'en', 'slug' => $article['slug']])}}">{{$article['title']['en']}}</a>--}}
                                        <a href="{{route('feature',['locale' => 'en', 'slug' => $article['slug']])}}">{{ !empty($article['title']['en']) ? $article['title']['en'] : '' }}</a>
                                    </div>
                                    <div class="author_block">
                                        By <span class="author_name">{{ !empty($article['author']['en']) ? $article['author']['en'] : ""}}</span>
                                    </div>
                                    <div class="description_block">{{!empty($article['short_description']['en']) ? $article['short_description']['en'] : ''}}</div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    @if(!empty($content['latestArticles']['banner']))
        <div class="reward_section">
            <div class="page_container">
                <x-banner-component :details="$content['latestArticles']['banner']"></x-banner-component>
            </div>
        </div>
    @endif

    <div class="news_section">
        <div class="page_container">
            <div class="section_head">
                <h2 class="section_title">News</h2>
                <a href="{{route('news')}}" class="view_all">View All</a>
            </div>

            <div class="news_list">
                @if(!empty($content['latestNews']['news']))
                <ul>
                    @foreach($content['latestNews']['news'] as $news)
                        <li>
                            <div class="news_block">
                                <div class="info_block">
                                    <div class="date_block">{{$news['created_at']}}</div>
                                    <div class="title_block">
                                        <a href="{{route('news_inner',['locale' => 'en', 'slug' => $news['slug']])}}">{{$news['title']['en']}}</a></div>
                                </div>
                                <a href="{{route('news_inner',['locale' => 'en', 'slug' => $news['slug']])}}" class="image_block">
                                    <img src="{{asset('storage/'.$news['image'])}}" alt="" title="" width="316" height="140"/>
                                    news title
                                </a>
                            </div>
                        </li>
                    @endforeach
                </ul>
                @endif

                @if($content['latestNews']['banner'])
                    <x-add-banner-component :details="$content['latestNews']['banner']"></x-add-banner-component>
                @endif
            </div>

        </div>
    </div>

    <div class="recipes_section">
        <div class="page_container">
            <div class="section_head">
                <h2 class="section_title">Recipes</h2>
                <a href="{{route('recipes')}}" class="view_all">View All</a>
            </div>
            @if(!empty($content['latestRecipes']['banner']))
                <x-banner-component :details="$content['latestRecipes']['banner']"></x-banner-component>
            @endif
            <ul class="recipes_list">
                @if(!empty($content['latestRecipes']['recipes']))
                    @foreach($content['latestRecipes']['recipes'] as $recipe)
                        <li>
                            <div class="recipe_block">
                                <div class="image_block">
                                    <img src="{{asset('storage/'.$recipe['image'])}}" alt="" title="" width="400" height="400"/>
                                </div>
                                <div class="info_block">
                                    <div class="date_block">{{$recipe['created_at']}}</div>
                                    <div class="inner_title">{{@$recipe['title']['en']}}</div>
                                    @if(isset($recipe['author']['en']))
                                        <div class="author_block">By <span class="author_name">{{@$recipe['author']['en']}}</span></div>
                                    @endif
                                    <div class="description_block">{{@$recipe['short_description']['en']}}</div>
                                    <a href="{{route('recipes.inner',['locale' => 'en', 'slug' => $recipe['slug']])}}" class="secondary_btn light_btn">View Recipe</a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>

@endsection
