@extends('layouts.main')

@section('style')

@stop

@section('seo')

    <meta name="keywords" content="{{ $servicesSeo[0]->{'seo_keywords_'.app()->getLocale()} }}" />
    <meta name="description" content="{{ $servicesSeo[0]->{'seo_desctioption_'.app()->getLocale()} }}" />
    <title>{{ $servicesSeo[0]->{'seo_title_'.app()->getLocale()} }}</title>
@stop

@section('content')

    <section class="banner-section overlay banner-section-services">
        <div class="banner-inner">
            <h1 class="page-title">@lang('menu.Service')</h1>
            <nav class="mt-70" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('homepage', app()->getLocale()) }}">@lang('menu.Home')</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('menu.Service')</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="recent-post mt-100 mb-50">
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
                @foreach($services as $service)
                    <div class="col-lg-4">
                        <div class="blog-single-item style-three wow  delay-0-6s slow">
                            <div class="blog-image">
                                <img src="{{ asset('files/img/services/'.$service->photo->file) }}" alt="{{ $service->photo->alt_tag }}">
                            </div>
                            <div class="blog-content">
                                <div class="content-bottom">
                                    <h5 class="text-center"><a href="{{ route('service', ['id'=>$service->id, 'locale'=>app()->getLocale()]) }}">{{ $service->{'title_'.app()->getLocale()} }}</a></h5>
                                    <p>{{ $service->{'short_'.app()->getLocale()} }} </p>
                                    <a class="read-more" href="{{ route('service', ['id'=>$service->id, 'locale'=>app()->getLocale()]) }}">@lang('common.read_more')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    @include('includes.projects')

    @include('includes.partners')

@stop

@section('scripts')

@stop
