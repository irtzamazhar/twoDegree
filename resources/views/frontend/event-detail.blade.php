@include('frontend.include.header')
    <div class="page-header section-start event-header">
        @foreach ($eventss as $event)
        <h1>{{ $event->event_title }}<br><span class="tagline">MeetUp. StartUp. ScaleUp.</span> </h1>
        
    </div>

    <div class="container">
        <div class="event-detail section-start">
            
            <div class="page-desc">
                <p class="event-time">
                  <time class="event-meta-heading">{{ date('l', strtotime($event->event_timing1)) }}, {{ date('M d, Y', strtotime($event->event_day)) }}</time><br>
                  <time class="event-time-12hr"> {{ date('h:iA', strtotime($event->event_timing1)) }} - {{ date('h:iA', strtotime($event->event_timing2)) }}</time>
                 
                </p>
              </div>
            <h2>{{ $event->address }}</h2>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="event-des">
                <p>{{ $event->event_detail }}</p>
                <div class="review-post section-start">
                    <div class="likes ">
                        <i class="fa fa-heart" aria-hidden="true"></i>
                        <p>2 likes</p>

                    </div>
                    <div class="share">
                        <i class="fa fa-share-alt" aria-hidden="true"></i>
                        <p>Share</p>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="event-map">
                    <div id="map" style="width:100%; height:200px; frameborder:0; border:0; background: grey;"></div>
                    <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3574.238432714159!2d-80.10272218526981!3d26.383483489023988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d91e2036cafcb3%3A0x9e1b70993a199880!2sFAU+Tech+Runway!5e0!3m2!1sen!2s!4v1506068695044" width="100%" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>-->
                </div>
            </div>
            
            </div>
            @endforeach
        </div>

    </div>
@include('frontend.include.footer')
    <script src="{{ asset('public/frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/bootstrap.js') }}"></script>
    <script>
        function initMap() {
            var uluru = { lat: {{ $event->place_lat }}, lng: {{ $event->place_lng }} };
            var map = new google.maps.Map(document.getElementById('map'), {
              zoom: 15,
              center: uluru
            });
            var marker = new google.maps.Marker({
              position: uluru,
              map: map
            });
        }

    </script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyApozjbWyK5N9aq4Kc8DIpTxJg2DHuLVDU&callback=initMap"></script>
</body>
