@extends('layouts.main')

@section('style')

@stop

@section('seo')

    <title>OKO.az</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
@stop

@section('content')

    <section class="slider-section">

        <div class="main-slider-carousel owl-carousel">
            @foreach($sliders as $slider)
                <div class="slider-single-item" style="background-image: url( {{ asset('files/img/sl/'.$slider->photo->file) }})">
                    <div class="item-inner">
                        <h2>{{ $slider->{'small_title_'.app()->getLocale()} }}</h2>
                        <h2 class="name">{{ $slider->{'title_'.app()->getLocale()} }}</h2>
                        <p>{{ $slider->{'text_'.app()->getLocale()} }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="slider-icons">

            <div class="social-icon">
                @if(strlen($contact[0]->mobil)>=3)
                    <a href="https://wa.me/{{$contact[0]->mobil}}" target="_blank"><i class="fab fa-whatsapp"></i></a>
                @endif
                <a href="{{ $contact[0]->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="{{ $contact[0]->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="{{ $contact[0]->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </section>


    <section class="popular-post my-100">
        <div class="container">

            <div class="section-title text-center mb-45 wow slow">
                <h2>@lang('menu.SpecialBlog')</h2>
                <div class="separator mt-10">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </div>
            </div>

            <div class="row" style="justify-content: space-between;">
                @php $x = 1; @endphp
                @foreach($blogseven as $blogsev)
                    @if($blogsev->imgType == 1)
                        <div class="col-lg-6">
                            <div class="blog-single-item style-one wow  delay-0-2s slow">
                                <div class="blog-image">
                                    <img src="{{ asset('files/img/blog/'.$blogsev->photo->file) }}" alt="Popular post image">
                                </div>
                                <div class="blog-content">
                                    <div class="date">
                                        <i class="flaticon-clock"></i> {{ date('d-M-Y', strtotime($blogsev->created_date)) }}
                                    </div>
                                    <div class="content-bottom">
                                        <h4><a href="{{ route('SpecialBlog', ['id'=>$blogsev->id, 'locale'=>app()->getLocale()]) }}">{{ $blogsev->{'title_'.app()->getLocale()} }}</a></h4>

                                        <div class="by-views">
                                            <span class="admin">@lang('common.by'): {{ $blogsev->author->{'name_'.app()->getLocale()} }}</span>
                                            <span class="love"><i class="fas fa-eye"></i>{{ $blogsev->view }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif($blogsev->imgType == 2)
                        @if( $x == 1)
                        <div class="col-lg-6">
                        @endif
                            <div class="blog-single-item style-one wow  delay-0-4s slow">
                                <div class="blog-image">
                                    <img src="{{ asset('files/img/blog/'.$blogsev->photo->file) }}" alt="{{ $blogsev->photo->alt_tag }}">
                                </div>
                                <div class="blog-content">
                                    <div class="date">
                                        <i class="flaticon-clock"></i> {{ date('d-M-Y', strtotime($blogsev->created_date)) }}
                                    </div>
                                    <div class="content-bottom">
                                        <h4><a href="{{ route('SpecialBlog', ['id'=>$blogsev->id, 'locale'=>app()->getLocale()]) }}">{{ $blogsev->{'title_'.app()->getLocale()} }}</a></h4>

                                        <div class="by-views">
                                            <span class="admin">@lang('common.by'): {{ $blogsev->author->{'name_'.app()->getLocale()} }}</span>

                                            <span class="love"><i class="far fa-eye"></i>{{ $blogsev->view }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @if( $x == 2)
                        </div>
                        @endif

                            @php $x++; @endphp
                    @elseif($blogsev->imgType == 3)
                        <div class="col-lg-3 col-md-6">
                            <div class="blog-single-item style-two wow  delay-0-6s slow">
                                <div class="blog-image">
                                    <img src="{{ asset('files/img/blog/'.$blogsev->photo->file) }}" alt="Popular post image">
                                </div>
                                <div class="blog-content">
                                    <div class="content-bottom">
                                        <h6><a href="{{ route('SpecialBlog', ['id'=>$blogsev->id, 'locale'=>app()->getLocale()]) }}">{{ $blogsev->{'title_'.app()->getLocale()} }}</a></h6>

                                        <div class="by-views">
                                            <span class="date"><i class="flaticon-clock"></i> {{ date('d-M-Y', strtotime($blogsev->created_date)) }}</span>
                                            <span class="love"><i class="far fa-eye"></i>{{ $blogsev->view }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
            <div class="style-btn-all"  >
                <a href="{{ route('SpecialBlogs', app()->getLocale()) }}" class="theme-btn wow style-three-btn delay-0-2s slow" >@lang('common.All_btn')</a>
            </div>
        </div>
    </section>

    <section class="call-action pt-85 pb-100" style="background-image: url({{ asset('files/other/extraH1.jpg') }})">
        <div class="container">
            <div class="call-action-inner text-center">
                <h3 class="wow  slow">Biz rəqəmsal dünyanı sizə yaxın edirik ki, birlikdə böyüyək!</h3>
                <div class="call-action-btns mt-20">
                    <a href="{{ route('about_us', app()->getLocale()) }}" class="theme-btn wow  delay-0-2s slow">@lang('menu.About')</a>
                    <a href="{{ route('contact', app()->getLocale()) }}" class="theme-btn style-two wow  delay-0-2s slow">@lang('menu.Contact')</a>
                </div>
            </div>
        </div>
    </section>

    @include('includes.services')

    @include('includes.projects')

    <section class="recent-post mt-100 mb-50">
        <div class="container">

            <div class="section-title text-center mb-45 wow slow animated" style="visibility: visible;">
                <h2>@lang('menu.VideoBlog')</h2>
                <div class="separator mt-10">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </div>
            </div>

            <div class="row">
                @foreach($videos as $video)
                <div class="col-lg-4">
                    <div class="blog-single-item style-three wow delay-0-1s slow animated" style="visibility: visible;">
                        <div class="blog-video overlay">
                            <img src="{{ asset('files/img/blog/'.$video->photo->file) }}" alt="Recent post image">
                            <a href="{{ $video->url }}" class="video-play mfp-iframe"><i class="flaticon-play"></i></a>
                        </div>
                        <div class="blog-content flex-dir-column">
                            <div class="content-bottom">
                                <h5><a href="{{ $video->url }}" class="video-play mfp-iframe">{{ $video->{'title_'.app()->getLocale()} }}</a></h5>

                                <div class="by-views">
                                    <span class="admin"><b>@lang('common.by'):</b> {{ $video->author->{'name_'.app()->getLocale()} }}</span>
                                </div>
                                <div class="by-views">
                                    <span class="admin"><b>@lang('common.category'):</b> {{ $video->getCategory->{'name_'.app()->getLocale()} }}</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="style-btn-all">
                <a href="{{ route('videoblogs', app()->getLocale()) }}" class="theme-btn wow style-three-btn delay-0-2s slow">@lang('common.All_btn')</a>
            </div>
        </div>
    </section>

    <section class="weekly-post mb-100">
        <div class="container">
            <div class="section-title text-center mb-45 wow slow">
                <h2>@lang('common.most_viewed')</h2>
                <div class="separator mt-10">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </div>
            </div>
            <div class="weekly-post-inner">
                @foreach($blogs as $blog)
                <div class="blog-single-item style-three style-five wow  delay-0-2s slow">
                    <div class="blog-image">
                        <img src="{{ asset('files/img/blog/'.$blog->photo->file) }}" alt="Recent post image">
                        <div class="date"><i class="flaticon-clock"></i> {{ date('d-M-Y', strtotime($blog->created_date)) }}</div>
                    </div>
                    <div class="blog-content">
                        <div class="content-bottom">
                            <h5><a href="{{ route('blog', ['id'=>$blog->id, 'locale'=>app()->getLocale()]) }}">{{ $blog->{'title_'.app()->getLocale()} }}</a></h5>

                            <p>{{ $blog->{'short_'.app()->getLocale()} }}</p>


                            <div class="by-views">
                                <span><b>@lang('common.by'):</b> {{ $blog->author->{'name_'.app()->getLocale()} }}</span>
                                <span><b>@lang('common.View'):</b> {{ $blog->view }}</span>
                            </div>
                            <div class="by-views">
                                <span><b>@lang('common.category'):</b> {{ $blog->getCategory->{'name_'.app()->getLocale()} }}</span>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="style-btn-all">
                <a href="{{ route('blogs', app()->getLocale()) }}" class="theme-btn wow style-three-btn delay-0-2s slow">@lang('common.All_btn')</a>
            </div>
        </div>
    </section>

    @include('includes.partners')

    @include('includes.subscribe')
@stop

@section('scripts')

@stop
