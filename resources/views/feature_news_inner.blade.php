@extends('layouts.app')
@section('content')
<div class="content">
    <div class="inner_page">
        <div class="page_container">
            <div class="page_head">
                <h1 class="page_title">{{$content->title}}</h1>
            </div>
            <div class="feature_inner">
                <div class="article_col">
                    <div class="details_block">
                        <h2 class="details_title">{{$content->short_description}}</h2>
                        <ul class="details_list">
                            <li>By {{$content->author}}</li>
                            <li>Photography by {{$content->photographer}}</li>
                            <li>Translated by {{$content->translator}}</li>
                            <li>{{$content->created_at}}</li>
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
                    @if(!empty($topFeatures))
                        <div class="col_subtitle">Top Stories</div>
                        <ul class="stories_list">
                            @foreach($topFeatures as $feature)
                                <li>
                                    <div class="title_block">
                                        <a href="{{route('feature',['locale' => 'en', 'slug' => $feature['slug']])}}">{{$feature['title']['en']}}</a>
                                    </div>
                                    <div class="date_block">{{$feature['created_at']}}</div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    <x-vertical-banner-component :banners="$adds"></x-vertical-banner-component>
                </div>
            </div>
            @if(!empty($similarFeatures))
            <div class="similar_features">
                <div class="section_head">
                    <h2 class="section_title">Similar Stories</h2>
                </div>
                <div class="features_list">
                    <ul>
                        @foreach($similarFeatures as $feature)
                            <li>
                                <div class="feature_block">
                                    <a  class="image_block" href="{{route('feature',['locale' => 'en', 'slug' => $feature['slug']])}}">
                                        <img src="{{asset('storage/'.$feature['image'])}}" width="530" height="250" alt="" title=""/>
                                        article title
                                    </a>
                                    <div class="info_block">
                                        <div class="date_block">{{$feature['created_at']}}</div>
                                        <div class="title_block">
                                            <a href="feature_inner.php">{{$feature['title']['en']}}</a>
                                        </div>
                                        <div class="author_block">
                                            By <span class="author_name">{{$feature['author']['en']}}</span>
                                        </div>
                                        <div class="description_block">{{$feature['short_description']['en']}}</div>
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
