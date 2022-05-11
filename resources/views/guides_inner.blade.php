@extends('layouts.app')
@section('content')
<div class="content">
    <div class="inner_page">
        <div class="page_container">
            <div class="page_head">
                <h1 class="page_title">{{$guide->title}}</h1>
            </div>
{{--            <div class="region_params">--}}
{{--                <ul>--}}
{{--                    <li>--}}
{{--                        <img src="{{asset('css/images/grape.svg')}}" alt="" title="" width="23" height="34"/>--}}
{{--                        {{__('guides.vineyard_surface')}}--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <img src="{{asset('css/images/soil.svg')}}" alt="" title="" width="25" height="25"/>--}}
{{--                        {{__('guides.soil')}}--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <img src="{{asset('css/images/climate.svg')}}" alt="" title="" width="23" height="19"/>--}}
{{--                        {{__('guides.climate')}}--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <img src="{{asset('css/images/elevation.svg')}}" alt="" title="" width="24" height="12"/>--}}
{{--                        {{__('guides.elevation')}}--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <img src="{{asset('css/images/varieties.svg')}}" alt="" title="" width="24" height="24"/>--}}
{{--                        {{__('guides.varieties')}}--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div>--}}
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
                                        <source media="(min-width:960px)" srcset="{{asset('storage/'.$guide->subscription_image)}}" width="300" height="250">
                                        <img src="{{asset('storage/'.$guide->subscription_image_mob)}}" alt="" title="" width="728" height="90"/>
                                    </picture>
                                </a>
                            </div>
                            <div class="subscribe_inner">
                                <div class="inner_title">{{$guide->subscription_title}}</div>
                                <div class="description_block">{{$guide->subscription_text}}</div>
                                <form class="subscribe_form" name="innerSubscriptionForm" id="innerSubscriptionForm">
                                    @csrf
                                    <label id="inner_email_label">
                                        <span class="label">subscribe</span>
                                        <input type="text" name="inner_subscribe_email" data-validation="email" placeholder="{{__('main.form.placeholders.email')}}">
                                        <span class="error_hint">
                                            <span class="standard_hint">mandatory field</span>
                                            <span class="individual_hint">wrong email address</span>
                                        </span>
                                    </label>
                                    <button class="validate_btn icon_arrow dark_btn" type="submit" aria-label="subscribe"></button>
                                </form>
                                <div id="inner_success_msg" class="description_block"></div>
                            </div>
                        </div>
                       {!! $guide->description_2 !!}
                        @if($add)
                        <div class="horizontal_bnner">
                            <a href="#" class="bnner_inner">
                                <img src="{{asset('storage/'.$add->image)}}" alt="" title="" width="728" height="90"/>
                            </a>
                        </div>
                        @endif
                       {!! $guide->description_3 !!}
                    </div>
                </div>
                <div class="right_col">
                    <x-vertical-banner-component :banners="$v_ads"></x-vertical-banner-component>
                </div>
            </div>
            @if(!empty($similarFeatures))
            <div class="similar_features">
                <div class="section_head">
                    <h2 class="section_title">{{__('guides.similar_stories')}}</h2>
                </div>
                <div class="features_list">
                    <ul>
                        @foreach($similarFeatures as $feature)
                            <li>
                                <div class="feature_block">
                                    <a  class="image_block" href="{{route('feature',['locale' => app()->getLocale(), 'slug' => $feature->slug])}}">
                                        <img src="{{asset('storage/'.$feature->image)}}" width="530" height="250" alt="" title=""/>
                                    </a>
                                    <div class="info_block">
                                        <div class="date_block">{{$feature->date}}</div>
                                        <div class="title_block">
                                            <a href="{{route('feature',['locale' => app()->getLocale(), 'slug' => $feature->slug])}}">
                                                {{$feature->title}}</a>
                                        </div>
                                        <div class="author_block">
                                            @if(app()->getLocale() == 'en')
                                                {{Str::ucfirst(__('main.by'))}}
                                            @endif
                                                <span class="author_name">{{@$feature->author}}</span>
                                            @if(app()->getLocale() == 'hy')
                                                {{Str::lower(__('main.by'))}}
                                            @endif
                                        </div>
                                        <div class="description_block">{{@$feature->short_description}}</div>
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
