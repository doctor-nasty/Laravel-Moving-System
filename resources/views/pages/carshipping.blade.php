@extends('layouts.master', ['title' => 'Car Shipping'])




@section("content")
<div class="section dark mb-0"
style="background: linear-gradient(to right, rgba(25,102,221,0.2), rgba(25,102,221,0.5)), url('/images/carshipping.png') no-repeat center / cover; min-height: 400px;height: 650px;">
<div class="container">
    <h2>Car Shipping</h2>

    <div class="row justify-content-right mb-4">
            <!-- <a href="" data-lightbox="iframe" class="play-video ms-3"><i class="icon-play"></i></a> -->
            <div class="col-lg-6" style="background: rgba(0, 50, 88, 0.5);">
                <p class="mb-5 text-white text-shadow">Here we have collected useful guides and information that you should know
                    when
                    you decide to relocate. With years of experience helping
                    Americans relocate we know what are
                    the important aspects that you should be aware to. We hope you find this useful.</p>
                <h3 class="mb-2 text-white">Car Shipping Guides:</h3>
                <div class="d-flex">
                    <ul class="col-6 iconlist">
                        <li class="my-2"><i class="icon-line-circle-check fw-light"></i> <span
                                class="ps-2 text-white text-shadow">Verified Movers</span></li>
                        <li class="my-2"><i class="icon-line-circle-check fw-light"></i> <span
                                class="ps-2 text-white text-shadow">Licensed Company</span></li>
                        <li class="my-2"><i class="icon-line-circle-check fw-light"></i> <span
                                class="ps-2 text-white text-shadow">Track Items by App</span></li>
                    </ul>
                    <ul class="col-6 iconlist">
                        <li class="my-2"><i class="icon-line-circle-check fw-light"></i> <span
                                class="ps-2 text-white text-shadow">Minimum 1 Mover Free</span></li>
                        <li class="my-2"><i class="icon-line-circle-check fw-light"></i> <span
                                class="ps-2 text-white text-shadow">International Delivery</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <p class="text-white-50"></p>
                <ul class="nav nav-tabs nav-fill flex-column border-bottom-0 flex-md-row bg-color mt-4" role="tablist"
                    id="tabs" data-tabs="tabs">
                    <li class="nav-item @if ($errors->count() == 0) active @endif @error('movingfromzip1') active @enderror @error('movingtozip1') active @enderror @error('movingdate1') active @enderror @error('movesize1') active @enderror"
                        role="tabpanel"><a
                            class="nav-link py-3 @if ($errors->count() == 0) active @endif @error('movingfromzip1') active @enderror @error('movingtozip1') active @enderror @error('movingdate1') active @enderror @error('movesize1') active @enderror"
                            href="#interstate" aria-controls="interstate" role="tab"
                            data-toggle="tab">Car Shipping</a></li>
                </ul>
                <div class="tab-content rounded-bottom shadow bg-white py-4 px-5">
                    <div role="tabpanel"
                        class="tab-pane @if ($errors->count() == 0) active @endif @error('movingfromzip1') active @enderror @error('movingtozip1') active @enderror @error('movingdate1') active @enderror @error('movesize1') active @enderror"
                        id="interstate">
                        @include('forms.carshipping.index')
                    </div>
                </div>
            </div>
    </div>
</div>

</div>
<div class="section section-features bg-transparent mt-0 p-0 clearfix">
    <div class="container clearfix">
        <div class="row col-mb-50 col-mb-lg-80">
            <div class="col-lg-12 justify-content-center" id="svctxt">
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
<div class="d-flex justify-content-center">
    <ul class="iconlist m-0 pe-5" id="zpcd">
        @foreach ($states as $state)
        <li><a href="{{ url('carshipping') }}/{{$state->state_code}}" title="{{$state->state_name}} Car Shipping">Car Shipping {{ $state->state_code }} </a></li>
        @endforeach
    </ul>
</div>
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
                    <h3 class="fw-semibold">Packing For Moving</h3>
                    <p class="text-muted">Packing the right way is crucial in order to keep your belonging
                        safe.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="feature-box media-box">
                <div class="fbox-icon position-relative mb-4">
                    <i class="icon-house-user"></i>
                </div>
                <div class="fbox-content">
                    <h3 class="fw-semibold">Real Estate & Housing</h3>
                    <p class="text-muted">Finding a home for rent or a house to buy. Learn about the
                        housing market you intend to move to</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="feature-box media-box">
                <div class="fbox-icon position-relative mb-4">
                    <i class="icon-city"></i>
                </div>
                <div class="fbox-content">
                    <h3 class="fw-semibold">Utilities</h3>
                    <p class="text-muted">Gas & Electric - Contacts and information of local utility
                        providers</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="feature-box media-box">
                <div class="fbox-icon position-relative mb-4">
                    <i class="icon-school"></i>
                </div>
                <div class="fbox-content">
                    <h3 class="fw-semibold">Education</h3>
                    <p class="text-muted">Schooling and education is an important aspect or relocating to a
                        new place.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="feature-box media-box">
                <div class="fbox-icon position-relative mb-4">
                    <i class="icon-deploydog"></i>
                </div>
                <div class="fbox-content">
                    <h3 class="fw-semibold">Pets</h3>
                    <p class="text-muted">Your loved pet in a new habitat. How should you prepare? What
                        should you know?</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="feature-box media-box">
                <div class="fbox-icon position-relative mb-4">
                    <i class="icon-phone"></i>
                </div>
                <div class="fbox-content">
                    <h3 class="fw-semibold">Telecom</h3>
                    <p class="text-muted">New place, new area code, new internet providers - what are your
                        telecommunication options in
                        your new residence...</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
