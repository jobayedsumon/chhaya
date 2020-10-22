<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#6fbfe5">
    <meta name="msapplication-navbutton-color" content="#6fbfe5">
    <meta name="apple-mobile-web-app-status-bar-style" content="#6fbfe5">
    <meta property="og:title" content="Chhaya.xyz">
    <meta property="og:description" content="">
    <meta property="og:image" content="">
    <meta property="og:url" content="">
    <meta name="twitter:title" content="Chhaya.xyz">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="">
    <meta name="twitter:card" content="">
	
    <title> @yield('title') | {{ config('concave.cnf_appname') }}</title>
	<link rel="shortcut icon" href="{{ asset('uploads/images/'.$settings->favicon)}}" type="image/png">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/default/css/vendor/bootstrap.min.css')}}" >
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/default/css/vendor/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/default/css/vendor/owl.carousel.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/default/css/vendor/owl.theme.default.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/default/css/vendor/magnific-popup.css')}}">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,700i' rel='stylesheet' type='text/css'>
    <link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/default/css/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/default/css/custom.css')}}" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<script type="text/javascript" src="{{ asset('frontend/default/js/vendor/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('frontend/default/js/vendor/modernizr.min.js')}}"></script>
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js">
    </script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js">
    </script>
    <![endif]-->
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" />

</head>
  
<body id="body">
<style>.ajax_loader {display:none;background: #0000006e;z-index: 99999;width: 100%;height: 100vh;position: fixed;}.ajax_loader img {position: absolute;top: 50%;z-index: 99999999;width: 80px;left: 50%;transform: translate(-50%,-50%);}</style>
<div class="ajax_loader"><img src="{{ asset('uploads/spinner.gif')}}"></div>
@include('layouts.default.navigation')