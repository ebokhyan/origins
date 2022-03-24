<div class="latest_features">
    <div class="section_head">
        <h2 class="section_title">Latest</h2>
        <form class="inner_search">
            <label>
                <span class="label">search</span>
                <input type="text" name="search[]" placeholder="Search"/>
            </label>
            <button type="submit" class="icon_search" aria-label="search"></button>
        </form>
    </div>
    @if(!empty($items))
        <div class="features_list">
            <ul>
                @foreach($items as $item)
                    <li>
                        <div class="feature_block">
                            <a class="image_block" href="{{route($type,['locale' => 'en', 'slug' => $item->slug])}}">
                                <img src="{{asset('storage/'.$item->image)}}" width="390" height="250" alt="" title=""/>
                                article title
                            </a>
                            <div class="info_block">
                                <div class="date_block">{{$item->date}}</div>
                                <div class="title_block">
                                    <a href="{{route($type,['locale' => 'en', 'slug' => $item->slug])}}">{{@$item->title}}</a>
                                </div>
                                <div class="author_block">
                                    By <span class="author_name">{{@$item->author}}</span>
                                </div>
                                <div class="description_block">{{@$item->short_description}}</div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
            @if(!empty($banners))
                <x-vertical_banner-component :banners="$banners"></x-vertical_banner-component>
            @endif
        </div>
    @endif
</div>
