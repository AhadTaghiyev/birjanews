<!DOCTYPE html>
<html lang="az">

<head>
    <meta charset="utf-8">

    @yield('seo')
    <meta name="robots" content="noindex">
    <link rel="shortcut icon" href="{{asset('files/other/favicon.png')}}" type="image/x-icon">


    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}" />
    <link rel="stylesheet" href="{{asset('css/custom.css')}}" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&family=Raleway:wght@200;400;500;600&display=swap" rel="stylesheet">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->

</head>

<body>
<div class="page-wrapper">


    <div class="preloader"></div>


    @include('includes/header')

    @yield('content')



</div>

<button class="scroll-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></button>

<script type="text/javascript" src="{{asset('js/front.js')}}"></script>


</body>

</html>
