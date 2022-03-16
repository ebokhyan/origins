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
                <a href="{{route('articles')}}" class="view_all">View All</a>
            </div>
            @if(!empty($content['latestArticles']['articles']))
                <ul class="articles_list">
                    @foreach($content['latestArticles']['articles'] as $article)
                        <li>
                            <div class="article_block">
                                <a  class="image_block" href="{{route('article',['locale' => 'en', 'slug' => $article['slug']])}}">
                                    <img src="{{asset('storage/'.$article['image'])}}" width="400" height="250" alt="" title=""/> article title
                                </a>
                                <div class="info_block">
                                    <div class="date_block">{{$article['created_at']}}</div>
                                    <div class="title_block">
                                        <a href="{{route('article',['locale' => 'en', 'slug' => $article['slug']])}}">{{$article['title']}}</a>
                                    </div>
                                    <div class="author_block">
                                        By <span class="author_name">{{$article['author']}}</span>
                                    </div>
                                    <div class="description_block">{{$article['short_description']}}</div>
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
                <div class="reward_block {{$content['latestRecipes']['banner']->image_position = 'left' ? 'image_left' : 'image_right'}}">
                    <div class="image_block">
                        <img src="{{asset('storage/'.$content['latestArticles']['banner']->image)}}" alt="" title="" width="1090" height="475"/>
                        {{$content['latestArticles']['banner']->title}}
                    </div>
                    <div class="info_block">
                        <div class="inner_title">{{$content['latestArticles']['banner']->title}}</div>
                    <div class="description_block">Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna…</div>
                        <a href="{{url($content['latestArticles']['banner']->cta_action)}}" class="primary_btn dark_btn">Explore</a>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="news_section">
        <div class="page_container">
            <div class="section_head">
                <h2 class="section_title">News</h2>
                <a href="news_listing.php" class="view_all">View All</a>
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
                                        <a href="news_inner.php">{{$news['title']}}</a></div>
                                </div>
                                <a href="news_inner.php" class="image_block">
                                    <img src="{{asset('storage/'.$news['image'])}}" alt="" title="" width="316" height="140"/>
                                    news title
                                </a>
                            </div>
                        </li>
                    @endforeach
                </ul>
                @endif
                @if($content['latestNews']['banner'])
                <div class="bnner_block">
                    <a href="#" target="_blank" class="bnner_inner">
                        <picture>
                            <source media="(min-width:960px)" srcset="{{asset('storage/'.$content['latestNews']['banner']->image)}}">
                            <img src="{{asset('storage/'.$content['latestNews']['banner']->image)}}" alt="" title="" width="720" height="90"/>
                        </picture>
                    </a>
                </div>
                @endif
            </div>

        </div>
    </div>

    <div class="recipes_section">
        <div class="page_container">
            <div class="section_head">
                <h2 class="section_title">Recipes</h2>
                <a href="recipes_listing.php" class="view_all">View All</a>
            </div>
            @if(!empty($content['latestRecipes']['banner']))
                <div class="reward_block {{$content['latestRecipes']['banner']->image_position = 'left' ? 'image_left' : 'image_right'}}">
                    <div class="image_block">
                        <img src="{{asset('storage/'.$content['latestRecipes']['banner']->image)}}" alt="" title="" width="1090" height="475"/>
                    </div>
                    <div class="info_block">
                        <div class="inner_title">{{$content['latestRecipes']['banner']->title}}</div>
                        <div class="description_block">{{$content['latestRecipes']['banner']->short_description}}</div>
                        <a href="#" class="primary_btn dark_btn">Explore</a>
                    </div>
                </div>
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
                                    <div class="inner_title">{{$recipe['title']}}</div>
                                    <div class="author_block">By <span class="author_name">{{$recipe['author']}}</span></div>
                                    <div class="description_block">{{$recipe['short_description']}}</div>
                                    <a href="recipe_inner.php" class="secondary_btn light_btn">View Recipe</a>
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
