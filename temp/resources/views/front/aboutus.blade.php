@extends('layouts.main')

@section('style')

@stop

@section('seo')

    <meta name="keywords" content="{{ $about[0]->{'seo_keywords_'.app()->getLocale()} }}" />
    <meta name="description" content="{{ $about[0]->{'seo_desctioption_'.app()->getLocale()} }}" />
    <title>{{ $about[0]->{'seo_title_'.app()->getLocale()} }}</title>
@stop

@section('content')

    <section class="banner-section overlay">
        <div class="banner-inner">
            <h1 class="page-title">@lang('menu.About')</h1>
            <nav class="mt-150" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('homepage', app()->getLocale()) }}">@lang('menu.Home')</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('menu.About')</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="about-section mt-100 mb-95">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-image rmb-50 wow  delay-0-1s slow">
                        <img src="{{ asset('files/other/aboutme.png') }}" alt="About">
                    </div>
                </div>
                <div class="col-lg-6 d-flex align-items-end">
                    <div class="about-content ml-30 rml-0 wow  delay-0-3s slow">
                        <h5>{{ $about[0]->{'title_'.app()->getLocale()} }}</h5>
                        <p>{!! $about[0]->{'text_'.app()->getLocale()} !!}</p>
                        <div class="btn-three mt-30 mb-50 rmb-0">
                            <a href="{{ route('contact', app()->getLocale()) }}" class="theme-btn">@lang('common.contact_us')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('includes.services')

    @include('includes.projects')

    @include('includes.partners')

@stop

@section('scripts')

@stop
