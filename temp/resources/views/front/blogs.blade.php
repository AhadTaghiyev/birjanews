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
            <h1 class="page-title">@lang('menu.Blog')</h1>
            <nav class="mt-70" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('homepage', app()->getLocale()) }}">@lang('menu.Home')</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('menu.Blog')</li>
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
                                    <div class="blog-single-item style-three wow slow animated" style="visibility: visible;">
                                        <div class="blog-image">
                                            <img src="{{ asset('files/img/blog/'.$blogAll->photo->file) }}" alt="Recent post image">
                                        </div>
                                        <div class="blog-content">
                                            <div class="date">{{ date('d-M-Y', strtotime($blogAll->created_date)) }}</div>
                                            <div class="content-bottom">
                                                <h6><a href="{{ route('blog', ['id'=>$blogAll->id, 'locale'=>app()->getLocale()]) }}" class="black_text"> {{ $blogAll->{'title_'.app()->getLocale()} }} </a></h6>

                                                <div class="by-views">
                                                    <span class="admin black_text"><b class="gray_text">@lang('common.by'):</b> {{ $blogAll->author->{'name_'.app()->getLocale()} }}</span>
                                                    <span class="love"><i class="fas fa-eye gray_text"></i>{{ $blogAll->view }}</span>
                                                    <span class="admin black_text"><b class="gray_text">@lang('common.category'):</b> {{ $blogAll->getCategory->{'name_'.app()->getLocale()} }}</span>
                                                </div>

                                                <p>{{ $blogAll->{'short_'.app()->getLocale()} }}</p>
                                                <a class="read-more" href="{{ route('blog', ['id'=>$blogAll->id, 'locale'=>app()->getLocale()]) }}">Read More</a>
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
                                    <a href="{{ route('blogs', app()->getLocale()) }}" class="theme-btn wow style-three-btn delay-0-2s slow">@lang('common.see_all')</a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="col-lg-3">
                    <div class="sidebar rmt-100">

                        <div class="widget search-widget wow  delay-0-3s slow">
                            <form action="{{ action('PageController@blogs', app()->getLocale()) }}" class="d-flex">
                                <input type="search" name="keyword" required placeholder="@lang('menu.search')">
                                <button type="submit"><i class="flaticon-search"></i></button>
                            </form>
                        </div>

                        <div class="widget categories-widget wow  delay-0-4s slow">
                            <h4 class="widget-title">@lang('common.categories')</h4>

                            <ul>
                                <li><a href="{{ route('blogs', app()->getLocale()) }}">@lang('common.all')</a> <i class="line"></i></li>
                                @foreach($blogsCategories as $categoriesBlog)
                                    <li><a href="{{ route('blogs', ['category'=>$categoriesBlog->id, 'locale'=>app()->getLocale()]) }}">{{ $categoriesBlog->{'name_'.app()->getLocale()} }}</a> <i class="line"></i></li>
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
