<div id="fh5co-page">
    <header id="fh5co-header-section" class="sticky-banner">
        <div class="container">
            <div class="row">
                <div class="nav-header">
                    <a href="{{ route('home') }}" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
                    <h1 id="fh5co-logo"><a href="{{ route('home') }}"><i class="icon-paper-plane-o"></i>Travel</a></h1>
                    <!-- START #fh5co-menu-wrap -->
                    @if (Route::has('login'))
                        @auth
                            <nav id="fh5co-menu-wrap" role="navigation">
                                <ul class="sf-menu" id="fh5co-primary-menu">
                                    <li class="active"><a href="{{ route('home') }}">{{ trans('messages.home') }}</a></li>
                                    <li>
                                        <a href="{{ route('tours.index') }}" class="fh5co-sub-ddown">{{ trans('messages.destinations') }} 
                                            <span>&#9660;</span>
                                        </a>
                                        <ul class="fh5co-sub-menu">
                                            <li>
                                                <a href="#">{{ trans('messages.north') }}</a>
                                                <ul class="fh5co-sub-menu2">
                                                    <li>
                                                        <a href="">Phú Quốc</a>
                                                        <a href="">Đà Lạt</a>
                                                        <a href="">Cần Thơ</a>
                                                        <a href="">Hồ Chí Minh</a>
                                                        <a href="">Nha Trang</a>
                                                        <a href="">Phan Thiết</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">{{ trans('messages.central') }}</a>
                                                <ul class="fh5co-sub-menu2">
                                                    <li>
                                                        <a href="">Đà Nẵng</a>
                                                        <a href="">Huế</a>
                                                        <a href="">Hội An</a>
                                                        <a href="">Quảng Bình</a>
                                                        <a href="">Quy Nhơn</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">{{ trans('messages.south') }}</a>
                                                <ul class="fh5co-sub-menu2">
                                                    <li>
                                                        <a href="">Ninh Bình</a>
                                                        <a href="">Hà Nội </a>
                                                        <a href="">Hạ Long</a>
                                                        <a href="">Sa Pa</a>
                                                        <a href="">Mộc Châu</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">{{ trans('messages.aboard') }}</a>
                                                <ul class="fh5co-sub-menu2">
                                                    <li>
                                                        <a href="">Thái Lan</a>
                                                        <a href="">Singapore</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="{{ route('reviews.index') }}">{{ trans('messages.blog') }}</a></li>
                                    <li><a href="#">{{ trans('messages.contact') }}</a></li>
                                    <li class="nav-item-dropdown">
                                        <a href="#" class="fh5co-sub-ddown">{{ trans('messages.language') }}
                                            <span>&#9660;</span>
                                        </a>
                                        <ul class="fh5co-sub-menu">
                                            <li><a href="{{route('language',['en'])}}">{{ trans('messages.english') }}</a></li>
                                            <li><a href="{{route('language',['vi'])}}">{{ trans('messages.vietnam') }}</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                            <div class="menu-user">
                                <li class="dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false"> 
                                        {{ trans('messages.welcome') }}, User <b class="caret"></b>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ route('users.index') }}">{{ trans('messages.manage_profile') }}</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('logout') }}">{{ trans('messages.logout') }}</a>
                                    </div>
                                </li>
                            </div> 
                        @else
                        <nav id="fh5co-menu-wrap" role="navigation">
                            <ul class="sf-menu" id="fh5co-primary-menu">
                                <li class="active"><a href="{{ route('home') }}">{{ trans('messages.home') }}</a></li>
                                <li>
                                    <a href="{{ route('tours.index') }}" class="fh5co-sub-ddown">{{ trans('messages.destinations') }} 
                                        <span>&#9660;</span>
                                    </a>
                                    <ul class="fh5co-sub-menu">
                                        <li>
                                            <a href="#">{{ trans('messages.north') }}</a>
                                            <ul class="fh5co-sub-menu2">
                                                <li>
                                                    <a href="">Phú Quốc</a>
                                                    <a href="">Đà Lạt</a>
                                                    <a href="">Cần Thơ</a>
                                                    <a href="">Hồ Chí Minh</a>
                                                    <a href="">Nha Trang</a>
                                                    <a href="">Phan Thiết</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">{{ trans('messages.central') }}</a>
                                            <ul class="fh5co-sub-menu2">
                                                <li>
                                                    <a href="">Đà Nẵng</a>
                                                    <a href="">Huế</a>
                                                    <a href="">Hội An</a>
                                                    <a href="">Quảng Bình</a>
                                                    <a href="">Quy Nhơn</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">{{ trans('messages.south') }}</a>
                                            <ul class="fh5co-sub-menu2">
                                                <li>
                                                    <a href="">Ninh Bình</a>
                                                    <a href="">Hà Nội </a>
                                                    <a href="">Hạ Long</a>
                                                    <a href="">Sa Pa</a>
                                                    <a href="">Mộc Châu</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">{{ trans('messages.aboard') }}</a>
                                            <ul class="fh5co-sub-menu2">
                                                <li>
                                                    <a href="">Thái Lan</a>
                                                    <a href="">Singapore</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('reviews.index') }}">{{ trans('messages.blog') }}</a></li>
                                <li><a href="#">{{ trans('messages.contact') }}</a></li>
                                <li><a href="{{ route('login') }}"
                                    class="text-sm text-gray-700 underline">{{ trans('messages.signin') }}</a></li>
        
                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}"
                                    class="ml-4 text-sm text-gray-700 underline">{{ trans('messages.signup') }}</a></li>
                            @endif
                        @endauth
                            </ul>
                        </nav>
                    @endif
                </div>
            </div>          
        </div>   
    </header>
</div>
