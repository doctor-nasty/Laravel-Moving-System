<header id="header" class="dark header-size-sm" data-sticky-shrink="false">
    <div class="container">
        <div class="header-row">

            <div id="logo" class="ms-auto ms-md-0">
                <a href="/" class="standard-logo" data-dark-logo="{{ url('images/logo.png') }}"><img class="mx-auto"
                        src="{{ asset('images/logo.png') }}" alt="Logo"></a>
                <a href="/" class="retina-logo" data-dark-logo="{{ url('images/logo.png') }}"><img class="mx-auto"
                        src="{{ asset('images/logo.png') }}" alt="Logo"></a>
                <div id="primary-menu-trigger">
                    <svg class="svg-trigger" viewBox="0 0 100 100">
                        <path
                            d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20">
                        </path>
                        <path d="m 30,50 h 40"></path>
                        <path
                            d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20">
                        </path>
                    </svg>
                </div>
            </div>

            <link rel="shortcut icon" type="image/x-icon" href="https://offthem.com/favicon.ico">
            <link rel="apple-touch-icon" type="image/x-icon" href="https://offthem.com/favicon.ico">

                       @include('partials.weather')

        </div>
    </div>
    <div id="header-wrap">
        <div class="container">
            <div class="header-row justify-content-between flex-row-reverse flex-lg-row">
                <div class="header-misc">
                    {{-- <div class="header-buttons d-none d-sm-inline-block">
                        <a href="#slider" data-scrollto="#slider" data-offset="-80"
                            class="button button-rounded button-white button-light button-small m-0">Get a Quote</a>
                    </div> --}}
                </div>


                <nav class="primary-menu with-arrows not-dark">
                    <ul class="menu-container">
                        <li class="menu-item {{ request()->is('') ? 'current' : '' }}"><a class="menu-link"
                                href="/">
                                <div>Home</div>
                            </a></li>
                        <li class="menu-item"><a class="menu-link" href="{{ url('interstate') }}">
                                <div>Long Distance</div>
                            </a></li>
                        <li class="menu-item"><a class="menu-link" href="{{ url('carshipping') }}">
                                <div>Car Shipping</div>
                            </a></li>
                            <li class="menu-item"><a class="menu-link" href="{{ url('international') }}">
                                    <div>International</div>
                                </a></li>
                                <li class="menu-item"><a class="menu-link" href="{{ url('storage') }}">
                                        <div>Storage</div>
                                    </a></li>
                        <!-- <li class="menu-item"><a class="menu-link" href="demo-movers-company.html"><div>Our Company</div></a></li> -->
                        <li class="menu-item"><a class="menu-link" href="demo-movers-rates.html">
                                <div>Moving Tools</div>
                            </a>
                            <ul class="sub-menu-container">
                                <li class="menu-item"><a class="menu-link" href="demo-movers-rates.html">
                                        <div><i class="icon-line2-home"></i>Home Moving</div>
                                    </a></li>
                                <li class="menu-item"><a class="menu-link" href="demo-movers-rates.html">
                                        <div><i class="icon-building2"></i>Office Moving</div>
                                    </a></li>
                                <li class="menu-item"><a class="menu-link" href="{{ url('international') }}">
                                        <div><i class="icon-line2-globe"></i>International Moving</div>
                                    </a></li>
                                <li class="menu-item"><a class="menu-link" href="demo-movers-rates.html">
                                        <div><i class="icon-paw"></i>Pet Shifting</div>
                                    </a></li>
                                <li class="menu-item"><a class="menu-link" href="demo-movers-rates.html">
                                        <div><i class="icon-car"></i>Car Shifting</div>
                                    </a></li>
                                <li class="menu-item"><a class="menu-link" href="demo-movers-rates.html">
                                        <div><i class="icon-truck1"></i>Hire Truck</div>
                                    </a></li>
                            </ul>
                        </li>
                        <!-- <li class="menu-item"><a class="menu-link" href="demo-movers-team.html"><div>Team</div></a></li> -->
                        <!-- <li class="menu-item"><a class="menu-link" href="demo-movers-faqs.html"><div>FAQs</div></a></li>
                        <li class="menu-item"><a class="menu-link" href="demo-movers-blog.html"><div>Blog</div></a></li> -->
                        <li class="menu-item {{ request()->is('/contact') ? 'current' : '' }}"><a class="menu-link"
                                href="/contact">
                                <div>Contact Us</div>
                            </a></li>
                        <li class="menu-item {{ request()->is('/about') ? 'current' : '' }}"><a class="menu-link"
                                href="/about">
                                <div>Our Company</div>
                            </a></li>
                    </ul>
                </nav>
                <form class="top-search-form" action="/" method="get">
                    <input type="text" name="q" class="form-control" value=""
                        placeholder="Type &amp; Hit Enter.." autocomplete="off">
                </form>
            </div>
        </div>
    </div>
    <div class="header-wrap-clone"></div>
</header>
<div class="push"></div>
