@extends('layouts.master', ['title' => 'Types of Moving Estimates'])

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
                            <p><strong>The Best Moving Cost Calculator </strong></p>

                            <p><a href="http://movingwyze.com">Movingwyze.com</a> can help you financially prepare for any move using our effective moving cost calculator. Moving involves a lot of processes, and sometimes those processes cost money. However, you can save more money by using our moving cost calculator and following some of our helpful moving tips.</p>

                            <p>Planning your next move? Let&rsquo;s help you break down the financial aspect of it.</p>

                            <p><strong>What is the cost of hiring movers? </strong></p>

                            <p>Movers&rsquo; costing is based on whether your move is an intrastate (local) move or an interstate (crossing state lines) move. On average, local moves cost at least $1,700, while long-distance moves cost about $5,700 for a 1000-mile distance. This is almost always the estimate for moves of a 2 to 3-bedroom apartment with 7000-8,000 pounds.</p>

                            <p><strong>Local Moves </strong></p>

                            <p>Moving within a state or from one town to another is classified as a local move, and it can cost from as low as $800 to $3000 or more. It all depends on how big your house is and how many items you want to move.</p>

                            <p>The estimated cost of moving from a <strong>studio or 1bedroom apartment</strong> is; $800-$1500</p>

                            <p><strong>For a 2 to 3 Bedroom apartment;</strong></p>

                            <p>$1200- $1800</p>

                            <p><strong>For a 4 to 5 Bedroom apartment;</strong></p>

                            <p>$2500- $4500</p>

                            <p><strong>How Much Does Moving Cost Per Hour</strong></p>

                            <p>Hiring a labor-only company for local moves will cost you about $75-$175 for one mover per hour. So, say you get two movers working for 3 hours it will cost you about $720 to $1250. The final pricing is mainly based on the size of your home and how many hours they will spend moving all your stuff.</p>

                            <p><strong>Interstate Move </strong></p>

                            <p>Interstate moves cost more than local moves because of distance, time, tolls, and workload. The rules are different when it comes to interstate moves; drivers need to have specific licenses and pay certain fees as they go because they&rsquo;ll be crossing state lines. Long-distance or interstate move cost anywhere from $1,700 to $25,000. The final pricing depends on how many miles and how many things you&rsquo;ll be moving.</p>

                            <p><strong>How to Calculate your Moving Cost</strong></p>

                            <p>&nbsp;</p>

                            <p>You can use the Movingwyze cost calculator to estimate how much your entire move will cost. All you have to do is provide us with information about how big your apartment is (the size and number of bedrooms), the service you need and the date of your move.</p>

                            <p>Once you&rsquo;ve done that, we will provide you with accurate estimated moving costs from trusted moving companies around you.</p>

                            <p>&nbsp;</p>

                            <p><strong>What Affects your Moving Costs? </strong></p>

                            <p>A lot of factors are considered when movers give you an estimate. It&rsquo;s important to note that some of these factors can lead to additional costs.&nbsp; What are these factors?</p>

                            <p><strong>The Size of your Move</strong></p>

                            <p>If you&rsquo;re moving only a few pieces of stuff, it won&rsquo;t take as much time or energy to move them, but if you have a lot of stuff, it is the direct opposite. More stuff means more moving time and more workload for the movers. So, in essence, the more things you have, the more expensive your move will be.</p>

                            <p><strong>Travel Charges</strong></p>

                            <p>Long-distance moves rack up more travel fees than local moves because more fuel, time, and labor are required.</p>

                            <p><strong>Packing and Add-on Services</strong></p>

                            <p>Hiring movers to pack your things is another way to incur extra costs during your move. They will charge you for the boxes and for their services, so if you&rsquo;re thinking about cutting costs, consider doing the packing yourself. Although hiring them to pack might save you some time and energy.</p>

                            <p>If you decide to add-on any extra service, expect to be charged extra too. Add-ons influence the cost of your move more than you know it. It can include assembling furniture before the move and reassembling it after, providing you with moving supplies, or special moves.</p>

                            <p><strong>Item Storage </strong></p>

                            <p>If you decide to keep most of your items with the moving company while you sort things out, expect to be charged extra. Different moving companies have different rates for storage, so be sure to confirm exactly how much they will charge you for it.</p>

                            <p><strong>Supplies</strong></p>

                            <p>If you&rsquo;re able to gather free boxes for your move, consider yourself very lucky, if not you&rsquo;ll have to plan to buy moving supplies. These can be boxes, tape, bubble wraps and everything you&rsquo;ll need to pack your stuff properly.</p>

                            <p><strong>The Date </strong></p>

                            <p>Moving during peak seasons can affect the price of your move drastically. When you move is very important because moving on weekends, for example, would cost more than moving on a weekday.</p>

                            <p><strong>Insurance Coverage </strong></p>

                            <p>For the safety of your property, the moving company has to provide you with insurance or liability coverage. There are different protection levels, so choose the one that fits your budget. They&rsquo;ll present you with the option of choosing the full value protection or the basic release value. You can also purchase additional insurance from other providers if you want.</p>

                            <p><strong>Other Moving Fees and Costs </strong></p>

                            <p>If you have extra moving needs, you might meet these fees or costs during the process of your move;</p>

                            <p><strong>Fees for Long Carry</strong></p>

                            <p>If items have to be carried by the mover from a long distance to the truck, you may be charged a fee for long carry. This happens when the movers are not able to park close to your home.</p>

                            <p><strong>Specialty Move</strong></p>

                            <p>If you have special items like a piano, artwork, hot tubs, and the like, moving them requires special care and skills, so movers will charge you extra for that.</p>

                            <p><strong>Stair and Elevator Carry </strong></p>

                            <p>Movers charge a carry fee if they have to move items up and down flights of stairs because it takes more energy and care. You&rsquo;ll only be charged stair carry fees if you live in a house with multiple floors and an above-average number of stairs. This also applies if your house has an elevator and items have to be moved with the elevator.</p>

                            <p><strong>Unpacking Fees </strong></p>

                            <p>If you need the movers to unpack for you, they may charge you an extra fee for unpacking. This means they&rsquo;ll spend extra hours, so it will be calculated accordingly.</p>

                            <p><strong>Different Stops </strong></p>

                            <p>If you need the movers to stop somewhere, whether to pick up extra items or to drop off some items, they may charge you extra. For example, stopping by an address to pick up extra belongings before coming to your home.</p>

                            <p><strong>Shuttle Services </strong></p>

                            <p>If the truck has to park far away from your home, some moving companies provide shuttle services to move your items from the truck to the house.</p>

                            <p><strong>Extra Fast Delivery </strong></p>

                            <p>You can be charged for an expedited move if you want to move beyond the usual pace. If you need to move or receive your items quickly, movers can fast-track your move, but they will charge you a fee for it.</p>

                            <p><strong>Tips </strong></p>

                            <p>Even though it is not a requirement, tipping is not a bad idea, and it will go a long way to show the movers that you appreciated their work. Make sure to have cash at hand if you have plans to give your movers a tip.</p>

                            <p><strong>How to Cut Moving Costs </strong></p>

                            <p><strong>Don&rsquo;t move with things you don&rsquo;t need- </strong>As a rule of thumb, if you have a household item you have not used in over a year; it shouldn&rsquo;t come with you. The item will only end up taking up space, so consider giving it out to charity or selling it for a small change. Clean out your wardrobe and kitchen, and give out everything you no longer need.</p>

                            <p><strong>Rent a Moving Vehicle -</strong>If you want to do it yourself, you can rent a moving truck and save some money on movers. This is an awesome opportunity for you to have an adventure, especially if you&rsquo;re a big family. Check Movingwyze truck rental page to see if there&rsquo;s a truck that meets your need when you decide you want to go with this option.</p>

                            <p><strong>Don&rsquo;t hesitate to ask for help &ndash; </strong>Family and friends are there to help, so if they offer help, don&rsquo;t hesitate to take it because it will save you some costs. Get them to help you with packing your stuff into boxes and moving them.</p>

                            <p><strong>Find Free Cardboard boxes-</strong> Go to your nearest grocery store and get cardboard boxes from them. They barely use it, so they&rsquo;ll happily give it away for free or for a small fee. If you can&rsquo;t get free boxes, shop for your own moving supplies like tapes, boxes, and bubble wraps because the price might be lower than what the moving companies will offer for their own.</p>

                            <p><strong>Rent a moving container-</strong> Instead of hiring moving companies, rent a moving container to save yourself some costs. Size and timing matter when renting a container so confirm how long you need it for and much stuff you want to move with it to get an estimate. Some reliable moving container companies you can use are ReloCubes, PODS, United Mayflower Container, U-Haul, and Door-to-Door.</p>

                            <p><strong>Do the Packing-</strong> Hiring movers to do the packing, and the move will cost you more money. So, try to do the packing by yourself before time. To make this simple, start packing weeks before your move, and by the time it is D-day, you&rsquo;ll be completely prepared.</p>

                            <p><strong>Look out for Discounts- </strong>There are moving discounts for a lot of people who are premium members of an organization or community. Check to see if the moving company is offering a special discount that you are eligible for. For example, military personnels enjoy discounts with some moving companies.</p>

                            <p><strong>Carefully pick a date for moving-</strong> As we mentioned earlier, the day you move influences the price your mover will charge you at the end. When picking a day to move, consider if it&rsquo;s peak moving season or the weekend. Moving costs are higher during the summer because more people move in that season, so avoid moving in peak seasons if it is something within your power to do.</p>

                            <p>Reach out to more than one Mover- To get an accurate estimate, reach out to multiple moving companies before you finally decide on one. What do the companies offer withing their packages, and how much coverage will your items get? These are the questions you should be asking before you select a mover. Movers should perform in-person inspections to give you accurate quotes. Movingwyze will give you quotes directly from movers in your area, so you can rest assured that the quotes will be accurate.</p>

                            <p><strong>Is your Moving Expense Tax deductible? -&nbsp; </strong>Keep the receipts from your move and the figures for the items donated to charity during your move. You can deduct the donation from your tax because charity donations are not taxed. Until the nextyear, moving expenses will no longer be tax- deductible, meaning it is not allowed to claim the deduction.&nbsp; The only exceptions are members of the military.</p>


                        </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </section>
@endsection
