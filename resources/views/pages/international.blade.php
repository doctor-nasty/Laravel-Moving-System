@extends('layouts.master', ['title' => 'International Moving'])



@section("content")
<div class="section dark mb-0"
style="background: linear-gradient(to right, rgba(25,102,221,0.2), rgba(25,102,221,0.5)), url('images/bg.png') no-repeat center center / cover; min-height: 400px">
<div class="container">
    <h2>International Moving</h2>

    <div class="row justify-content-right mb-4">
        <!-- <a href="" data-lightbox="iframe" class="play-video ms-3"><i class="icon-play"></i></a> -->
            <div class="col-lg-6">
                <p class="mb-5 text-white text-shadow">Here we have collected useful guides and information that you should know
                    when
                    you decide to relocate. With years of experience helping
                    Americans relocate we know what are
                    the important aspects that you should be aware to. We hope you find this useful.</p>
                <h3 class="mb-2 text-white text-shadow">International Moving Guides:</h3>
                <div class="d-flex">
                    <ul class="col-6 iconlist">
                        <li class="my-2"><i class="icon-line-circle-check fw-light"></i> <span
                                class="ps-2 text-white text-shadow">Verified Movers</span></li>
                        <li class="my-2"><i class="icon-line-circle-check fw-light"></i> <span
                                class="ps-2 text-white text-shadow">Licensed Company</span></li>
                        <li class="my-2"><i class="icon-line-circle-check fw-light"></i> <span
                                class="ps-2 text-white text-shadow">No
                                Hidden Charges</span></li>
                        <li class="my-2"><i class="icon-line-circle-check fw-light"></i> <span
                                class="ps-2 text-white text-shadow">Live
                                Chat</span></li>
                    </ul>
                    <ul class="col-6 iconlist">
                        <li class="my-2"><i class="icon-line-circle-check fw-light"></i> <span
                                class="ps-2 text-white text-shadow">Minimum 1 Mover Free</span></li>
                        <li class="my-2"><i class="icon-line-circle-check fw-light"></i> <span
                                class="ps-2 text-white text-shadow">Track Items by App</span></li>
                        <li class="my-2"><i class="icon-line-circle-check fw-light"></i> <span
                                class="ps-2 text-white text-shadow">International Delivery</span></li>
                        <li class="my-2"><i class="icon-line-circle-check fw-light"></i> <span
                                class="ps-2 text-white text-shadow">Door
                                to Door</span></li>
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
                            data-toggle="tab">International</a></li>
                </ul>
                <div class="tab-content rounded-bottom shadow bg-white py-4 px-5">
                    <div role="tabpanel"
                        class="tab-pane @if ($errors->count() == 0) active @endif @error('movingfromzip1') active @enderror @error('movingtozip1') active @enderror @error('movingdate1') active @enderror @error('movesize1') active @enderror"
                        id="interstate">
                        @include('forms.international.index')
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
                <p style="text-align:center"><span style="font-size:22pt"><span style="font-family:Candara,sans-serif"><strong><u>Best Ways To Prepare For International Moving</u></strong></span></span></p>

                <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">International moving is one of the biggest decisions you will ever make. It&rsquo;s important to make the right choices when it comes to selecting a mover and packing company, so that your move goes as smoothly as possible. In this blog post, we&rsquo;ll share some of our best tips for preparing for international moving. From choosing the right movers to making thorough research, these tips will help ensure a smooth and stress-free move.</span></span></p>

                <p>&nbsp;</p>

                <p style="text-align:justify"><span style="font-size:13pt"><span style="font-family:Calibri,sans-serif"><strong>What Is Moving?</strong></span></span></p>

                <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">1. Research your moving needs and start packing now!</span></span></p>

                <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">2. Make a plan for what you&#39;ll pack and where it will go</span></span></p>

                <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">3. Organize your belongings and get them ready to go</span></span></p>

                <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">4. Decide how much money to allocate for your move</span></span></p>

                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">5. Find a reputable moving company that can help with the process</span></span></p>

                <p>&nbsp;</p>

                <p style="text-align:justify"><span style="font-size:13pt"><span style="font-family:Calibri,sans-serif"><strong>What Are The Different Types Of International International Moving?</strong></span></span></p>

                <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Different types of international moves include:</span></span></p>

                <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">-Arrival Moves: These are when you move into a new country. This can be done through a visa or residency process.</span></span></p>

                <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">-Departure Moves: These are when you move out of the country. This can also be done through a visa or residency process, but may also require an exit visa if you&#39;re leaving the country for an extended period of time.</span></span></p>

                <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">-Crossing Borders: Some people choose to move between two countries without ever leaving their home country. This is called a &quot;border crossing.&quot; This can be done by using a passport card, border crossing card, or an electronic travel permit (ETP).</span></span></p>

                <p>&nbsp;</p>

                <p style="text-align:justify"><span style="font-size:13pt"><span style="font-family:Calibri,sans-serif"><strong>The Steps Of Preparing For A Move</strong></span></span></p>

                <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">The steps of preparing for a move vary depending on the type of move you are undertaking, but there are some common steps that will help make the process easier.</span></span></p>

                <p style="text-align:justify">&nbsp;</p>

                <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">1. Get a moving estimate from several companies. This will help you decide which company is best suited to handle your specific needs and give you an idea of what to budget for.</span></span></p>

                <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">2. Make a packing list and start packing as soon as possible. Start by sorting your belongings into categories, then start packing them according to category. It&rsquo;s important to stress the importance of taking care of fragile items while packing, as they may not withstand shipping or storage conditions well.</span></span></p>

                <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">3. Arrange emergency contacts in new location. Make sure everyone knows your new address, including friends, family members, bank workers, etc. Being able to reach people easily will be key when things go wrong during your move.</span></span></p>

                <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">4. Create a travel binder with all pertinent info about your move (dates, flight information, hotel reservations). This will make planning trips much easier and prevent any surprises when it comes time to pack for your journey.</span></span></p>

                <p>&nbsp;</p>

                <p style="text-align:justify"><span style="font-size:13pt"><span style="font-family:Calibri,sans-serif"><strong>How To Budget For A Move</strong></span></span></p>

                <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Moving is an expensive process, no matter where you live. There are many costs associated with packing, moving, and settling in your new home. Here are some tips to help you budget for a move:</span></span><br />
                &nbsp;</p>

                <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">1. Get an estimate of your total moving cost upfront. This will help you plan your budget and avoid surprises.</span></span></p>

                <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">2. Factor in the cost of packing materials and hiring a moving company. You&rsquo;ll need boxes, tape, bubble wrap, crating materials, and more. Plan on spending around $200 per household on supplies alone.</span></span></p>

                <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">3. Add up all the other costs involved in your move - rent, utilities, phone bills, etc. - and come up with a ballpark figure for everything you&rsquo;ll need to cover while you&#39;re away. This should include at least two months&#39; rent in case you have to leave early or miss some days due to the move.</span></span></p>

                <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">4. Save money wherever you can by packing carefully or using reusable materials instead of buying new ones each time you move. Ask family or friends for help if they&#39;re able to lend a hand with the packing process or provide furniture or appliances for storage during your stay away from home.</span></span></p>

                <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">5. Make sure that everyone in your household is prepared for the financial impact of a move before actually making it happen! Talk about estimated expenses and make sure everyone has an understanding of what&#39;s expected from them during the transition period</span></span></p>

                <p>&nbsp;</p>

                <p style="text-align:justify"><span style="font-size:13pt"><span style="font-family:Calibri,sans-serif"><strong>Tips For Packing And Moving</strong></span></span></p>

                <p>&nbsp;</p>

                <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Whether you&#39;re moving within your own state or across the country, there are a few basic tips for packing and moving that will help keep things as stress-free as possible.</span></span></p>

                <p>&nbsp;</p>

                <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">1. Start with a clean house. Clear away any items that are not essential to your move, such as furniture you don&#39;t plan on taking with you. This will make room in your boxes and bags for more important items.</span></span></p>

                <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">2. Create a packing list and stick to it. This will help you avoid buying unnecessary items while packing, and it can also serve as a guideline for what is and is not allowed in your moving box(es).</span></span></p>

                <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">3. Get organized before loading the truck. Sort through all of your belongings into designated boxes or bags, then label them with tags or stickers so you know exactly where everything is when you&#39;re ready to load the truck. This will also help ensure that nothing gets lost in the shuffle during the move!</span></span></p>

                <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">4. Keep an inventory of all of your belongings before you leave home. This way, if something does get lost en route, at least you&#39;ll have an idea of what you need to replace (or sell!).</span></span><br />
                &nbsp;</p>

                <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">5. Rent a U-Haul or storage container if necessary. Many people find it helpful to rent a U-Haul or storage container in order to pack their belongings more efficiently and avoid having too much stuff cluttering up their homes upon returning . And who knows...maybe you&#39;ll even be able to find a deal on the internet!</span></span></p>

                <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">6. Don&#39;t be afraid to ask for help. If you find yourself overwhelmed by the task of moving, don&#39;t be afraid to reach out to friends or family for help. They may be able to lend a hand with packing, loading the truck, or even finding temporary storage while your move is complete.</span></span></p>

                <p>&nbsp;</p>

                <p style="text-align:justify"><span style="font-size:13pt"><span style="font-family:Calibri,sans-serif"><strong>Conclusion</strong></span></span></p>

                <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">If you are planning on moving abroad, there are a few things that you need to do in order to make the process as smooth and stress-free as possible. In this article, we have outlined some of the best ways to prepare for international moving, so that your move goes as smoothly as possible. From packing and organizing your belongings to making sure that all of your documentation is in order, these tips will help get you started on the right track. Thanks for reading!</span></span></p>

             </div>
        </div>
    </div>
</div>
<div class="d-flex justify-content-center">
    <ul class="iconlist m-0 pe-5" id="zpcd">
        @foreach ($states as $state)
        <li><a href="{{ url('international') }}/{{$state->state_code}}" title="International Moving {{$state->state_name}} International Moving">International Moving {{ $state->state_code }}</a></li>
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
