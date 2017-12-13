@include('frontend.include.header')
@foreach($topSection as $t_section)
    <div class="slide-banner section-start slide-image2">
        <div class="banner-inner">
            {!! $t_section['section_content'] !!}
            <div style="display: none;" id="section-image">{{ $t_section['section_image'] }}</div>
            <a href="{{ url('/view/app') }}" class="global-btn">Download</a>
            <div class="scrool-wrapper">
                <div class="scroll-dn" id="scroll-den">
                    <span>Scroll down</span>
                </div>
            </div>
        </div>
    </div>
@endforeach

@foreach($middleSection as $m_section)
    <div class="app-view section-start">
        <img src="{{ asset('storage/app/public/images/'.$m_section['section_image']) }}" />
    </div>
@endforeach

@foreach($bottomSection as $b_section)
    <div class="slide-banner common-friends2 section-start">
        <div class="banner-inner">
            {!! $b_section['section_content'] !!}
            <div style="display: none;" id="section-image2">{{ $b_section['section_image'] }}</div>

            <a href="{{ url('/app-download') }}" class="global-btn">Find Out</a>
        </div>
    </div>
@endforeach
    <div class="download-section section-start">
        <div class="container">
            <div class="download-btns">
                <a href="https://itunes.apple.com/us/app/two-degrees/id905597963?mt=8"><img src="{{ asset('public/frontend/images/appStoreBadge.png') }}" /></a>
                <a href="https://play.google.com/store/apps/details?id=zoomapps.twodegrees"><img src="{{ asset('public/frontend/images/playStoreBadge.png') }}" /></a>
            </div>
            <p>Discover new friends and make new connections with
                <a href="{{ url('/') }}"><img src="{{ asset('public/frontend/images/two.png') }}" /></a> <br> Available for iPhone and Android</p>
        </div>

    </div>
    <div class="newsletter-section section-start">
        <div class="container">
            <p>Sign up with your email address to receive news and updates.</p>
            <div class="newsletter-inner section-start">
                <form id="homesignup">
                    {{ csrf_field() }}
                    <input type="text" class="newsletter-input" placeholder="Email Address" name="email" id="email-letter" />
                    <button type="button" class="global-btn" id="index-letter" value="Submit">Sign up</button>
                    <p id="index_letter_error" class="error-wrapper"></p>
                </form>
            </div>
            <span>We respect your privacy.</span>
        </div>
    </div>
    <div class="fau-section section-start">
        <div class="container">
            <img src="{{ asset('public/frontend/images/fau.png') }}" />
            <p>Proud to be an FAU Tech Runway Company</p>
        </div>
    </div>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <h2>Sign up with your email address to receive news and updates.</h2>
                <div class="newsletter-inner">
                    <form  id="news-form">
                        {{ csrf_field() }}
                        <input class="newsletter-input" placeholder="Email Address" type="email" id="pop-input">
                        <button type="button" class="global-btn" id="news-submit" value="Submit">Sign up</button>
			<p id="news-error" class="error-wrapper"></p>
		    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<div id="thanks" class="modal fade custom-modal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thank You!</h4>
      </div>
      <div class="modal-body">
        <p>We will keep you updated with latest promotions and offers.</p>
      </div>
      
    </div>

  </div>
</div>
@include('frontend.include.footer')

    <script src="{{ asset('public/frontend/js/newsletter.js') }}"></script>
    
    <script type="text/javascript">
        var image = $('#section-image').text();
        var addres = "storage/app/public/images/" + image ;
        $(".slide-image2").css('background-image', 'url(' + addres + ')');
        
        var image2 = $('#section-image2').text();
        var addres2 = "storage/app/public/images/" + image2 ;
        $(".common-friends2").css('background-image', 'url(' + addres2 + ')');
    </script>
  
</body>
