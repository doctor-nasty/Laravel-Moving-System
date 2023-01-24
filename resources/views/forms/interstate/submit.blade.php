@extends('layouts.master', ['title' => 'Form Submitted'])




@section('content')

    <section id="content">
        <div class="content-wrap p-0">

            <div class="section section-features bg-transparent pb-0 mb-4 clearfix">
                <div class="container clearfix">
                    <h3>Moving Companies near {{ app('request')->input('inst_fr_zip') }} ({{ app('request')->input('cityfrom') }})</h3>
                    <p class="text-muted">The following companies will be contacting you to provide moving quotes. Be sure to ask themquestions
by reading our advice on interviewing moving companies.</p>
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            @foreach ($companies as $company)
            <ul class="list-group">
            <div class="row align-items-center">
                <div class="col-sm-6 center">
                    <img src="{{asset ('images/companies')}}/{{ $company->logo }}" alt="Image 1" style="width:50%">
                </div>
                <div class="col-sm-6">
                    <h5>{{ $company->name }}</h5>
                    <p class="mb-2">{{ $company->description }}</p>
                    <p class="mb-2">{{ $company->phonenumber }}</p>
                    <p class="mb-2">{{ $company->address }}, {{ $company->city }}, {{ $company->state }}, {{ $company->zip }}</p>
                    <a target="_blank" href="{{ $company->website }}" title="{{ $company->website }}" class="color btn btn-sm p-0 btn-link"><u>{{ $company->website }}</u> <i class="icon-line-arrow-right"></i></a>
                </div>
            </div>
        </ul>
            @endforeach
        </div>
            {{-- @foreach ($companies as $company)
            <div class="feature-box media-box">
                <div class="fbox-icon position-relative mb-4"
                    style="background-image: url('images/featured-img/1.jpg');">
                    <img src="{{asset ('images/companies')}}/{{ $company->logo }}">
                </div>
                <div class="fbox-content">
                    <h3 class="fw-semibold">{{ $company->name }}</h3>
                    <br>
                    <label>{{ $company->address }}, {{ $company->city }}, {{ $company->state }}, {{ $company->zip }}</label>
                    <label>{{ $company->phonenumber }}</label>
                    <br>
                    <a href="{{ $company->website }}">{{ $company->website }}</a>
                    <p class="text-muted">{{ $company->description }}</p>
                    <p class="text-muted">US DOT: {{ $company->usdot }}</p>
                    <p class="text-muted">MC NO: {{ $company->mcno }}</p>
                    <p class="text-muted">Intrastate: {{ $company->intrastate }}</p>
                    <p class="text-muted">Fleet Size: {{ $company->fleetsize }}</p>
                </div>
            </div>
        @endforeach --}}
          <div class="col">
            <table class="table">
                <tr>
                    <td class="mb4">Moving From:</td>
                    <td class="mb4">{{ app('request')->input('cityfrom') }}</td>
                </tr>
                <tr>
                    <td class="mb4">Moving To:</td>
                    <td class="mb4">{{ app('request')->input('cityto') }}</td>
                </tr>
                <tr>
                    <td class="mb4">Moving Date:</td>
                    <td class="mb4">{{ app('request')->input('inst_dt') }}</td>
                </tr>
                <tr>
                    <td class="mb4">Move Size:</td>
                    <td class="mb4">{{ app('request')->input('mvsz') }}</td>
                </tr>
                <tr>
                    <td class="mb4">Duration:</td>
                    <td class="mb4" id="duration"></td>
                </tr>
                <tr>
                    <td class="mb4">Distance:</td>
                    <td class="mb4" id="distance"></td>
                </tr>
            </table>
            <div id="map" style="width: 300px; height: 300px; float: left;"></div>

          </div>

    </div>
</div>
                    <div class="row col-mb-50 col-mb-lg-80">

                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="section dark pt-0 mb-0 bg-color"
                style="background: url('images/bg-2.png') no-repeat center bottom / 100%; overflow: visible">
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
        </div>
    </section>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD605EfQQCtgbtE3Bj8I9uMnRHkC4FzyQM"></script>

    <script type="text/javascript">
        var directionsService = new google.maps.DirectionsService();
        var directionsDisplay = new google.maps.DirectionsRenderer();

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 7,
            mapTypeId: google.maps.MapTypeId.ROADMAP
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
