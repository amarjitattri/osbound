<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name') }} | Official Licenced Merchandise Shopping Online - Collection of Fashion, Lifestyle,
        Tech Accessories and more.</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- Favicon icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('backend/bower_components/bootstrap/css/bootstrap.min.css') }}">--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/icon/themify-icons/themify-icons.css') }}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/icon/icofont/css/icofont.css') }}">
    <!-- Menu-Search css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/pages/menu-search/css/component.css') }}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/assets/css/login.css')}}" />
</head>
<body class="fix-menu">
<section class="header d-flex text-center bg-white">
    <div class="row" style="margin: 0 auto;">
        <div class="col-md-12">
            <img src="{{ asset('backend/assets/images/ot_logo.jpg') }}" alt="">
        </div>
        <div class="col-md-12">
            <h2 style="color: #600612;font-weight: bold">Job Allocation and Timesheet System <br>J-A-T-S</h2>
        </div>
    </div>
</section>
<section class="login set-bg" style="background: url({{asset('backend/assets/images/bg.jpg')}})">
    <div class="login-inner">
       @yield('content', 'Default Content')
    </div>
</section>

<!-- Required Jquery -->
<script type="text/javascript" src="{{ asset('backend/bower_components/jquery/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/bower_components/jquery-ui/js/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/bower_components/popper.js/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/bower_components/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript"
        src="{{ asset('backend/bower_components/jquery-slimscroll/js/jquery.slimscroll.js') }}"></script>
<!-- modernizr js -->
<script type="text/javascript" src="{{ asset('backend/bower_components/modernizr/js/modernizr.js') }}"></script>

<!-- Custom js -->
<script type="text/javascript" src="{{ asset('backend/assets/pages/dashboard/custom-dashboard.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/assets/js/SmoothScroll.js') }}"></script>
<script src="{{ asset('backend/assets/js/pcoded.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/demo-12.js') }}"></script>
<script src="{{ asset('backend/assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/assets/js/script.min.js') }}"></script>
</body>
</html>
