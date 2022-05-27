@empty(!$banner)
<div class="top_bnner">
    <div class="bnner_inner">
        @if($banner->href)
            <a href="{{$banner->href}}">
                <img src="{{asset('storage/'.$banner->image)}}" alt="" title="" width="728" height="90"/>
            </a>
        @else
            <img src="{{asset('storage/'.$banner->image)}}" alt="" title="" width="728" height="90"/>
        @endif
    </div>
</div>
@endempty
