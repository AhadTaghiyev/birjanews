@extends('layouts.main')

@section('style')

@stop

@section('seo')
    <meta name="keywords" content="{{ $projectMain[0]->{'seo_keywords_'.app()->getLocale()} }}" />
    <meta name="description" content="{{ $projectMain[0]->{'seo_desctioption_'.app()->getLocale()} }}" />
    <title>{{ $projectMain[0]->{'seo_title_'.app()->getLocale()} }}</title>
@stop

@section('content')

    <section class="banner-section overlay banner-section-service">
        <div class="banner-inner">
            <h1 class="page-title">{{ $projectMain[0]->{'title_'.app()->getLocale()} }}</h1>
            <nav class="mt-70" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('homepage', app()->getLocale()) }}">@lang('menu.Home')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('projects', app()->getLocale()) }}">@lang('menu.Projects')</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $projectMain[0]->{'title_'.app()->getLocale()} }}</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="recent-post-h2 mt-10 mb-100">
        <div class="container">

            <div class="blog-details-image mb-30 wow  slow">
                <div class="projects-slider owl-carousel wow  delay-1-2s slow">
                    @foreach($projectMain[0]->photo_photo as $photos)
                        <div class="gallery-single-item">
                            <div class="gallery-image">
                                <img src="{{ asset('files/img/projects/'.$photos->file) }}" alt="{{ $photos->alt_tag }}">
                            </div>
                            <div class="gallery-content">
                                <div class="place-date">
                                    <span>@lang('common.date'): {{ date('d-M-Y', strtotime($projectMain[0]->project_date)) }}</span>
                                </div>
                                <a href="{{ asset('files/img/projects/'.$photos->file) }}" class="zoom"><i class="flaticon-add"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">

                    <div class="blog-details-content mr-35 rmr-0">
                        <div class=""><b>@lang('common.category'):</b> {{ $projectMain[0]->categoryProduct->{'title_'.app()->getLocale()} }}</div>
                        @if($projectMain[0]->client != '')
                            <div class=""><b>@lang('common.client'):</b> {{ $projectMain[0]->client }}</div>
                        @endif
                        <p class="wow delay-0-2s slow"> {!! $projectMain[0]->{'text_'.app()->getLocale()} !!}</p>
                        @if($projectMain[0]->youtube != '')
                            <div class="blog-single-item style-three wow delay-0-5s slow animated"
                                 style="visibility: visible; animation-name: ;">
                                <div class="blog-video overlay">
                                    <img src="{{ asset('files/other/youtube.jpeg') }}" alt="youtube">
                                    <a href="{{ $projectMain[0]->youtube }}" class="video-play mfp-iframe"><i class="flaticon-play"></i></a>
                                </div>
                            </div>
                        @endif

                        @if(count($projectMain[0]->photo_doc) > 0)
                            <h5 class="blog-title wow  delay-0-2s slow">@lang('common.project_files')</h5>
                            @foreach($projectMain[0]->photo_doc as $myDoc)
                                <span class="fileDiv{{ $myDoc->id }} fileDiv" >
                                    <a  href="{{asset('files/img/projects/'.$myDoc->file)}}" donwnload style="margin-bottom: 10px;" target="_blank">
                                        <button type="button" class="btn btn-info btn-rounded" style="width: 90px !important;">@lang('common.download')</button>
                                    </a>
                                </span>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar mt-30 mb-50">
                        <div class="widget categories-widget wow  delay-0-4s slow">
                            <h4 class="widget-title">@lang('common.categories')</h4>
                            <ul>
                                @foreach($services as $service)
                                    <li><a href="{{ route('projects', ['category'=>$service->id, 'locale'=>app()->getLocale()]) }}">{{ $service->{'title_'.app()->getLocale()} }}</a> <i class="line"></i></li>
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
