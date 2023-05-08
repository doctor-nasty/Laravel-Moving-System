@extends('layouts.master', ['title' => 'Car Shipping Tips'])

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
                            <p style="text-align:center"><span style="font-size:22pt"><span style="font-family:Candara,sans-serif"><strong><u>What You Need To Know About Car Shipping</u></strong></span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Shipping a car can be a daunting task, regardless of the method you choose. Whether you&rsquo;re shipping a car domestically or internationally, there are certain details you need to know in order to avoid any hassles. In this article, we will cover the most important aspects of car shipping and help you make the process as smooth as possible. We hope this article will put your mind at ease and help you get your car shipped without any drama.</span></span></p>

                            <p>&nbsp;</p>

                            <p style="text-align:justify"><span style="font-size:13pt"><span style="font-family:Calibri,sans-serif"><strong>What Is Car Shipping?</strong></span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">If you&#39;re looking to get your car from A to B, shipping may be a good option for you. Here&#39;s what you need to know about car shipping.</span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">There are a few types of car shipping: ground, air, and ocean. Ground shipping is the most common, and it takes between two and four weeks to deliver your car from the time you place your order. Air shipments take between one and three days, but they&#39;re more expensive than ground shipments. Ocean shipping is the fastest option, but it&#39;s also the most expensive. It can take up to eight weeks for your car to arrive after you place your order.</span></span></p>

                            <p>&nbsp;</p>

                            <p style="text-align:justify"><span style="font-size:13pt"><span style="font-family:Calibri,sans-serif"><strong>How Does Car Shipping Work?</strong></span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">There are a few things you need to know about car shipping before you begin your order. First, the size and weight of your vehicle will affect how much it costs to ship. Second, make sure you have the required documentation ready, such as proof of insurance and registration. Third, be aware that there may be additional charges for customs or brokerage services. Finally, be aware that your car may not arrive at its destination in the same condition it was when it was shipped.</span></span></p>

                            <p>&nbsp;</p>

                            <p style="text-align:justify"><span style="font-size:13pt"><span style="font-family:Calibri,sans-serif"><strong>The Different Types Of Car Shipping</strong></span></span></p>

                            <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">There are many different types of car shipping, so it&#39;s important to know what you&#39;re getting yourself into before making a decision. Here are the three most common types of car shipping:</span></span></p>

                            <p>&nbsp;</p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">1. Piano Shipping</span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">This is the simplest type of car shipping - your vehicle is placed on a flatbed truck and taken to its final destination. This is the least expensive option, but it can be slow because there&#39;s no room for the vehicle to move quickly.</span></span><br />
                            &nbsp;</p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">2. Truck Shipping</span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">This is similar to piano shipping, but the vehicle is placed on a large truck with additional space for movement. Truck shipping is faster than piano shipping, but it&#39;s more expensive due to the added expense of the truck rental.</span></span><br />
                            &nbsp;</p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">3. Ship-From-Shipment</span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">This is the most expensive option, but it allows you to pick your own shipping company and schedule your delivery date. Ship-from-shipments also tend to be faster than other options because they use smaller trucks that can travel at faster speeds.</span></span></p>

                            <p>&nbsp;</p>

                            <p style="text-align:justify"><span style="font-size:13pt"><span style="font-family:Calibri,sans-serif"><strong>The Advantages Of Car Shipping</strong></span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">There are a number of reasons why car shipping can be a great option for moving your vehicle. First and foremost, car shipping is one of the safest ways to move a car. Compared to other methods such as trucking or moving by pallet, car shipping is significantly less risky. This is because there is no need to worry about accidents or damage caused during the transport process. Additionally, car shipping can be completed quickly and efficiently. This is because most companies only require the vehicle to be loaded onto their trucks and transported to the new destination. As long as all necessary documentation is provided, car shipping can typically take between two and four days to complete. Finally, car shipping typically costs less than other moving options. This is due to the fact that cars are generally smaller and lighter than other types of cargo, which makes them easier to move.</span></span></p>

                            <p>&nbsp;</p>

                            <p style="text-align:justify"><span style="font-size:13pt"><span style="font-family:Calibri,sans-serif"><strong>The Disadvantages Of Car Shipping</strong></span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">There are some major disadvantages of shipping a car across the country. First and foremost, is the time it takes to get a car from point A to point B. It can take anywhere from two to four weeks, which is significantly longer than the two to three days it would take to transport a regular piece of furniture.</span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Second is the cost of shipping. Car shipping can be expensive, especially if you&#39;re sending a large or heavy car. Thirdly, there&#39;s the potential for damage during transport. Even if the car goes without incident, something as simple as a broken window could result in costly repairs. Lastly, there&#39;s always the risk that the car won&#39;t arrive at its destination in one piece. Whether it&#39;s being damaged en route or lost in transit, there&#39;s always a chance something will go wrong when you ship your car.</span></span></p>

                            <p>&nbsp;</p>

                            <p style="text-align:justify"><span style="font-size:13pt"><span style="font-family:Calibri,sans-serif"><strong>How To Choose The Right Car Shipping Company</strong></span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Shipping a car can be a daunting task, but with the right car shipping company it can be easy and stress-free. Here are some tips to help you choose the right car shipping company:</span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">1. Compare prices and services</span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">When comparing car shipping companies, make sure to look at their prices and services. Some companies may charge more for basic services, but offer more comprehensive packages. Also consider how quickly the company will ship your car and whether they have any special requirements, such as needing your car to be placed on a flatbed truck.</span></span></p>

                            <p style="text-align:justify">&nbsp;</p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">2. Determine your needs</span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Before choosing a car shipping company, make sure you understand your needs. Do you just need a temporary storage location for your vehicle? Or do you need someone to pick up and deliver your vehicle? And what kind of transportation is necessary? Are you looking for ground or air transportation?</span></span></p>

                            <p>&nbsp;</p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">3. Request a quote</span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Once you have determined your needs, it&#39;s time to request a quote from several different car shipping companies. Request quotes for both domestic and international shipments. It&#39;s important to compare not only the cost of the service, but also the timeframe of delivery and any required transportation accommodations (e.g., size/weight restrictions). Remember that not all carriers offer free quotes!</span></span></p>

                            <p>&nbsp;</p>

                            <p style="text-align:justify"><span style="font-size:13pt"><span style="font-family:Calibri,sans-serif"><strong>Conclusion</strong></span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Thank you for reading our article on car shipping. In this piece, we have outlined the key things to know about car shipping in order to help make the process as smooth as possible for both you and your vehicle. From choosing a reputable carrier to packing your vehicle securely, our guide has everything you need to get moving in the right direction. So whether you are ready to start planning your next road trip or just want to ensure a smooth and worry-free experience, read on for all of the information you need!</span></span></p>

                            <p><br />
                            &nbsp;</p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </section>
@endsection
