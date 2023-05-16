<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    @stack('head')
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="@yield('meta_keywords','')">
    <meta name="description" content="@yield('meta_description','')">
    <meta name="twitter:title" content=""/>
    <meta property="og:title" content=""/>
    <meta property="og:type" content="business.business"/>
    <meta property="business:contact_data:street_address" content=""/>
    <meta property="business:contact_data:locality" content=""/>
    <meta property="business:contact_data:region" content=""/>
    <meta property="business:contact_data:postal_code" content=""/>
    <meta property="business:contact_data:country_name" content=""/>
    <meta property="business:contact_data:phone_number" content=""/>
    <meta property="business:contact_data:website" content=""/>
    <meta name="twitter:card" content="summary"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&amp;display=swap" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ url('css/style.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ url('css/dark.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ url('css/font-icons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ url('css/animate.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ url('css/magnific-popup.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ url('css/custom.css') }}" type="text/css" />

    <link rel="stylesheet" href="{{ url('css/colors2d89.css?color=0F66DD') }}" type="text/css" />
    {{-- <link rel="stylesheet" href="{{ url('css/fonts.css') }}" type="text/css" /> --}}
    <link rel="stylesheet" href="{{ url('css/movers.css') }}" type="text/css" />

    <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.css') }}">
    {{-- <link rel="stylesheet" href="{{ url('css/components/datepicker.css') }}" type="text/css" /> --}}
    <meta name='viewport' content='initial-scale=1, viewport-fit=cover'>

    <title>
        @isset($title)
            {{ $title }}
        @endisset
    </title>
</head>

<body class="stretched">

    <div id="wrapper" class="clearfix">

        @include('partials.header')

        @yield('content')

        @include('partials.footer')
    </div>

    <div id="gotoTop" class="icon-angle-up"></div>


    <script src="{{ url('js/jquery.js') }}"></script>

    {{-- <script src="{{ url('js/plugins.min.js') }}"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> --}}

<script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>

    {{-- <script src="{{ url('js/components/datepicker.js') }}"></script> --}}
    <script src="https://kit.fontawesome.com/e0e066b8ba.js" crossorigin="anonymous"></script>
    <link href="{{ url('css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ url('css/brands.css') }}" rel="stylesheet">
    <link href="{{ url('css/solid.css') }}" rel="stylesheet">


    {{-- <script src="{{ url('js/functions.js') }}"></script> --}}
    {{-- <script>
        jQuery('.home-date').datepicker({
            autoclose: true,
            startDate: "today",
        });
    </script> --}}
    <script type="text/javascript">
        $(function(){
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if(month < 10)
                month = '0' + month.toString();
            if(day < 10)
             day = '0' + day.toString();
            var maxDate = year + '-' + month + '-' + day;
            $('.calendar').attr('min', maxDate);
        });
        </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" crossorigin="anonymous"></script>
    <script src="{{ url('js/functions.js') }}" crossorigin="anonymous"></script>


<script>


    $(document).ready(function() {
        $("#news-slider").owlCarousel({
            items : 3,
            itemsDesktop:[1199,3],
            itemsDesktopSmall:[980,2],
            itemsMobile : [600,1],
            navigation:true,
            navigationText:["",""],
            pagination:true,
            autoPlay:true,
            responsiveClass: true,
    responsive: {
      0: {
        items: 1,
        nav: true
      },
      600: {
        items: 3,
        nav: false
      }
    }
        });
    });
    </script>

</body>

</html>
