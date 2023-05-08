@php
    $cntyslugnew = ucfirst(strtolower($cntyslug));
    $ctyslugnew = ucfirst(strtolower($ctyslug));
@endphp

@extends('layouts.master', ['title' => "Storage Units in $stslug, $cntyslugnew, $ctyslugnew County"])




@section('content')
    <div class="section dark mb-0"
        style="background: linear-gradient(to right, rgba(25,102,221,0.2), rgba(25,102,221,0.5)), url('/images/section/st.jpg') no-repeat center center / cover; min-height: 400px">
        <div class="container">
            <h2>Storage Units in {{$stslug}}, {{ucfirst(strtolower($cntyslug))}} County, {{ucfirst(strtolower($ctyslug))}}</h2>

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
                                    class="ps-2 text-white">100%
                                    Trustable</span></li>
                            <li class="my-2"><i class="icon-line-circle-check fw-light"></i> <span
                                    class="ps-2 text-white">100%
                                    Safe &amp; Secure</span></li>
                            <li class="my-2"><i class="icon-line-circle-check fw-light"></i> <span
                                    class="ps-2 text-white">On-Time Delivery</span></li>
                        </ul>
                        <ul class="col-6 iconlist">
                            <li class="my-2"><i class="icon-line-circle-check fw-light"></i> <span
                                    class="ps-2 text-white">24x7
                                    Support</span></li>
                            <li class="my-2"><i class="icon-line-circle-check fw-light"></i> <span
                                    class="ps-2 text-white">No
                                    Extra Payments</span></li>
                            <li class="my-2"><i class="icon-line-circle-check fw-light"></i> <span
                                    class="ps-2 text-white">Also
                                    Deliver on Sunday</span></li>
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
                                href="#storage" aria-controls="storage" role="tab"
                                data-toggle="tab">storage</a></li>
                    </ul>
                    <div class="tab-content rounded-bottom shadow bg-white py-4 px-5">
                        <div role="tabpanel"
                            class="tab-pane @if ($errors->count() == 0) active @endif @error('movingfromzip1') active @enderror @error('movingtozip1') active @enderror @error('movingdate1') active @enderror @error('movesize1') active @enderror"
                            id="storage">
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
