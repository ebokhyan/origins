<div class="footer">
    <div class="footer_actions">
        <div class="subscribe_section">
            <div class="full_ww">
                <div class="page_container">
                    <div class="section_inner">
                        <h2 class="inner_title">Subscribe to our newsletter</h2>
                        <div class="description_block">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,</div>
                        <form class="subscribe_form" name="footerSubscriptionForm" id="footerSubscriptionForm">
                            @csrf
                            <label>
                                <span class="label">subscribe</span>
                                <input type="text" name="email" data-validation="email" placeholder="Email Address">
                            </label>
                            <button class="validate_btn icon_arrow dark_btn" type="submit" aria-label="subscribe"></button>
                            <!--<span class="error_hint">
                                <span class="standard_hint">mandatory field</span>
                                <span class="individual_hint">wrong email address</span>
                            </span> -->
                        </form>

{{--                        <form id="subscriptionForm" action="{{route('subscribe')}}" method="POST">--}}
{{--                            @csrf--}}
{{--                            <div class="form-box">--}}
{{--                                <input id="email" type="email" name="email" required--}}
{{--                                       placeholder="Email address"--}}
{{--                                       autocomplete="off"--}}
{{--                                       value="{{ old('email') }}"--}}
{{--                                />--}}
{{--                                <p class="error-msg @error('email') error @enderror">--}}
{{--                                    <span class="error-icon">!</span> {{$errors->first('email')}}--}}
{{--                                </p>--}}
{{--                                <button class="btn-bg">SIGN ME UP<span class="spinner"></span></button>--}}
{{--                            </div>--}}
{{--                        </form>--}}

                    </div>
                </div>
            </div>
        </div>
        <div class="join_section">
            <div class="section_inner">
                <h2 class="inner_title">Join Our Wine Club</h2>
                <div class="description_block">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,</div>
                <a href="registration.php" class="primary_btn light_btn">Sign up</a>
            </div>
        </div>
    </div>

    <div class="footer_logo">
        <img width="303" height="99" src="{{asset("css/images/main_logo.svg")}}" alt="" title=""/>
    </div>

    <x-social-lists></x-social-lists>

    <div class="footer_menu">
        <div class="page_container">
            <ul>
                <li><a href="{{route('features')}}">Features</a></li>
                <li><a href="news_listing.php">News</a></li>
                <li><a href="recipes_listing.php">Recipes</a></li>
                <li><a href="wines.php">Wines</a></li>
                <li><a href="guides.php">Guides</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="wine_club.php">Wine Club</a></li>
                <li><a href="about_us.php">About</a></li>
                <li><a href="contacts.php">Contact Us</a></li>
            </ul>
        </div>
    </div>

    <div class="footer_bottom">
        <div class="page_container">
            <ul class="terms_menu">
                <li><a href="terms.php">TERMS OF SERVICE</a></li>
                <li><a href="policy.php">PRIVACY POLICY</a></li>
            </ul>
            <div class="copyrights">COPYRIGHT ©2022 | ORIGINS</div>
        </div>
    </div>
</div>
