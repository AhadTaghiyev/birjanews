@extends('layouts.main')

@section('style')

@stop

@section('seo')

    <meta name="keywords" content="{{ $contact[0]->{'seo_keywords_'.app()->getLocale()} }}" />
    <meta name="description" content="{{ $contact[0]->{'seo_desctioption_'.app()->getLocale()} }}" />
    <title>{{ $contact[0]->{'seo_title_'.app()->getLocale()} }}</title>
@stop

@section('content')

    <section class="banner-section overlay banner-section-contact">
        <div class="banner-inner">
            <h1 class="page-title">@lang('menu.Contact')</h1>
            <nav class="mt-70" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('homepage', app()->getLocale()) }}">@lang('menu.Home')</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('menu.Contact')</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="contact-info text-center mt-90 mb-100">
        <div class="container">
            <div class="section-title mb-45 wow  slow">
                <h2>@lang('contact.get_in_touch')</h2>
                <div class="separator mt-10">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </div>
            </div>
            <div class="get-in-touch overlay" style="background-image: url('{{ asset('files/other/get-intouch.jpg') }}')">
                <div class="contact-item wow delay-0-2s slow">

                    <ul>
                        <div class="social-icon">
                            @if(strlen($contact[0]->mobil)>=3)
                                <a href="https://wa.me/{{$contact[0]->mobil}}" target="_blank"><i class="fab fa-whatsapp"></i></a>
                            @endif
                            <a href="{{ $contact[0]->facebook }}"><i class="fab fa-facebook-f"></i></a>
                            <a href="{{ $contact[0]->instagram }}"><i class="fab fa-instagram"></i></a>
                            <a href="{{ $contact[0]->youtube }}"><i class="fab fa-youtube"></i></a>
                        </div>
                    </ul>
                </div>
                <div class="contact-item wow delay-0-4s slow">
                    <i class="flaticon-envelope"></i>
                    <ul>
                        <li><a class="call_contact" href = "mailto: {{ $contact[0]->email }}">{{ $contact[0]->email }}</a></li>
                    </ul>
                </div>
                <div class="contact-item wow delay-0-6s slow">
                    <i class="flaticon-phone"></i>
                    <ul>
                        <li><a href="tel:{{ $contact[0]->telefon }}" class="call_contact">{{ $contact[0]->telefon }}</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-form mb-100" id="CommentForm">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="contact-form-img rmb-50 wow  delay-0-2s slow">
                        <img src="{{ asset('files/other/contact-form.png') }}" alt="Contact Form">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-form-inner wow  delay-0-2s slow">
                        <div class="section-title mb-40">
                            <h2>@lang('contact.send_message')</h2>
                            <div class="separator mt-10">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </div>
                        </div>
                        <form method="POST" action="{{ action('PhpMaillerController@sendMailContact', app()->getLocale()) }}" class="comment-form wow delay-0-2s slow" >
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            @if (\Session::has('contactError'))
                                <div class="alert alert-danger contact-form-responce" role="alert">
                                    <p class="success">{!! \Session::get('contactError') !!}<br></p>
                                </div>

                                <br>
                            @endif
                            @if (\Session::has('contactStatus'))
                                <div class="alert alert-success contact-form-responce" role="alert">
                                    <p class="success">{!! \Session::get('contactStatus') !!}<br></p>
                                </div>

                                <br>
                            @endif
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="fullname" id="fullname" class="form-control mb-0"  placeholder="@lang('contact.Name')*">
                                        <small class="text-danger">{{ $errors->first('fullname') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control mb-0"  placeholder="@lang('contact.Email')*">
                                        <small class="text-danger">{{ $errors->first('email') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="phone" id="phone" class="form-control mb-0" placeholder="+994(XX) XXX-XX-XX">
                                        <small class="text-danger">{{ $errors->first('phone') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="text" id="text" class="form-control mb-0" rows="6"  placeholder="@lang('contact.Message')..."></textarea>
                                        <small class="text-danger">{{ $errors->first('text') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="theme-btn mt-20">@lang('contact.btn_submit')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @include('includes.partners')
@stop

@section('scripts')

    @if(session()->has('myerror'))
        <script>
            $('html, body').animate({
                scrollTop: $("#CommentForm").offset().top-90
            }, 1000);
        </script>
    @endif

    @if(session()->has('SuccessComment'))
        <script>
            $('html, body').animate({
                scrollTop: $("#CommentForm").offset().top-90
            }, 1000);
        </script>
    @endif

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
