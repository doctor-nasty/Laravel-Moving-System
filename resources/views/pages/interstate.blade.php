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
                    <p style="text-align:center"><span style="font-size:22pt"><span style="font-family:Candara,sans-serif"><strong><u>Long Distance Moving Tips For Beginners</u></strong></span></span></p>

                    <p>&nbsp;</p>

                    <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Whether you&rsquo;re moving across the country or just down the block, it can be a daunting task. There are so many details to take care of and so much to think about. If you&rsquo;re new to long distance moving, here are some tips to help you get started.</span></span></p>

                    <p>&nbsp;</p>

                    <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">1. Get organized: When you&rsquo;re packing your boxes, make sure you pack them in an orderly fashion so that everything goes smoothly when it comes time to unpack. You don&rsquo;t want to waste any time unpacking and then having to start all over again because your boxes were all scattered around.</span></span></p>

                    <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">2. research the best long distance moving companies: Once you have your boxes prepared, it&rsquo;s time to find a long distance moving company that will best suit your needs. Do your research online and compare prices before making a decision.</span></span></p>

                    <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">3. plan ahead: It&rsquo;s important to have a schedule for when everything will be delivered and when you will be able to start unpacking. This way, you won&rsquo;t have any surprises along the way and everything will go as planned.&nbsp;</span></span></p>

                    <p>&nbsp;</p>

                    <p style="text-align:justify"><span style="font-size:13pt"><span style="font-family:Calibri,sans-serif"><strong>What Are The Steps To A Successful Long Distance Moving?</strong></span></span></p>

                    <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Step 1: Determine what you need to move</span></span></p>

                    <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Begin by listing all of the belongings you will need to transport. This can include furniture, electronics, clothing, and other household items. Once you have a list, assess how much each item weighs and factor that into your planning. For example, if you are moving large pieces of furniture, factor in the weight and cost of delivery/removal.</span></span></p>

                    <p>&nbsp;</p>

                    <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Step 2: Figure out your budget</span></span></p>

                    <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Next, calculate your budget based on the weight and size of each item. Remember to account for any necessary delivery or removal fees. Additionally, consider any taxes or fees associated with transferring ownership of property.</span></span></p>

                    <p>&nbsp;</p>

                    <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Step 3: Choose a moving company</span></span></p>

                    <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Once you have calculated your budget and gathered your belongings, it&#39;s time to choose a moving company. Do some research online to compare prices and services offered by different companies. Consider factors such as reputation, number of reviews posted online (or by friends), location of company headquarters, types of services offered (local vs long distance), and price point. Select a company that best suits your needs and budget. Be sure to have an accurate estimate of how much it will cost to move everything!</span></span></p>

                    <p>&nbsp;</p>

                    <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Step 4: Plan your move date &amp; time frame</span></span></p>

                    <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Once you have selected a moving company, plan your move date and time frame. Scheduling an early morning or evening move will usually save money on costs associated with transportation (i.e., fuel costs). However, remember that an early morning or evening move may be difficult to coordinate with your work schedule. Try to plan your move around your work schedule and other important commitments as much as possible.</span></span></p>

                    <p>&nbsp;</p>

                    <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Step 5: Get started!</span></span></p>

                    <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Now that you have all of the details about your move, it&#39;s time to get started! Start packing your belongings and set a moving date/time frame. Be sure to contact the moving company in advance to confirm their scheduling availability and any additional requirements (i.e., extra time for unpacking, special packaging material).</span></span></p>

                    <p>&nbsp;</p>

                    <p style="text-align:justify"><span style="font-size:13pt"><span style="font-family:Calibri,sans-serif"><strong>How To Pack Your Belongings For A Long Distance Move</strong></span></span></p>

                    <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">When it comes to packing for a long distance move, there are a few things that you&#39;ll want to keep in mind. Start by making a list of everything that you&#39;re taking with you and check it twice.</span></span></p>

                    <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Once you have an exact count, start packing your belongings into boxes or containers by category.&nbsp;</span></span></p>

                    <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Here are some tips on how to pack your belongings for a long distance move:</span></span></p>

                    <p style="text-align:justify">&nbsp;</p>

                    <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">1. Decide What You&#39;ll Pack and Why</span></span></p>

                    <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Before packing anything, make sure that you have a good reason for taking each item with you on your trip. Items that are essential for your daily life should go in one box, while items that are just extra clutter can be packed away until after the move is complete.</span></span></p>

                    <p style="text-align:justify">&nbsp;</p>

                    <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">2. Don&#39;t Overpack Your Boxes or Containers</span></span></p>

                    <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Pack as much as you need but don&#39;t overfill your boxes or containers. This will cause them to take up more space and be harder to handle when loading into the vehicle or moving into the new house/apartment. It&#39;s also easier to damage fragile objects if they&#39;re packed too tightly or if there&#39;s excess weight pressing down on them.</span></span></p>

                    <p style="text-align:justify">&nbsp;</p>

                    <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">3. Label Everything Wisely</span></span></p>

                    <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Label each container or box with the name of the item inside so it&#39;s easy to find what you&#39;re looking for when unpacking later. You may also want to write down any important information about the item, such as its size and weight. This will help prevent any potential</span></span></p>

                    <p>&nbsp;</p>

                    <p style="text-align:justify"><span style="font-size:13pt"><span style="font-family:Calibri,sans-serif"><strong>How To Prep Your Home For A Long Distance Move</strong></span></span></p>

                    <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">When you are ready to move to a new location, one of the most important things you can do is to prepare your home for the big move.</span></span></p>

                    <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Here are some tips for prepping your home for a long distance move:</span></span></p>

                    <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">1. Clean and declutter your home. This is especially important if you have a lot of stuff! Having a clean and organized home will make the moving process much easier.</span></span></p>

                    <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">2. Pack light. If you can, try to pack as little as possible. This will make packing and unpacking less stressful and more enjoyable.</span></span></p>

                    <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">3. Arrange furniture in advance. This will help you figure out where everything is going to go once you get there.</span></span></p>

                    <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">4. Make copies of important documents and photos. Make sure to keep copies of all of your important documents, photos, insurance policies, and other information before you move so that you don&rsquo;t have to worry about losing anything during the move process.</span></span></p>

                    <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">5. Decide what needs to be moved and when it needs to be moved. Some things may need to be moved sooner than others depending on how far away your new home is from where you are currently living. Plan ahead so that everything goes smoothly on moving day!</span></span></p>

                    <p style="text-align:justify"><br />
                    &nbsp;</p>
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
