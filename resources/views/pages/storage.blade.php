@extends('layouts.master', ['title' => 'Storage Units'])




@section("content")
<div class="section dark mb-0"
style="background: linear-gradient(to right, rgba(25,102,221,0.2), rgba(25,102,221,0.5)), url('images/section/st.jpg') no-repeat center center / cover; min-height: 400px">
<div class="container">
    <h2>Storage</h2>

<div class="row justify-content-right mb-4">
    <!-- <a href="" data-lightbox="iframe" class="play-video ms-3"><i class="icon-play"></i></a> -->
        <div class="col-lg-6">
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
                <p><strong>Moving And Storage Services: How To Find The Best One</strong></p>

                <p>Moving is not an easy task. It takes a lot of effort and time to move from one place to another, especially when you have a lot of belongings. When it comes to moving, there are several things that you need to keep in mind. Choosing the right company for your moving services is very important as it will help make your move easier and hassle-free. Some companies offer cheap rates, but they may not be able to give you good quality services, so always check reviews before hiring any company for your move</p>

                <p>&nbsp;</p>

                <p><strong>Getting a moving company is always a good idea</strong></p>

                <p>It&#39;s always a good idea to hire a moving company. They can help you with all aspects of your move, from packing and unpacking to loading/unloading. This means you don&#39;t have to worry about doing any work and can focus on other things instead.</p>

                <p>Hiring a moving company also gives you more control over when the move happens, as well as where it takes place (e.g. if one location is better than another). As long as there aren&#39;t any unforeseen circumstances or problems with their services, there won&#39;t be delays in getting everything done on time which is precisely what everyone wants!</p>

                <p>&nbsp;</p>

                <p><strong>It&#39;s always best to ask for recommendations</strong></p>

                <p>When looking for a mover, it&#39;s always best to ask for recommendations. Your friends and family might know someone who recently moved, or they could tell you about their experience with a particular company. If you have lived in the area for some time and have good relationships with your neighbors, ask them if they know anyone who has used a moving company recently. The same goes for real estate agents-they may be able to point out the best movers in your area or give some insight into how much movers charge in general. Your landlord or property manager may also be able to provide recommendations based on their experiences with local professionals; similarly, if there are any community groups where members share resources (like churches), check out their websites for information about local businesses!</p>

                <p>&nbsp;</p>

                <p><strong>Ask them how they will pack your belongings</strong></p>

                <p>When hiring a moving company, it&#39;s essential to ask them how they will pack your belongings. The best movers will use shrink wrap and other materials that protect furniture from damage during transport. They should also have the right tools for packing up your belongings in boxes and moving containers, as well as tape guns for sealing boxes shut if necessary (and helping keep them closed).</p>

                <p>&nbsp;</p>

                <p><strong>Choose a company that offers insurance cover</strong></p>

                <p>When choosing a mover, ensure they offer insurance coverage for your belongings. This can help you avoid paying out of pocket if something gets damaged in transit or lost during the move.</p>

                <p>What kind of insurance coverage should you get? It would help if you first determined how much money is at stake and then chose a level of coverage that protects that amount without costing too much extra. For example, if you&#39;re moving from one apartment to another and only have $5,000 worth of stuff, it may not make sense for you to pay an additional $500-$750 for complete replacement value coverage (which covers the cost of replacing lost items rather than just paying out their current value). On the other hand, if this happens:</p>

                <p>&nbsp;</p>

                <p><strong>Conclusion</strong></p>

                <p>Moving and storage can be a daunting task, but with the right help, it can be made as smooth as possible. That&#39;s why it&#39;s essential to find someone you trust who will take care of everything for you &ndash; from packing and shipping your belongings to setting up your new home. Here are a few tips to help you find the best moving and storage provider for your needs: first, research the company thoroughly. Look into their reputation, customer feedback, and reviews on various websites. Second, ask around. Talk to friends and family who have used this particular company before. Third, call ahead. Ask if they can come out to give you a quote or provide an estimate so that you have a sense of what the cost will be in advance. And finally, always confirm all services with the provider before signing any contracts or handing over any money. By following these simple tips, you should be able to move smoothly and affordably &ndash; no matter how big or small your move may be!</p>

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
