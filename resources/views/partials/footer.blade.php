<div class="footer">
    <div class="footer_actions">
        <div class="subscribe_section">
            <div class="full_ww">
                <div class="page_container">
                    <div class="section_inner">
                        <h2 class="inner_title">{{__('main.subscription.title')}}</h2>
                        <div class="description_block">{{__('main.subscription.description')}}</div>
                        <form class="subscribe_form" name="footerSubscriptionForm" id="footerSubscriptionForm">
                            @csrf
                            <label id="email_label">
                                <span class="label">subscribe</span>
                                <input type="text" name="email" data-validation="email" placeholder="{{__('main.form.placeholders.email')}}">
                                <span class="error_hint">
                                    <span class="standard_hint">mandatory field</span>
                                    <span class="individual_hint">wrong email address</span>
                                </span>
                            </label>
                            <button class="validate_btn icon_arrow dark_btn" type="submit" aria-label="subscribe"></button>
                        </form>
                        <div id="success_msg" class="description_block"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="join_section">
            <div class="section_inner">
                <h2 class="inner_title">{{__('main.join_club.title')}}</h2>
                <div class="description_block">{{__('main.join_club.description')}}</div>
                <a href="registration.php" class="primary_btn light_btn">{{__('main.join_club.button')}}</a>
            </div>
        </div>
    </div>

    <div class="footer_logo">
        <a href="{{route('main-home',['locale' => app()->getLocale()])}}">
            <img width="303" height="99" src="{{asset("css/images/main_logo.svg")}}" alt="" title=""/>
        </a>
    </div>

    <x-social-lists></x-social-lists>

    <div class="footer_menu">
        <div class="page_container">
            <ul>
                <li><a href="{{route('features',['locale' => app()->getLocale()])}}">{{__('main.menu.features')}}</a></li>
                <li><a href="{{route('news',['locale' => app()->getLocale()])}}">{{__('main.menu.news')}}</a></li>
                <li><a href="{{route('recipes',['locale' => app()->getLocale()])}}">{{__('main.menu.recipes')}}</a></li>
                <li><a href="wines.php">{{__('main.menu.wines')}}</a></li>
                <li><a href="guides.php">{{__('main.menu.guides')}}</a></li>
                <li><a href="shop.php">{{__('main.menu.shop')}}</a></li>
                <li><a href="wine_club.php">{{__('main.menu.wine_club')}}</a></li>
                <li><a href="{{route('about',['locale' => app()->getLocale()])}}">{{__('main.menu.about')}}</a></li>
                <li><a href="contacts.php">{{__('main.menu.contact_us')}}</a></li>
            </ul>
        </div>
    </div>

    <div class="footer_bottom">
        <div class="page_container">
            <ul class="terms_menu">
                <li><a href="{{route('term',['locale' => app()->getLocale()])}}">{{__('main.menu.terms_of_service')}}</a></li>
                <li><a href="{{route('policy',['locale' => app()->getLocale()])}}">{{__('main.menu.privacy_policy')}}</a></li>
            </ul>
            <div class="copyrights">{{__('main.copyright')}}</div>
        </div>
    </div>
</div>
