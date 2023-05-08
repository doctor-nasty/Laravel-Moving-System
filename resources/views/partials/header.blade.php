<header id="header" class="dark header-size-sm" data-sticky-shrink="false">

    <div id="header-wrap">
        <div class="container" id="lg">
            <div class="header-row">

                <div id="logo" class="ms-auto ms-md-0">
                    <a href="/" class="standard-logo" data-dark-logo="{{ url('images/logo.png') }}"><img class="mx-auto"
                            src="{{ asset('images/logo.png') }}" alt="Logo"></a>
                    <a href="/" class="retina-logo" data-dark-logo="{{ url('images/logo.png') }}"><img class="mx-auto"
                            src="{{ asset('images/logo.png') }}" alt="Logo"></a>
                    <div id="primary-menu-trigger">
                        <li class="fa-duotone fa-bars">
                            {{-- <button class="page-menu-trigger">OPEN</button> --}}
                        </li>
                    </div>
                </div>
                           @include('partials.weather')

            </div>
        </div>
        <div class="container">
            <div class="header-row justify-content-between flex-row-reverse flex-lg-row">
                <div class="header-misc">
                    {{-- <div class="header-buttons d-none d-sm-inline-block">
                        <a href="#slider" data-scrollto="#slider" data-offset="-80"
                            class="button button-rounded button-white button-light button-small m-0">Get a Quote</a>
                    </div> --}}
                </div>


                <nav class="primary-menu not-dark">
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
                        <li class="menu-item"><a class="menu-link" href="{{ url('resources') }}">
                                <div>Resources</div>
                            </a>
                            <ul class="sub-menu-container">
                                <li class="menu-item"><a class="menu-link" href="{{ url('movingtips') }}">
                                        <div>Moving Tips</div>
                                    </a></li>
                                <li class="menu-item"><a class="menu-link" href="{{ url('intmovingtips') }}">
                                        <div>International Moving</div>
                                    </a></li>
                                <li class="menu-item"><a class="menu-link" href="{{ url('longdistmovingtips') }}">
                                        <div>Long Distance Moving</div>
                                    </a></li>
                                <li class="menu-item"><a class="menu-link" href="{{ url('movingandstorage') }}">
                                        <div>Moving and Storage</div>
                                    </a></li>
                                <li class="menu-item"><a class="menu-link" href="{{ url('movinginsurance') }}">
                                        <div>Moving Insurance</div>
                                    </a></li>
                                <li class="menu-item"><a class="menu-link" href="{{ url('carshippingtips') }}">
                                        <div>Car Shipping</div>
                                    </a></li>
                            </ul>
                        </li>
                        <!-- <li class="menu-item"><a class="menu-link" href="demo-movers-team.html"><div>Team</div></a></li> -->
                        <!-- <li class="menu-item"><a class="menu-link" href="demo-movers-faqs.html"><div>FAQs</div></a></li>
                        <li class="menu-item"><a class="menu-link" href="demo-movers-blog.html"><div>Blog</div></a></li> -->
                        {{-- <li class="menu-item {{ request()->is('/contact') ? 'current' : '' }}"><a class="menu-link"
                                href="#">
                                <div>Contact Us</div>
                            </a></li> --}}
                        <li class="menu-item {{ request()->is('/about') ? 'current' : '' }}"><a class="menu-link"
                                href="/about">
                                <div>Our Company</div>
                            </a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="header-wrap-clone"></div>
</header>

