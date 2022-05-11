
    <div class="top_features">
        <div class="section_head">
            <h2 class="section_title">{{__('features.top_features_title')}}</h2>
        </div>

        @if(!empty($topFeatures))
        <div class="features_list">
            <ul>
                @if(!empty($topFeatures[0]))
                <li>
                    <div class="feature_block">
                        <a class="image_block" href="{{route('feature',['locale' => app()->getLocale(), 'slug' => $topFeatures[0]['slug']])}}">
                            <img src="{{asset('storage/'.$topFeatures[0]['image'])}}" width="1088" height="716" alt="" title=""/>
                            article title
                        </a>
                        <div class="info_block">
                            <div class="date_block">{{$topFeatures[0]['date']}}</div>
                            <div class="title_block">
                                <a href="{{route('feature',['locale' => app()->getLocale(), 'slug' => $topFeatures[0]['slug']])}}">{{$topFeatures[0]['title'][app()->getLocale()]}}</a>
                            </div>
                            <div class="author_block">
                                {{__('main.by')}} <span class="author_name">{{@$topFeatures[0]['author'][app()->getLocale()]}}</span>
                            </div>
                            <div class="description_block">{{@$topFeatures[0]['short_description'][app()->getLocale()]}}
                            </div>
                        </div>
                    </div>
                </li>
                @endif
                @if(!empty($topFeatures[1]))
                <li>
                    <div class="feature_block">
                        <a class="image_block" href="{{route('feature',['locale' => app()->getLocale(), 'slug' => $topFeatures[1]['slug']])}}">
                            <img src="{{asset('storage/'.$topFeatures[1]['image'])}}" width="500" height="250" alt="" title=""/>
                            article title
                        </a>
                        <div class="info_block">
                            <div class="date_block">{{$topFeatures[1]['date']}}</div>
                            <div class="title_block">
                                <a href="{{route('feature',['locale' => app()->getLocale(), 'slug' => $topFeatures[1]['slug']])}}">{{@$topFeatures[1]['title'][app()->getLocale()]}}</a>
                            </div>
                            <div class="author_block">
                                {{__('main.by')}}  <span class="author_name">{{@$topFeatures[1]['author'][app()->getLocale()]}}</span>
                            </div>
                            <div class="description_block">{{@$topFeatures[1]['short_description'][app()->getLocale()]}}</div>
                        </div>
                    </div>
                </li>
                @endif
                @if(!empty($topFeatures[2]))
                <li>
                    <div class="feature_block">
                        <a class="image_block" href="{{route('feature',['locale' => app()->getLocale(), 'slug' => $topFeatures[2]['slug']])}}">
                            <img src="{{asset('storage/'.$topFeatures[2]['image'])}}" width="500" height="250" alt="" title=""/>
                            article title
                        </a>
                        <div class="info_block">
                            <div class="date_block">{{$topFeatures[2]['date']}}</div>
                            <div class="title_block">
                                <a href="{{route('feature',['locale' => app()->getLocale(), 'slug' => $topFeatures[2]['slug']])}}">
                                    {{@$topFeatures[2]['title'][app()->getLocale()]}}
                                </a>
                            </div>
                            <div class="author_block">
                                {{__('main.by')}}  <span class="author_name">{{@$topFeatures[2]['author'][app()->getLocale()]}}</span>
                            </div>
                            <div class="description_block">{{@$topFeatures[2]['short_description'][app()->getLocale()]}}</div>
                        </div>
                    </div>
                </li>
               @endif
            </ul>
        </div>
        @endif
    </div>
