@extends('layouts.main')

@section('style')

@stop

@section('seo')

    <meta name="keywords" content="{{ $about[0]->{'seo_keywords_az'} }}"/>
    <meta name="description" content="{{ $about[0]->{'seo_desctioption_az'} }}"/>
    <title>{{ $about[0]->{'seo_title_az'} }}</title>
@stop

@section('content')

    <div class="tg-bannerinnerpage">
        <div class="container">
            <ol class="tg-breadcrumb">
                <li><a href="{{ route('homepage') }}">Ana Səhifə</a></li>
                <li class="tg-active">Haqqımızda</li>
            </ol>
        </div>
    </div>

    <main id="tg-main" class="tg-main tg-haslayout">
        <div class="container">
            <div class="row">
                <div id="tg-twocolumns" class="tg-twocolumns">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div id="tg-content" class="tg-content">
                            <div class="tg-post tg-postdetailpage tg-postdetailpagev2">
                                <div class="tg-description">
                                    <p>{!! $about[0]->text_az !!} </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@stop

@section('scripts')

@stop
