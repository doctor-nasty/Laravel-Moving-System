@extends('layouts.master', ['title' => 'Car Shipping'])




@section("content")
<div class="section dark mb-0"
style="background: linear-gradient(to right, rgba(25,102,221,0.2), rgba(25,102,221,0.5)), url('/images/carshipping.png') no-repeat center center / cover; min-height: 400px">
<div class="container">
    <h2>Car Shipping</h2>

    <div class="row justify-content-right mb-4">
            <!-- <a href="" data-lightbox="iframe" class="play-video ms-3"><i class="icon-play"></i></a> -->
            <div class="col-lg-6">
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
<div class="clear"></div>
<svg class="svg-curve" viewBox="0 0 1463 188.03">
    <path style="fill:#FFF;" d="M-.5,288.5s297-175,792-97,599,52,671,25v143H-.5Z"
        transform="translate(0 -171.47)" />
</svg>
</div>
<div class="section section-features bg-transparent mt-0 p-0 clearfix">
    <div class="container clearfix">
        <div class="row col-mb-50 col-mb-lg-80">
            <div class="col-lg-12 justify-content-center" id="svctxt">
                <p><strong>What You Need To Know About Car Shipping</strong></p>

                <p>You know that feeling when you&#39;re driving down the highway with your favorite tunes blaring and suddenly realize you&#39;re in the wrong lane? You scramble to get back on track but then think: &quot;I could have avoided this situation if I&#39;d just shipped my car.&quot; If you&#39;ve ever had that experience or prefer not to deal with the headache of driving across the country, we&#39;re here to help. In this article, we&#39;ll answer all your questions about shipping a vehicle from its original location&mdash;whether it be a personal trip or business-related&mdash;to its final destination.</p>

                <p>&nbsp;</p>

                <p><strong>What Is Car Shipping?</strong></p>

                <p>Car shipping is transporting a vehicle from one location to another. It can be done by land, air, or sea, depending on your needs and budget. The practice of car shipping has become more common in recent years as people move out of state more frequently than they used to.</p>

                <p>&nbsp;</p>

                <p><strong>How Does Car Shipping Work?</strong></p>

                <p>Car shipping companies use a variety of methods to transport vehicles. These include trucks, trains, and ships. Trucks are the most common method of car shipping, with rail and ship being used in some cases.</p>

                <p>If you&#39;re looking for a reliable company that can transport your vehicle safely from point A to point B while keeping it in mint condition throughout the journey (and beyond), there are several things you should know about how this process works:</p>

                <p>&nbsp;</p>

                <p><strong>What Is The Advantage of Car Shipping?</strong></p>

                <p>You can save money on gas and parking fees. If you live in a large city, it might be impossible to find a place to park your car for the duration of your trip. And even if you could, parking in busy areas can be expensive! Even if we ignore those costs, other expenses are associated with owning a vehicle: maintenance (oil changes), registration fees every year or two when your license plate expires, insurance premiums...the list goes on! Car shipping companies take care of all these expenses for you so that when they deliver your vehicle to its new location, it will already have been checked over by professionals and be ready for use without any additional cost on your part.</p>

                <p>&nbsp;</p>

                <p><strong>Where Can I Get A Quote For My Vehicle Shipping?</strong></p>

                <p>Before you ship your car, it&#39;s essential to get a quote from a company that will provide reliable and affordable service. You can find these companies online or ask friends for their recommendations. Once you&#39;ve found several options, check out the following information about each one:</p>

                <p>Reputation - How long has this company been around? Do they have any complaints on review sites like Yelp or Better Business Bureau? If so, what are they complaining about (high fees, poor customer service)?</p>

                <p>Free Quotes - Some companies offer free quotes while others charge money upfront before giving any information about their services; make sure you know which type of business model your chosen car shipping company uses before deciding whether or not they&#39;re suitable for your needs! * Insurance Coverage - Does this company offer full-coverage insurance coverage during transit? If so, then great but if not, maybe try another provider instead since it could save both time &amp; money in case anything happens while transporting vehicles across state lines/international borders, etcetera...</p>

                <p>&nbsp;</p>

                <p><strong>How Long Does It Take To Ship My Vehicle?</strong></p>

                <p>If you&#39;re shipping your vehicle across the country, it can take up to a week. If you&#39;re shipping within the state and only need to travel a few hundred miles, then it may only take four days for your car to arrive at its destination. You&#39;ll want to consider these factors when choosing which carrier is best for your needs before placing an order with them.</p>

                <p>&nbsp;</p>

                <p><strong>How To Choose The Right Car Shipping Company</strong></p>

                <p>Shipping a car can be a daunting task, but with the right car shipping company, it can be easy and stress-free. Here are some tips to help you choose the right car shipping company:</p>

                <p>1. Compare prices and services</p>

                <p>When comparing car shipping companies, look at their prices and services. Some companies may charge more for essential services but offer more comprehensive packages. Also, consider how quickly the company will ship your car and whether they have any special requirements, such as needing your vehicle placed on a flatbed truck.</p>

                <p>2. Determine your needs</p>

                <p>Before choosing a car shipping company, make sure you understand your needs. Do you need a temporary storage location for your vehicle? Or do you need someone to pick up and deliver your vehicle? And what kind of transportation is necessary? Are you looking for ground or air transportation?</p>

                <p>3. Request a quote</p>

                <p>Once you have determined your needs, it&#39;s time to request a quote from several different car shipping companies. Request quotes for both domestic and international shipments. It&#39;s important to compare not only the cost of the service but also the timeframe of delivery and any required transportation accommodations (e.g., size/weight restrictions). Remember that not all carriers offer free quotes!</p>

                <p>&nbsp;</p>

                <p><strong>Conclusion</strong></p>

                <p>Thank you for reading our article on car shipping. In this piece, we have outlined the key things to know about car shipping to help make the process as smooth as possible for you and your vehicle. From choosing a reputable carrier to packing your vehicle securely, our guide has everything you need to get moving in the right direction. So whether you are ready to start planning your next road trip or want to ensure a smooth and worry-free experience, read on for all the information you need!</p>
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
