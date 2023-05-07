<section class="contact-form mb-100" id="SubscribeForm">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 order-lg-2">
                <div class="contact-form-img rmb-50 wow delay-0-2s slow">
                    <img src="{{ asset('files/other/subscribe1.jpg') }}" alt="Contact Form">
                </div>
            </div>
            <div class="col-lg-6" >
                <div class="contact-form-inner wow delay-0-2s slow">
                    <div class="section-title mb-40">
                        <h2>@lang('contact.Subscription')</h2>
                        <div class="separator mt-10">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </div>
                    </div>
                    <form method="POST" action="{{ action('PageController@subscribe', app()->getLocale()) }}" class="comment-form wow delay-0-2s slow" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @if (\Session::has('myerrorSubscribe'))
                            <div class="alert alert-danger contact-form-responce" role="alert">
                                <p class="success">@lang('validation.mail_not_sent')<br></p>
                            </div>

                            <br>
                        @endif
                        @if (\Session::has('SuccessSubscribe'))
                            <div class="alert alert-success contact-form-responce" role="alert">
                                <p class="success">{!! \Session::get('SuccessSubscribe') !!}<br></p>
                            </div>

                            <br>
                        @endif
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="emailSubsc" name="emailSubsc" id="email" class="form-control mb-0"  placeholder="@lang('contact.Email')*">
                                    <small class="text-danger">{{ $errors->first('emailSubsc') }}</small>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="theme-btn mt-20">@lang('contact.btn_submit_subc')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
