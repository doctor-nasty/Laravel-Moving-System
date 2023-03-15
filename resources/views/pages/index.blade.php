@extends('layouts.master', ['title' => 'MovingWyze.com'])




@section('content')
    <section id="slider" class="slider-element bg-color">
        <div class="container mt-4" style="z-index: 2">
            @include('partials.headertext')

            <div class="row justify-content-center formscontent">
                <div class="col-lg-6">
                    <p class="text-white-50">Find Out Everything You Need To Know For Your Upcoming Move. Start Here:</p>
                    <ul class="nav nav-tabs nav-fill flex-column border-bottom-0 flex-md-row bg-color mt-4" role="tablist"
                        id="tabs" data-tabs="tabs">
                        <li class="nav-item @if ($errors->count() == 0) active @endif @error('movingfromzip1') active @enderror @error('movingtozip1') active @enderror @error('movingdate1') active @enderror @error('movesize1') active @enderror"
                            role="tabpanel"><a
                                class="nav-link py-3 @if ($errors->count() == 0) active @endif @error('movingfromzip1') active @enderror @error('movingtozip1') active @enderror @error('movingdate1') active @enderror @error('movesize1') active @enderror"
                                href="#interstate" aria-controls="interstate" role="tab"
                                data-toggle="tab">Interstate</a></li>
                        <li class="nav-item @error('movingfromzip2') active @enderror @error('movingdate2') active @enderror @error('movingtocontinent2') active @enderror @error('movingtocountry2') active @enderror @error('movesize2') active @enderror"
                            role="tabpanel"><a
                                class="nav-link py-3 @error('movingfromzip2') active @enderror @error('movingdate2') active @enderror @error('movingtocontinent2') active @enderror @error('movingtocountry2') active @enderror @error('movesize2') active @enderror"
                                href="#international" aria-controls="international" role="tab"
                                data-toggle="tab">International</a></li>
                        <li class="nav-item @error('movingfromzip3') active @enderror @error('movingtozip3') active @enderror @error('movingdate3') active @enderror @error('vehiclemake3') active @enderror @error('vehiclemodel3') active @enderror @error('caryear3') active @enderror"
                            role="tabpanel"><a
                                class="nav-link py-3 @error('movingfromzip3') active @enderror @error('movingtozip3') active @enderror @error('movingdate3') active @enderror @error('vehiclemake3') active @enderror @error('vehiclemodel3') active @enderror @error('caryear3') active @enderror"
                                href="#carshipping" aria-controls="carshipping" role="tab" data-toggle="tab">Car
                                Shipping</a></li>
                        <li class="nav-item @error('movingfromzip4') active @enderror @error('movingtozip4') active @enderror @error('movingdate4') active @enderror @error('movesize4') active @enderror"
                            role="tabpanel"><a
                                class="nav-link py-3 @error('movingfromzip4') active @enderror @error('movingtozip4') active @enderror @error('movingdate4') active @enderror @error('movesize4') active @enderror"
                                href="#storage" aria-controls="storage" role="tab" data-toggle="tab">Storage</a></li>
                    </ul>
                    <div class="tab-content rounded-bottom shadow bg-white py-4 px-5">
                        <div role="tabpanel"
                            class="tab-pane @if ($errors->count() == 0) active @endif @error('movingfromzip1') active @enderror @error('movingtozip1') active @enderror @error('movingdate1') active @enderror @error('movesize1') active @enderror"
                            id="interstate">
                            <p class="mb-4">Moving to a new area? We have collected several tools to help you with your
                                upcoming moving date.</p>
                            @include('forms.interstate.index')
                        </div>
                        <div role="tabpanel"
                            class="tab-pane @error('movingfromzip2') active @enderror @error('movingdate2') active @enderror @error('movingtocontinent2') active @enderror @error('movingtocountry2') active @enderror @error('movesize2') active @enderror"
                            id="international">
                            @include('forms.international.index')
                        </div>
                        <div role="tabpanel"
                            class="tab-pane @error('movingfromzip3') active @enderror @error('movingtozip3') active @enderror @error('movingdate3') active @enderror @error('vehiclemake3') active @enderror @error('vehiclemodel3') active @enderror @error('caryear3') active @enderror"
                            id="carshipping">
                            @include('forms.carshipping.index')
                        </div>
                        <div role="tabpanel"
                            class="tab-pane @error('movingfromzip4') active @enderror @error('movingtozip4') active @enderror @error('movingdate4') active @enderror @error('movesize4') active @enderror"
                            id="storage">
                            @include('forms.storage.index')
                        </div>
                    </div>
                </div>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script>
                    $(".nav-tabs li a").click(function() {
                        $(".nav-tabs li a").removeClass("active");
                        $(this).addClass("active");
                    });
                </script>
            </div>
        </div>
        <div class="svg-separator">
            <div>
                <svg preserveAspectRatio="xMidYMax meet" viewBox="0 0 1600 100" data-height="100">
                    <path style="opacity: 1;fill: rgba(255,255,255,0.75);"
                        d="M1040,56c0.5,0,1,0,1.6,0c-16.6-8.9-36.4-15.7-66.4-15.7c-56,0-76.8,23.7-106.9,41C881.1,89.3,895.6,96,920,96
						C979.5,96,980,56,1040,56z">
                    </path>
                    <path style="opacity: 1;fill: rgba(255,255,255,0.75);"
                        d="M1699.8,96l0,10H1946l-0.3-6.9c0,0,0,0-88,0s-88.6-58.8-176.5-58.8c-51.4,0-73,20.1-99.6,36.8 c14.5,9.6,29.6,18.9,58.4,18.9C1699.8,96,1699.8,96,1699.8,96z">
                    </path>
                    <path style="opacity: 1;fill: rgba(255,255,255,0.75);"
                        d="M1400,96c19.5,0,32.7-4.3,43.7-10c-35.2-17.3-54.1-45.7-115.5-45.7c-32.3,0-52.8,7.9-70.2,17.8 c6.4-1.3,13.6-2.1,22-2.1C1340.1,56,1340.3,96,1400,96z">
                    </path>
                    <path style="opacity: 1;fill: rgba(255,255,255,0.75);"
                        d="M320,56c6.6,0,12.4,0.5,17.7,1.3c-17-9.6-37.3-17-68.5-17c-60.4,0-79.5,27.8-114,45.2 c11.2,6,24.6,10.5,44.8,10.5C260,96,259.9,56,320,56z">
                    </path>
                    <path style="opacity: 1;fill: rgba(255,255,255,0.75);"
                        d="M680,96c23.7,0,38.1-6.3,50.5-13.9C699.6,64.8,679,40.3,622.2,40.3c-30,0-49.8,6.8-66.3,15.8 c1.3,0,2.7-0.1,4.1-0.1C619.7,56,620.2,96,680,96z">
                    </path>
                    <path style="opacity: 1;fill: rgba(255,255,255,0.75);"
                        d="M-40,95.6c28.3,0,43.3-8.7,57.4-18C-9.6,60.8-31,40.2-83.2,40.2c-14.3,0-26.3,1.6-36.8,4.2V106h60V96L-40,95.6
						z">
                    </path>
                    <path style="opacity: 1;fill: rgba(255,255,255,0.3);;"
                        d="M504,73.4c-2.6-0.8-5.7-1.4-9.6-1.4c-19.4,0-19.6,13-39,13c-19.4,0-19.5-13-39-13c-14,0-18,6.7-26.3,10.4 C402.4,89.9,416.7,96,440,96C472.5,96,487.5,84.2,504,73.4z">
                    </path>
                    <path style="opacity: 1;fill: rgba(255,255,255,0.3);;"
                        d="M1205.4,85c-0.2,0-0.4,0-0.6,0c-19.5,0-19.5-13-39-13s-19.4,12.9-39,12.9c0,0-5.9,0-12.3,0.1 c11.4,6.3,24.9,11,45.5,11C1180.6,96,1194.1,91.2,1205.4,85z">
                    </path>
                    <path style="opacity: 1;fill: rgba(255,255,255,0.3);;"
                        d="M1447.4,83.9c-2.4,0.7-5.2,1.1-8.6,1.1c-19.3,0-19.6-13-39-13s-19.6,13-39,13c-3,0-5.5-0.3-7.7-0.8 c11.6,6.6,25.4,11.8,46.9,11.8C1421.8,96,1435.7,90.7,1447.4,83.9z">
                    </path>
                    <path style="opacity: 1;fill: rgba(255,255,255,0.3);;"
                        d="M985.8,72c-17.6,0.8-18.3,13-37,13c-19.4,0-19.5-13-39-13c-18.2,0-19.6,11.4-35.5,12.8 c11.4,6.3,25,11.2,45.7,11.2C953.7,96,968.5,83.2,985.8,72z">
                    </path>
                    <path style="opacity: 1;fill: rgba(255,255,255,0.3);;"
                        d="M743.8,73.5c-10.3,3.4-13.6,11.5-29,11.5c-19.4,0-19.5-13-39-13s-19.5,13-39,13c-0.9,0-1.7,0-2.5-0.1 c11.4,6.3,25,11.1,45.7,11.1C712.4,96,727.3,84.2,743.8,73.5z">
                    </path>
                    <path style="opacity: 1;fill: rgba(255,255,255,0.3);;"
                        d="M265.5,72.3c-1.5-0.2-3.2-0.3-5.1-0.3c-19.4,0-19.6,13-39,13c-19.4,0-19.6-13-39-13 c-15.9,0-18.9,8.7-30.1,11.9C164.1,90.6,178,96,200,96C233.7,96,248.4,83.4,265.5,72.3z">
                    </path>
                    <path style="opacity: 1;fill: rgba(255,255,255,0.3);;"
                        d="M1692.3,96V85c0,0,0,0-19.5,0s-19.6-13-39-13s-19.6,13-39,13c-0.1,0-0.2,0-0.4,0c11.4,6.2,24.9,11,45.6,11 C1669.9,96,1684.8,96,1692.3,96z">
                    </path>
                    <path style="opacity: 1;fill: rgba(255,255,255,0.3);;"
                        d="M25.5,72C6,72,6.1,84.9-13.5,84.9L-20,85v8.9C0.7,90.1,12.6,80.6,25.9,72C25.8,72,25.7,72,25.5,72z">
                    </path>
                    <path style="fill: rgb(255, 255, 255);"
                        d="M-40,95.6C20.3,95.6,20.1,56,80,56s60,40,120,40s59.9-40,120-40s60.3,40,120,40s60.3-40,120-40s60.2,40,120,40s60.1-40,120-40s60.5,40,120,40s60-40,120-40s60.4,40,120,40s59.9-40,120-40s60.3,40,120,40s60.2-40,120-40s60.2,40,120,40s59.8,0,59.8,0l0.2,143H-60V96L-40,95.6z">
                    </path>
                </svg>
                <div class="bg-white" style="height: 150px"></div>
            </div>
        </div>
    </section>
    <section id="content">
        <div class="content-wrap pb-0">

            <div class="container clearfix">
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-7 center">
                        <div class="heading-block">
                            <h3 class="nott mb-3 fw-semibold ls0">Everything You Need For Relocation</h3>
                            <span class="text-black-50">We are experienced relocation
                                personnel that have created this
                                website to help you be as prepared as possible for your next relocation. We have
                                collected
                                guides, links and important information to help you make the right decisions for your up
                                coming relocation.</span>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <img src="images/others/4.png" alt="Image 1">
                            </div>
                            <div class="col-sm-6">
                                <h3>Long Distance Moving</h3>
                                <h4>Interstate Moving</h4>
                                <h4>Cross Country Moving</h4>
                                <h4>Moving Between States</h4>
                                <p class="mb-2">Are you planning an Interstate Relocation? Long distance moving
                                    is an event that requires planning. We are here to guide you and help you pass
                                    through this mission with ease. Long Distance Moving is...</p>
                                <a target="_blank" href="{{ url('interstate') }}" title="Long Distance Moving"
                                    class="color btn btn-sm p-0 btn-link"><u>Long Distance Moving</u> <i
                                        class="icon-line-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="row align-items-center mt-5">
                            <div class="col-sm-6 mb-4 mb-sm-0">
                                <h3>International Moving</h3>
                                <p class="mb-2">Moving overseas? What should you know? what should you consider? We have
                                    a step by step international moving guide that will help you stay on track with this
                                    international relocation
                                    challenge. International Moving is...</p>
                                <a target="_blank" href="{{ url('international') }}" title="International Moving"
                                    class="color btn btn-sm p-0 btn-link"><u>International Moving</u> <i
                                        class="icon-line-arrow-right"></i></a>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/others/2.png" alt="Image 1">
                            </div>
                        </div>
                        <div class="row align-items-center mt-5">
                            <div class="col-sm-6">
                                <img src="images/others/1.png" alt="Image 1">
                            </div>
                            <div class="col-sm-6">
                                <h3>Car Shipping</h3>
                                <p class="mb-2"> Need to relocate your car without driving it and without adding many
                                    miles to it's engine? Car shipping is the solution for you. We have professional car
                                    shippers that will get your vehicle on the new location right on time. Car Shipping is
                                </p>
                                <a target="_blank" href="{{ url('carshipping') }}" title="Car Shipping"
                                    class="color btn btn-sm p-0 btn-link"><u>Car Shipping</u> <i
                                        class="icon-line-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="row align-items-center mt-5">
                            <div class="col-sm-6 mb-4 mb-sm-0">
                                <h3>Storage</h3>
                                <p class="mb-2">Need storage? Find out what options are available for you and what you
                                    should consider.</p>
                                <a target="_blank" href="{{ url('storage') }}" title="Storage"
                                    class="color btn btn-sm p-0 btn-link"><u>Storage</u> <i
                                        class="icon-line-arrow-right"></i></a>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/others/2.png" alt="Image 1">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <section id="news">
        <div class="content-wrap pb-0">

            @include('partials.news')
        </div>
    </section>
    <section id="states">
        <div class="content-wrap pb-0">

            <div class="clearfix bottommargin-lg topmargin-lg">
                <div class="container">
                    <img src="images/svg/map.png" alt="Map Image" class="img-fluid map-image">
                    <div class="map-title">
                        <h2 class="center">More than 10 States included in Our Network.
                        </h2>
                        <div class="justify-content-center">
                            <ul class="iconlist m-0 pe-5">
                                @foreach ($states as $state)
                                    <li><a href="{{ url('interstate') }}/{{ $state->state_code }}"
                                            title="{{ $state->state_name }} Long Distance Moving">Long Distance Moving
                                            {{ $state->state_code }}</a></li>
                                @endforeach
                            </ul>
                            <ul class="iconlist m-0 pe-5">
                                @foreach ($states as $state)
                                    <li><a href="{{ url('international') }}/{{ $state->state_code }}"
                                            title="{{ $state->state_name }} International Moving">International Moving
                                            {{ $state->state_code }}</a></li>
                                @endforeach
                            </ul>
                            <ul class="iconlist m-0 pe-5">
                                @foreach ($states as $state)
                                    <li><a href="{{ url('carshipping') }}/{{ $state->state_code }}"
                                            title="{{ $state->state_name }} Car Shipping">Car Shipping
                                            {{ $state->state_code }}</a></li>
                                @endforeach
                            </ul>
                            <ul class="iconlist m-0 pe-5">
                                @foreach ($states as $state)
                                    <li><a href="{{ url('storage') }}/{{ $state->state_code }}"
                                            title="{{ $state->state_name }} Storage">Storage {{ $state->state_code }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <div class="clear"></div>
    <section id="gradient">
        <div class="content-wrap pb-0">

            <div class="section-gradient m-0">
                <div class="svg-separator top rotate">
                    <div>
                        <svg preserveAspectRatio="xMidYMax meet" class="svg-separator sep3" viewBox="0 0 1600 100">
                            <path style="opacity: 1;fill: #FFF;"
                                d="M-40,71.627C20.307,71.627,20.058,32,80,32s60.003,40,120,40s59.948-40,120-40s60.313,40,120,40s60.258-40,120-40s60.202,40,120,40s60.147-40,120-40s60.513,40,120,40s60.036-40,120-40c59.964,0,60.402,40,120,40s59.925-40,120-40s60.291,40,120,40s60.235-40,120-40s60.18,40,120,40s59.82,0,59.82,0l0.18,26H-60V72L-40,71.627z">
                            </path>
                            <path class="svg-themecolor" style="opacity: 0.1;"
                                d="M-40,83.627C20.307,83.627,20.058,44,80,44s60.003,40,120,40s59.948-40,120-40s60.313,40,120,40s60.258-40,120-40s60.202,40,120,40s60.147-40,120-40s60.513,40,120,40s60.036-40,120-40c59.964,0,60.402,40,120,40s59.925-40,120-40s60.291,40,120,40s60.235-40,120-40s60.18,40,120,40s59.82,0,59.82,0l0.18,14H-60V84L-40,83.627z">
                            </path>
                            <path style="fill: #FFF;"
                                d="M-40,95.627C20.307,95.627,20.058,56,80,56s60.003,40,120,40s59.948-40,120-40s60.313,40,120,40s60.258-40,120-40s60.202,40,120,40s60.147-40,120-40s60.513,40,120,40s60.036-40,120-40c59.964,0,60.402,40,120,40s59.925-40,120-40s60.291,40,120,40s60.235-40,120-40s60.18,40,120,40s59.82,0,59.82,0l0.18,138H-60V96L-40,95.627z">
                            </path>
                        </svg>
                    </div>
                </div>
                {{-- <div class="container">
                    <div class="mx-auto" style="max-width: 1200px; padding: 120px 0 50px;">
                        <div class="d-flex justify-content-between align-items-center mb-4 dark">
                            <h3 class="mb-0">What Our Users Say:</h3>
                            <a href="#"
                                class="button button-white button-light button-rounded button-small fw-medium m-0">View
                                More</a>
                        </div>
                        <div class="row row-eq-height justify-content-center">
                            <div class="col-md-6">
                                <div class="bg-white shadow-sm d-flex justify-content-center flex-column rounded">
                                    <div class="testimonial bg-transparent shadow-none border-0 p-0">
                                        <div class="d-flex flex-row mb-4 align-items-center">
                                            <div class="testi-image">
                                                <a href="#"><img src="/images/testimonials/1.jpg"
                                                        alt="Customer Testimonails"></a>
                                            </div>
                                            <h4 class="ms-1 mb-0">John Dow</h4>
                                        </div>
                                        <div class="testi-content ps-4">
                                            <p>Assertively leverage existing integrated communities after turnkey quality
                                                vectors. Assertively coordinate sustainable quality vectors and pandemic
                                                markets. Assertively leverage existing integrated communities.</p>
                                            <div class="testi-meta ls1 mt-3"> Fig Nelson</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-3 mt-md-0">
                                <div class="bg-white shadow-sm d-flex justify-content-center flex-column mb-3 rounded p-5">
                                    <div class="testimonial small bg-transparent shadow-none border-0 p-0">
                                        <div class="d-flex flex-row mb-4 align-items-center">
                                            <h4 class="ms-1 mb-0">John Dow</h4>
                                        </div>
                                        <div class="testi-content ps-3">
                                            <p>Incidunt deleniti blanditiis quas aperiam recusandae consequatur ullam
                                                quibusdam cum libero illo rerum repellendus!</p>
                                            <div class="testi-meta ls1"> Fig Nelson</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-white shadow-sm d-flex justify-content-center flex-column rounded p-5">
                                    <div class="testimonial small bg-transparent shadow-none border-0 p-0">
                                        <div class="d-flex flex-row mb-4 align-items-center">
                                            <h4 class="ms-1 mb-0">John Dow</h4>
                                        </div>
                                        <div class="testi-content ps-3">
                                            <p>Incidunt deleniti blanditiis quas aperiam recusandae consequatur ullam
                                                quibusdam cum libero illo rerum repellendus!</p>
                                            <div class="testi-meta ls1"> Fig Nelson</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid-bg d-none d-md-block">
                            <img src="{{ asset('images/dot-grid.svg') }}" alt="Dot Image">
                        </div>
                    </div>
                </div> --}}
            </div>

        </div>
    </section>
    <div class="clear"></div>
    <section id="contact">
        <div class="content-wrap pb-0">

            <div class="dark pt-0 mb-0 bg-color">
                <svg viewBox="0 0 1960 206.8" class="bg-white">
                    <path class="svg-themecolor" style="opacity:0.2;"
                        d="M0,142.8A2337.49,2337.49,0,0,1,297.5,56.3C569.33-3.53,783.89.22,849.5,2.3c215.78,6.86,382.12,45.39,503.25,73.45,158.87,36.8,283.09,79.13,458.75,54.55A816.49,816.49,0,0,0,1983,86.8v110H0Z" />
                    <path class="svg-themecolor" d="M.5,152.8s498-177,849-150,1031,238,1134,94v110H.5Z" />
                </svg>
                <div class="container">
                    <div class="row align-items-center justify-content-center center my-4">
                        <div class="col-sm-8">
                            <div class="heading-block border-bottom-0 mb-4">
                                <h2 class="fw-semibold ls0 nott mb-3" style="font-size: 44px; line-height: 1.3">Contact
                                    Our
                                    Movers Specialist</h2>
                                <p>Phosfluorescently develop customized relationships vis-a-vis B2C infomediaries.</p>
                            </div>
                            <a href="/contact" class="button button-white button-light button-rounded fw-medium m-0">Get
                                In
                                Touch</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
