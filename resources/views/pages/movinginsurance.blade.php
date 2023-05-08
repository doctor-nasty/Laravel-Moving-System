@extends('layouts.master', ['title' => 'Tips On Moving Insurance'])


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
                            <p style="text-align:center"><span style="font-size:22pt"><span style="font-family:Candara,sans-serif"><strong><u>Tips On Moving Insurance: Your Guide To Moving Insurance</u></strong></span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Moving is a big deal. It can be stressful, time-consuming, and expensive&mdash;but it doesn&rsquo;t have to be. With the right planning and help from an insurance agent, you can make the move go as smoothly as possible. In this blog post, we&rsquo;re going to share our tips on how to move insurance&mdash;from determining what type of coverage you need to getting quotes and making a plan. We hope these tips will help make your relocation as smooth as possible!</span></span></p>

                            <p>&nbsp;</p>

                            <p style="text-align:justify"><span style="font-size:13pt"><span style="font-family:Calibri,sans-serif"><strong>What Is The Difference Between Moving Insurance And Packing Insurance?</strong></span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Moving is an exciting time, but it can also be stressful. There are a lot of things to think about &ndash; from packing your belongings to figuring out what insurance you need. Here&rsquo;s a breakdown of the different types of insurance you might need when moving:</span></span></p>

                            <p>&nbsp;</p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Moving Insurance</span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Moving insurance protects your possessions against damage or loss during transport. You may be covered if something goes wrong with your move, like if your shipment is lost or damaged in transit.</span></span></p>

                            <p>&nbsp;</p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Packing Insurance</span></span></p>

                            <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Packing insurance protects you (and your property) against damage or theft while you&#39;re packing and storing your belongings before the move. This coverage can include items like TVs, computers, and jewelry. It can also cover any thefts that happen while you&#39;re unloading your belongings at the new residence.</span></span></p>

                            <p>&nbsp;</p>

                            <p style="text-align:justify"><span style="font-size:13pt"><span style="font-family:Calibri,sans-serif"><strong>What Is Included In Moving Insurance?</strong></span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">If you&rsquo;re thinking about moving, one of the most important things to consider is moving insurance. And, luckily, there are a number of different types of coverage options available to suit your needs. Here&rsquo;s a rundown of what&rsquo;s typically included in moving insurance:</span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">1. Collision: This type of coverage will pay for damages caused to your belongings or vehicle during the move, including if they&rsquo;re hit by another vehicle.</span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">2. Loss: This type of coverage will reimburse you for items that are stolen while you&#39;re moving, as well as any associated costs like lost rent or missed work.&nbsp;</span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">3. Damage: This policy will cover damage done to your home or property while you&#39;re moving it, whether it&#39;s from natural disasters like a tornado or from someone else&#39;s actions like vandals.&nbsp;</span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">4. Personal Property: This covers any personal belongings like furniture, electronics, and jewelry that are damaged or misplaced during the move.&nbsp;</span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">5. Transportation: This policy will reimburse you for any costs related to transporting your belongings, including mileage reimbursement and parking fees.</span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">6. Special Needs: If you have special needs like a disability that makes carrying heavy objects difficult, this policy can help cover those costs too.</span></span></p>

                            <p>&nbsp;</p>

                            <p style="text-align:justify"><span style="font-size:13pt"><span style="font-family:Calibri,sans-serif"><strong>What Types Of Coverage Are Available With Moving Insurance?</strong></span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">There are several types of insurance coverage that can help protect your belongings during a move.</span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Full Coverage: This type of insurance will cover all the items in your possession, whether they&#39;re being moved with you or not.&nbsp;</span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Collision Coverage: If something goes wrong while you&#39;re moving, this type of insurance will help cover the cost of repairing or replacing any damaged property.&nbsp;</span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Pipe Damage Coverage: This type of insurance will help cover the cost of repairing any pipes that may be damaged during the move.&nbsp;</span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Liability Coverage: This type of insurance will help protect you if someone is injured as a result of something that happened while you were moving.</span></span></p>

                            <p>&nbsp;</p>

                            <p style="text-align:justify"><span style="font-size:13pt"><span style="font-family:Calibri,sans-serif"><strong>How Much Does Moving Insurance Cost?</strong></span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">When you&rsquo;re preparing to move, one of the most important things you can do is research your options for moving insurance. There are a lot of different types of coverage out there, so it&rsquo;s important to choose the right policy for your needs. Here are some tips on choosing the best moving insurance:</span></span></p>

                            <p>&nbsp;</p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">1. Know Your Coverage Needs</span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">One of the first things you need to do when looking into moving insurance is to figure out what types of coverage you need. There are three primary types of coverage you could need: liability, property, and cargo. Liability coverage will protect you from legal claims made against you as a result of your move. Property coverage will help pay for damages that may be caused to any belongings during your move, and cargo coverage will cover any items that are transported in or on your vehicle during the move.</span></span></p>

                            <p>&nbsp;</p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">2. Compare Rates and Coverage Options</span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Once you know what type of coverage you need, it&rsquo;s time to compare rates and options. Moving insurance can range in price from just a few dollars per month up to hundreds of dollars per year, so it&rsquo;s important to find a policy that fits your needs and budget. You also want to make sure that the policy has all the coverage you need; some policies only cover specific risks like loss or damage during transit, while other policies offer more comprehensive coverage that includes protection against both property and liability claims.</span></span></p>

                            <p><br />
                            &nbsp;</p>

                            <p style="text-align:justify"><span style="font-size:13pt"><span style="font-family:Calibri,sans-serif"><strong>Is It Necessary To Get A Quote Before Moving?</strong></span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Before you move, it&#39;s important to get a quote from your insurance provider. This will help you determine if you need any special coverage and can save you money down the road. Here are some tips for getting a quote:</span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">1. Shop Around - Compare rates from different providers to find the best deal. You may be able to find discounts available if you bundle your insurance with other services, like packing and moving companies.</span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">2. Request a Quote in Advance - Request quotes as far in advance as possible to ensure that you have enough time to review and accept them.</span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">3. Make sure Your Policy Covers Everything - Make sure your policy covers everything from lost or damaged items during the move, to accidental damage caused by someone else while in your home or while in transit.</span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">4. Verify Coverage Before Moving - Once you&#39;ve received your quotes, make sure everything is covered by the policy before actually moving anything out of your house. Check with the provider for verification purposes.</span></span></p>

                            <p>&nbsp;</p>

                            <p style="text-align:justify"><span style="font-size:13pt"><span style="font-family:Calibri,sans-serif"><strong>What To Do If You Miss The Deadline For Your Movers</strong></span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">If you miss the deadline for your movers, there are a few things you can do to still have your belongings moved.</span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">First, try calling your moving company and asking them when they will be arriving. Often times, they will be able to squeeze in a move even if it is a few days later than originally planned.</span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Second, check with your local garage or storage facility. They may be willing to give you a temporary space to store your belongings until the movers arrive. Just make sure that you have reserved this space in advance and that it is close by.</span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Third, consider using a pack-and-go rental service. These services provide everything from suitcases to furniture boxes and can help save you time and hassle on moving day.</span></span></p>

                            <p>&nbsp;</p>

                            <p style="text-align:justify"><span style="font-size:13pt"><span style="font-family:Calibri,sans-serif"><strong>Conclusion</strong></span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">After reading this article, you will be able to understand the different types of moving insurance and what each one offers. You will also know how to choose the right policy for your needs and find the best deal available. Finally, you will have a better understanding of what to do if something goes wrong during your move. Thank you for reading!</span></span></p>

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
