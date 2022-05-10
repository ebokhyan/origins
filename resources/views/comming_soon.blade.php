@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="inner_page">
            <div class="page_container">
                <div class="about_inner">
                    <div class="about_main">
                        <div class="image_block">
                            <img src="{{asset('storage/'.$content['image'])}}" alt="" title="" width="812" height="469"/>
                        </div>
                        <div class="info_block">
                            <h2>{{ $content['title'] }}</h2>
                            <div>
                                {{ $content['short_description'] }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
