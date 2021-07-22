<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<div id="fh5co-page">
    <header id="fh5co-header-section" class="sticky-banner">
        <div class="container">
            <div class="row">
                <div class="nav-header">
                    <a href="{{ route('home') }}" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
                    <h1 id="fh5co-logo"><a href="{{ route('home') }}"><i class="icon-paper-plane-o"></i>Travel</a></h1>
                    <nav id="fh5co-menu-wrap" role="navigation">
                        <ul class="sf-menu" id="fh5co-primary-menu">
                            <li class="active"><a href="{{ route('home') }}">{{ trans('messages.home') }}</a></li>
                            <li>
                                <a href="{{ route('tours.index') }}" class="fh5co-sub-ddown">{{
                                    trans('messages.destinations') }}
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
                            @if (Route::has('login'))
                                @auth

                                <li class="nav-item-dropdown">
                                    <a href="#" class="fh5co-sub-ddown">{{ trans('messages.profile') }}
                                        <span>&#9660;</span>
                                    </a>
                                    <ul class="fh5co-sub-menu">
                                        <li><a href="{{ route('profile.index') }}">{{ trans('messages.per_info') }}</a></li>
                                        <li><a href="{{ route('logout') }}">{{ trans('messages.logout') }}</a></li>
                                    </ul>
                                </li>
                            @else

                                <li><a href="{{ route('login') }}" class="text-sm text-gray-700 underline">{{
                                        trans('messages.signin') }}</a></li>

                                    @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">{{
                                            trans('messages.signup') }}</a></li>
                                    @endif
                                @endauth
                            @endif
                            {{-- @endauth --}}

                            {{-- Notification dropdown --}}
                            {{-- <li class="nav-item-dropdown">
                                <a href="#" class="fh5co-sub-ddown">{{ trans('messages.language') }}
                                    <span>&#9660;</span>
                                </a>
                                <ul class="fh5co-sub-menu">
                                    <li><a href="{{route('language',['en'])}}">{{ trans('messages.english') }}</a></li>
                                    <li><a href="{{route('language',['vi'])}}">{{ trans('messages.vietnam') }}</a></li>
                                </ul>
                            </li> --}}
                            <li class="dropdown dropdown-notifications">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i data-count="0" class="fas fa-bell notification-icon"></i>
                                </a>

                                <div class="dropdown-container">
                                    <div class="dropdown-toolbar">
                                        <h3 class="dropdown-toolbar-title">Notifications (<span class="notif-count">0</span>)</h3>
                                    </div>
                                    <ul class="dropdown-menu">
                                        <li class="notification active">
                                            <div class="media">
                                              <div class="media-left">
                                                <div class="media-object">
                                                  <img src="{{ asset('assets/images/blog/author.png') }}" class="img-circle" alt="50x50" style="width: 50px; height: 50px;">
                                                </div>
                                              </div>
                                              <div class="media-body">
                                                <strong class="notification-title">Nice to meet you</strong>
                                                <!--p class="notification-desc">Extra description can go here</p-->
                                                <div class="notification-meta">
                                                  <small class="timestamp">about a minute ago</small>
                                                </div>
                                              </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="dropdown-footer text-center">
                                        <a class="view-all" href="{{ route('test') }}">View All</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    {{-- @endif --}}
                </div>
            </div>
        </div>
    </header>
</div>
