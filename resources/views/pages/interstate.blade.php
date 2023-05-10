@extends('layouts.master', ['title' => 'Long Distance Moving'])




@section('content')
    <div class="section dark mb-0"
        style="background: linear-gradient(to right, rgba(25,102,221,0.2), rgba(25,102,221,0.5)), url('/images/section/ld.jpg') no-repeat center center / cover; min-height: 400px">
        <div class="container">
            <h2>Long Distance Moving</h2>

            <div class="row justify-content-right mb-4">
                <!-- <a href="" data-lightbox="iframe" class="play-video ms-3"><i class="icon-play"></i></a> -->
                <div class="col-lg-6">
                    <p class="mb-5 text-white text-shadow">Here we have collected useful guides and information that you should know
                        when
                        you decide to relocate. With years of experience helping
                        Americans relocate we know what are
                        the important aspects that you should be aware to. We hope you find this useful.</p>
                    <h3 class="mb-2 text-white">Long Distance Moving Guides:</h3>
                    <div class="d-flex">
                        <ul class="col-6 iconlist">
                            <li class="my-2"><i class="icon-line-circle-check fw-light"></i> <span
                                    class="ps-2 text-white text-shadow">100%
                                    Trustable</span></li>
                            <li class="my-2"><i class="icon-line-circle-check fw-light"></i> <span
                                    class="ps-2 text-white text-shadow">100%
                                    Safe &amp; Secure</span></li>
                            <li class="my-2"><i class="icon-line-circle-check fw-light"></i> <span
                                    class="ps-2 text-white text-shadow">On-Time Delivery</span></li>
                        </ul>
                        <ul class="col-6 iconlist">
                            <li class="my-2"><i class="icon-line-circle-check fw-light"></i> <span
                                    class="ps-2 text-white text-shadow">24x7
                                    Support</span></li>
                            <li class="my-2"><i class="icon-line-circle-check fw-light"></i> <span
                                    class="ps-2 text-white text-shadow">No
                                    Extra Payments</span></li>
                            <li class="my-2"><i class="icon-line-circle-check fw-light"></i> <span
                                    class="ps-2 text-white text-shadow">Also
                                    Deliver on Sunday</span></li>
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
                                data-toggle="tab">Interstate</a></li>
                    </ul>
                    <div class="tab-content rounded-bottom shadow bg-white py-4 px-5">
                        <div role="tabpanel"
                            class="tab-pane @if ($errors->count() == 0) active @endif @error('movingfromzip1') active @enderror @error('movingtozip1') active @enderror @error('movingdate1') active @enderror @error('movesize1') active @enderror"
                            id="interstate">

                            @include('forms.interstate.index')
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
                    <h3>Long Distance Moving Tips For Beginners</h3>

                    <p>Moving long distances can be a complicated and stressful process. It's essential to get everything right the first time, so here are our tips for making sure your move goes smoothly:</p>
                        <ol>
                    <li><h4>Do your research:</h4><p>The first step to planning a long-distance move is to find out who the best movers in your area are and what makes them great. You can start by checking out reviews on Yelp, Google, and Angie's List. If you have friends or family members who have recently moved, ask them for recommendations; sometimes, it's easier for us to trust someone we know than an anonymous company name! Once you've narrowed down a few promising companies, it's time for our favorite part of prepping: asking questions! When contacting likely moving companies ask about their policies regarding insurance coverage (how much do they offer?), any extra charges they might apply (like fuel surcharges), how long they've been in business, and why they think they're qualified enough to handle your job properly.</p></li>

                        <li><h4>Plan well in advance:</h4><p>Planning is the key to a successful move. If you plan well in advance, you can save time, money, and stress during the moving process.</p></li>

                        <li><h4>Some of the advantages of planning your move well in advance:</h4><p>You'll be able to avoid last-minute mistakes that could cost extra money or time. For example, if you don't have furniture delivery scheduled until two weeks before your relocation date but realize that it will take longer than expected for your movers to pack up all their trucks before heading out on their next job (or if they take too long). Having another company pick up where they left off would mean paying additional fees and possibly losing some stuff! Or maybe one day before leaving town, someone mentions something about needing another box...or five...and suddenly there's no room left because everything has already been packed into containers by then! These things often happen when people decide not to have enough time ahead.</p></li>
                        </ol>
                    <h4>Find a reputable mover</h4>
                    <p>When it comes to moving companies, you need to do your research. There are many things to consider when choosing a mover:</p>
                    <p>Is the company reputable? Look up reviews online and ask friends and family who have moved recently if they could recommend any movers. You can also check out their website for information about their services and pricing or call them directly for more details.</p>
                    <p>How much does it cost? Make sure that you get an estimate from the company before agreeing on anything else (and make sure that you find out exactly how much all of your items weigh).</p>
                    <p>Is my stuff insured? It's essential not only for yourself but also for your belongings-if something gets damaged or lost during transit, having insurance will help cover those costs and give you some peace of mind during such stressful times!</p>
                    <h4>Make sure you have the right equipment to move</h4>
                    <p>To move, you'll need some equipment. The first thing is a vehicle that can handle the load of all your stuff (and your family). If you're driving a car, chances are it won't be able to hold everything on its own-so renting a truck or van will be necessary.</p>
                        <p>If you don't want to pay for another vehicle rental, consider using something else instead: trailers and moving dollies are excellent options if space is limited in your car or truck. They also make loading much more accessible than cramming everything into one vehicle!</p>
                        <p>A hand truck might seem like an unnecessary expense at first glance, but when it comes time for unloading, having one will make life much easier when carrying heavy items through tight spaces like doorways without damaging them in transit or dropping them onto hard surfaces below their feet level (like concrete floors). A furniture dolly may also come in handy if there's any doubt about whether those new Ikea shelves will fit through sure doorways once they're assembled at home; these devices allow users to roll pieces across hallways instead of lifting them overhead height every single time they need access inside rooms where no other entrances exist nearby!</p>
                    <h4>Know what to expect when moving long distances</h4>
                    <p>When you're moving long distances, there are a few things to remember. First and foremost, know what to expect from your move.</p>
                    <p>You can expect that it will take longer than an interstate move and cost more money because of the added distance between your old home and your new one. You should also be prepared for logistical challenges (like shipping furniture) and emotional ones (being separated from loved ones).</p>
                    <p>If possible, start planning for your long-distance relocation several months before the actual departure date so that everything goes smoothly when it comes time for your family members or friends to pack up their belongings and head out on their new adventure!</p>
                    <h4>Pack smartly and use boxes that will protect fragile items from damage</h4>
                    <p>Don't be afraid to buy new boxes if you need them. It's better to spend a little extra money on good quality supplies than have your belongings damaged during the move.</p>
                    <p>Use sturdy, corrugated cardboard boxes instead of flimsy plastic ones or old, worn-out shoe boxes for packing items like books or clothing. These materials can better withstand heavy loads and protect your belongings from crushing or damage, transit-especially when they're stacked on top of each other! Their sturdiness makes them easier to lift when complete (and heavier), so ensure everyone helping out has strong arms before loading all those heavy pieces into their respective vehicles (or even just carrying them upstairs). If possible, try removing any unnecessary packing materials, such as newspaper clippings; these only weigh down your load unnecessarily while adding no real value whatsoever!</p>
                    <h4>Use a moving checklist to keep track of everything you need for the move</h4>
                    <p>When you're moving, it can be easy to forget something important. A simple checklist will help you ensure you don't leave anything behind during your move.</p>
                    <p>The best way to get started is by making a list of all the items in your home and adding them one by one as they come up in conversation with friends or family members who are helping with the move.</p>
                    <p>Be careful about packing non-essential items, such as personal documents, clothes, and small household items that can be easily replaced at a later date if they are lost or damaged en route.</p>
                    <p>Although it may seem like a good idea to pack all your documents, clothes, and small household items in boxes, this can be a waste of time and money. If something gets lost in transit that you don't need right away (such as an old college textbook), you should consider waiting until after the move to bring it over. It's also wise not to pack any expensive or sentimental items because they could get damaged during the long-distance moving process.</p>
                    <h3>Takeaway</h3>
                    <p>The first step to moving long distances is to know what to expect. You'll need time to pack and prepare for the move, so ensure you have enough time before your move date.</p>
                    <p>Ensure you have the right packing equipment, including boxes and packing tape (or any other adhesive). Pack smartly using containers that protect fragile items from damage during transit-you can also buy specialty moving supplies at most big-box stores or online retailers like Amazon.com. Use a checklist to keep track of everything else needed for your relocation; this includes any furniture rental services if required for both locations!</p>
                    <p>Now that you know how to move long distances, the next step is to get started. You can start by doing some research on potential movers and choosing one that has a good reputation for quality service at reasonable rates. Then plan for no surprises when it comes time for your move day!</p>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <ul class="iconlist m-0 pe-5" id="zpcd">
            @foreach ($states as $state)
                <li><a href="{{ url('interstate') }}/{{ $state->state_code }}"
                        title="Long Distance Moving {{ $state->state_name }} Long Distance Moving">Long Distance Moving
                        {{ $state->state_code }}</a></li>
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
