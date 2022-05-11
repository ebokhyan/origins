@extends('layouts.cs_app')
@section('content')
    <div class="content">
        <div class="page_container">
            <div class="cs_inner {{$content['position'] == 'left' ? 'reverse' : ''}}">
                <div class="info_block">
                    <h1 class="cs_title">{{ @Str::upper($content['title']) }}</h1>
                    <div class="text_block"> {{$content['short_description']}} </div>
                </div>
                <div class="image_block">
                    <img src="{{asset('storage/'.$content['image'])}}" alt="" title="" width="960" height="720"/>
                </div>
            </div>
        </div>
    </div>
@endsection
