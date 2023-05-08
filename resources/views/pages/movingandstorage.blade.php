@extends('layouts.master', ['title' => 'Moving And Storage Tips'])


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
                            <p style="text-align:center"><span style="font-size:22pt"><span style="font-family:Candara,sans-serif"><strong><u>Moving And Storage Services: How To Find The Best One</u></strong></span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">On any given day, there are likely dozens of items in your house that need to be moved. Perhaps you&rsquo;re moving into a new home, or your old one is getting too small for your needs. Maybe you&rsquo;re taking a family trip and need to pack everything up quickly. Whatever the reason, moving and storage services are a great way to take care of everything quickly and efficiently. Here are a few tips to help you find the best one for your needs:</span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">1. Do your research. There are a ton of services out there, and it can be tough to know which one is right for you. Before you even start looking, do some research to understand what each service offers. This will help you compare apples-to-apples and make sure you&rsquo;re getting the most bang for your buck.</span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">2. Ask around. One of the best ways to find quality moving and storage services is by asking around. You can either speak with friends, family, or local business owners about their experiences with specific companies. This will give you a good understanding of what to look for in a provider and who to trust with your precious belongings.&nbsp;</span></span></p>

                            <p>&nbsp;</p>

                            <p style="text-align:justify"><span style="font-size:13pt"><span style="font-family:Calibri,sans-serif"><strong>What Moving Services Do</strong></span></span></p>

                            <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">If you&#39;re planning on moving in the near future, there are a few things you&#39;ll need to take into account. The first is choosing the right moving company. You&#39;ll want to be sure that the company you choose has a good reputation and offers quality services.</span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Another important factor to consider is how much your move will cost. Moving companies often offer different price points, so it&#39;s important to do your research and find one that suits your budget.</span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Finally, make sure to ask the moving company about any specific requirements you may have. For example, do they require insurance coverage for your items? Are they willing to pack and transport items using specific materials (such as boxes made of recycled materials)?</span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Whatever you do, don&#39;t hesitate to ask questions when making your move!</span></span></p>

                            <p>&nbsp;</p>

                            <p style="text-align:justify"><span style="font-size:13pt"><span style="font-family:Calibri,sans-serif"><strong>How To Choose The Right Storage Company</strong></span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Whether you&#39;re moving within your city or across the country, choosing the right storage company can make the process a lot easier. Here are tips for finding the best option for your needs:</span></span></p>

                            <p>&nbsp;</p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">1. Do your research</span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">First and foremost, you need to do your research to find the best storage company for your needs. Look online or contact multiple companies to get an idea of their services and rates.</span></span></p>

                            <p>&nbsp;</p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">2. Consider size and amenities</span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">When looking at storage companies, consider size and amenities. Some companies offer more space than others, while others may offer more amenities, such as climate control or on-site security. Consider what is important to you when choosing a storage company.</span></span></p>

                            <p>&nbsp;</p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">3. Check reviews and ratings</span></span></p>

                            <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Next, check ratings and reviews to see if anyone has had positive experiences with the company you&#39;re considering. This will help you avoid potential headaches down the road.</span></span></p>

                            <p>&nbsp;</p>

                            <p style="text-align:justify"><span style="font-size:13pt"><span style="font-family:Calibri,sans-serif"><strong>Tips For Making A Smooth Move</strong></span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">There are a few things you can do to make the move process go more smoothly.</span></span></p>

                            <p>&nbsp;</p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">1. Get organized</span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Before starting the move, be as organized as possible. This will help to avoid any last-minute headaches and ensure that everything goes as planned. organize your furniture, box up your belongings, and create packing lists.</span></span></p>

                            <p>&nbsp;</p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">2. Consider using a moving company</span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Although it may seem like a hassle, hiring a professional movers can make the process much easier. They will take care of all of the logistics for you, including packing and unpacking your possessions, loading and unloading your truck or trailer, and ensuring that everything arrives at its new location in perfect condition.</span></span></p>

                            <p>&nbsp;</p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">3. Schedule appointments ahead of time</span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Make sure to schedule appointments with your chosen moving company well in advance of your move date. This way, they can prepare all of the necessary paperwork and equipment, and you won&rsquo;t have to worry about anything else during your journey!</span></span></p>

                            <p>&nbsp;</p>

                            <p style="text-align:justify"><span style="font-size:13pt"><span style="font-family:Calibri,sans-serif"><strong>Moving And Storage Services : Conclusion</strong></span></span></p>

                            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Moving and storage can be a daunting task, but with the right help, it can be made as smooth as possible. That&rsquo;s why it&rsquo;s important to find someone you trust who will take care of everything for you &ndash; from packing and shipping your belongings to setting up your new home. Here are a few tips to help you find the best moving and storage provider for your needs: first, research the company thoroughly . Look into their reputation, customer feedback, and reviews on various websites. Second, ask around . Talk to friends and family who have used this particular company before. Third, call ahead . Ask if they can come out to give you a quote or provide an estimate so that you have a sense of what the cost will be in advance. And finally, always confirm all services with the provider before signing any contracts or handing over any money. By following these simple tips, you should be able to move smoothly and affordably &ndash; no matter how big or small your move may be!</span></span></p>

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
