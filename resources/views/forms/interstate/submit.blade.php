@extends('layouts.master', ['title' => 'Form Submitted'])




@section('content')
<div id="wrapper" class="clearfix">

<section id="maptxt">
    <div class="section section-features bg-transparent pb-0 mb-4" id="mpcnt">



        <div class="container">
            <div class="col" id="tablecol">
                <table class="table" id="mptxt">
                    <tr>
                        <td>Moving From:</td>
                        <td>{{ app('request')->input('cityfrom') }}</td>
                    </tr>
                    <tr>
                        <td>Moving To:</td>
                        <td>{{ app('request')->input('cityto') }}</td>
                    </tr>
                    <tr>
                        <td>Moving Date:</td>
                        <td>{{ app('request')->input('inst_dt') }}</td>
                    </tr>
                    <tr>
                        <td>Move Size:</td>
                        <td>{{ app('request')->input('mvsz') }}</td>
                    </tr>
                    <tr>
                        <td>Duration:</td>
                        <td id="duration"></td>
                    </tr>
                    <tr>
                        <td>Distance:</td>
                        <td id="distance"></td>
                    </tr>
                </table>
                <div id="map" style="width: 100%; height: 300px; float: left;"></div>

              </div>
        </div>
    </div>
</div>
<section id="companies">

    <div class="section section-features bg-transparent mt-0 p-0 clearfix">
        <div class="container clearfix">
            <div class="row col-mb-50 col-mb-lg-80">
                <div class="container clearfix">
                    <h3>Moving Companies near {{ app('request')->input('inst_fr_zip') }}
                        ({{ app('request')->input('cityfrom') }})</h3>
                    <p class="text-muted">The following companies will be contacting you to provide moving quotes. Be sure to
                        ask themquestions
                        by reading our advice on interviewing moving companies.</p>
                </div>
                @if (count($companies) > 0)
                    @foreach ($companies as $company)
                        <div class="col-md-4">
                            <div class="feature-box media-box">
                                <div class="fbox-icon position-relative mb-4"
                                    style="background-image: url('{{ asset('images/companies') }}/{{ $company->logo }}');">
                                    {{-- <img src="{{ asset('images/companies') }}/{{ $company->logo }}"
                                        alt="{{ $company->name }}"
                                        style="width: auto;max-height: 155px;"> --}}
                                </div>
                                <div class="fbox-content">
                                    <h3 class="fw-semibold">{{ $company->name }}</h3>
                                    <p class="text-muted">Packing the right way is crucial in order
                                        to keep your belonging
                                        safe.</p>
                                    <p class="mb-2">{{ $company->description }}</p>
                                    <p class="mb-2">{{ $company->phonenumber }}</p>
                                    <p class="mb-2">{{ $company->address }}, {{ $company->city }},
                                        {{ $company->state }}, {{ $company->zip }}</p>
                                    <a target="_blank" href="{{ $company->website }}"
                                        title="{{ $company->website }}"
                                        class="color btn btn-sm p-0 btn-link"><u>{{ $company->website }}</u>
                                        <i class="icon-line-arrow-right"></i></a>

                                    <ul class="list-unstyled iconlist ms-0">
                                        <li class="mb-2">
                                            <a
                                                href="https://www.google.com/search?q=Packing+for+Moving+IN+{{ app('request')->input('cityto') }}%2C+{{ app('request')->input('inst_to_zip') }}">Packing
                                                for Moving in
                                                {{ app('request')->input('cityto') }},
                                                {{ app('request')->input('inst_to_zip') }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    @foreach ($volt as $volt)
                        <div class="col-md-4">
                            <div class="feature-box media-box">
                                <div class="fbox-icon position-relative mb-4"
                                    style="background-image: url('images/featured-img/1.jpg');">
                                    <i class="icon-line-codesandbox"></i>
                                </div>
                                <div class="fbox-content">
                                    <h3 class="fw-semibold">{{ $volt->name }}</h3>
                                    <p class="text-muted">Packing the right way is crucial in order
                                        to keep your belonging
                                        safe.</p>
                                    <p class="mb-2">{{ $volt->description }}</p>
                                    <p class="mb-2">{{ $volt->phonenumber }}</p>
                                    <p class="mb-2">{{ $volt->address }}, {{ $volt->city }},
                                        {{ $volt->state }}, {{ $volt->zip }}</p>
                                    <a target="_blank" href="{{ $volt->website }}"
                                        title="{{ $volt->website }}"
                                        class="color btn btn-sm p-0 btn-link"><u>{{ $volt->website }}</u>
                                        <i class="icon-line-arrow-right"></i></a>

                                    <ul class="list-unstyled iconlist ms-0">
                                        <li class="mb-2">
                                            <a
                                                href="https://www.google.com/search?q=Packing+for+Moving+IN+{{ app('request')->input('cityto') }}%2C+{{ app('request')->input('inst_to_zip') }}">Packing
                                                for Moving in
                                                {{ app('request')->input('cityto') }},
                                                {{ app('request')->input('inst_to_zip') }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </div>
</section>
    <section id="tips">
        <div class="content-wrap p-0">
            <div class="section section-features bg-transparent mt-0 p-0 clearfix">
                <div class="container clearfix">
                    <div class="row col-mb-50 col-mb-lg-80">

                        <div class="col-md-4">
                            <div class="feature-box media-box">
                                <div class="fbox-icon position-relative mb-4"
                                    style="background-image: url('images/featured-img/1.jpg');">
                                    <i class="icon-line-codesandbox"></i>
                                </div>
                                <div class="fbox-content">
                                    <h3 class="fw-semibold">Packing For Moving in {{ app('request')->input('cityto') }},
                                        {{ app('request')->input('inst_to_zip') }}</h3>
                                    <p class="text-muted">Packing the right way is crucial in order to keep your belonging
                                        safe.</p>
                                    <ul class="list-unstyled iconlist ms-0">
                                        <li class="mb-2">
                                            <a
                                                href="https://www.google.com/search?q=Packing+for+Moving+IN+{{ app('request')->input('cityto') }}%2C+{{ app('request')->input('inst_to_zip') }}">Packing
                                                for Moving in {{ app('request')->input('cityto') }},
                                                {{ app('request')->input('inst_to_zip') }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-box media-box">
                                <div class="fbox-icon position-relative mb-4">
                                    <i class="icon-house-user"></i>
                                </div>
                                <div class="fbox-content">
                                    <h3 class="fw-semibold">Real Estate & Housing in {{ app('request')->input('cityto') }},
                                        {{ app('request')->input('inst_to_zip') }}</h3>

                                    <p class="text-muted">Finding a home for rent or a house to buy. Learn about the
                                        housing market you intend to move to</p>
                                    <ul class="list-unstyled iconlist ms-0">
                                        <li class="mb-2">
                                            <a
                                                href="https://www.google.com/search?q=REAL+ESTATE+%26+HOUSING+IN+{{ app('request')->input('cityto') }}%2C+{{ app('request')->input('inst_to_zip') }}">Real
                                                Estate in {{ app('request')->input('cityto') }},
                                                {{ app('request')->input('inst_to_zip') }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="feature-box media-box">
                                <div class="fbox-icon position-relative mb-4">
                                    <i class="icon-city"></i>
                                </div>
                                <div class="fbox-content">
                                    <h3 class="fw-semibold">Utilities in {{ app('request')->input('cityto') }},
                                        {{ app('request')->input('inst_to_zip') }}</h3>
                                    <p class="text-muted">Gas & Electric - Contacts and information of local utility
                                        providers</p>
                                    <ul class="list-unstyled iconlist ms-0">
                                        <li class="mb-2">
                                            <a
                                                href="https://www.google.com/search?q=UTILITIES+IN+{{ app('request')->input('cityto') }}%2C+{{ app('request')->input('inst_to_zip') }}">Utilities
                                                in {{ app('request')->input('cityto') }},
                                                {{ app('request')->input('inst_to_zip') }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="feature-box media-box">
                                <div class="fbox-icon position-relative mb-4">
                                    <i class="icon-school"></i>
                                </div>
                                <div class="fbox-content">
                                    <h3 class="fw-semibold">Education in {{ app('request')->input('cityto') }},
                                        {{ app('request')->input('inst_to_zip') }}</h3>
                                    <p class="text-muted">Schooling and education is an important aspect or relocating to a
                                        new place.</p>
                                    <ul class="list-unstyled iconlist ms-0">
                                        <li class="mb-2">
                                            <a
                                                href="https://www.google.com/search?q=Education+IN+{{ app('request')->input('cityto') }}%2C+{{ app('request')->input('inst_to_zip') }}">Education
                                                in {{ app('request')->input('cityto') }},
                                                {{ app('request')->input('inst_to_zip') }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="feature-box media-box">
                                <div class="fbox-icon position-relative mb-4">
                                    <i class="icon-deploydog"></i>
                                </div>
                                <div class="fbox-content">
                                    <h3 class="fw-semibold">Pets in {{ app('request')->input('cityto') }},
                                        {{ app('request')->input('inst_to_zip') }}</h3>
                                    <p class="text-muted">Your loved pet in a new habitat. How should you prepare? What
                                        should you know?</p>
                                    <ul class="list-unstyled iconlist ms-0">
                                        <li class="mb-2">
                                            <a
                                                href="https://www.google.com/search?q=Pets+IN+{{ app('request')->input('cityto') }}%2C+{{ app('request')->input('inst_to_zip') }}">Pets
                                                in {{ app('request')->input('cityto') }},
                                                {{ app('request')->input('inst_to_zip') }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="feature-box media-box">
                                <div class="fbox-icon position-relative mb-4">
                                    <i class="icon-phone"></i>
                                </div>
                                <div class="fbox-content">
                                    <h3 class="fw-semibold">Telecom in {{ app('request')->input('cityto') }},
                                        {{ app('request')->input('inst_to_zip') }}</h3>
                                    <p class="text-muted">New place, new area code, new internet providers - what are your
                                        telecommunication options in
                                        your new residence...</p>
                                    <ul class="list-unstyled iconlist ms-0">
                                        <li class="mb-2">
                                            <a
                                                href="https://www.google.com/search?q=TELECOM++IN+{{ app('request')->input('cityto') }}%2C+{{ app('request')->input('inst_to_zip') }}">Telecom
                                                in {{ app('request')->input('cityto') }},
                                                {{ app('request')->input('inst_to_zip') }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section id="contact">
        <div class="section dark pt-0 mb-0 bg-color"
        style="background: url('/images/bg-2.png') no-repeat center bottom / 100%; overflow: visible">
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
                            Our Movers Specialist</h2>
                        <p>Phosfluorescently develop customized relationships vis-a-vis B2C infomediaries.</p>
                    </div>
                    <a href="/contact" class="button button-white button-light button-rounded fw-medium m-0">Get
                        In Touch</a>
                </div>
            </div>
        </div>
    </div>
    </section>
</div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD605EfQQCtgbtE3Bj8I9uMnRHkC4FzyQM"></script>

    <script type="text/javascript">
        var directionsService = new google.maps.DirectionsService();
        var directionsDisplay = new google.maps.DirectionsRenderer();

        var map = new google.maps.Map(document.getElementById('map'), {
            mapTypeId: 'hybrid',
            zoom: 6,
            disableDefaultUI: true,
            // mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        directionsDisplay.setMap(map);

        var request = {
            origin: '{{ app('request')->input('cityfrom') }}',
            destination: '{{ app('request')->input('cityto') }}',
            drivingOptions: {
                departureTime: new Date(Date.now() + 10000),
                trafficModel: 'bestguess'
            },
            travelMode: google.maps.DirectionsTravelMode.DRIVING
        };

        directionsService.route(request, function(response, status) {
            if (status == google.maps.DirectionsStatus.OK) {


                document.getElementById('distance').innerHTML +=
                    (response.routes[0].legs[0].distance.value / 1609).toFixed(0) + " Miles";

                document.getElementById('duration').innerHTML +=
                    (response.routes[0].legs[0].duration.value / 3600).toFixed(0) + " Hours";


                directionsDisplay.setDirections(response);
            }
        });
    </script>
@endsection
