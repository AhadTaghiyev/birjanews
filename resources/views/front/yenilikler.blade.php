@extends('layouts.main')

@section('style')

@stop

@section('seo')

    <meta name="keywords" content="birjanews.az"/>
    <meta name="description" content="birjanews.az"/>
    <title>Hərrac Xəbərləri</title>
@stop

@section('content')

    <div class="tg-bannerinnerpage">
        <div class="container">
            <ol class="tg-breadcrumb">
                <li><a href="{{ route('homepage') }}">Ana Səhifə</a></li>
                <li class="tg-active">Birja Yenilikləri</li>
            </ol>
        </div>
    </div>

    <main id="tg-main" class="tg-main tg-haslayout">
        <div class="container">
            @if(count($totalRecords)>0)
                <div class="row">
                    <div id="tg-twocolumns" class="tg-twocolumns">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div id="tg-content" class="tg-content">
                                <div class="tg-authorsingledetail">
                                    <div class="tg-newsbyauthor">
                                        @foreach($totalRecords as $elan)
                                            <article class="tg-post">
                                                <figure class="tg-postimg">
                                                    <img src="{{ asset('files/img/blog/'.$elan->photo->file) }}" alt="image description">
                                                </figure>
                                                <div class="tg-postcontent">
                                                    <div class="tg-borderleft">
                                                        <div class="tg-posttitle tg-posttitlelarge">
                                                            <h3><a href="{{ route('birjaYenilik', $elan->id) }}">{{ $elan->title_az }}</a></h3>
                                                        </div>
                                                    </div>
                                                    <div class="tg-description">
                                                        <p>{!! $elan->short_az !!}</p>
                                                    </div>
                                                    <ul class="tg-postmatadata">
                                                        <li>
                                                            <span class="lnr lnr-calendar-full"></span>
                                                            <span>{{ date('d-m-Y', strtotime($elan->created_at)) }}</span>
                                                        </li>
                                                        @if( !is_null($elan->partner_id) )
                                                        <li class="display-flex">
                                                            <a href="{{ route('elanlarByHerrac', ['herrac'=>$elan->partner->name, 'id'=>$elan->partner_id]) }}" class="display-flex">
                                                                <span class="lnr lnr-user"></span>
                                                                <span class="same_line">Hərrac: <a href="{{ route('elanlarByHerrac', ['herrac'=>$elan->partner->name, 'id'=>$elan->partner_id]) }}" class="partner-link"> <b> {{ $elan->partner->name }}</b></a></span>
                                                            </a>
                                                        </li>
                                                        @endif
                                                    </ul>
                                                    <div class="tg-postbtnbox">
                                                        <a class="tg-btn" href="{{ route('birjaYenilik', $elan->id) }}">Ətraflı</a>
                                                    </div>
                                                </div>
                                            </article>
                                        @endforeach
                                    </div>
                                </div>

                                @if($pages>1)
                                    <nav class="tg-pagination">
                                        <ul>
                                            @if($page > 1)
                                                <li class="tg-prevpage"><a href="{{ request()->fullUrlWithQuery(['page' => 1]) }}"><i class="fa fa-arrow-left"></i></a></li>
                                                <?php $prevpage = $page - 1; ?>
                                                <li class="tg-prevpage"><a href="{{'?page='.$prevpage}}"><i class="fa fa-chevron-left"></i></a></li>
                                            @endif
                                            @for ($x = ($page - 5); $x < (($page + 5) + 1); $x++)
                                                @if (($x > 0) && ($x <= $pages))
                                                    @if ($x == $page)
                                                        <li class="tg-active"><a >{{$x}}</a></li>
                                                    @else
                                                        <li><a href="{{ request()->fullUrlWithQuery(['page' => $x]) }}">{{$x}}</a></li>
                                                    @endif
                                                @endif
                                            @endfor
                                            @if ($page != $pages)
                                                <?php $nextpage = $page + 1; ?>
                                                <li class="tg-nextpage"><a href="{{ request()->fullUrlWithQuery(['page' => $nextpage]) }}"><i class="fa fa-chevron-right"></i></a></li>

                                                <li class="tg-nextpage"><a href="{{ request()->fullUrlWithQuery(['page' => $pages]) }}"><i class="fa fa-arrow-right"></i></a></li>
                                            @endif
                                        </ul>
                                    </nav>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div id="tg-twocolumns" class="tg-twocolumns">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div id="tg-content" class="tg-content">
                            <h2> Üzr istəyitik, Məlumat tapılmadı.</h2>
                            <div class="style-btn-all">
                                <a href="{{ route('herracElanlar') }}" class="tg-btn btn_custom margin-tb-10">Bütün Birja Yeniliklərə Keçid</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </main>
@stop

@section('scripts')

@stop
