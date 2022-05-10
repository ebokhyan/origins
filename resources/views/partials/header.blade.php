<div class="header">
    <div class="page_container">
        <div class="header_top">
            <button class="menu_btn" aria-label="burger">
                <span></span>
            </button>
            <div class="main_logo">
                    <a href="{{route('main-home',['locale' => app()->getLocale()])}}">
                        <img width="303" height="99" src="{{asset("css/images/main_logo.svg")}}" alt="" title=""/>
                    </a>
            </div>
            <!--<div class="sign_block">-->
            <!--    <a href="login.php" class="icon_user primary_btn main_btn">{{ __('main.login') }}</a>-->
            <!--</div>-->
           <x-social-lists></x-social-lists>
            <div class="lg_block">
                @switch(app()->getLocale())
                    @case('hy')
                      <a href="{{route('lang',['locale' => 'en'])}}">EN</a>
                    @break
                    @case('en')
                      <a href="{{route('lang',['locale' => 'hy'])}}">AM</a>
                    @break
                @endswitch
            </div>
            <div class="search_block" data-type="close">
                <form class="search_form" method="GET" action="{{route('search',['locale' => app()->getLocale()])}}">
                    <label>
                        <span class="label">Search</span>
                        <input type="text" name="search" placeholder="Search" autocomplete="off"/>
                    </label>
                    <button type="submit" class="icon_search" aria-label="search"></button>
                </form>
            </div>
        </div>
        <div class="menu_block">
            <div class="menu_inner">
                <ul class="main_menu">
                    <li><a href="{{route('features',['locale' => app()->getLocale()])}}">  {{$menu['features']}}   </a></li>
                    <li><a href="{{route('news',['locale' => app()->getLocale()])}}">      {{$menu['news']}}       </a></li>
                    <li><a href="{{route('recipes',['locale' => app()->getLocale()])}}">   {{$menu['recipes']}}    </a></li>
                    <li><a href="{{route('wines',['locale' => app()->getLocale()])}}">     {{$menu['wines']}}      </a></li>
                    <li><a href="{{route('guides',['locale' => app()->getLocale()])}}">    {{$menu['guides']}}     </a></li>
                    <li><a href="{{route('shop',['locale' => app()->getLocale()])}}">      {{$menu['shop']}}       </a></li>
                    <li><a href="{{route('wine-club',['locale' => app()->getLocale()])}}"> {{$menu['wine_club']}}  </a></li>
                    <li><a href="{{route('about',['locale' => app()->getLocale()])}}">     {{$menu['about_us']}}   </a></li>
                    <li><a href="{{route('contacts',['locale' => app()->getLocale()])}}">  {{$menu['contact_us']}} </a></li>
                </ul>
            </div>
        </div>
    </div>
</div>




