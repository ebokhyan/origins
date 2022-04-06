<div class="latest_features">
    <div class="section_head">
        <h2 class="section_title">{{__('main.latest')}}</h2>
        <form class="inner_search">
            <label>
                <span class="label">{{__('main.search')}}</span>
                <input type="text" name="search[]" placeholder="{{__('main.form.placeholders.search')}}"/>
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
                            @if($type == 'news_inner')
                                <a class="image_block" href="{{route('news_inner',['locale' => app()->getLocale(), 'slug' => $item->slug])}}">
                            @else
                                <a class="image_block" href="{{route('feature',['locale' => app()->getLocale(), 'slug' => $item->slug])}}">
                            @endif
                                <img src="{{asset('storage/'.$item->image)}}" width="390" height="250" alt="" title=""/>
                                article title
                                </a>
                            <div class="info_block">
                                <div class="date_block">{{$item->date}}</div>
                                <div class="title_block">
                                    @if($type == 'news_inner')
                                        <a href="{{route('news_inner',['locale' => app()->getLocale(), 'slug' => $item->slug])}}">{{@$item->title}}</a>
                                    @else
                                        <a href="{{route('feature',['locale' => app()->getLocale(), 'slug' => $item->slug])}}">{{@$item->title}}</a>
                                    @endif
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
