@extends('layouts.main')

@section('style')

@stop

@section('seo')

    <title>BIRJANEWS.AZ</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
@stop

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="tg-homebanner tg-haslayout">
                    <ul>

                        @foreach($sliders as $slider)
                        <li>
                            <article class="tg-post tg-postcononimg">
                                <figure class="tg-postimg">
                                    <a href="javascript:void(0);"><img src="{{ asset('files/img/sl/'.$slider->photo->file) }}" alt="image description"></a>
                                    <figcaption>
                                        <div class="tg-postcontent">
                                            <div class="tg-borderleft">
                                                <div class="tg-posttitle">
                                                    <h3><a href="javascript:void(0);">{{ $slider->title_az }}</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                        </li>
                        @endforeach

                    </ul>

                </div>
            </div>
        </div>
    </div>

    <main id="tg-main" class="tg-main tg-haslayout">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="tg-heading">
                        <h3>Ən çox izlənilən</h3>
                    </div>
                </div>
                <div class="tg-featuredposts">
                    <div id="tg-featuredpostslider" class="tg-featuredpostslider">
                        @foreach($blogs8 as $blog8)
                            <div class="item">
                                <article class="tg-post">
                                    <figure class="tg-postimg">
                                        <a href="{{ route('herracElan', $blog8->id) }}"><img src="{{ asset('files/img/blog/'.$blog8->photo->file) }}" alt="image description"></a>
                                        <a class="tg-btnview" href="{{ route('herracElan', $blog8->id) }}">Ətraflı</a>
                                    </figure>
                                    <div class="tg-postcontent">
                                        <div class="tg-borderleft">
                                            @if( !is_null($blog8->partner_id) )
                                                <ul class="tg-posttags display-flex">
                                                    <li class="display-flex">Hərrac: <a href="{{ route('elanlarByHerrac', ['herrac'=>$blog8->partner->name, 'id'=>$blog8->partner_id]) }}" class="partner-link"><b>{{ $blog8->partner->name }}</b></a></li>
                                                </ul>
                                            @endif
                                            <div class="tg-posttitle">
                                                <h3><a href="{{ route('herracElan', $blog8->id) }}">{{ $blog8->title_az }}</a></h3>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                    <div class="tg-slidecount">
                        <span class="tg-currentItem"><span class="tg-result"></span></span>
                        <span>/</span>
                        <span class="tg-owlItems"><span class="tg-result"></span></span>
                    </div>
                </div>

                <section class="tg-main-section tg-haslayout">
                    <div id="tg-twocolumns" class="tg-twocolumns">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 " style="margin-top: 15px;margin-bottom: 15px">
                            <div id="tg-content" class="tg-content">

                                <div class="clearfix"></div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8">
                                        <div class="tg-postbig">
                                            <div class="tg-borderheading">
                                                <h3>Son Elanlar</h3>
                                            </div>
                                            <div class="tg-newsbyauthor">
                                                @foreach($blogs as $blog)
                                                    <article class="tg-post border-bottom-1-black">
                                                        <figure class="tg-postimg">
                                                            <a href="{{ route('herracElan', $blog->id) }}"><img src="{{ asset('files/img/blog/'.$blog->photo->file) }}" alt="image description"></a>
                                                            <a class="tg-btnview" href="{{ route('herracElan', $blog->id) }}">Ətraflı</a>
                                                        </figure>
                                                        <div class="tg-postcontent">
                                                            <div class="tg-borderleft">
                                                                @if( !is_null($blog->partner_id) )
                                                                <ul class="tg-posttags display-flex">
                                                                    <li class="display-flex">Hərrac: <a href="{{ route('elanlarByHerrac', ['herrac'=>$blog8->partner->name, 'id'=>$blog8->partner_id]) }}" class="partner-link" > <b>{{ $blog->partner->name }}</b></a></li>
                                                                </ul>
                                                                @endif
                                                                <div class="tg-posttitle tg-posttitlelarge">
                                                                    <h3><a href="{{ route('herracElan', $blog->id) }}">{{ $blog->title_az }}</a></h3>
                                                                </div>
                                                            </div>
                                                            <div class="tg-description">
                                                                <p>{{ $blog->short_az }}</p>
                                                            </div>
                                                            <ul class="tg-postmatadata">
                                                                <li>
                                                                    <a href="javascript:void(0);">
                                                                        <span class="lnr lnr-calendar-full"></span>
                                                                        <span>{{ date('d-m-Y', strtotime($blog->created_at)) }} </span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            <div class="tg-postbtnbox">
                                                                <a class="tg-btn" href="{{ route('herracElan', $blog->id) }}">Ətraflı</a>
                                                            </div>
                                                        </div>
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
                                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
                                        <div class="tg-widget tg-widgetcategories">
                                            <div class="tg-borderheading">
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

                                        <div class="tg-postsmall " style="margin-top:15px; margin-bottom: 15px">
                                            <div class="tg-borderheading">
                                                <h3>Birja Yenilikləri</h3>
                                            </div>
                                            <div class="tg-postmargin">
                                                @foreach($birjaYeniliklers as $brjyenilik)
                                                <article class="tg-post border-bottom-1-black">
                                                    <figure class="tg-postimg">
                                                        <img src="{{ asset('files/img/blog/'.$brjyenilik->photo->file) }}" alt="image description">
                                                        <a class="tg-btnview" href="{{ route('birjaYenilik', $brjyenilik->id) }}">Ətraflı</a>
                                                    </figure>
                                                    <div class="tg-postcontent">
                                                        <div class="tg-borderleft">
                                                            <div class="tg-posttitle">
                                                                <h3><a href="{{ route('birjaYenilik', $brjyenilik->id) }}">{{ $brjyenilik->title_az }}</a></h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col text-center">
                                                <div class="d-grid gap-2 col-6 mx-auto">
                                                    <a class="tg-btn btn_custom margin-tb-10" href="{{ route('birjaYenilikler') }}">Bütün Yeniliklər</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
            </div>
        </div>
    </main>

@stop

@section('scripts')

@stop
