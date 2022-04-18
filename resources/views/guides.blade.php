@extends('layouts.app')
@section('content')
<div class="content">
    <div class="inner_page">
        <div class="page_container">
            <div class="page_head">
                <h1 class="page_title">Guides</h1>
                <form class="inner_search">
                    <label>
                        <span class="label">search</span>
                        <input type="text" name="search[]" placeholder="Search Guides"/>
                    </label>
                    <button type="submit" class="icon_search" aria-label="search"></button>
                </form>
            </div>
            <div class="guides_section">
                <div class="section_head">
                    <h2 class="section_title">Armenian Winemaking Regions</h2>
                </div>
                <div class="guides_list">
                    <ul>
                        <li>
                            <div class="guide_block">
                                <a  class="image_block" href="{{route('guides.inner',['locale' => app()->getLocale(), 'slug' => 'inner'])}}">
                                    <img src="{{asset('images/guide_image.jpg')}}" width="536" height="500" alt="" title=""/>
                                    article title
                                </a>
                                <div class="info_block">
                                    <div class="title_block">
                                        <a href="{{route('guides.inner',['locale' => app()->getLocale(), 'slug' => 'inner'])}}">Lorem ipsum dolor sit amet.</a>
                                    </div>
                                    <div class="description_block">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et</div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="guide_block">
                                <a  class="image_block" href="{{route('guides.inner',['locale' => app()->getLocale(), 'slug' => 'inner'])}}">
                                    <img src="{{asset('images/guide_image.jpg')}}" width="536" height="500" alt="" title=""/>
                                    article title
                                </a>
                                <div class="info_block">
                                    <div class="title_block">
                                        <a href="{{route('guides.inner',['locale' => app()->getLocale(), 'slug' => 'inner'])}}">Lorem ipsum dolor sit amet.</a>
                                    </div>
                                    <div class="description_block">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et</div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="guide_block">
                                <a  class="image_block" href="{{route('guides.inner',['locale' => app()->getLocale(), 'slug' => 'inner'])}}">
                                    <img src="{{asset('images/guide_image.jpg')}}" width="536" height="500" alt="" title=""/>
                                    article title
                                </a>
                                <div class="info_block">
                                    <div class="title_block">
                                        <a href="{{route('guides.inner',['locale' => app()->getLocale(), 'slug' => 'inner'])}}">Lorem ipsum dolor sit amet.</a>
                                    </div>
                                    <div class="description_block">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et</div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="guide_block">
                                <a  class="image_block" href="{{route('guides.inner',['locale' => app()->getLocale(), 'slug' => 'inner'])}}">
                                    <img src="{{asset('images/guide_image.jpg')}}" width="536" height="500" alt="" title=""/>
                                    article title
                                </a>
                                <div class="info_block">
                                    <div class="title_block">
                                        <a href="{{route('guides.inner',['locale' => app()->getLocale(), 'slug' => 'inner'])}}">Lorem ipsum dolor sit amet.</a>
                                    </div>
                                    <div class="description_block">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et</div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="guide_block">
                                <a  class="image_block" href="{{route('guides.inner',['locale' => app()->getLocale(), 'slug' => 'inner'])}}">
                                    <img src="{{asset('images/guide_image.jpg')}}" width="536" height="500" alt="" title=""/>
                                    article title
                                </a>
                                <div class="info_block">
                                    <div class="title_block">
                                        <a href="{{route('guides.inner',['locale' => app()->getLocale(), 'slug' => 'inner'])}}">Lorem ipsum dolor sit amet.</a>
                                    </div>
                                    <div class="description_block">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et</div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
