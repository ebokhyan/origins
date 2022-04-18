@extends('layouts.app')
@section('content')
<div class="content">
    <div class="sign_page">
        <div class="page_container">
            <div class="page_head">
                <h1 class="page_title">Contact Us</h1>
            </div>
            <div class="section_head">
                <h2 class="section_title">Get in Touch</h2>
            </div>
            <div class="contacts_inner">
                <form name="sendContact" class="contact_form">
                    @csrf
                    <div class="form_fields">
                        <div class="field_block">
                            <label id="name_lb">
                                <span class="label">Full Name</span>
                                <input type="text" name="name" placeholder="Full Name" data-validation="required"/>
                            </label>
                            <span class="error_hint">mandatory field</span>
                        </div>
                        <div class="field_block">
                            <label id="user_email_lb">
                                <span class="label">email address</span>
                                <input type="text" name="user_email" data-validation="email" placeholder="Email Address">
                            </label>
                            <span class="error_hint">
										<span class="standard_hint">mandatory field</span>
										<span class="individual_hint">wrong email address</span>
									</span>
                        </div>
                        <div class="field_block">
                            <label id="subject_lb">
                                <span class="label">Subject</span>
                                <input type="text" name="subject" placeholder="Subject" data-validation="required"/>
                            </label>
                            <span class="error_hint">mandatory field</span>
                        </div>
                        <div class="field_block">
                            <label id="message_lb" class="textarea_block">
                                <span class="label">Message</span>
                                <textarea  name="message" placeholder="Message" data-validation="required"></textarea>
                            </label>
                            <span class="error_hint">mandatory field</span>
                        </div>
                        <div class="btn_block">
                            <button type="submit" id='sendContactBtn' class="validate_btn primary_btn main_btn" aria-label="send">Send</button>
                        </div>
                    </div>
                    <div id="success_msg" class="description_block"></div>
                </form>
                <div class="or_label">or</div>
                <div class="contacts_list">
                    <div class="contact_block">
                        For Marketing inquiries: <a href="mailto:{{$settings->contacts['Marketing']}}">{{$settings->contacts['Marketing']}}</a>
                    </div>
                    <div class="contact_block">
                        For editorial inquiries: <a href="mailto:{{$settings->contacts['Editorial']}}">{{$settings->contacts['Editorial']}}</a>
                    </div>
                    <div class="contact_block">
                        For general inquiries: <a href="mailto:{{$settings->contacts['General']}}">{{$settings->contacts['General']}}</a>
                    </div>
                    <div class="socials_section">
                        <h2 class="section_title">Stay Connected</h2>
                        <ul class="socials_list">
                            <li><a href="{{$settings->facebook}}" target="_blank" class="icon_facebook">facebook</a></li>
                            <li><a href="{{$settings->twitter}}" target="_blank" class="icon_twitter">twitter</a></li>
                            <li><a href="{{$settings->instagram}}" target="_blank" class="icon_instagram">instagram</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="terms_menu">
        <div class="page_container">
            <ul class="terms_menu">
                <li><a href="{{route('term',['locale' => app()->getLocale()])}}">{{__('main.menu.terms_of_service')}}</a></li>
                <li><a href="{{route('policy',['locale' => app()->getLocale()])}}">{{__('main.menu.privacy_policy')}}</a></li>
            </ul>
        </div>
    </div>

</div>
@endsection
