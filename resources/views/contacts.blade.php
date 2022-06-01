@extends('layouts.app_without_footer')
@section('content')
<div class="content">
    <div class="sign_page">
        <div class="page_container">
            <div class="page_head">
                <h1 class="page_title">@lang('main.contact.title')</h1>
            </div>
            <div class="section_head">
                <h2 class="section_title">@lang('main.contact.get_in_touch')</h2>
            </div>
            <div class="contacts_inner">
                <form name="sendContact" class="contact_form">
                    @csrf
                    <div class="form_fields">
                        <div class="field_block">
                            <label id="name_lb">
                                <span class="label">@lang('main.contact.full_name')</span>
                                <input type="text" name="name" placeholder="@lang('main.contact.full_name')" data-validation="required"/>
                            </label>
                            <span class="error_hint">@lang('main.validation.full_name.required')</span>
                        </div>
                        <div class="field_block">
                            <label id="user_email_lb">
                                <span class="label">@lang('main.contact.email')</span>
                                <input type="text" name="user_email" data-validation="email" placeholder="@lang('main.contact.email')">
                            </label>
                            <span class="error_hint">
                                <span class="standard_hint">@lang('main.validation.email.required')</span>
                                <span class="individual_hint">@lang('main.validation.email.email')</span>
                            </span>
                        </div>
                        <div class="field_block">
                            <label id="subject_lb">
                                <span class="label">@lang('main.contact.subject')</span>
                                <input type="text" name="subject" placeholder="@lang('main.contact.subject')" data-validation="required"/>
                            </label>
                            <span class="error_hint">@lang('main.validation.subject.required')</span>
                        </div>
                        <div class="field_block">
                            <label id="message_lb" class="textarea_block">
                                <span class="label">@lang('main.contact.message')</span>
                                <textarea  name="message" placeholder="@lang('main.contact.message')" data-validation="required"></textarea>
                            </label>
                            <span class="error_hint">@lang('main.validation.message.required')</span>
                        </div>
                        <div class="btn_block">
                            <button type="submit" id='sendContactBtn' class="validate_btn primary_btn main_btn" aria-label="send">@lang('main.contact.send_btn')</button>
                        </div>
                    </div>
                    <div id="success_msg" class="description_block"></div>
                </form>
                <div class="or_label">@lang('main.contact.or')</div>
                <div class="contacts_list">
                    <div class="contact_block">
                        @lang('main.contact.marketing'): <a href="mailto:{{$settings->contacts['Marketing']}}">{{$settings->contacts['Marketing']}}</a>
                    </div>
                    <div class="contact_block">
                        @lang('main.contact.editorial'): <a href="mailto:{{$settings->contacts['Editorial']}}">{{$settings->contacts['Editorial']}}</a>
                    </div>
                    <div class="contact_block">
                        @lang('main.contact.general'): <a href="mailto:{{$settings->contacts['General']}}">{{$settings->contacts['General']}}</a>
                    </div>
                    <div class="socials_section">
                        <h2 class="section_title">@lang('main.contact.stay_connected')</h2>
                        <ul class="socials_list">
                            <li><a href="{{$settings->facebook}}"  target="_blank" class="icon_facebook">facebook</a></li>
                            <li><a href="{{$settings->twitter}}"   target="_blank" class="icon_twitter"> twitter</a></li>
                            <li><a href="{{$settings->instagram}}" target="_blank" class="icon_instagram">instagram</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="terms_menu">
        <div class="page_container">
            <ul class="socials_list">
                <li><a href="{{$settings->facebook}}" target="_blank" class="icon_facebook">facebook</a></li>
                <li><a href="{{$settings->twitter}}" target="_blank" class="icon_twitter">twitter</a></li>
                <li><a href="{{$settings->instagram}}" target="_blank" class="icon_instagram">instagram</a></li>
            </ul>
            <ul class="terms_menu">
                <li><a href="{{route('term',['locale' => app()->getLocale()])}}">{{$menu['terms']}}</a></li>
                <li><a href="{{route('policy',['locale' => app()->getLocale()])}}">{{$menu['policy']}}</a></li>
            </ul>
        </div>
    </div>

</div>
@endsection
