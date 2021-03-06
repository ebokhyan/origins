<div class="top_news">
    <div class="section_head">
        <h2 class="section_title">{!! __('news.top_news_title') !!}</h2>
    </div>
    <div class="news_list">
        @if(!empty($topNews))
        <ul class="top_list">
            @if(!empty($topNews[0]))
                <li>
                    <div class="news_block">
                        <a class="image_block" href="{{route('news_inner',['locale' => app()->getLocale(), 'slug' => $topNews[0]['slug']])}}">
                            <img src="{{asset('storage/'.$topNews[0]['image'])}}" width="750" height="519" alt="" title=""/>
                        </a>
                        <div class="info_block">
                            <div class="date_block">{{$topNews[0]['date']}}</div>
                            <div class="title_block">
                                <a href="{{route('news_inner',['locale' => app()->getLocale(), 'slug' => $topNews[0]['slug']])}}">
                                    {{@$topNews[0]['title'][app()->getLocale()]}}
                                </a>
                            </div>
                            <div class="description_block">{{@$topNews[0]['short_description'][app()->getLocale()]}}</div>
                        </div>
                    </div>
                </li>
            @endif
            @if(!empty($topNews[1]))
                <li>
                    <div class="news_block">
                        <a class="image_block" href="{{route('news_inner',['locale' => app()->getLocale(), 'slug' => $topNews[1]['slug']])}}">
                            <img src="{{asset('storage/'.$topNews[1]['image'])}}" width="393" height="519" alt="" title=""/>
                        </a>
                        <div class="info_block">
                            <div class="date_block">{{$topNews[1]['date']}}</div>
                            <div class="title_block">
                                <a href="{{route('news_inner',['locale' => app()->getLocale(), 'slug' => $topNews[1]['slug']])}}">
                                    {{@$topNews[1]['title'][app()->getLocale()]}}
                                </a>
                            </div>
                            <div class="description_block">{{@$topNews[1]['short_description'][app()->getLocale()]}}</div>
                        </div>
                    </div>
                </li>
            @endif
            @if(!empty($topNews[2]))
                <li>
                    <div class="news_block">
                        <a class="image_block" href="{{route('news_inner',['locale' => app()->getLocale(), 'slug' => $topNews[2]['slug']])}}">
                            <img src="{{asset('storage/'.$topNews[2]['image'])}}" width="345" height="122" alt="" title=""/>
                        </a>
                        <div class="info_block">
                            <div class="date_block">{{$topNews[2]['date']}}</div>
                            <div class="title_block">
                                <a href="{{route('news_inner',['locale' => app()->getLocale(), 'slug' => $topNews[2]['slug']])}}">
                                    {{@$topNews[2]['title'][app()->getLocale()]}}
                                </a>
                            </div>
                            <div class="description_block">{{@$topNews[2]['short_description'][app()->getLocale()]}}</div>
                        </div>
                    </div>
                </li>
            @endif
            @if(!empty($topNews[3]))
                <li>
                    <div class="news_block">
                        <a class="image_block" href="{{route('news_inner',['locale' => app()->getLocale(), 'slug' => $topNews[3]['slug']])}}">
                            <img src="{{asset('storage/'.$topNews[3]['image'])}}" width="345" height="122" alt="" title=""/>
                        </a>
                        <div class="info_block">
                            <div class="date_block">{{$topNews[3]['date']}}</div>
                            <div class="title_block">
                                <a href="{{route('news_inner',['locale' => app()->getLocale(), 'slug' => $topNews[3]['slug']])}}">
                                    {{@$topNews[3]['title'][app()->getLocale()]}}
                                </a>
                            </div>
                            <div class="description_block">{{@$topNews[3]['short_description'][app()->getLocale()]}}</div>
                        </div>
                    </div>
                </li>
            @endif
        </ul>
        @endif
        @if($banner)
            <x-horizontal-banner-component :banner="$banner"></x-horizontal-banner-component>
        @endif
        @if(!empty($latest))
            <ul class="bottom_list">
                @foreach($latest as $key => $news)
                    @switch($key)
                        @case(0)
                        <li>
                            <div class="news_block">
                                <a class="image_block" href="{{route('news_inner',['locale' => app()->getLocale(), 'slug' => $news->slug])}}">
                                    <img src="{{asset('storage/'.$news->image)}}" width="750" height="300" alt="" title=""/>
                                </a>
                                <div class="info_block">
                                    <div class="date_block">{{$news->date}}</div>
                                    <div class="title_block">
                                        <a href="{{route('news_inner',['locale' => app()->getLocale(), 'slug' => $news->slug])}}">{{$news->title}}</a>
                                    </div>
                                    <div class="description_block">{{$news->short_description}}</div>
                                </div>
                            </div>
                        </li>
                        @break
                        @default
                        <li>
                            <div class="news_block">
                                <a class="image_block" href="{{route('news_inner',['locale' => app()->getLocale(), 'slug' => $news->slug])}}">
                                    <img src="{{asset('storage/'.$news->image)}}" width="395" height="300" alt="" title=""/>
                                </a>
                                <div class="info_block">
                                    <div class="date_block">{{$news->date}}</div>
                                    <div class="title_block">
                                        <a href="{{route('news_inner',['locale' => app()->getLocale(), 'slug' => $news->slug])}}">{{$news->title}}</a>
                                    </div>
                                    <div class="description_block">{{$news->short_description}}</div>
                                </div>
                            </div>
                        </li>
                    @endswitch
                @endforeach
            </ul>
        @endif
    </div>
</div>
