@foreach($guides as $guide)
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
@if($guides->currentPage() != $guides->lastPage())
    <li  style="flex: 0 0 100%; max-width: 100%">
        <button class="btn" id="loadBtn" data-load-url='{{$guides->nextPageUrl()}}'>Load more</button>
    </li>
@endif
