@extends('layouts.master', ['title' => 'MOVINGWYZ'])




@section('content')
    <section id="slider" class="slider-element bg-color">
        <div class="container mt-4" style="z-index: 2">
            @include('partials.headertext')
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <ul class="nav nav-tabs nav-justified flex-column border-bottom-0 flex-md-row bg-color mt-4"
                        role="tablist">
                        <li class="nav-item">
                            <a class="nav-link py-3 active" id="home-moving-tab" data-bs-toggle="tab" href="#home-moving"
                                role="tab" aria-controls="home-moving" aria-selected="true">Car Shipping</a>
                        </li>
                    </ul>
                    <div class="tab-content rounded-bottom shadow bg-white py-4 px-5">
                        <div class="tab-pane fade show active" id="home-moving" role="tabpanel"
                            aria-labelledby="home-moving-tab">
                            <p class="mb-4">Moving Details:</p>
                                <div class="form-result">

                                </div>
                                <form action="{{ route('carForm.create.step.three.post') }}"
                                method="post">
                                {{ csrf_field() }}
                                        <table class="table">
                                            <tr>
                                                <td class="mb4">Moving From:</td>
                                                <td class="mb4">{{ $cityfrom }}, {{ $forms->carshp_fr_zip }}</td>
                                            </tr>
                                            <tr>
                                                <td class="mb4">Moving To:</td>
                                                <td class="mb4">{{ $cityto }}, {{ $forms->carshp_to_zip }}</td>
                                            </tr>
                                            <tr>
                                                <td class="mb4">Moving Date:</td>
                                                <td class="mb4">{{ $forms->carshp_dt }}</td>
                                            </tr>
                                            <tr>
                                                <td class="mb4">Car:</td>
                                                <td class="mb4">{{ $forms->carshp_vhyr }} {{ $forms->carshp_vhmk }} {{ $forms->carshp_vhmdl }}</td>
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

                                        <div class="card-footer text-right">
                                            <button type="submit"
                                                class="btn btn-color text-blue fw-medium w-100 py-2 mt-2">Submit</button>
                                        </div>
                            </form>
                                <script src="https://maps.googleapis.com/maps/api/js?key="></script>

                                <script type="text/javascript">
                                    var directionsService = new google.maps.DirectionsService();
                                    var directionsDisplay = new google.maps.DirectionsRenderer();

                                    var map = new google.maps.Map(document.getElementById('map'), {
                                        zoom: 7,
                                        mapTypeId: google.maps.MapTypeId.ROADMAP
                                    });

                                    directionsDisplay.setMap(map);

                                    var request = {
                                        origin: '{{ $cityfrom }}',
                                        destination: '{{ $cityto }}',
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

                        </div>
                    </div>
                </div>
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
@endsection
