@extends('layouts.main')

@section('style')

@stop

@section('seo')
    <meta name="keywords" content="{{ $serviceMain[0]->{'seo_keywords_'.app()->getLocale()} }}" />
    <meta name="description" content="{{ $serviceMain[0]->{'seo_desctioption_'.app()->getLocale()} }}" />
    <title>{{ $serviceMain[0]->{'seo_title_'.app()->getLocale()} }}</title>
@stop

@section('content')

    <section class="banner-section overlay banner-section-service">
        <div class="banner-inner">
            <h1 class="page-title">{{ $serviceMain[0]->{'title_'.app()->getLocale()} }}</h1>
            <nav class="mt-70" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('homepage', app()->getLocale()) }}">@lang('menu.Home')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('services', app()->getLocale()) }}">@lang('menu.Service')</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $serviceMain[0]->{'title_'.app()->getLocale()} }}</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="recent-post-h2 mt-10 mb-100">
        <div class="container">

            <div class="row">
                <div class="col-lg-8">
                    @if(count($servicesUnder)>0)
                        <div class="row">
                            <div class="col-sm-12">
                                <section class="recent-post mt-30 mb-50">
                                    <div class="container">

                                        <div class="section-title text-center mb-45 wow  slow">
                                            <h2>@lang('menu.Service')</h2>
                                            <div class="separator mt-10">
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            @foreach($servicesUnder as $serviceUnder)
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="blog-single-item style-three wow delay-0-6s slow">
                                                        <div class="blog-image">
                                                            <img src="{{ asset('files/img/services/'.$serviceUnder->photo->file) }}" alt="{{ $serviceUnder->photo->alt_tag }}">
                                                        </div>
                                                        <div class="blog-content">
                                                            <div class="content-bottom">
                                                                <h5 class="text-center"><a href="{{ route('service', ['id'=>$serviceUnder->id, 'locale'=>app()->getLocale()]) }}">{{ $serviceUnder->{'title_'.app()->getLocale()} }}</a></h5>
                                                                <p>{{ $serviceUnder->{'short_'.app()->getLocale()} }} </p>
                                                                <a class="read-more" href="{{ route('service', ['id'=>$serviceUnder->id, 'locale'=>app()->getLocale()]) }}">@lang('common.read_more')</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                    </div>
                                </section>
                            </div>
                        </div>
                    @endif

                    <div class="blog-details-content mr-35 rmr-0">
                        <h3 class="blog-title wow  delay-0-2s slow">{{ $serviceMain[0]->{'title_'.app()->getLocale()} }}</h3>

                        <p class="wow delay-0-2s slow">{!! $serviceMain[0]->{'text_'.app()->getLocale()} !!}</p>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar mt-30 mb-50">
                        <div class="widget categories-widget wow  delay-0-4s slow">
                            <h4 class="widget-title">@lang('menu.Service')</h4>
                            <ul>
                                <li><a href="{{ route('services', app()->getLocale()) }}">@lang('common.all')</a> <i class="line"></i></li>
                                @foreach($services as $service)
                                    <li><a href="{{ route('service', ['id'=>$service->id, 'locale'=>app()->getLocale()]) }}">{{ $service->{'title_'.app()->getLocale()} }}</a> <i class="line"></i></li>
                                @endforeach
                            </ul>
                        </div>

                        @include('includes.sideFollow')
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('includes.partners')
@stop

@section('scripts')

@stop
