@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="inner_page">
            <div class="page_container">
                <div class="page_head">
                    <h1 class="page_title">{{@$content['title']}}</h1>
                </div>
                <div class="standard_textpage">
                    {!! $content['content']!!}
                </div>
            </div>
        </div>
    </div>
@endsection
