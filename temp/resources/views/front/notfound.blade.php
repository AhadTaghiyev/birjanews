@extends('layouts.notfound')

@section('content')

    <section class="error-section text-center overlay pt-190 pb-65 px-25" style="background-image: url('{{ asset('files/other/404.jpeg') }}')">
            <div class="error-content">
                <h1 class="wow customFadeInDown delay-0-2s slow">404</h1>
                <h2 class="wow customFadeInUp delay-0-4s slow">@lang('common.notfound')</h2>
                <div class="button-search">
                    <a href="{{ route('homepage', app()->getLocale()) }}" class="theme-btn style-two wow delay-0-6s slow">@lang('menu.Home')</a>
                </div>
                <div class="error-icons mt-250 rmt-150">
                    <div class="social-icon">
                        <a href="https://wa.me/{{$contact[0]->mobil}}" target="_blank"><i class="fab fa-whatsapp"></i></a>
                        <a href="{{ $contact[0]->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{ $contact[0]->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="{{ $contact[0]->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </section>
    
@stop
