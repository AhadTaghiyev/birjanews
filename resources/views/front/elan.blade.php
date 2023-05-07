@extends('layouts.main')

@section('style')

@stop

@section('seo')

    <meta name="keywords" content="{{ $blogMain->{'seo_keywords_az'} }}"/>
    <meta name="description" content="{{ $blogMain->{'seo_desctioption_az'} }}"/>
    <title>{{ $blogMain->{'seo_title_az'} }}</title>
@stop

@section('content')

    <div class="tg-bannerinnerpage">
        <div class="container">
            <ol class="tg-breadcrumb">
                <li><a href="{{ route('homepage') }}">Ana Səhifə</a></li>
                @if($pgname == 'herrac')
                    <li><a href="{{ route('herracElanlar') }}">Hərrac Xəbərləri</a></li>
                @else
                    <li><a href="{{ route('birjaYenilikler') }}">Birja Yenilikləri</a></li>
                @endif
                <li class="tg-active">{{ $blogMain->title_az }}</li>
            </ol>
        </div>
    </div>

    <main id="tg-main" class="tg-main tg-haslayout">
        <div class="container">
            <div class="row">
                <div id="tg-twocolumns" class="tg-twocolumns">

                    <div class="col-xs-12 col-sm-7 col-md-9 col-lg-9">
                        <div id="tg-content" class="tg-content">
                            <div class="tg-post tg-postdetailpage tg-postdetailpagev2">

                                <div class="tg-posttitle">
                                    <h1>{{ $blogMain->title_az }}</h1>
                                </div>
                                @if(count($blogMain->photo_main)>0)
                                <section id="demos">
                                    <div class="row">
                                        <div class="large-12 columns">
                                            <div class="owl-carousel owl-theme">
                                                @foreach($blogMain->photo_main as $myPhoto)
                                                <div class="item">
                                                    <figure><img src="{{asset('files/img/blog/'.$myPhoto->file)}}" alt="image description" data-fancybox="gallery"></figure>
                                                </div>
                                                @endforeach
                                            </div>


                                        </div>
                                    </div>
                                </section>
                                @endif
                                <ul class="tg-postmatadata">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <span class="lnr lnr-calendar-full"></span>
                                            <span>{{ date('d-m-Y', strtotime($blogMain->created_at)) }}</span>
                                        </a>
                                    </li>
                                    @if( !is_null($blogMain->partner_id) )
                                        <li class="display-flex">
                                            <a href="{{ route('elanlarByHerrac', ['herrac'=>$blogMain->partner->name, 'id'=>$blogMain->partner_id]) }}" class="display-flex">
                                                <span class="lnr lnr-user"></span>
                                                <span class="same_line">Hərrac: <a href="{{ route('elanlarByHerrac', ['herrac'=>$blogMain->partner->name, 'id'=>$blogMain->partner_id]) }}" class="partner-link"> <b> {{ $blogMain->partner->name }}</b></a></span>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                                <ul class="tg-socialblackwhite tg-socialicons">
                                    @if($contact[0]->facebook != '')
                                        <li class="tg-facebook">
                                            <a href="{{ $contact[0]->facebook }}">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if($contact[0]->instagram != '')
                                        <li class="tg-instagram">
                                            <a href="{{ $contact[0]->instagram }}">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if($contact[0]->youtube != '')
                                        <li class="tg-youtube">
                                            <a href="{{ $contact[0]->youtube }}">
                                                <i class="fa fa-youtube"></i>
                                            </a>
                                        </li>
                                    @endif

                                </ul>
                                <div class="tg-description">
                                    <p>{!! $blogMain->text_az !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-5 col-md-3 col-lg-3">
                        <aside id="tg-sidebar" class="tg-sidebar">
                            @if($pgname=='herrac')
                            <div class="tg-widget tg-widgetcategories">
                                <div class="tg-widgettitle">
                                    <h3>Hərraclar</h3>
                                </div>
                                <div class="tg-widgetcontent">
                                    <ul>
                                        @foreach($partners as $partner)
                                            <li><a href="{{ route('elanlarByHerrac', ['herrac'=>$partner->name, 'id'=>$partner->id]) }}"><span>{{ $partner->name }}</span></a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endif
                            <div class="tg-widget tg-widgetlatestposts">
                                <div class="tg-widgettitle">
                                    <h3>{{ $pgname=='herrac' ? 'Son Hərraclar' : 'Son Yeniliklər' }}</h3>
                                </div>
                                <div class="tg-widgetcontent">
                                    <div class="tg-postmargin">
                                        @foreach($blogs as $blog)
                                        <article class="tg-post border-bottom-1-black">
                                            <figure class="tg-postimg">
                                                <img src="{{ asset('files/img/blog/'.$blog->photo->file) }}" alt="image description">
                                                <a class="tg-btnview" href="{{ $pgname=='herrac' ? route('herracElan', $blog->id) : route('birjaYenilik', $blog->id)}}">Ətraflı</a>
                                            </figure>
                                            @if( !is_null($blog->partner_id) )
                                            <div class="tg-postcontent">
                                                <div class="tg-borderleft">
                                                    <div class="tg-posttitle">
                                                        @if($pgname == 'herrac')
                                                            <h3><a href="{{ route('herracElan', $blog->id) }}">{{ $blog->title_az }}</a></h3>
                                                        @else
                                                            <h3><a href="{{ route('birjaYenilik', $blog->id) }}">{{ $blog->title_az }}</a></h3>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </article>
                                        @endforeach
                                    </div>
                                    <div class="row">
                                        <div class="col text-center">
                                            <div class="d-grid gap-2 col-6 mx-auto">
                                                <a class="tg-btn btn_custom" href="{{ route('herracElanlar') }}">Bütün elanlar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </main>
@stop

@section('scripts')

    <script>
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                items: 1,
                margin: 10,
                autoPlay: true,
                autoHeight: true
            });
        })
    </script>
@stop
