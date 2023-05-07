@extends('layouts.main')

@section('style')

@stop

@section('seo')
    <meta name="keywords" content="{{ $blogMain[0]->{'seo_keywords_'.app()->getLocale()} }}" />
    <meta name="description" content="{{ $blogMain[0]->{'seo_desctioption_'.app()->getLocale()} }}" />
    <title>{{ $blogMain[0]->{'seo_title_'.app()->getLocale()} }}</title>
@stop

@section('content')

    <section class="banner-section overlay banner-section-service">
        <div class="banner-inner">
            <h1 class="page-title">{{ $blogMain[0]->{'title_'.app()->getLocale()} }}</h1>
            <nav class="mt-70" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('homepage', app()->getLocale()) }}">@lang('menu.Home')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('SpecialBlogs', app()->getLocale()) }}">@lang('menu.SpecialBlog')</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $blogMain[0]->{'title_'.app()->getLocale()} }}</li>
                </ol>
            </nav>
        </div>
    </section>
    <section class="recent-post-h2 mt-100 mb-100">
        <div class="container">

            <div class="blog-details-image mb-30 wow  slow">
                <img src="{{asset('files/img/blog/'.$blogMain[0]->photo_main->file)}}" alt="{{ $blogMain[0]->photo_main->alt_tag }}">
                <div class="date">{{ date('d-M-Y', strtotime($blogMain[0]->created_date)) }}</div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-details-content mr-35 rmr-0">
                        <div class="by-views wow  delay-0-2s slow">
                            <span class="admin"><b>@lang('common.by'):</b> {{ $blogMain[0]->author->{'name_'.app()->getLocale()} }}</span>
                            <span class="view"><i class="flaticon-view"></i>{{ $blogMain[0]->view }}</span>
                        </div>
                        <div class="by-views wow  delay-0-2s slow">
                            <span class="admin"><b>@lang('common.category'):</b> {{ $blogMain[0]->getCategory->{'name_'.app()->getLocale()} }}</span>
                        </div>

                        <p class="wow delay-0-2s slow">{!! $blogMain[0]->{'text_'.app()->getLocale()} !!}</p>
                        <hr class="mt-30 mb-50">
                        @if(count($commentsForBlogs)>0)
                            <h4 class="comment-title mb-30 wow  delay-0-2s slow">@lang('common.comments')</h4>
                            @foreach($commentsForBlogs as $commentForBlog)
                                <div class="comments mb-50 wow  delay-0-2s slow">
                                    <div class="comments-box">
                                        <div class="comments-text">
                                            <div class="avatar-name">
                                                <span class="float-right"><i class="far fa-calendar-alt"></i> {{ date('d-M-Y', strtotime($commentForBlog->created_at)) }}</span>
                                                <h5>{{ $commentForBlog->fullname }}</h5>
                                            </div>
                                            <p>{!! $commentForBlog->text !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif


                        <h4 class="comment-title mb-30 wow  delay-0-2s slow" id="CommentForm">@lang('common.leave_comment')</h4>
                        @if(session()->has('SuccessComment'))
                            <div class="alert alert-success wow  delay-0-2s slow " role="alert">
                                @lang('common.success_for_approve')
                            </div>
                        @endif
                        <p class="wow  delay-0-2s slow">@lang('common.form_details')</p>

                        <form method="POST" action="{{ action('PageController@commentStore', app()->getLocale()) }}" class="comment-form wow  delay-0-2s slow" >
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="blog_id" value="{{ $blogMain[0]->id }}">
                            <input type="hidden" name="type" value="2">
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
                <div class="col-lg-4">
                    <div class="sidebar rmt-100">

                        <div class="widget categories-widget wow  delay-0-4s slow">
                            <h4 class="widget-title">@lang('common.categories')</h4>

                            <ul>
                                <li><a href="{{ route('SpecialBlogs', app()->getLocale()) }}">@lang('common.all')</a> <i class="line"></i></li>
                                @foreach($blogsCategories as $categoriesBlog)
                                    <li><a href="{{ route('SpecialBlogs', ['category'=>$categoriesBlog->id, 'locale'=>app()->getLocale()]) }}">{{ $categoriesBlog->{'name_'.app()->getLocale()} }}</a> <i class="line"></i></li>
                                @endforeach
                            </ul>
                        </div>
                        
                        <div class="widget recent-post-widget wow  delay-0-5s slow">
                            <h4 class="widget-title">@lang('menu.footer_recent_posts')</h4>
                            <div class="recent-posts">
                                @foreach($blogsSide as $blogside)
                                    <div class="post-item">
                                        <div class="post-img">
                                            <a href="{{ route('blog', ['id'=>$blogside->id, 'locale'=>app()->getLocale()]) }}"><img src="{{asset('files/img/blog/'.$blogside->photo->file)}}" alt="{{ $blogside->photo->alt_tag }}"></a>
                                        </div>
                                        <div class="post-content">
                                            <h6><a href="{{ route('blog', ['id'=>$blogside->id, 'locale'=>app()->getLocale()]) }}">{{ $blogside->{'title_'.app()->getLocale()}  }}</a></h6>
                                            <span class="date">{{ date('d-M-Y', strtotime($blogside->created_date)) }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        @include('includes.sideFollow')

                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('includes.partners')
    @include('includes.subscribe')
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
