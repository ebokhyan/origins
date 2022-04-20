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
                        @if(app()->getLocale() == 'en')
                            {{Str::ucfirst(__('recipes.created'))}} {{Str::lower(__('main.by'))}}
                            <span class="author_name">{{@$recipe['author'][app()->getLocale()]}}</span>
                        @endif
                        @if(app()->getLocale() == 'hy')
                            {{Str::ucfirst(__('recipes.created'))}}  <span class="author_name">{{$recipe->author}}</span> {{Str::lower(__('main.by'))}}
                        @endif
                    </div>
                @endif
                <div class="description_block">{{@$recipe->short_description}}</div>
            </div>
        </div>
    </li>
@endforeach
@if($recipes->currentPage() != $recipes->lastPage())
    <button class="btn" id="loadBtn" data-load-url='{{$recipes->nextPageUrl()}}'>Load more</button>
@endif
