<div class="top_news">
    <div class="section_head">
        <h2 class="section_title">Top News &#38; Spotlights</h2>
    </div>
    <div class="news_list">
        <ul class="top_list">
            @if(!empty($topNews[0]))
            <li>
                <div class="news_block">
                    <a  class="image_block" href="news_inner.php">
                        <img src="{{asset('storage/'.$topNews[0]['image'])}}" width="750" height="519" alt="" title=""/>
                        article title
                    </a>
                    <div class="info_block">
                        <div class="date_block">{{$topNews[0]['created_at']}}</div>
                        <div class="title_block">
                            <a href="news_inner.php">{{$topNews[0]['title']['en']}}</a>
                        </div>
                        <div class="description_block">{{$topNews[0]['short_description']['en']}}</div>
                    </div>
                </div>
            </li>
            @endif
                @if(!empty($topNews[1]))
            <li>
                <div class="news_block">
                    <a  class="image_block" href="news_inner.php">
                        <img src="{{asset('storage/'.$topNews[1]['image'])}}" width="393" height="519" alt="" title=""/>
                        article title
                    </a>
                    <div class="info_block">
                        <div class="date_block">{{$topNews[1]['created_at']}}</div>
                        <div class="title_block">
                            <a href="news_inner.php">{{$topNews[1]['title']['en']}}</a>
                        </div>
                        <div class="description_block">{{$topNews[1]['short_description']['en']}}</div>
                    </div>
                </div>
            </li>
                @endif
                @if(!empty($topNews[2]))
            <li>
                <div class="news_block">
                    <a  class="image_block" href="news_inner.php">
                        <img src="{{asset('storage/'.$topNews[2]['image'])}}" width="345" height="122" alt="" title=""/>
                        article title
                    </a>
                    <div class="info_block">
                        <div class="date_block">{{$topNews[2]['created_at']}}</div>
                        <div class="title_block">
                            <a href="news_inner.php">{{$topNews[2]['title']['en']}}</a>
                        </div>
                        <div class="description_block">{{$topNews[2]['short_description']['en']}}</div>
                    </div>
                </div>
            </li>
                @endif
                @if(!empty($topNews[3]))
            <li>
                <div class="news_block">
                    <a  class="image_block" href="news_inner.php">
                        <img src="{{asset('storage/'.$topNews[3]['image'])}}" width="345" height="122" alt="" title=""/>
                        article title
                    </a>
                    <div class="info_block">
                        <div class="date_block">{{$topNews[3]['created_at']}}</div>
                        <div class="title_block">
                            <a href="news_inner.php">{{$topNews[3]['title']['en']}}</a>
                        </div>
                        <div class="description_block">{{$topNews[3]['short_description']['en']}}</div>
                    </div>
                </div>
            </li>
                @endif
        </ul>

        <x-horizontal-banner-component :banner="$banner"></x-horizontal-banner-component>
        @if(!empty($latest))
        <ul class="bottom_list">
            @foreach($latest as $key => $news)
                @switch($key)
                    @case(0):
                    <li>
                        <div class="news_block">
                            <a  class="image_block" href="news_inner.php">
                                <img src="{{asset('storage/'.$news->image)}}" width="750" height="300" alt="" title=""/>
                                article title
                            </a>
                            <div class="info_block">
                                <div class="date_block">{{$news->date}}</div>
                                <div class="title_block">
                                    <a href="news_inner.php">{{$news->title}}</a>
                                </div>
                                <div class="description_block">{{$news->short_descrtion}}</div>
                            </div>
                        </div>
                    </li>
                    @break
                    @default
                    <li>
                        <div class="news_block">
                            <a  class="image_block" href="news_inner.php">
                                <img src="{{asset('storage/'.$news->image)}}" width="395" height="300" alt="" title=""/>
                                article title
                            </a>
                            <div class="info_block">
                                <div class="date_block">{{$news->date}}</div>
                                <div class="title_block">
                                    <a href="news_inner.php">{{$news->title}}</a>
                                </div>
                                <div class="description_block">{{$news->short_descrtion}}</div>
                            </div>
                        </div>
                    </li>
                @endswitch
            @endforeach
{{--            <li>--}}
{{--                <div class="news_block">--}}
{{--                    <a  class="image_block" href="news_inner.php">--}}
{{--                        <img src="images/article_image2.jpg" width="395" height="300" alt="" title=""/>--}}
{{--                        article title--}}
{{--                    </a>--}}
{{--                    <div class="info_block">--}}
{{--                        <div class="date_block">18 March, 2021</div>--}}
{{--                        <div class="title_block">--}}
{{--                            <a href="news_inner.php">Lorem ipsum dolor sit amet.</a>--}}
{{--                        </div>--}}
{{--                        <div class="description_block">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et</div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <div class="news_block">--}}
{{--                    <a  class="image_block" href="news_inner.php">--}}
{{--                        <img src="images/article_image3.jpg" width="345" height="300" alt="" title=""/>--}}
{{--                        article title--}}
{{--                    </a>--}}
{{--                    <div class="info_block">--}}
{{--                        <div class="date_block">18 March, 2021</div>--}}
{{--                        <div class="title_block">--}}
{{--                            <a href="news_inner.php">Lorem ipsum dolor sit amet.</a>--}}
{{--                        </div>--}}
{{--                        <div class="description_block">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et</div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </li>--}}
        </ul>
        @endif
    </div>
</div>
