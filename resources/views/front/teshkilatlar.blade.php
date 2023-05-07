@extends('layouts.main')

@section('style')

@stop

@section('seo')

    <meta name="keywords" content="BirjaNews"/>
    <meta name="description" content="herrac teshkilatlari"/>
    <title>Hərrac Təşkilatları</title>
@stop

@section('content')

    <div class="tg-bannerinnerpage">
        <div class="container">
            <ol class="tg-breadcrumb">
                <li><a href="{{ route('homepage') }}">Ana Səhifə</a></li>
                <li class="tg-active">Hərrac Təşkilatları</li>
            </ol>
        </div>
    </div>

    <main id="tg-main" class="tg-main tg-haslayout">
        <div class="container">
            <div class="row">
                <div id="tg-twocolumns" class="tg-twocolumns">

                    <div class="col-xs-12 ">
                        <div id="tg-content" class="tg-content">
                            <div class="tg-post tg-postdetailpage tg-postdetailpagev2">


                                                @foreach($partners as $partner)
                                                    <div class="col-sm-3">
                                                    <div class="card">
                                                        <img class="card-img-top" src="{{ asset('files/img/partners/'.$partner->photo->file) }}">
                                                        <div class="card-body">
                                                            <h5 class="card-title text-center margin-tb-10"><b>{{ $partner->name }}</b></h5>
                                                            <div class="col-sm-12 text-center">
                                                                <a href="{{ route('elanlarByHerrac', ['herrac'=>$partner->name, 'id'=>$partner->id]) }}" class="btn btn-primary w-60 ">Keç</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                @endforeach




                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>


@stop

@section('scripts')

    <script>
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            items:4,
            nav: true
        })
    </script>
@stop
