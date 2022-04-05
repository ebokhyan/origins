<div class="reward_block {{$details->image_position = 'left' ? 'image_left' : 'image_right'}}">
    <div class="image_block">
        <img src="{{asset('storage/'.$details->image)}}" alt="" title="" width="1090" height="475"/>
    </div>
    <div class="info_block">
        <div class="inner_title">{{$details->title}}</div>
        <div class="description_block">{!! $details->short_description !!}</div>
        <a href="{{!empty($details->cta_action) ? $details->cta_action : ''}}" class="primary_btn dark_btn">Explore</a>
    </div>
</div>
