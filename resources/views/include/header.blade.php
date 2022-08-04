  <!-- Header Section Begin -->
<header class="header fixed-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <div class="header__logo">
                    <a href="{{ route('home') }}">
                        <img src="{{URL::asset('src/assets/LYX.png')}}" alt="home">
                    </a>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="header__nav">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="{{ request()->is('/') ? 'active' : ''  }} "><a href="{{ route('home') }}">Homepage</a></li>
                            <li class="{{ request()->is('list/*') ? 'active' : ''  }}"><a href="#">View More <span class="arrow_carrot-down"></span></a>
                                <ul class="dropdown">
                                    <li><a href="{{ route('list', "now_playing") }}">Now Playing</a></li>
                                    <li><a href="{{ route('list', "popular") }}">Popular</a></li>
                                    <li><a href="{{ route('list', "top_rated") }}">Top Rated</a></li>
                                    <li><a href="{{ route('list', "upcoming") }}">Upcoming</a></li>
                                </ul>
                            </li>
                            <li class="{{ request()->is('about') ? 'active' : ''  }}"><a href="{{ Route('about') }}">About</a></li>
                            <li class="{{ request()->is('contact') ? 'active' : ''  }}"><a href="{{ Route('contact') }}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            {{-- <div class="col-lg-2">
                <div class="header__right bg-dark">
                    <div class="row bg-success float-right">
                        <div class="col-4">
                            <a href="#ID">ID</a>                            
                        </div>
                        <div class="col-2">|</div>                        
                        <div class="col-4">
                            <a href="#EN">EN</a>                            
                        </div>
                    </div>                    
                </div>
            </div> --}}
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>
<!-- Header End -->