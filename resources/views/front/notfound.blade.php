@extends('layouts.main')

@section('content')

    <div class="tg-bannerinnerpage">
        <div class="container">
            <ol class="tg-breadcrumb">
                <li><a href="{{ route('homepage') }}">Ana Səhifə</a></li>
                <li class="tg-active">404</li>
            </ol>
        </div>
    </div>

    <main id="tg-main" class="tg-main tg-haslayout">
        <div class="container">
            <div class="row">
                <div id="tg-twocolumns" class="tg-twocolumns">
                    <div class="col-xs-12 col-sm-7 col-md-9 col-lg-9">
                        <div id="tg-content" class="tg-content">
                            <div class="tg-404error">
                                <div class="tg-404text">
                                    <h2>Oooops!<span>Səhvlik var:(</span></h2>
                                    <h1>404</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-3 col-lg-3">
                        <aside id="tg-sidebar" class="tg-sidebar">
                            <div class="tg-widget tg-widgetcontactus">
                                <div class="tg-widgettitle">
                                    <h3>Bizi Əlaqələrimiz</h3>
                                </div>
                                <div class="tg-widgetcontent">
                                    <ul class="tg-contactinfo">
                                        <li>
                                            <i class="lnr lnr-pushpin"></i>
                                            <address>{{ $contact[0]->address_az }}</address>
                                        </li>
                                        <li>
                                            <i class="lnr lnr-phone-handset"></i>
                                            <span><a href="tel:{{ $contact[0]->telefon }}">{{ $contact[0]->telefon }}</a></span>
                                        </li>
                                        <li>
                                            <i class="lnr lnr-phone-handset"></i>
                                            <span><a href="tel:{{ $contact[0]->telefon }}">{{ $contact[0]->mobil }}</a></span>
                                        </li>
                                        <li>
                                            <i class="lnr lnr-envelope"></i>
                                            <span><a href="mailto:{{ $contact[0]->email }}">{{ $contact[0]->email }}</a></span>
                                        </li>
                                    </ul>
                                    <ul class="tg-socialicons tg-socialiconsround">
                                        @if($contact[0]->facebook != '')
                                            <li class="tg-facebook"><a href="{{ $contact[0]->facebook }}"><i class="fa fa-facebook"></i></a></li>
                                        @endif
                                        @if($contact[0]->instagram != '')
                                            <li class="tg-facebook"><a href="{{ $contact[0]->instagram }}"><i class="fa fa-instagram"></i></a></li>
                                        @endif
                                        @if($contact[0]->youtube != '')
                                            <li class="tg-youtube"><a href="{{ $contact[0]->youtube }}"><i class="fa fa-youtube"></i></a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </main>

@stop
