<div class="latest_features">
    @if(!$search)
    <div class="section_head">
        <h2 class="section_title">{{__('main.latest')}}</h2>
            <form class="inner_search" method="GET"
                  @switch($type)
                      @case('features')
                        action="{{route('features',['locale' => app()->getLocale()])}}"
                        @break
                      @case('news')
                        action="{{route('news',['locale' => app()->getLocale()])}}"
                        @breack
                  @endSwitch
            >
                <label>
                    <span class="label">{{__('main.search')}}</span>
                    <input type="text" name="search" placeholder="{{__('main.form.placeholders.search')}}"/>
                </label>
                <button type="submit" class="icon_search" aria-label="search"></button>
            </form>
    </div>
    @endif
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
                                    @if(app()->getLocale() == 'en')
                                        {{Str::ucfirst(__('main.by'))}}
                                    @endif
                                        <span class="author_name">{{@$item->author}}</span>
                                    @if(app()->getLocale() == 'hy')
                                        {{Str::lower(__('main.by'))}}
                                    @endif
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
