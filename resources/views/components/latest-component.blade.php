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
                  @defoult
                        action="{{route('search',['locale' => app()->getLocale()])}}"
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
    @if($items->total() > 0)
        <div class="features_list" style="{{$search ? "padding-top: 0;" : '' }}">
            <ul class="search_listing">
                @include('pagination_partials.search',['items' => $items])
            </ul>
            @if(!empty($banners))
                <x-vertical_banner-component :banners="$banners"></x-vertical_banner-component>
            @endif
        </div>
    @else
        <div class="guides_list">
            <div class="description_block ">No results found</div>
        </div>
    @endif
</div>
