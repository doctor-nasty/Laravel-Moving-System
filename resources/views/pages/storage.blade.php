@extends('layouts.master', ['title' => 'Storage Units'])




@section("content")
<div class="section dark mb-0"
style="background: linear-gradient(to right, rgba(25,102,221,0.2), rgba(25,102,221,0.5)), url('images/section/1.jpg') no-repeat center center / cover; min-height: 400px">
<div class="container">
    <h2>Storage</h2>

<div class="row justify-content-right mb-4">
    <!-- <a href="" data-lightbox="iframe" class="play-video ms-3"><i class="icon-play"></i></a> -->
        <div class="col-lg-6">
            <p class="mb-5 text-white">Here we have collected useful guides and information that you should know
                when
                you decide to relocate. With years of experience helping
                Americans relocate we know what are
                the important aspects that you should be aware to. We hope you find this useful.</p>
            <h3 class="mb-2 text-white">Storage Guides:</h3>
            <div class="d-flex">
                <ul class="col-6 iconlist">
                    <li class="my-2"><i class="icon-line-circle-check fw-light"></i> <span
                            class="ps-2 text-white">Verified Movers</span></li>
                    <li class="my-2"><i class="icon-line-circle-check fw-light"></i> <span
                            class="ps-2 text-white">Licensed Company</span></li>
                    <li class="my-2"><i class="icon-line-circle-check fw-light"></i> <span
                            class="ps-2 text-white">No
                            Hidden Charges</span></li>
                    <li class="my-2"><i class="icon-line-circle-check fw-light"></i> <span
                            class="ps-2 text-white">Live
                            Chat</span></li>
                </ul>
                <ul class="col-6 iconlist">
                    <li class="my-2"><i class="icon-line-circle-check fw-light"></i> <span
                            class="ps-2 text-white">Minimum 1 Mover Free</span></li>
                    <li class="my-2"><i class="icon-line-circle-check fw-light"></i> <span
                            class="ps-2 text-white">Track Items by App</span></li>
                    <li class="my-2"><i class="icon-line-circle-check fw-light"></i> <span
                            class="ps-2 text-white">International Delivery</span></li>
                    <li class="my-2"><i class="icon-line-circle-check fw-light"></i> <span
                            class="ps-2 text-white">Door
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
                <h3>Moving And Storage Services: How To Find The Best One
                </h3>
                <p>On any given day, there are likely dozens of items in your house that need to be moved. Perhaps you're moving into a
                    new home, or your old one is getting too small for your needs. Maybe you're taking a family trip and need to pack
                    everything up quickly. Whatever the reason, moving and storage services are a great way to take care of everything
                    quickly and efficiently. Here are a few tips to help you find the best one for your needs:
                </p>
                <p>1. Do your research. There are a ton of services out there, and it can be tough to know which one is right for you.
                    Before you even start looking, do some research to understand what each service offers. This will help you compare
                    apples-to-apples and make sure you're getting the most bang for your buck.
                </p>
                <p>2. Ask around. One of the best ways to find quality moving and storage services is by asking around. You can either
                    speak with friends, family, or local business owners about their experiences with specific companies. This will give
                    you a good understanding of what to look for in a provider and who to trust with your precious belongings.
                </p>
                <h3>What Moving Services Do
                </h3>
                <p>If you're planning on moving in the near future, there are a few things you'll need to take into account. The first
                    is choosing the right moving company. You'll want to be sure that the company you choose has a good reputation and
                    offers quality services.
                </p>
                <p>Another important factor to consider is how much your move will cost. Moving companies often offer different price
                    points, so it's important to do your research and find one that suits your budget.
                </p>
                <p>Finally, make sure to ask the moving company about any specific requirements you may have. For example, do they
                    require insurance coverage for your items? Are they willing to pack and transport items using specific materials
                    (such as boxes made of recycled materials)?
                </p>
                <p>Whatever you do, don't hesitate to ask questions when making your move!
                </p>
                <h3>How To Choose The Right Storage Company
                </h3>
                <p>Whether you're moving within your city or across the country, choosing the right storage company can make the process
                    a lot easier. Here are tips for finding the best option for your needs:
                </p>
                <p>1. Do your research
                </p>
                <p>First and foremost, you need to do your research to find the best storage company for your needs. Look online or
                    contact multiple companies to get an idea of their services and rates.
                </p>
                <p>2. Consider size and amenities
                </p>
                <p>When looking at storage companies, consider size and amenities. Some companies offer more space than others, while
                    others may offer more amenities, such as climate control or on-site security. Consider what is important to you when
                    choosing a storage company.
                </p>
                <p>3. Check reviews and ratings
                </p>
                <p>Next, check ratings and reviews to see if anyone has had positive experiences with the company you're considering.
                    This will help you avoid potential headaches down the road.
                </p>
                <h3>Tips For Making A Smooth Move
                </h3>
                <p>There are a few things you can do to make the move process go more smoothly.
                </p>
                <p>1. Get organized
                </p>
                <p>Before starting the move, be as organized as possible. This will help to avoid any last-minute headaches and ensure
                    that everything goes as planned. organize your furniture, box up your belongings, and create packing lists.
                </p>
                <p>2. Consider using a moving company
                </p>
                <p>Although it may seem like a hassle, hiring a professional movers can make the process much easier. They will take
                    care of all of the logistics for you, including packing and unpacking your possessions, loading and unloading your
                    truck or trailer, and ensuring that everything arrives at its new location in perfect condition.
                </p>
                <p>3. Schedule appointments ahead of time
                </p>
                <p>Make sure to schedule appointments with your chosen moving company well in advance of your move date. This way, they
                    can prepare all of the necessary paperwork and equipment, and you won't have to worry about anything else during
                    your journey!
                </p>
                <h3>Moving And Storage Services : Conclusion
                </h3>
                <p>Moving and storage can be a daunting task, but with the right help, it can be made as smooth as possible. That's why
                    it's important to find someone you trust who will take care of everything for you – from packing and shipping your
                    belongings to setting up your new home. Here are a few tips to help you find the best moving and storage provider
                    for your needs: first, research the company thoroughly . Look into their reputation, customer feedback, and reviews
                    on various websites. Second, ask around . Talk to friends and family who have used this particular company before.
                    Third, call ahead . Ask if they can come out to give you a quote or provide an estimate so that you have a sense of
                    what the cost will be in advance. And finally, always confirm all services with the provider before signing any
                    contracts or handing over any money. By following these simple tips, you should be able to move smoothly and
                    affordably – no matter how big or small your move may be!
                </p>
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
