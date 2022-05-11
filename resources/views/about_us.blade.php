@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="inner_page">
            <div class="page_container">
                <div class="page_head">
                    <h1 class="page_title">{{$content['name']}}</h1>
                </div>
                <div class="about_inner">
                    <div class="about_main">
                        <div class="image_block">
                            <img src="{{asset('storage/'.$content['image'])}}" alt="" title="" width="812" height="469"/>
                        </div>
                        <div class="info_block">
                            {!! $content['description'] !!}
                        </div>
                    </div>

                    <div class="staff_section">
                        <div class="section_head">
                            <h2 class="section_title">{{__('about.team')}}</h2>
                        </div>
                        @csrf
                        @if(!empty($content['team']))
                            <div class="managament_staff">
                                <ul>
                                    @foreach($content['team'] as $member)
                                        <li>
                                            <div class="image_block">
                                                <img src="{{asset('storage/'.$member->image)}}" alt="" title="" width="400" height="500"/>
                                            </div>
                                            <div class="info_block">
                                                <ul class="socials_list">
                                                    <li><a href="{{$member->facebook}}" target="_blank" class="icon_facebook">facebook</a></li>
                                                    <li><a href="{{$member->twitter}}" target="_blank" class="icon_twitter">twitter</a></li>
                                                    <li><a href="{{$member->instagram}}" target="_blank" class="icon_instagram">instagram</a></li>
                                                </ul>
                                                <button class="member_name popup_btn" data-popup="{{$member->id}}" data-type="team" aria-label="popup">{{$member->full_name}}</button>
                                                <div class="member_post">{{$member->position}}</div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="coworkers">
                            @if(!empty($content['contributors']))
                            <div class="sub_team">
                                <div class="team_name">{{__('about.contributors')}}</div>
                                <ul class="members_list">
                                    @foreach($content['contributors'] as $contributor)
                                    <li><button class="member_name popup_btn" data-popup="{{$contributor->id}}" data-type="contributor">{{$contributor->full_name}}</button></li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            @if(!empty($content['translators']))
                            <div class="sub_team">
                                <div class="team_name">{{__('about.translators')}}</div>
                                <ul class="members_list">
                                    @foreach($content['translators'] as $translator)
                                    <li><button class="member_name popup_btn" data-popup="{{$translator->id}}" data-type="translator">{{$translator->full_name}}</button></li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            @if(!empty($content['photographers']))
                            <div class="sub_team">
                                <div class="team_name">{{__('about.photographers')}}</div>
                                <ul class="members_list">
                                    @foreach($content['photographers'] as $photographer)
                                    <li><button class="member_name popup_btn" data-popup="{{$photographer->id}}" data-type="photographer">{{$photographer->full_name}}</button></li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            @if(!empty($content['donors']))
                            <div class="sub_team">
                                <div class="team_name">{{__('about.donors')}}</div>
                                <ul class="members_list">
                                    @foreach($content['donors'] as $donor)
                                    <li>
                                        <div class="member_name">
                                            @if(!empty($donor->href))
                                                <a href="{{$donor->href}}">{{$donor->full_name}} </a>
                                            @else
                                                {{$donor->full_name}}
                                            @endif
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div>
                    @if(!empty($content['sponsors']))
                    <div class="sponsors_section">
                        <div class="section_head">
                            <h2 class="section_title">{{__('about.sponsors')}}</h2>
                        </div>
                        <ul class="sponsors_list">
                            @foreach($content['sponsors'] as $sponsor)
                            <li>
                                <a target="_blank" class="sponsor_block">
                                    <img src="{{asset('storage/'.$sponsor->logo)}}" alt="" title="" width="400" height="200"/>
                                    Sponsor name
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(!empty($content['adds']))
                    <div class="bnners_group">
                        @foreach($content['adds'] as $add)
                        <x-horizontal-banner-component :banner="$add"></x-horizontal-banner-component>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
