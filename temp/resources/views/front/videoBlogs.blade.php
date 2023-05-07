@extends('layouts.main')

@section('style')

@stop

@section('seo')

    <meta name="keywords" content="{{ $blogSeo[0]->{'seo_keywords_'.app()->getLocale()} }}" />
    <meta name="description" content="{{ $blogSeo[0]->{'seo_desctioption_'.app()->getLocale()} }}" />
    <title>{{ $blogSeo[0]->{'seo_title_'.app()->getLocale()} }}</title>
@stop

@section('content')

    <section class="banner-section overlay banner-section-blogs">
        <div class="banner-inner">
            <h1 class="page-title">@lang('menu.VideoBlog')</h1>
            <nav class="mt-70" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('homepage', app()->getLocale()) }}">@lang('menu.Home')</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('menu.VideoBlog')</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="recent-post-h2 mt-100 mb-100">
        <div class="container">

            <div class="row">
                <div class="col-lg-9">
                    @if(count($totalRecords)>0)
                        <div class="row">
                            @foreach($totalRecords as $blogAll)
                                <div class="col-lg-6">
                                    <div class="blog-single-item style-three wow delay-0-5s slow animated" style="visibility: visible; animation-name: ;">
                                        <div class="blog-video overlay">
                                            <img src="{{ asset('files/img/blog/'.$blogAll->photo->file) }}" alt="{{ $blogAll->photo->alt_tag }}">
                                            <a href="{{ $blogAll->url }}" class="video-play mfp-iframe"><i class="flaticon-play"></i></a>
                                        </div>
                                        <div class="blog-content flex-dir-column">
                                            <div class="content-bottom">
                                                <h5><a href="{{ $blogAll->url }}" class="video-play mfp-iframe">{{ $blogAll->{'title_'.app()->getLocale()} }}</a></h5>

                                                <div class="by-views">
                                                    <span class="admin"><b>@lang('common.by'):</b> {{ $blogAll->author->{'name_'.app()->getLocale()} }}</span>
                                                </div>
                                                <div class="by-views">
                                                    <span class="admin"><b>@lang('common.category'):</b> {{ $blogAll->getCategory->{'name_'.app()->getLocale()} }}</span>
                                                </div>
                                            </div>
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
                                    <a href="{{ route('videoblogs', app()->getLocale()) }}" class="theme-btn wow style-three-btn delay-0-2s slow">@lang('common.see_all')</a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="col-lg-3">
                    <div class="sidebar rmt-100">

                        <div class="widget categories-widget wow  delay-0-4s slow">
                            <h4 class="widget-title">@lang('common.categories')</h4>

                            <ul>
                                <li><a href="{{ route('videoblogs', app()->getLocale()) }}">@lang('common.all')</a> <i class="line"></i></li>
                                @foreach($blogsCategories as $categoriesBlog)
                                    <li><a href="{{ route('videoblogs', ['category'=>$categoriesBlog->id, 'locale'=>app()->getLocale()]) }}">{{ $categoriesBlog->{'name_'.app()->getLocale()} }}</a> <i class="line"></i></li>
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
    @include('includes.subscribe')
@stop

@section('scripts')

@stop
