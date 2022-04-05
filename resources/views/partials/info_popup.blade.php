<div class="popup_block member_popup showed">
    <div class="popup_inner">
        <div class="popup_container">
            <button class="popup_close icon_close" aria-label="popup close"></button>
            <div class="member_image">
                <img src="{{asset('storage/'.$details->image)}}" alt="" title="" width="630" height="880"/>
            </div>
            <div class="member_info">
                <div class="member_name">{{$details->full_name}}</div>
                <div class="member_post">{{$details->position}}</div>
                <ul class="socials_list">
                    <li><a href="{{$details->facebook}}" target="_blank" class="icon_facebook">facebook</a></li>
                    <li><a href="{{$details->twitter}}" target="_blank" class="icon_twitter">twitter</a></li>
                    <li><a href="{{$details->instagram}}" target="_blank" class="icon_instagram">instagram</a></li>
                </ul>
                <div class="about_member">
                    {!! $details->bio !!}
                </div>
                @if(!empty($details->similar_stories))
                <div class="member_articles">
                    <div class="section_head">
                        <h2 class="section_title">Similar Stories</h2>
                    </div>
                    <ul>
                        @foreach($details->similar_stories as $story)
                        <li>
                            <div class="member_article">
                                <a class="image_block" href="article_inner.php">
                                    <img src="{{asset('storage/'.$story->image)}}" width="280" height="100" alt="" title=""/>
                                    article title
                                </a>
                                <div class="info_block">
                                    <div class="date_block">{{$story->date}}</div>
                                    <div class="title_block">
                                        <a href="article_inner.php">{{$story->title}}</a>
                                    </div>
                                    <div class="description_block">{{$story->short_description}}</div>
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
