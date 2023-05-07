<footer class="footer-section overlay pt-90 pb-20" style="background-image: url({{asset('files/other/footer.jpg')}})">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="footer-widget text-widget wow  slow">
                    <div class="footer-logo">
                        <a href="{{ route('homepage', app()->getLocale()) }}"><img src="{{asset('files/logo/logo_white.svg')}}" alt="Footer Logo"></a>
                    </div>
                    <p>Rəqəmsal etmək üçün rəqəmsal olduq!</p>
                    <div class="social-icon mt-30">
                        @if(strlen($contact[0]->mobil)>=3)
                            <a href="https://wa.me/{{$contact[0]->mobil}}" target="_blank"><i class="fab fa-whatsapp"></i></a>
                        @endif
                        <a href="{{ $contact[0]->facebook }}"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{ $contact[0]->instagram }}"><i class="fab fa-instagram"></i></a>
                        <a href="{{ $contact[0]->youtube }}"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="footer-widget recent-post-widget wow  delay-0-2s slow">
                    <h4 class="footer-title">@lang('menu.footer_recent_posts')</h4>
                    <div class="recent-posts">
                        @foreach($blogs2 as $blog2)
                        <div class="post-item">
                            <div class="post-img">
                                <a href="{{ route('blog', ['id'=>$blog2->id, 'locale'=>app()->getLocale()]) }}"><img src="{{asset('files/img/blog/'.$blog2->photo->file)}}" alt="Recent Post"></a>
                            </div>
                            <div class="post-content">
                                <h6><a href="{{ route('blog', ['id'=>$blog2->id, 'locale'=>app()->getLocale()]) }}">{{ $blog2->{'title_'.app()->getLocale()}  }}</a></h6>
                                <span class="date">{{ date('d-M-Y', strtotime($blog2->created_date)) }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="footer-widget instagram-post-widget wow  delay-0-4s slow">
                    <h4 class="footer-title">Instagram</h4>
                    <div class="instagram-posts">
                        @foreach($instagrams as $instagram)
                            <a href="{{ $contact[0]->instagram }}" target="_blank" ><img src="{{asset('files/img/insta/'.$instagram->photo->file) }}" alt="Instagram"></a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="copyright text-center">
            <p class="wow  slow">@lang('menu.footer_rights')</p>
        </div>

    </div>
</footer>
