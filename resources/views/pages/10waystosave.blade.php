@extends('layouts.master', ['title' => '10 Ways to Save'])

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
                            <p><strong>How to Save Money During Your Move<span class="Apple-converted-space">&nbsp;</span></strong></p>
                            <p>Moving can strain your finances significantly, whether you do it yourself or use a moving company. Thankfully there are tried and tested tips to follow if you don&rsquo;t want to spend too much during your move. <br /><br />If you&rsquo;re moving for a new job, school, with your family, or just for yourself, you can still use some extra cash, so follow these tips. <br /><br /><strong>Get Boxes from the nearest grocery store </strong><br /><br />Grocery stores get regular shipments, so they never lack boxes, and most of the time, they throw the boxes away. So instead of buying from the moving company, walk to your local grocery store and ask for some. They&rsquo;ll be happy to give you at no extra charge. <br /><br /><strong>Plan Ahead </strong><br /><br />Last-minute planning will always cause you to spend more, but you can get estimates and save money when you plan. Once you are sure you&rsquo;ll be moving, start speaking with moving companies and asking for in-home estimates. Research, read reviews, and confirm if they are licensed before selecting one. <br /><br /><strong>Carry on your gadgets</strong><br /><br />Rather than pack your small electronics with your other properties, pack them in a carry-on bag. You can even prevent possible damage or loss by packing small electronics like laptops, tabs, video game consoles, and the like in a carry-on. <br /><br /><strong>Don&rsquo;t use Storage Units </strong><br /><br />Storage units cost at least $100 per month, and when that accumulates, you&rsquo;ll be paying a ton of dollars before you know it. So, ask your friends and family if you can keep a few things in their garage or space for a little while. Once you&rsquo;re settled, request for your stuff to be sent to you or go pick it up. You can also find someone with a storage unit and split the cost with them. <br /><br /><strong>Don&rsquo;t Choose the Cheapest Movers</strong> <br /><br />The cheapest movers may give you the biggest problem in the long run, so it's not always a wise idea. One of the biggest red flags you could get from a mover is if their quote is significantly lower than that of other movers. They eventually find a way to charge you extra. <br /><br /><strong>Keep all your Receipts</strong> <br /><br />Please keep all the receipts from your move because you may be able to get reimbursement for them. If you&rsquo;re moving for a new job, there&rsquo;s a possibility that your company will take care of your moving expenses. The receipts will make the entire process very easy. <br /><br /><strong>Do the Packing Yourself</strong> <br /><br />You can enlist friends or family to help you with this because it will save you some extra money. However, if the moving company does the packing, they will charge you extra. <br /><br /><strong>Ask for an In-Home Estimate </strong><br /><br />Always get an in-home estimate because rushing through your move may end up costing you more money. In addition, when movers get to the destination, they can charge you for additional items because they didn&rsquo;t see everything before the move. <br /><br /><strong>Don&rsquo;t Throw Out Old Towels and Bedding (Yet) </strong><br /><br />If you have any towels or old bed sheets, you don&rsquo;t use, rather than throw them out, use them to wrap and pad your electronics or furniture. This can help to prevent scratches and bumps that disfigure your property. It also saves you the money you would&rsquo;ve spent on wrapping sheets. <br /><br /><strong>Don&rsquo;t Hoard Things </strong><br /><br />Things like old dressers and electronics do not have to come with you. Consider donating them to Goodwill or giving them away if they&rsquo;re still worth something to you. But if you&rsquo;ve had it for up to 10 years, maybe it&rsquo;s time to let it go.</p>
                            <p>&nbsp;</p>
                            <p>Moving Wyze can connect you with the best movers nearest to you and provide you with a free estimate. Reach out to us now, let&rsquo;s help make your move easy!<span class="Apple-converted-space">&nbsp;</span></p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </section>
@endsection
