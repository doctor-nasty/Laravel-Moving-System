@php
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
    <div class="content-wrap pb-0">

<div class="container clearfix">
    <div class="row">
      <div class="col-md-12">
        <div id="news-slider" class="owl-carousel">
            @foreach ($news->channel->item as $item)
            @php
                if ($counter == 5) {
                    break;
                }
            @endphp
          <div class="post-slide">
            <div class="post-img">
              {{-- <img src="https://images.unsplash.com/photo-1596265371388-43edbaadab94?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=301&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=501" alt=""> --}}
              <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
            </div>
            <div class="post-content">
              {{-- <h3 class="post-title">
                <a href="#">Lorem ipsum dolor sit amet.</a>
              </h3> --}}
              <p class="post-description">{{ $item->title }}</p>
              <span class="post-date"><i class="fa fa-clock-o"></i>{{ $item->pubDate }}</span>
              <a target="_blank" href="{{ $item->link }}" id="nwsrm" >read more</a>
            </div>
          </div>
          @php
          $counter++;
      @endphp
  @endforeach

        </div>
      </div>
    </div>
  </div>

    </div>
