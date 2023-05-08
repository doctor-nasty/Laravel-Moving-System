@extends('layouts.master', ['title' => 'International Moving Tips'])


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
            <div class="clear"></div>
            <div class="py-6 dark" style="background-color: #061a35;">
                <div class="container mb-5">
                    <div class="row justify-content-between">
                        <div class="col-lg-12">
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
            <div class="clear"></div>
        </div>
    </section>
@endsection
