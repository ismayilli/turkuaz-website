<div class="top-header">
    <div class="container">
        <ul id="top-header-list">
            <li class="top-header-list-item">
                <a href="tel:0557921212"><i class="fas fa-phone-volume"></i>055 792 12 12</a>
            </li>
            <li class="top-header-list-item">
                <a href="mailto:info@turkuaz.az"><i class="far fa-envelope"></i>info@turkuaz.az</a>
            </li>
            <li class="top-header-list-item">
                <a href="https://goo.gl/maps/i86L118crU2SCzwA9" target="_blank"><i class="fas fa-map-marker-alt"></i>Ziya Bünyadov 2113</a>
            </li>
        </ul>
    </div>
</div>

<nav class="top-nav">
    <div class="container">
        <div class="nav-logo">
            <a href="/">
                <img src="{{ asset('/img/turkuazmain.png') }}">
            </a>
        </div>


        <div class="nav-right">
            <div class="nav-lang">
                <div class="nav-lang-toggle">
                    <a class="nav-lang-toggle-elem" id="nav-lang-toggle-main"><i class="fas fa-chevron-right"></i>{{ strtoupper(app()->getLocale()) }}</a>
                    <a class="nav-lang-toggle-elem" href="{{ url('locale/az') }}">AZ</a>
                    <a class="nav-lang-toggle-elem" href="{{ url('locale/ru') }}">RU</a>
                    <a class="nav-lang-toggle-elem" href="{{ url('locale/en') }}">EN</a>
                </div>
            </div>
        </div>


        <div class="nav-right">
            <div class="nav-search-input">
                <form id="nav-search-form" action="/catalog" method="GET">
                    <input type="text" name="search"><button type="submit">{{  __('header.search')  }}</button>
                </form>
            </div>
        </div>
</div>
</nav>

    <nav class="top-nav-res">
        <div class="nav-logo-res">
            <a href="/">
                <img src="{{ asset('/img/turkuazmain.png') }}">
            </a>
        </div>
        <div class="menu-icon-res">

        </div>
    </nav>

    <div class="ext-menu-res">
        <div class="container">
            <ul id="ext-menu-res-ul">
                <li id="ext-menu-res-search">
                    <form action="/catalog" method="GET">
                        <input name="search" type="text" placeholder="{{ __('header.search') }}">
                        <button id="ext-menu-res-search-button" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </li><hr>
                <li><a href="/catalog">{{ __('header.catalog') }}</a></li><hr>
                <li><a href="/about">{{ __('header.about') }}</a></li><hr>
                <li><a href="/contact">{{ __('header.contact') }}</a></li><hr>
                <li class="ext-menu-res-lang"><a>{{ __('header.language') }}</a><i class="fas fa-chevron-down"></i></li>
                <li class="ext-menu-res-lang-select">
                    <a href="{{ url('locale/az') }}">AZ</a>
                    <a href="{{ url('locale/ru') }}">RU</a>
                    <a href="{{ url('locale/en') }}">EN</a>
                </li>
            </ul>
        </div>
    </div>


</nav>