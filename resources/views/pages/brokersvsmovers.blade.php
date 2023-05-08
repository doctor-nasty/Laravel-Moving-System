@extends('layouts.master', ['title' => 'Brokers Vs Movers'])

@php
$movesize = App\Models\mvsz::get();
$countries = \App\Models\Country::orderBy('country','asc')->get();
$continents = \App\Models\Country::orderBy('continent','asc')->get()->unique('continent');
$cars = \App\Models\Cars::orderBy('make','asc')->orderBy('year','desc')->get();
$carsUnique = $cars->unique('make');
$yearUnique = $cars->unique('year');
$states = App\Models\states::where('status', 1)->get();
@endphp


@section('content')
<section id="slider" class="slider-element bg-color">
    <div class="container mt-4" style="z-index: 2">
        @include('partials.headertext')

        <div class="row justify-content-center formscontent">
            <div class="col-lg-6" id="ifrms">
                <p class="text-white-50"></p>
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
        <div class="content-wrap p-0">
            <div class="py-6 dark" style="background-color: #061a35;">
                <div class="container mb-5">
                    <div class="row justify-content-between">
                        <div class="col-lg-12">
                            <p><strong>Moving Brokers and Movers; What&rsquo;s the Difference?<span class="Apple-converted-space">&nbsp;</span></strong></p>
                            <p>As you prepare to move, you may find and reach out to different moving companies to get an estimate for your move. Unfortunately, because of how saturated the internet is with moving companies, it can be hard to pinpoint which one is legitimate and which one is not. This is where moving brokers come in. Understanding the difference between a mover and a broker can relieve stress and help you make the right decisions.<span class="Apple-converted-space">&nbsp;</span></p>
                            <p><strong>Who are Moving Brokers?<span class="Apple-converted-space">&nbsp;</span></strong></p>
                            <p>Moving brokers act as middlemen between a person planning to move and the moving company that will handle the move. Brokers do not own the equipment or moving vehicles required to perform successful moves and do not have moving employees.<span class="Apple-converted-space">&nbsp;</span></p>
                            <p>Simply put, they are the sales representatives in the entire process. Brokers accept deposits and provide the invoice and quotes on behalf of the moving company. They usually have a network of movers they represent, so if you meet a moving broker, they&rsquo;ll most likely choose a mover from their network.<span class="Apple-converted-space">&nbsp;</span></p>
                            <p>The only problem is most of the time, you may not be able to verify the authenticity of the moving company when you use a broker. Sometimes the brokers are not even located in the same region where you need a mover, but they have a network there. Using a broker can be a great idea, but some things can go wrong.<span class="Apple-converted-space">&nbsp;</span></p>
                            <p>For instance, a moving broker may book an unlicensed moving company for you or give you a low estimate, then have the mover charge you higher. They may not be able to answer questions about your moving concerns because most brokers barely have experience moving.<span class="Apple-converted-space">&nbsp;</span></p>
                            <p>Not all brokers have a strong network of movers, but they won&rsquo;t mention it to you. So, they&rsquo;ll struggle to look for movers for you but act like they already have one on lockdown to help.<span class="Apple-converted-space">&nbsp;</span></p>
                            <p><strong>How to Protect Yourself from Broker Mishaps<span class="Apple-converted-space">&nbsp;</span></strong></p>
                            <p>When you&rsquo;re speaking to a potential mover, it might be a broker, but they will not act like one. So, the first thing you should do is ask if they are brokers or movers. To make sure they are movers, confirm if they have moving equipment like trucks and their own crew to help with your move.<span class="Apple-converted-space">&nbsp;</span></p>
                            <p>If they answer yes, you can relax and be 80% sure you are talking to a mover. If they answer no, then you are most likely talking to a broker.</p>
                            <p>According to the Federal Motor Carrier Safety Administration, there are 8 easy rules to follow to protect yourself from any possible mishaps if you decide to work with a broker.<span class="Apple-converted-space">&nbsp;</span></p>
                            <ol>
                            <li>Ensure they are registered and licensed with the FMCSA, whether they are movers or brokers. You can do this by confirming on their <a href="https://www.fmcsa.dot.gov/protect-your-move/search-mover"><strong>official website</strong></a><strong>.</strong></li>
                            <li>Ensure that they use only registered movers because unregistered movers may not follow the rules of the FMCA, and your property will be at risk.<span class="Apple-converted-space">&nbsp;</span></li>
                            </ol>
                            <p>&nbsp;</p>
                            <ol start="3">
                            <li>Ensure that they provide the FMCA pamphlet &ldquo;Your Rights and Responsibility when you move&rdquo; and the FMCA &ldquo;Ready to Move&rdquo; brochure. This is so you can understand your rights when using a mover.<span class="Apple-converted-space">&nbsp;</span></li>
                            </ol>
                            <p>&nbsp;</p>
                            <ol start="4">
                            <li>Ensure that they have written contracts with the movers in their network<span class="Apple-converted-space">&nbsp;</span></li>
                            </ol>
                            <p>&nbsp;</p>
                            <ol start="5">
                            <li>Ensure that they use only registered movers because unregistered movers may not follow the rules of the FMCA, and your property will be at risk.<span class="Apple-converted-space">&nbsp;</span></li>
                            </ol>
                            <p>&nbsp;</p>
                            <ol start="6">
                            <li>Ensure they provide a binding and non-binding estimate on the moving charges from the mover they will assign your move. Binding estimates guarantee how much your move will cost based on the movers&rsquo; estimate. In contrast, a non-binding estimate is what movers think the move will cost, even though they can charge you an extra 10% of the original at the end of the move.<span class="Apple-converted-space">&nbsp;</span></li>
                            </ol>
                            <p>&nbsp;</p>
                            <ol start="7">
                            <li>Ensure that they have a physical location and are not operating strictly virtually. They should also show their motor carrier numbers and clearly state that they are brokers, not movers. Open information policies can help solidify your trust in their reputation.<span class="Apple-converted-space">&nbsp;</span></li>
                            </ol>
                            <p>&nbsp;</p>
                            <ol start="8">
                            <li>Ensure that the moving company carries out an in-home survey of your property. This will ensure that they give you a more accurate estimate. Only movers that cannot be trusted will say an in-home survey is unnecessary because this will give them the leeway to charge you high for additional goods. <span class="Apple-converted-space">&nbsp;</span></li>
                            </ol>
                            <p>To confirm the reputation of your broker, check their complaint history and license on the FMCSA <a href="https://www.fmcsa.dot.gov/protect-your-move"><strong>&ldquo;protect your move&rdquo;</strong></a> page. Moving Wyze connects you with movers directly without any middlemen. So, when you speak to any of our movers, you can rest assured that they are licensed and well-trained for the job.<span class="Apple-converted-space">&nbsp;</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </section>
@endsection
