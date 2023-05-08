@extends('layouts.master', ['title' => 'Long Distance Moving Tips'])



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
            <div class="clear"></div>
        </div>
    </section>
@endsection
