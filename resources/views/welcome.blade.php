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
    <!--    <link href="img/favicon.ico" rel="icon">-->
    <link href="{{asset('assets/css/main.css')}}" type="text/css"  rel="stylesheet">
    <title>Origins</title>
</head>
<body>
<div id="subscribePage">
    <img src="{{asset('assets/img/logo.svg')}}" alt="Logo Img" class="logo">
    <div class="content">
        <h1 class="title">COMING SOON…!</h1>
        @if(!Session::has('success'))
            <span class="d-block">Subscribe and stay up to date.</span>
            <form id="subscriptionForm" action="{{route('subscribe')}}" method="POST">
                @csrf
                <div class="form-box">
                    <input id="email" type="email" name="email" required
                           placeholder="Email address"
                           autocomplete="off"
                           class="@error('email') is-invalid @enderror"/>
                    <p class="error-msg @error('email') error @enderror">
                        {{$errors->first('email')}}
                    </p>
                    <button class="btn-bg">SIGN ME UP<span class="spinner"></span></button>
                </div>
            </form>
        @else
            <span class="d-block">{{Session::get('success')}}</span>
            <div class="form-box">
                <a href="{{route('home')}}" class="btn-bg">GO BACK</a>
            </div>
        @endif
    </div>
    <div class="bottom-section">
        <span class="d-block">Follow us on social media</span>
        <div class="social-list">
            <a href="#" class="icon icon-fb"></a>
            <a href="#"  class="icon icon-tw"></a>
            <a href="#"  class="icon icon-in"></a>
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

