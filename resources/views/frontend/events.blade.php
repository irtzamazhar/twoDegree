@include('frontend.include.header')
<div class="page-header section-start event-header">
    <h1>Upcoming Events</h1>
</div>
<div class="container">
    <div class="event-page section-start">
        @if(count($events) > 0)
        @php $i = 1 @endphp
        @foreach($events as $event)
        <div class="event-list">
            <div class="event-list-custom">
                <div class="date-wrapper">
                    <p class="date">
                        <time class="event-meta-heading eventlist-meta-date">{{ date('M', strtotime($event->event_day)) }}<br><span>  {{ date('d', strtotime($event->event_day)) }}</span></time>
                                    </p>
                            </div>
                            <div class="main-image-wrapper">

                                <a href="{{ url('event-detail/'.$event->id) }}">
                                    <div class="main-image">
                                        <img src="{{ asset('storage/app/public/images/'.$event->event_image) }}" />
                                        <div class="hover-affect">

                                            <p>View Event Detail</p>
                                        </div>

                                    </div>

                                </a>
                            </div>
                            <div class="entry-title-wrapper">
                                <h1 class="entry-title">{{ $event->event_title }}</h1>
                                <p class="date">
                                    <span class="eventlist-meta-time">
                                        <time class="event-time-12hr"> {{ date('h:iA', strtotime($event->event_timing1)) }} - {{ date('h:iA', strtotime($event->event_timing2)) }}</time>
                                    </span>
                                </p>
                                <div class="event-description section-start">
                                    <div class="short-map">
                                        <div id="map-<?= $i ?>" lat="{{ $event->place_lat }}" lng="{{ $event->place_lng }}" class="map" style="width: 240px; height: 110px; background-color: grey;"></div>
                                        <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3574.238432714159!2d-80.10272218526981!3d!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d91e2036cafcb3%3A0x9e1b70993a199880!2sFAU+Tech+Runway!5e0!3m2!1sen!2s!4v1506068695044" width="240" height="110" frameborder="0" style="border:0" allowfullscreen></iframe>-->

                                    </div>
                                    <p>{{ $event->event_detail }}</p>
                                </div>
                                <div class="entry-header">
                                    <p class="entry-more-link"><a href="{{ url('event-detail/'.$event->id) }}"></a></p>
                                    <p class="entry-actions"><span class="like-count"><i class="fa fa-share-alt" aria-hidden="true"></i>Share</span></p>
                                    <p class="entry-actions"><span class="like-count"><i class="fa fa-heart" aria-hidden="true"></i>0 Likes</span></p>

                                </div>

                            </div>

                </div>
            </div>
            @php $i++ @endphp
            @endforeach
            {{$events->links()}}
            @else
            <h2>No Event Yet.</h2>
            @endif
        </div>

    </div>
    @include('frontend.include.footer')
    <script src="{{ asset('public/frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/bootstrap.js') }}"></script>
    <script>                
        var maps = [];
        var markers = [];
        function initMap() {
            var $maps = $('.map');
            $.each($maps, function (i, value) {
                var uluru = { lat: parseFloat($(value).attr('lat')), lng: parseFloat($(value).attr('lng')) };

                var mapDivId = $(value).attr('id');

                maps[mapDivId] = new google.maps.Map(document.getElementById(mapDivId), {
                    zoom: 15,
                    center: uluru
                });

                markers[mapDivId] = new google.maps.Marker({
                    position: uluru,
                    map: maps[mapDivId]
                });
            })
        }
    </script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyApozjbWyK5N9aq4Kc8DIpTxJg2DHuLVDU&callback=initMap"></script>
</body>
