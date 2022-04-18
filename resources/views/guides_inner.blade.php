@extends('layouts.app')
@section('content')
<div class="content">
    <div class="inner_page">
        <div class="page_container">
            <div class="page_head">
                <h1 class="page_title">Region Name</h1>
            </div>
            <div class="region_params">
                <ul>
                    <li>
                        <img src="{{asset('css/images/grape.svg')}}" alt="" title="" width="23" height="34"/>
                        Vineyard Surface
                    </li>
                    <li>
                        <img src="{{asset('css/images/soil.svg')}}" alt="" title="" width="25" height="25"/>
                        Soil
                    </li>
                    <li>
                        <img src="{{asset('css/images/climate.svg')}}" alt="" title="" width="23" height="19"/>
                        Climate
                    </li>
                    <li>
                        <img src="{{asset('css/images/elevation.svg')}}" alt="" title="" width="24" height="12"/>
                        Elevation
                    </li>
                    <li>
                        <img src="{{asset('css/images/varieties.svg')}}" alt="" title="" width="24" height="24"/>
                        Varieties
                    </li>
                </ul>
            </div>
            <div class="guide_main_image">
                <picture>
                    <source media="(min-width:960px)" srcset="{{asset('images/guide_top_image.jpg')}}" width="1640" height="400">
                    <img src="{{asset('images/guide_inner_image.jpg')}}" alt="" title="" width="960" height="480"/>
                </picture>

            </div>
            <div class="feature_inner">
                <div class="article_col">
                    <div class="article_content">
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr.
                        <br/>
                        <br/>
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                        <br/>
                        <br/>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem
                        <h2>History</h2>
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea
                        <div class="inner_subscribe">
                            <div class="small_bnner">
                                <a href="#" class="bnner_inner">
                                    <picture>
                                        <source media="(min-width:960px)" srcset="{{asset('images/wide_bnner.jpg')}}" width="300" height="250">
                                        <img src="{{asset('images/h_bnner.jpg')}}" alt="" title="" width="728" height="90"/>
                                    </picture>

                                    bnner title here
                                </a>
                            </div>
                            <div class="subscribe_inner">
                                <div class="inner_title">Subscribe to our newsletter</div>
                                <div class="description_block">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,</div>
                                <form class="subscribe_form">
                                    <label>
                                        <span class="label">subscribe</span>
                                        <input type="text" name="subscribe_email" data-validation="email" placeholder="Email Address">
                                        <span class="error_hint">
													<span class="standard_hint">mandatory field</span>
													<span class="individual_hint">wrong email address</span>
												</span>
                                    </label>
                                    <button class="validate_btn icon_arrow dark_btn" type="submit" aria-label="subscribe"></button>
                                </form>
                            </div>
                        </div>
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea.
                        <br/>
                        <br/>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                        At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea
                        <h2>Geography</h2>
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea.
                        <img src="{{asset('css/images/map.svg')}}" alt="" title="" width="977" height="915"/>
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                        invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam
                        et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem
                        ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                        nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                        At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea.
                        <br/>
                        <br/>
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                        invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam
                        et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem
                        ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elit.
                        <h2>Appellations</h2>
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                        invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam
                        et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem
                        ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                        nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                        At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea
                        takimata sanctus est Lorem ipsum dolor sit amet.
                        <br/>
                        <br/>
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                        invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam
                        et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem
                        ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr.
                        <br/>
                        <br/>
                        Sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
                        voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren,
                        no sea takimata sanctus est Lorem ipsum dolor sit amet.
                        <img src="{{asset('images/guide_inner_image.jpg')}}" alt="" title="" width="1191" height="600"/>
                        <h2>Winemaking</h2>
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                        invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam
                        et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem
                        ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                        nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                        At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea
                        takimata sanctus est Lorem ipsum dolor sit amet.
                        <br/>
                        <br/>
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                        invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam
                        et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem
                        ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr.
                        <br/>
                        <br/>
                        Sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
                        voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren,
                        no sea takimata sanctus est Lorem ipsum dolor sit amet.
                        <h2>Grape Varieties</h2>
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea
                        <div class="horizontal_bnner">
                            <a href="#" class="bnner_inner">
                                <img src="{{asset('images/h_bnner.jpg')}}" alt="" title="" width="728" height="90"/>
                                bnner title here
                            </a>
                        </div>
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea.
                        <br/>
                        <br/>
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea
                        <br/>
                        <br/>
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea
                        <br/>
                        <br/>
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea
                        <br/>
                        <br/>
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea
                    </div>
                </div>
                <div class="right_col">
                    <div class="vertical_bnners">
                        <a href="#" target="_blank" class="bnner_inner">
                            <img src="{{asset('images/v_banner.jpg')}}" alt="" title="" width="300" height="600"/>
                            banner title
                        </a>
                    </div>
                </div>
            </div>
            <div class="similar_features">
                <div class="section_head">
                    <h2 class="section_title">Similar Stories</h2>
                </div>
                <div class="features_list">
                    <ul>
                        <li>
                            <div class="feature_block">
                                <a  class="image_block" href="feature_inner.php">
                                    <img src="{{asset('images/article_image2.jpg')}}" width="530" height="250" alt="" title=""/>
                                    article title
                                </a>
                                <div class="info_block">
                                    <div class="date_block">18 March, 2021</div>
                                    <div class="title_block">
                                        <a href="feature_inner.php">Lorem ipsum dolor sit amet.</a>
                                    </div>
                                    <div class="author_block">
                                        By <span class="author_name">Tina B.</span>
                                    </div>
                                    <div class="description_block">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et</div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="feature_block">
                                <a  class="image_block" href="feature_inner.php">
                                    <img src="{{asset('images/article_image3.jpg')}}" width="530" height="250" alt="" title=""/>
                                    article title
                                </a>
                                <div class="info_block">
                                    <div class="date_block">18 March, 2021</div>
                                    <div class="title_block">
                                        <a href="feature_inner.php">Lorem ipsum dolor sit amet.</a>
                                    </div>
                                    <div class="author_block">
                                        By <span class="author_name">Tina B.</span>
                                    </div>
                                    <div class="description_block">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et</div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="feature_block">
                                <a  class="image_block" href="feature_inner.php">
                                    <img src="{{asset('images/article_image3.jpg')}}" width="530" height="250" alt="" title=""/>
                                    article title
                                </a>
                                <div class="info_block">
                                    <div class="date_block">18 March, 2021</div>
                                    <div class="title_block">
                                        <a href="feature_inner.php">Lorem ipsum dolor sit amet.</a>
                                    </div>
                                    <div class="author_block">
                                        By <span class="author_name">Tina B.</span>
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
