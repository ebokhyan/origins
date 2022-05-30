@foreach($recipes as $recipe)
    <li>
        <div class="recipe_block">
            <a  class="image_block" href="{{route('recipes.inner',['locale' => app()->getLocale(), 'slug' => $recipe->slug])}}">
                <img src="{{asset('storage/'.$recipe->image)}}" width="536" height="500" alt="" title=""/>
            </a>
            <div class="info_block">
                <div class="title_block">
                    <a href="{{route('recipes.inner',['locale' => app()->getLocale(), 'slug' => $recipe->slug])}}">{{$recipe->title}}</a>
                </div>
                @if(!empty($recipe->author))
                    <div class="author_block">
                       {{Str::ucfirst(__('main.by'))}}
                        <a href="{{route('about',['locale' => app()->getLocale(),'#coworkers'])}}">
                        <span class="author_name">{{ @$recipe->author}}</span>
                        </a>
                    </div>
                @endif
                <div class="description_block">{{@$recipe->short_description}}</div>
            </div>
        </div>
    </li>
@endforeach
@if($recipes->currentPage() != $recipes->lastPage())
    <li  style="flex: 0 0 100%; max-width: 100%">
        <button class="btn" id="loadBtn" data-load-url='{{$recipes->nextPageUrl()}}'>@lang('main.load_more')</button>
    </li>
@endif
