<header class="main-header">

    <div class="container">
        <div class="header-inner">
            <div class="main-logo">
                <a href="{{ route('homepage', app()->getLocale()) }}"><img src="{{asset('files/logo/logo_white.svg')}}" alt="Logo"></a>
            </div>

            <div class="search-btn">
                <button><i class="flaticon-search"></i></button>
            </div>

            <div class="language-btn">
                <div class="btn-group dropdown-style-1">
                    @if ( Config::get('app.locale') == 'az')
                        <button type="button" class="btn dropdown-toggle sm-width-100 btn-lng" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="icon-country az"></span> Azərbaycan <span class="caret"></span>
                        </button>
                    @elseif ( Config::get('app.locale') == 'ru' )
                        <button type="button" class="btn dropdown-toggle sm-width-100 btn-lng" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="icon-country ru"></span> Русский <span class="caret"></span>
                        </button>
                    @elseif ( Config::get('app.locale') == 'en' )
                        <button type="button" class="btn dropdown-toggle sm-width-100 btn-lng" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="icon-country ru"></span> English <span class="caret"></span>
                        </button>
                    @endif
                    <ul class="dropdown-menu">
                        @if ( Config::get('app.locale') == 'ru')
                            <li class="li-pad-3px padding-5 border-1 lng"><a href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), isset($requestID) ? ['az', $requestID ] : 'az' ) }}" title="Azərbaycan"><span class="icon-country az"></span>Azərbaycan</a></li>
                            <li class="li-pad-3px padding-5 lng"><a href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), isset($requestID) ? ['en', $requestID ] : 'en' ) }}" title="English"><span class="icon-country en"></span>English</a></li>
                        @elseif( Config::get('app.locale') == 'en')
                            <li class="li-pad-3px padding-5 border-1 lng"><a href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), isset($requestID) ? ['ru', $requestID ] : 'ru' ) }}" title="Русский"><span class="icon-country ru"></span>Русский</a></li>
                            <li class="li-pad-3px padding-5 lng"><a href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), isset($requestID) ? ['az', $requestID ] : 'az' ) }}" title="Azərbaycan"><span class="icon-country az"></span>Azərbaycan</a></li>
                        @else ( Config::get('app.locale') == 'az')
                            <li class="li-pad-3px padding-5 border-1 lng"><a href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), isset($requestID) ? ['ru', $requestID ] : 'ru' ) }}" title="Русский"><span class="icon-country ru"></span>Русский</a></li>
                            <li class="li-pad-3px padding-5 lng"><a href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), isset($requestID) ? ['en', $requestID ] : 'en' ) }}" title="English"><span class="icon-country en"></span>English</a></li>
                        @endif
                    </ul>
                </div>
            </div>

            <div class="menu-toggler">
                <button>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <nav class="search-form">
                <div class="search-close">
                    <button><i class="flaticon-cancel"></i></button>
                </div>
                <form action="{{ action('PageController@blogs', app()->getLocale()) }}" class="d-flex">
                    <input type="search" name="keyword" required placeholder="@lang('menu.search')">
                    <button type="submit"><i class="flaticon-search"></i></button>
                </form>
            </nav>

            <nav class="main-menu">
                <div class="menu-close">
                    <button><i class="flaticon-cancel"></i></button>
                </div>
                <ul>
                    <li><a href="{{ route('homepage', app()->getLocale()) }}">@lang('menu.Home')</a></li>
                    <li><a href="{{ route('about_us', app()->getLocale()) }}">@lang('menu.About')</a></li>
                    <li><a href="{{ route('services', app()->getLocale()) }}">@lang('menu.Service')</a></li>
                    <li><a href="{{ route('blogs', app()->getLocale()) }}">@lang('menu.Blog')</a></li>
                    <li><a href="{{ route('SpecialBlogs', app()->getLocale()) }}">@lang('menu.SpecialBlog')</a></li>
                    <li><a href="{{ route('videoblogs', app()->getLocale()) }}">@lang('menu.VideoBlog')</a></li>
                    <li><a href="{{ route('projects', app()->getLocale()) }}">@lang('menu.Projects')</a></li>
                    <li><a href="{{ route('gallery', app()->getLocale()) }}">@lang('menu.Gallery')</a></li>
                    <li><a href="{{ route('contact', app()->getLocale()) }}">@lang('menu.Contact')</a></li>
                </ul>
            </nav>

        </div>
    </div>

</header>
