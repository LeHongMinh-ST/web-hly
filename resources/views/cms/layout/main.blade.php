<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="content-language" content="en"/>

    <title>@yield('title')</title>
    <meta name="title" content="{{getValueKeySetting('seo_title')}}"/>
    <meta name="description"
          content="{{getValueKeySetting('seo_description')}}" />
    <meta property="og:locale" content="vi_VN"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{{getValueKeySetting('seo_title')}}"/>
    <meta property="og:description"
          content="{{getValueKeySetting('seo_description')}}"
    />
{{--    <meta property="og:url" content="http://HLY.net/"/>--}}
{{--    <meta property="og:site_name" content="HLY"/>--}}
    <meta property="og:image" content="./assets/fe/images/share-social.jpg"/>
    <meta property="og:image:width" content="1200"/>
    <meta property="og:image:height" content="630"/>
    <meta property="fb:app_id" content="810525242676524"/>


    <meta name="webroot" content="."/>
    <!-- Viewport and mobile -->
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1.0, minimum-scale=1.0">

    <!-- FAVICON -->
    <link rel="image_src" href="{{getValueKeySetting('favicon')}}"/>
    <link rel="icon" type="image/jpeg" href="{{getValueKeySetting('favicon')}}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css"
          integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css"
          integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="{{ asset('/assets/fe/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/fe/css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    @yield('css')
    @yield('js-notication')
</head>

<body>
@include('cms.include.header')
<main id="pHome">

    @yield('content')

    @include('cms.include.footer')
</main>
<div id="popup" class="helper-hide">
    <div class="holder helper-centerbox register"></div>
    <div class="holder helper-centerbox login"></div>
</div>
<div id="preloader" class="helper-hide">
    <div class="loader helper-centerbox">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10"/>
        </svg>
    </div>
</div>
<script>
    const path_resource = "/assets/fe/";
</script>
<script src="{{ asset('assets/fe/js/libraries/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js"
        integrity="sha512-WNZwVebQjhSxEzwbettGuQgWxbpYdoLf7mH+25A7sfQbbxKeS5SQ9QBf97zOY4nOlwtksgDA/czSTmfj4DUEiQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $('.slideBanner').slick({
        autoplay: true,
        // dots: true
    })

</script>
<script src="{{ asset('/assets/fe/js/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{asset('/assets/fe/js/main.js')}}"></script>
<script src="{{ asset('/assets/fe/js/app.js') }}"></script>
<script src="{{ asset('/assets/fe/js/functions.js') }}"></script>
@yield('js')
</body>

</html>
