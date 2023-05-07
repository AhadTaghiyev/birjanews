@extends('layouts.main')

@section('style')

@stop

@section('seo')

    <meta name="keywords" content="{{ $contact[0]->{'seo_keywords_az'} }}" />
    <meta name="description" content="{{ $contact[0]->{'seo_desctioption_az'} }}" />
    <title>{{ $contact[0]->{'seo_title_az'} }}</title>
@stop

@section('content')

    <div class="tg-bannerinnerpage">
        <div class="container">
            <ol class="tg-breadcrumb">
                <li><a href="{{ route('homepage') }}">Ana Səhifə</a></li>
                <li class="tg-active">Əlaqə</li>
            </ol>
        </div>
    </div>

    <main id="tg-main" class="tg-main tg-haslayout">
        <div class="container">
            <div class="row">
                <div id="tg-twocolumns" class="tg-twocolumns">
                    <div class="col-xs-12 col-sm-7 col-md-9 col-lg-9">
                        <div id="tg-content" class="tg-content">
                            <div class="tg-contactus">
                                <div class="tg-borderheading">
                                    <h3>Bizə yazın</h3>
                                </div>

                                <form method="POST" action="{{ action('PhpMaillerController@sendMailContact') }}" id="contactform" class="tg-formtheme tg-formcontactus" >
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    @if (\Session::has('contactError'))
                                        <div class="alert alert-danger contact-form-responce" role="alert">
                                            <p class="success" style="line-height: 0px;">{!! \Session::get('contactError') !!}<br></p>
                                        </div>

                                        <br>
                                    @endif
                                    @if (\Session::has('contactStatus'))
                                        <div class="alert alert-success contact-form-responce" role="alert">
                                            <p class="success" style="line-height: 0px;">{!! \Session::get('contactStatus') !!}<br></p>
                                        </div>

                                        <br>
                                    @endif
                                    <fieldset>
                                        <div class="form-group">
                                            <input type="text" name="fullname" class="form-control" placeholder="Tam ad">
                                            <small class="text-danger">{{ $errors->first('fullname') }}</small>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="Email">
                                            <small class="text-danger">{{ $errors->first('email') }}</small>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="phone" id="phone" class="form-control" placeholder="+994(XX) XXX-XX-XX">
                                            <small class="text-danger">{{ $errors->first('phone') }}</small>
                                        </div>
                                        <div class="form-group">
                                            <textarea name="text" placeholder="Mətn"></textarea>
                                            <small class="text-danger">{{ $errors->first('text') }}</small>
                                        </div>
                                        <input type="submit" class="tg-btn" id="submitbtn" value="Göndər">
                                    </fieldset>
                                </form>
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

@section('scripts')
    <script src="{{ asset('js/inputmask.js') }}"></script>

    <script>
        $(window).load(function(){
            var phones = [{ "mask": "+\\9\\94(##) ###-##-##"}, { "mask": "+994(##) ###-##-##"}];
            $('#phone').inputmask({
                mask: phones,
                greedy: false,
                definitions: { '#': { validator: "[0-9]", cardinality: 1}} });
        });



    </script>

@stop
