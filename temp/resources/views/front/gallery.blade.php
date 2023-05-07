@extends('layouts.main')

@section('style')

@stop

@section('seo')
    <meta name="keywords" content="{{ $gallerySeo[0]->{'seo_keywords_'.app()->getLocale()} }}" />
    <meta name="description" content="{{ $gallerySeo[0]->{'seo_desctioption_'.app()->getLocale()} }}" />
    <title>{{ $gallerySeo[0]->{'seo_title_'.app()->getLocale()} }}</title>
@stop

@section('content')

    <section class="banner-section overlay banner-section-service">
        <div class="banner-inner">
            <h1 class="page-title">@lang('menu.Gallery')</h1>
            <nav class="mt-70" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('homepage', app()->getLocale()) }}">@lang('menu.Home')</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('menu.Gallery')</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="gallery-section mt-90 mb-85">
        <div class="section-title text-center mb-45 wow  delay-0-1s slow">
            <h2>@lang('common.photo_Gallery')</h2>
            <div class="separator mt-10">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </div>
        </div>

        <div class="gallery-wrap">
            <div class="container">
                @if(count($totalRecords)>0)
                    <div class="row">
                        @foreach($totalRecords as $blogAll)
                            <div class="col-lg-4">
                                <div class="gallery-single-item wow  delay-0-2s slow">
                                    <div class="gallery-image">
                                        <img src="{{asset('files/img/gallery/'.$blogAll->file)}}" alt="{{ $blogAll->alt_tag }}">
                                    </div>
                                    <div class="gallery-content">
                                        <div class="place-date">
                                            <span>Category: {{ $blogAll->categoryGallery->{'name_'.app()->getLocale()} }}</span>
                                            @if($blogAll->{'name_'.app()->getLocale()} != '')
                                            <span>Name: {{ $blogAll->{'name_'.app()->getLocale()} }}</span>
                                            @endif
                                        </div>
                                        <a href="{{asset('files/img/gallery/'.$blogAll->file)}}" class="zoom"><i class="flaticon-add"></i></a>
                                    </div>
                                </div>
                            </div>
                         @endforeach
                    </div>
                    @if($pages>1)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pagintation____items">
                                    <ul class="reset flex">
                                        @if($page > 1)
                                            <li><a href="{{ request()->fullUrlWithQuery(['page' => 1]) }}"><b><i class="fa fa-arrow-left" aria-hidden="true"></i></b></a></li>
                                            <?php $prevpage = $page - 1; ?>
                                            <li><a href="{{'?page='.$prevpage}}"><i class="fa fa-chevron-left" aria-hidden="true"></i></a></li>
                                        @endif

                                        @for ($x = ($page - 5); $x < (($page + 5) + 1); $x++)
                                            @if (($x > 0) && ($x <= $pages))
                                                @if ($x == $page)
                                                    <li ><a class="current">{{$x}}</a></li>
                                                @else
                                                    <li><a href="{{ request()->fullUrlWithQuery(['page' => $x]) }}">{{$x}}</a></li>
                                                @endif
                                            @endif
                                        @endfor
                                        @if ($page != $pages)
                                            <?php $nextpage = $page + 1; ?>
                                            <li><a href="{{ request()->fullUrlWithQuery(['page' => $nextpage]) }}"><i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>

                                            <li><a href="{{ request()->fullUrlWithQuery(['page' => $pages]) }}"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                @else
                    <div class="row">
                        <div class="col-sm-12">
                            <h2> @lang('common.no_data')</h2>
                            <div class="style-btn-all">
                                <a href="{{ route('gallery', app()->getLocale()) }}" class="theme-btn wow style-three-btn delay-0-2s slow">@lang('common.see_all')</a>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>

    </section>

    @include('includes.partners')

@stop

@section('scripts')


@stop
