@include('frontend.include.header')
@foreach($eventImage as $image)
    <div class="page-header section-start event-header2" >
@endforeach
        @foreach ($eventss as $event)
        <h1>{{ $event->event_title }}<br><span class="tagline">MeetUp. StartUp. ScaleUp.</span> </h1>
        
    </div>

    <div class="container">
        <div class="event-detail section-start">
            @foreach($eventImage as $image)
                <div style="display: none;" id="page-image">{{ $image['banner_image'] }}</div>
            @endforeach
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
                        <!-- Load Facebook SDK for JavaScript -->
                        <div id="fb-root"></div>
                        <script>
                            window.fbAsyncInit = function() {
                              FB.init({
                                appId            : '128704691158646',
                                autoLogAppEvents : true,
                                xfbml            : true,
                                version          : 'v2.11'
                              });
                            };

                            (function(d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0];
                                if (d.getElementById(id)) return;
                                js = d.createElement(s); js.id = id;
                                js.src = 'https://connect.facebook.net/en_US/sdk.js';
                                fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));
                        </script>
                        <!-- Your like button code -->
                        <div class="fb-like" 
                             data-href="http://localhost/twodegree/blog/{{ $event->id }}"
                             data-layout="button" 
                             data-action="like" 
                             data-size="large" 
                             data-show-faces="false" 
                            data-share="true">
                        </div>
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
    <script type="text/javascript">
        var image = $('#page-image').text();
        var addres = "../storage/app/public/images/" + image ;
        $(".event-header2").css('background-image', 'url(' + addres + ')');
    </script>
</body>
