@include('frontend.include.header')
    <div class="slide-banner section-start">
        <div class="banner-inner">
            <strong>...</strong>
            <h1>WHERE WORLDS COLLIDE</h1>
            <p>Two Degrees is a new, fast-growing social network that creates valuable relationships by connecting people through mutual friends.</p>
            <a href="{{ url('/app-download') }}" class="global-btn">Download</a>
			<div class="scrool-wrapper">
			<div class="scroll-dn" id="scroll-den">
			<span>Scroll down</span>
			</div>
			</div>
        </div>
    </div>
    <div class="app-view section-start">
        <img src="{{ asset('public/frontend/images/download.png') }}" />
    </div>
    <div class="slide-banner common-friends section-start">
        <div class="banner-inner">
            <strong>...</strong>
            <h1>HOW MANY FRIENDS DO WE HAVE IN COMMON?</h1>

            <a href="{{ url('/app-download') }}" class="global-btn">Find Out</a>
        </div>
    </div>
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
                
                <div id="mc_embed_signup">
                    <form action="https://opensolglobal.us17.list-manage.com/subscribe/post-json?u=fb6d20aa4e10a25b5c0dd5615&amp;id=537f1a7d8b&c=?" method="get" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate my-form" target="_blank" novalidate>
                        {{ csrf_field() }}
                        <!--<div id="mc_embed_signup_scroll">-->
                            <div class="mc-field-group">
                                <input type="email" value="" name="EMAIL" class="required email newsletter-input" id="mce-EMAIL" placeholder="Email Address">
                                 <button type="submit" class="global-btn clear" id="mc-embedded-subscribe" name="subscribe">Sign up</button>
                                 <input type="hidden" name="subscribe_email" id="subscribe_email">
<!--<p id="index_letter_error" class="error-wrapper"></p>-->
                            </div>
                            <!--<div id="mce-responses" class="clear">-->
                                <div class="response" id="mce-error-response" style="display:none; color: red;"></div>
                                <div class="response" id="mce-success-response" style="display:none; color: blue;"></div>
                            <!--</div>-->
<!--                            <div style="position: absolute; left: -5000px;" aria-hidden="true">
                                <input type="text" name="b_fb6d20aa4e10a25b5c0dd5615_537f1a7d8b" tabindex="-1" value="">
                            </div>-->
                            <!--<div class="clear">-->
                           
                            
                                <!--<input type="submit" value="SIGN UP" name="subscribe" id="mc-embedded-subscribe" class="button global-btn">-->
                            <!--</div>-->
                        <!--</div>-->
                    </form>
                </div>
                
<!--                <form id="homesignup" action="subscribe" method="post">
                    {{ csrf_field() }}
                    <input type="text" class="newsletter-input" placeholder="Email Address" name="subscribe_email" id="email-letter" />
                    <button type="submit" class="global-btn" id="index-letter">Sign up</button>
                    <p id="index_letter_error" class="error-wrapper"></p>
                </form>-->
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

@include('frontend.include.footer')
    <script src="{{ asset('public/frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/jquery.validate.js') }}"></script>
    <script src="{{ asset('public/frontend/js/bootstrap.js') }}"></script>
	
	
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
               <form id="news-form" action="">
                    <input class="newsletter-input" placeholder="Email Address" name="email" type="email" id="pop-input">
                    <button type="button" class="global-btn" id="news-submit">Sign up</button>
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
<!--<script src="https://unpkg.com/axios/dist/axios.min.js"></script>-->
    <script src="{{ asset('public/frontend/js/newsletter.js') }}"></script>
    <!--<script src="{{ asset('public/frontend/js/newsletter2.js') }}"></script>-->
    <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
<!--    <script type='text/javascript'>
        (
            function($){
                window.fnames = new Array();
                window.ftypes = new Array();
                fnames[0]='EMAIL';
                ftypes[0]='email';
                fnames[1]='FNAME';
                ftypes[1]='text';
                fnames[2]='LNAME';
                ftypes[2]='text';
            }(jQuery));
            var $mcj = jQuery.noConflict(true);
    </script>-->
    <script type="text/javascript">
        function validateEmail(email){
            var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
            var valid = emailReg.test(email);
            console.log(valid);

            if(!valid) {
                return false;
            } else {
                return true;
            }
        }
        $(document).ready( function () {
            $("#mc-embedded-subscribe").on('click', function(e){
//               e.preventDefault();
               var email = $('#mce-EMAIL').val();
               var email_valid = validateEmail(email);
               
               var token = $('input[name=_token]').val();
               if(email_valid === true){
                   $.ajaxSetup({
                       headers: {
                           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                       }
                   });
                   $.ajax({
                       url: 'subscribe',
                       type: 'get',
                       data: {_token: token, email: email},
                       success:function(res){
                           alert('Data saved in both');
                       },
                       error: function(err){
                           alert(JSON.stringify(err));
                           console.log('Something went wrong', status, err);
                       }
                   });
               }else{
                   validateEmail(email)
               }
               
            });
            // I only have one form on the page but you can be more specific if need be.
//            var $form = $('.my-form');
//            console.log($form);

//            if ( $form.length > 0 ) {
//                $('form button[type="submit"]').bind('click', function ( event ) {
//                    if ( event ) event.preventDefault();
//                    // validate_input() is a validation function I wrote, you'll have to substitute this with your own.
//                    if ( validateEmail($form) ) { register($form); }
//                });
//            }
        });
//        function register($form) {
//            $.ajax({
//                type: $form.attr('method'),
//                url: $form.attr('action'),
//                data: $form.serialize(),
//                cache       : false,
//                dataType    : 'json',
//                contentType: "application/json; charset=utf-8",
//                error       : function(err) { alert("Could not connect to the registration server. Please try again later."); },
//                success     : function(data) {
//                    if (data.result != "success") {
//                        // Something went wrong, do something to notify the user. maybe alert(data.msg);
//                        alert(data);
//                    } else {
//                        alert('Done')
//                        // It worked, carry on...
//                    }
//                }
//            });
//        }
    </script>
  
</body>
