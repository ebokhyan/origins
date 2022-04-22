@foreach($items as $item)
    <li>
        <div class="feature_block">
            @switch($item->type)
                @case('news')
                <a class="image_block"
                   href="{{route('news_inner',['locale' => app()->getLocale(), 'slug' => $item->slug])}}">
                    <img src="{{asset('storage/'.$item->image)}}" width="390" height="250" alt="" title=""/>
                </a>
                @break
                @case('feature')
                <a class="image_block"
                   href="{{route('feature',['locale' => app()->getLocale(), 'slug' => $item->slug])}}">
                    <img src="{{asset('storage/'.$item->image)}}" width="390" height="250" alt="" title=""/>
                </a>
                @break
                @case('recipe')
                <a class="image_block"
                   href="{{route('recipe',['locale' => app()->getLocale(), 'slug' => $item->slug])}}">
                    <img src="{{asset('storage/'.$item->image)}}" width="390" height="250" alt="" title=""/>
                </a>
                @break
            @endswitch
            <div class="info_block">
                <div class="date_block">{{$item->date}}</div>
                <div class="title_block">
                    @switch($item->type)
                        @case('news')
                        <a href="{{route('news_inner',['locale' => app()->getLocale(), 'slug' => $item->slug])}}">{{@$item->title}}</a>
                        @break
                        @case('feature')
                        <a href="{{route('feature',['locale' => app()->getLocale(), 'slug' => $item->slug])}}">{{@$item->title}}</a>
                        @break
                        @case('recipe')
                        <a href="{{route('recipe',['locale' => app()->getLocale(), 'slug' => $item->slug])}}">{{@$item->title}}</a>
                        @break
                    @endswitch
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
@if($items->currentPage() != $items->lastPage())
    <li  style="flex: 0 0 100%; max-width: 100%">
        <button class="btn" id="loadBtn" data-load-url='{{$items->nextPageUrl()}}'>Load more</button>
    </li>
@endif
