@extends('layouts.master', ['title' => 'Storage Units'])




@section("content")
<div class="section dark mb-0"
style="background: linear-gradient(to right, rgba(25,102,221,0.2), rgba(25,102,221,0.5)), url('images/section/st.jpg') no-repeat center / cover; min-height: 400px;height: 600px;">
<div class="container">
    <h2>Storage</h2>

<div class="row justify-content-right mb-4">
    <!-- <a href="" data-lightbox="iframe" class="play-video ms-3"><i class="icon-play"></i></a> -->
    <div class="col-lg-6" style="background: rgba(0, 50, 88, 0.5);">
        <p class="mb-5 text-white text-shadow">Here we have collected useful guides and information that you should know
                when
                you decide to relocate. With years of experience helping
                Americans relocate we know what are
                the important aspects that you should be aware to. We hope you find this useful.</p>
            <h3 class="mb-2 text-white">Storage Guides:</h3>
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
                        data-toggle="tab">Storage</a></li>
            </ul>
            <div class="tab-content rounded-bottom shadow bg-white py-4 px-5">
                <div role="tabpanel"
                    class="tab-pane @if ($errors->count() == 0) active @endif @error('movingfromzip1') active @enderror @error('movingtozip1') active @enderror @error('movingdate1') active @enderror @error('movesize1') active @enderror"
                    id="interstate">

                    @include('forms.storage.index')
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<div class="section section-features bg-transparent mt-0 p-0 clearfix">
    <div class="container clearfix">
        <div class="row col-mb-50 col-mb-lg-80">
            <div class="col-lg-12 justify-content-center" id="svctxt">
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
<div class="d-flex justify-content-center">
    <ul class="iconlist m-0 pe-5" id="zpcd">
        @foreach ($states as $state)
        <li><a href="{{ url('storage') }}/{{$state->state_code}}" title="Storage Units {{$state->state_name}} Storage">Storage Units {{ $state->state_code }}</a></li>
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
