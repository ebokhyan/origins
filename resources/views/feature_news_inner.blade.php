@extends('layouts.app')
@section('content')
<div class="content">
    <div class="inner_page">
        <div class="page_container">
            <div class="page_head">
                <h1 class="page_title article_title">{{$content->title}}</h1>
            </div>
            <div class="feature_inner">
                <div class="article_col">
                    <div class="details_block">
{{--                    <h2 class="details_title">{{$content->short_description}}</h2>--}}
                        <ul class="details_list">
                            <li>
                                {{Str::ucfirst(__('main.by'))}}
                              <a href="{{route('about',['locale' => app()->getLocale(),'#coworkers'])}}">
                                   {{$content->author}}
                              </a>
                            </li>
                            <li>
                                {{Str::ucfirst(__('features.translated'))}}
                                {{app()->getLocale() == 'en' ? Str::lower(__('main.by')) : ''}}
                                {{$content->translator}}
                            </li>
                            <li>{{$content->date}}</li>
                        </ul>
                        <div class="share_btns">
                            <div class="addthis_inline_share_toolbox_dg5a"></div>
                        </div>
                    </div>
                    <div class="article_content">
                        {!! $content->description !!}
                    </div>
                </div>
                <div class="right_col">
                    @if(!empty($top))
                        <div class="col_subtitle">{{__('features.top_stories')}}</div>
                        <ul class="stories_list">
                            @foreach($top as $item)
                                <li>
                                    <div class="title_block">
                                        @if($type == 'news_inner')
                                            <a href="{{route('news_inner',['locale' => 'en', 'slug' => $item['slug']])}}">{{$item['title'][app()->getLocale()]}}</a>
                                        @else
                                            <a href="{{route('feature',['locale' => 'en', 'slug' => $item['slug']])}}">{{$item['title'][app()->getLocale()]}}</a>
                                        @endif
                                    </div>
                                    <div class="date_block">{{$item['date']}}</div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    <x-vertical-banner-component :banners="$adds"></x-vertical-banner-component>
                </div>
            </div>
            @if(!empty($similar))
            <div class="similar_features">
                <div class="section_head">
                    <h2 class="section_title">{{__('features.similar')}}</h2>
                </div>
                <div class="features_list">
                    <ul>
                        @foreach($similar as $item)
                            <li>
                                <div class="feature_block">
                                    @if($type == 'news_inner')
                                        <a class="image_block" href="{{route('news_inner',['locale' => 'en', 'slug' => $item['slug']])}}">
                                    @else
                                        <a class="image_block" href="{{route('feature',['locale' => 'en', 'slug' => $item['slug']])}}">
                                    @endif
                                        <img src="{{asset('storage/'.$item['image'])}}" width="530" height="250" alt="" title=""/>
                                        </a>
                                    <div class="info_block">
                                        <div class="date_block">{{$item['date']}}</div>
                                        <div class="title_block">
                                            @if($type == 'news_inner')
                                                <a href="{{route('news_inner',['locale' => 'en', 'slug' => $item['slug']])}}">{{$item['title'][app()->getLocale()]}}</a>
                                            @else
                                                <a href="{{route('feature',['locale' => 'en', 'slug' => $item['slug']])}}">{{$item['title'][app()->getLocale()]}}</a>
                                            @endif
                                        </div>
                                        <div class="author_block">
                                            {{Str::ucfirst(__('main.by'))}}
                                            <a href="{{route('about',['locale' => app()->getLocale(),'#coworkers'])}}" class="author_name">
                                                {{@$item['author'][app()->getLocale()]}}
                                            </a>
                                        </div>
                                        <div class="description_block">{{@$item['short_description'][app()->getLocale()]}}</div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
