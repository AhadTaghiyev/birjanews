<header id="tg-header" class="tg-header tg-haslayout">
    <div class="tg-topbar">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="tg-leftbox">
                        <span class="tg-datebox"><input id="tg-date" type="text"></span>
                    </div>
                    <div class="tg-rightbox">
                        <ul class="tg-socialicons">
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
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="tg-logoarea">
                    <strong class="tg-logo"><a href="{{ route('homepage') }}"><img src="{{ asset('files/logo/logo_4x.svg') }}" alt="image description"></a></strong>
                    @if(count($banner)>0)
                        <div class="tg-addbox"><a href="javascript:void(0);">
                                <img src="{{ asset('files/img/banner/'.$banner[0]->photo->file) }}" alt="image description">
                            </a></div>
                    @endif
                </div>
                <div class="tg-navigationarea">
                    <nav id="tg-nav" class="tg-nav">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#tg-navigation" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div id="tg-navigation" class="collapse navbar-collapse tg-navigation">
                            <ul>
                                <li><a href="{{ route('homepage') }}">Ana səhifə</a></li>
                                <li><a href="{{ route('herracElanlar') }}">Hərrac Xəbərləri</a></li>
                                <li><a href="{{ route('birjaYenilikler') }}">Birja Yenilikləri</a></li>
                                <li><a href="{{ route('herracTeshkilatlari') }}">Hərrac Təşkilatları</a></li>
                                <li><a href="{{ route('contact') }}">Əlaqə</a></li>
                            </ul>
                        </div>
                    </nav>
                    <a id="tg-btnsearchtoggle" class="tg-btnsearchtoggle" href="#tg-search"><i class="lnr lnr-magnifier"></i></a>
                </div>
            </div>
        </div>
    </div>
</header>
