<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->	<html class="no-js" lang="zxx"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BirjaNews</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="{{ asset('css/front.css') }}">
    <script src="{{ asset('js/modernizrF.js') }}"></script>
</head>
<body class="tg-home tg-hometwo">

<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div id="tg-search" class="tg-search">
    <button type="button" class="close"><i class="lnr lnr-cross"></i></button>
    <form method="GET" action="{{ action('PageController@herracElanlar') }}">
        <fieldset>
            <div class="form-group">
                <input type="search" name="keyword" class="form-control" value="" placeholder="Axtar">
                <button type="submit" class="tg-btn"><span class="lnr lnr-magnifier"></span></button>
            </div>
            <div class="tg-description"><p>Zəhmət olmasa açar sözünü düzgün daxil edin</p></div>
        </fieldset>
    </form>
</div>

<div id="tg-wrapper" class="tg-wrapper tg-haslayout">

    @include('includes.header')

    <div class="clearfix"></div>

    @yield('content')

    @include('includes.footer')

</div>

<script src="{{ asset('js/front.js') }}"></script>

@yield('scripts')

</body>
</html>
