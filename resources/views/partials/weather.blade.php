@php

    $getip = Request::ip();

    $ip = '108.170.85.66';

    $ipInfo = file_get_contents('http://ip-api.com/json/' . $ip);
    $ipInfo = json_decode($ipInfo);
    $region = $ipInfo->region;
    $timezone = $ipInfo->timezone;
    $lat = $ipInfo->lat;
    $lon = $ipInfo->lon;
    $zip = $ipInfo->zip;
    $city = $ipInfo->city;
@endphp

@php
    $news = simplexml_load_file("https://news.google.com/rss/search?q=Moving%From%20$region&hl=en-US&gl=US&ceid=US:en");

    $counter = 0;
    // foreach($news->channel->item as $item) {
    //     if ($counter == 8) {
    //     break;
    //   }
    //     $item->title . "\n";
    //     $item->link . "\n";
    //     $counter++;
    //     echo strip_tags($item->description) ."\n";
    // }
@endphp

@php
    $request = file_get_contents("http://api.openweathermap.org/data/2.5/weather?zip=$zip,us&units=imperial&appid=8877be84a05b1cb45969c84ae61d3497");
    $jsonPHP = json_decode($request, true);

    $temp = $jsonPHP['main']['temp'];

    // echo $jsonPHP["main"]["humidity"];

@endphp

{{-- <div id="weather">
    <p class="text-black">{{ $temp }} degrees in {{ $city }}</p>
</div> --}}

{{--
    <div class="news-box">
        <div class="news-box-header">
            <div class="">
            <span class="fa fa-news"></span> <span class="count">News</span>
            </div>
        @foreach ($news->channel->item as $item)
            @php
                if ($counter == 5) {
                    break;
                }
            @endphp

            <div class="news-box-contents">
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-xs-10"><a href="{{ $item->link }}" target="_blank">{{ $item->title }}</a></label>
                    </div>
                </div>
            </div>
            <div class="news-box-footer">
                <div class="right"><a href="{{ $item->link }}">Read More</a></div>
            </div>
            @php
                $counter++;
            @endphp
        @endforeach
    </div> --}}

{{-- <div c>
@foreach ($news->channel->item as $item)
    @php
        if ($counter == 5) {
            break;
        }
    @endphp
    <ul class="header-extras d-none d-sm-flex mx-auto mx-md-0 mb-4 mb-md-0">
        <li>
            <div id="news">
                <p>{{ $item->title }}</p>
                <a href="{{ $item->link }}">Read More</a>
            </div>

        </li>
    </ul>
    @php
        $counter++;
    @endphp
@endforeach
</div> --}}

{{-- {{$ip}}

{{$region}}

{{$timezone}} --}}
