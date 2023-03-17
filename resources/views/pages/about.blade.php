@extends('layouts.master', ['title' => 'Our Company'])




@section('content')
    <section id="page-title" class="bg-color page-title-dark py-6">
        <div class="container clearfix">
            <h1>Company</h1>
            <span>Get In Touch</span>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Movers</a></li>
                <li class="breadcrumb-item active" aria-current="page">Company</li>
            </ol>
        </div>
    </section>

    <section id="content">
        <div class="content-wrap p-0">
            <div class="section mt-0"
                style="background-position: center center; background-repeat: no-repeat; background-size: cover; background-image: linear-gradient(to right, rgba(0,0,0,.6), rgba(0,0,0,0.3)), url('images/section/company.jpg');">
                <div class="shape-divider" data-shape="wave" data-position="bottom" data-height="100"></div>
                <div class="container dark">
                    <div class="row align-items-center h-100" style="padding: 100px 0 150px">
                        <div class="col-xl-7 col-lg-10">
                            <h5 class="mb-3 text-uppercase ls3 text-white-50">Our Story</h5>
                            <h3 class="display-4 fw-semibold mb-4">Make the right Move.<br>We Move your Life.</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate corporis, facilis
                                assumenda optio consequuntur amet iure, quidem animi nam inventore!</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="py-6 dark" style="background-color: #061a35;">
                <div class="container mb-5">
                    <div class="row justify-content-between">
                        <div class="col-md-5">
                            <h3 class="display-4 fw-bold mb-4">Moving you<br>Toward your<br>Future.</h3>
                            <img src="images/section/2.jpg" alt="Image" class="img-about">
                        </div>
                        <div class="col-md-6">
                            <p class="mt-4">Compellingly target sticky infrastructures via superior catalysts for change.
                                Completely productize efficient e-tailers rather than sticky applications. Credibly
                                productize interdependent users through scalable collaboration and idea-sharing. Objectively
                                foster cutting-edge intellectual capital via frictionless data. Objectively impact
                                cutting-edge niche markets with cross functional services.</p>
                            <p>Synergistically architect enterprise-wide products whereas business content. Credibly
                                facilitate top-line expertise with excellent platforms.</p>
                            <p>Compellingly target sticky infrastructures via superior catalysts for change. Completely
                                productize efficient e-tailers rather than sticky applications. Credibly productize
                                interdependent users through scalable collaboration and idea-sharing. Objectively foster
                                cutting-edge intellectual capital via frictionless data. Objectively impact cutting-edge
                                niche markets with cross functional services.</p>
                            <p><strong>Synergistically architect enterprise-wide products whereas business content.</strong>
                                Credibly facilitate top-line expertise with excellent platforms.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="section dark pt-0 mb-0 bg-color">
                <svg viewBox="0 0 1960 206.8" class="bg-white">
                    <path class="svg-themecolor" style="opacity:0.2;"
                        d="M0,142.8A2337.49,2337.49,0,0,1,297.5,56.3C569.33-3.53,783.89.22,849.5,2.3c215.78,6.86,382.12,45.39,503.25,73.45,158.87,36.8,283.09,79.13,458.75,54.55A816.49,816.49,0,0,0,1983,86.8v110H0Z" />
                    <path class="svg-themecolor" d="M.5,152.8s498-177,849-150,1031,238,1134,94v110H.5Z" />
                </svg>
                <div class="container">
                    <div class="row align-items-center justify-content-center center my-4">
                        <div class="col-sm-8">
                            <div class="heading-block border-bottom-0 mb-4">
                                <h2 class="fw-semibold ls0 nott mb-3" style="font-size: 44px; line-height: 1.3">Contact
                                    Our Movers Specialist</h2>
                                <p>Phosfluorescently develop customized relationships vis-a-vis B2C infomediaries.</p>
                            </div>
                            <a href="/contact" class="button button-white button-light button-rounded fw-medium m-0">Get
                                In Touch</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
