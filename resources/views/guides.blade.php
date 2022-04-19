@extends('layouts.app')
@section('content')
<div class="content">
    <div class="inner_page">
        <div class="page_container">
            <div class="page_head">
                <h1 class="page_title">Guides</h1>
                <form class="inner_search">
                    <label>
                        <span class="label">search</span>
                        <input type="text" name="search[]" placeholder="Search Guides"/>
                    </label>
                    <button type="submit" class="icon_search" aria-label="search"></button>
                </form>
            </div>
            <div class="guides_section">
                <div class="section_head">
                    <h2 class="section_title">{{@$content['title']}}</h2>
                </div>
                @if(!empty($content['guides']))
                    <div class="guides_list">
                        <ul>
                            @foreach($content['guides'] as $guide)
                            <li>
                                <div class="guide_block">
                                    <a  class="image_block" href="{{route('guides.inner',['locale' => app()->getLocale(), 'slug' => $guide->slug])}}">
                                        <img src="{{asset('storage/'.$guide->image)}}" width="536" height="500" alt="" title=""/>
                                        article title
                                    </a>
                                    <div class="info_block">
                                        <div class="title_block">
                                            <a href="{{route('guides.inner',['locale' => app()->getLocale(), 'slug' => $guide->slug])}}">{{$guide->title}}</a>
                                        </div>
                                        <div class="description_block">{{$guide->short_description}}</div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
