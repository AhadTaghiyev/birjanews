@extends('layouts.main')

@section('style')

@stop

@section('seo')

    <meta name="keywords" content="{{ $projectSeo[0]->{'seo_keywords_'.app()->getLocale()} }}" />
    <meta name="description" content="{{ $projectSeo[0]->{'seo_desctioption_'.app()->getLocale()} }}" />
    <title>{{ $projectSeo[0]->{'seo_title_'.app()->getLocale()} }}</title>
@stop

@section('content')

    <section class="banner-section overlay banner-section-services">
        <div class="banner-inner">
            <h1 class="page-title">@lang('menu.Projects')</h1>
            <nav class="mt-70" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">@lang('menu.Home')</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('menu.Projects')</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="recent-post mt-100 mb-50">
        <div class="container">

            <div class="section-title text-center mb-45 wow  slow">
                <h2>@lang('menu.Projects')</h2>
                <div class="separator mt-10">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </div>
            </div>

            @if(count($totalRecords)>0)
                <div class="row">
                    @foreach($totalRecords as $projectMain)
                        <div class="col-lg-4">
                            <div class="blog-single-item style-three wow  delay-0-6s slow">
                                <div class="blog-image">
                                    <img src="{{ asset('files/img/projects/'.$projectMain->photo_photo[0]->file) }}" alt="{{ $projectMain->photo_photo[0]->alt_tag }}">
                                </div>
                                <div class="blog-content">
                                    <div class="content-bottom">
                                        <h5 class="text-center"><a href="{{ route('project', ['id'=>$projectMain->id, 'locale'=>app()->getLocale()]) }}">{{ $projectMain->{'title_'.app()->getLocale()} }}</a></h5>
                                        <p><b class="black_text">@lang('common.category'):</b> {{ $projectMain->categoryProduct->{'title_'.app()->getLocale()} }}</p>
                                        <p><b class="black_text">@lang('common.date'):</b> {{ date('d-M-Y', strtotime($projectMain->project_date)) }}</p>
                                        @if($projectMain->client != '')
                                        <p><b class="black_text">@lang('common.client'):</b> {{ $projectMain->client }}</p>
                                        @endif
                                        <p>{{ $projectMain->{'short_'.app()->getLocale()} }} </p>
                                        <a class="read-more" href="{{ route('project', ['id'=>$projectMain->id, 'locale'=>app()->getLocale()]) }}">@lang('common.read_more')</a>
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
                            <a href="{{ route('projects', app()->getLocale()) }}" class="theme-btn wow style-three-btn delay-0-2s slow">@lang('common.all')</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    @include('includes.partners')
@stop

@section('scripts')

@stop
