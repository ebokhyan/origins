<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- SEO Meta Tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicons -->
    <!-- <link href="img/favicon.ico" rel="icon">-->
    <link href="{{asset('assets/css/main.css')}}" type="text/css"  rel="stylesheet"  v=1.02>
    <title>Origins</title>
</head>
<body>
<div id="subscribePage">
    <img src="{{asset('assets/img/logo.svg')}}" alt="Logo Img" class="logo">
    <div class="content">
        <h1 class="title">COMING SOON…!</h1>
        <span class="d-block">Subscribe and stay up to date.</span>
        @if(!Session::has('success'))
            <form id="subscriptionForm" action="{{route('subscribe')}}" method="POST">
                @csrf
                <div class="form-box">
                    <input id="email" type="email" name="email" required
                           placeholder="Email address"
                           autocomplete="off"
                           value="{{ old('email') }}"
                    />
                    <p class="error-msg @error('email') error @enderror">
                        <span class="error-icon">!</span> {{$errors->first('email')}}
                    </p>
                    <button class="btn-bg">SIGN ME UP<span class="spinner"></span></button>
                </div>
            </form>
        @else
            <span class="d-block success-msg">{{Session::get('success')}}</span>
        @endif
    </div>
    <div class="bottom-section">
        <span class="d-block">Follow us on social media</span>
        <div class="social-list">
            <a href="{{!is_null($settings) && $settings->facebook ? $settings->facebook : ''}}" target="_blank" class="icon icon-fb"></a>
            <a href="{{!is_null($settings) && $settings->twitter ? $settings->twitter : '' }}" target="_blank" class="icon icon-tw"></a>
            <a href="{{!is_null($settings) && $settings->instagram ? $settings->instagram : '' }}" target="_blank" class="icon icon-in"></a>
        </div>
    </div>
</div>
<script src="{{asset('assets/js/jquery.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#subscriptionForm').submit(function() {
            $('.btn-bg').addClass('spin');
            $('.btn-bg').css('disabled', 'disabled');
        });

        $('#email').focus(function (){
            if($(this).hasClass('is-invalid')){
                $(this).removeClass('is-invalid');
                $('.error-msg').removeClass('error');
            }
        })
    })
</script>
</body>
</html>

