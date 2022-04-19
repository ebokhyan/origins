@extends('layouts.app')
@section('content')
<div class="content">
    <div class="inner_page">
        <div class="page_container">
            <div class="page_head">
                <h1 class="page_title">Region Name</h1>
            </div>
            <div class="region_params">
                <ul>
                    <li>
                        <img src="{{asset('css/images/grape.svg')}}" alt="" title="" width="23" height="34"/>
                        Vineyard Surface
                    </li>
                    <li>
                        <img src="{{asset('css/images/soil.svg')}}" alt="" title="" width="25" height="25"/>
                        Soil
                    </li>
                    <li>
                        <img src="{{asset('css/images/climate.svg')}}" alt="" title="" width="23" height="19"/>
                        Climate
                    </li>
                    <li>
                        <img src="{{asset('css/images/elevation.svg')}}" alt="" title="" width="24" height="12"/>
                        Elevation
                    </li>
                    <li>
                        <img src="{{asset('css/images/varieties.svg')}}" alt="" title="" width="24" height="24"/>
                        Varieties
                    </li>
                </ul>
            </div>
            <div class="guide_main_image">
                <picture>
                    <source media="(min-width:960px)" srcset="{{asset('storage/'.$guide->cover_image)}}" width="1640" height="400">
                    <img src="{{asset('storage/'.$guide->cover_image_mobile)}}" alt="" title="" width="960" height="480"/>
                </picture>

            </div>
            <div class="feature_inner">
                <div class="article_col">
                    <div class="article_content">
                        {!! $guide->description_1 !!}
                        <div class="inner_subscribe">
                            <div class="small_bnner">
                                <a href="#" class="bnner_inner">
                                    <picture>
                                        <source media="(min-width:960px)" srcset="{{asset('images/wide_bnner.jpg')}}" width="300" height="250">
                                        <img src="{{asset('images/h_bnner.jpg')}}" alt="" title="" width="728" height="90"/>
                                    </picture>

                                    bnner title here
                                </a>
                            </div>
                            <div class="subscribe_inner">
                                <div class="inner_title">Subscribe to our newsletter</div>
                                <div class="description_block">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,</div>
                                <form class="subscribe_form">
                                    <label>
                                        <span class="label">subscribe</span>
                                        <input type="text" name="subscribe_email" data-validation="email" placeholder="Email Address">
                                        <span class="error_hint">
													<span class="standard_hint">mandatory field</span>
													<span class="individual_hint">wrong email address</span>
												</span>
                                    </label>
                                    <button class="validate_btn icon_arrow dark_btn" type="submit" aria-label="subscribe"></button>
                                </form>
                            </div>
                        </div>
                       {!! $guide->description_2 !!}
                        @if($add)
                        <div class="horizontal_bnner">
                            <a href="#" class="bnner_inner">
                                <img src="{{asset('storage/'.$add->image)}}" alt="" title="" width="728" height="90"/>
                                bnner title here
                            </a>
                        </div>
                        @endif
                       {!! $guide->description_3 !!}
                    </div>
                </div>
                <div class="right_col">
                    <div class="vertical_bnners">
                        <a href="#" target="_blank" class="bnner_inner">
                            <img src="{{asset('images/v_banner.jpg')}}" alt="" title="" width="300" height="600"/>
                            banner title
                        </a>
                    </div>
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
                                    <a  class="image_block" href="{{route('feature',['locale' => app()->getLocale(), 'slug' => $feature->slug])}}">
                                        <img src="{{asset('storage/'.$feature->image)}}" width="530" height="250" alt="" title=""/>
                                        article title
                                        article title
                                    </a>
                                    <div class="info_block">
                                        <div class="date_block">{{$feature->date}}</div>
                                        <div class="title_block">
                                            <a href="{{route('feature',['locale' => app()->getLocale(), 'slug' => $feature->slug])}}">
                                                {{$feature->title}}</a>
                                        </div>
                                        <div class="author_block">
                                            By <span class="author_name">{{@$feature->author}}</span>
                                        </div>
                                        <div class="description_block">{{$feature->short_description}}</div>
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
