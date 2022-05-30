<div class="vertical_bnners">
    @foreach($banners as $banner)
        <a href="#" target="_blank" class="bnner_inner">
            <img src="{{asset('storage/'.$banner['image'])}}" alt="" title="" width="300" height="600"/>
        </a>
    @endforeach
</div>
