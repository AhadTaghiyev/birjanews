<footer id="tg-footer" class="tg-footer tg-haslayout border-top-1">

    <div class="tg-threecolumns ">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                    <div class="tg-column">
                        <div class="tg-widget tg-widgetaboutus">
                            <h3 class="margin-tb-10">BirjaNews.az</h3>
                            <ul class="tg-socialicons ">
                                @if($contact[0]->facebook != '')
                                    <li><a href="{{ $contact[0]->facebook }}"><i class="fa fa-facebook"></i></a></li>
                                @endif
                                @if($contact[0]->instagram != '')
                                    <li><a href="{{ $contact[0]->instagram }}"><i class="fa fa-instagram"></i></a></li>
                                @endif
                                @if($contact[0]->youtube != '')
                                    <li><a href="{{ $contact[0]->youtube }}"><i class="fa fa-youtube"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="tg-column">
                        <div class="tg-widget tg-widgetcategories">
                            <div class="tg-widgettitle">
                                <h3>Hərraclar</h3>
                            </div>
                            <div class="tg-widgetcontent">
                                <ul>
                                    @foreach($partners as $partner)
                                        <li><a href="{{ route('elanlarByHerrac', ['herrac'=>$partner->name, 'id'=>$partner->id]) }}"><span>{{ $partner->name }}</span></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                    <div class="tg-column">
                        <div class="tg-widget tg-widgettrendingposts">
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
                            </div>
                            <div class="tg-btnbox margin-tb-10">
                                <a class="tg-btn" href="{{ route('contact') }}">Bizimlə Əlaqə</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tg-footerbar">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <strong class="tg-logo"><a href="javascript:void(0);"><img src="{{ asset('files/logo/logo_4x.svg') }}" alt="image description"></a></strong>
                    <div class="tg-copyrightbox">
                        <span>&copy; 2017 - The Article. All  Rights Reserved</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
