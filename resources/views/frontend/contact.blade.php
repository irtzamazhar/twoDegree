@include('frontend.include.header')
    @foreach($contactImage as $image)
    <div class="page-header section-start contact-header2">
        <h1>Contact</h1>
    </div>
    @endforeach

    <div class="container">
        <div class="support-page section-start">
            @foreach($contactImage as $image)
                <div style="display: none;" id="page-image">{{ $image['banner_image'] }}</div>
            @endforeach
            <div class="col-md-7 col-sm-8 col-xs-12 centerize">
                <form id="contactData" method="post" action="{{ url('/createContact') }}">
                    <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                    <fieldset class="form-item fields name required">
                        <div class="title">Name <span class="required">*</span></div>
                        <legend>Name</legend>
								
                        <div class="field first-name">
                            <label class="caption">
                                <input class="field-element field-control" name="fname" id="fname" x-autocompletetype="given-name" type="text" spellcheck="false" maxlength="30" data-title="First">
                                First Name
                            </label>
                            <p class="contact-er"></p>
                        </div>
                        <div class="field last-name">
                            <label class="caption">
                                <input class="field-element field-control" name="lname" id="lname" x-autocompletetype="surname" type="text" spellcheck="false" maxlength="30" data-title="Last">
                                Last Name
                            </label>
                            <p class="contact-er"></p>
                        </div>
                    </fieldset>
                    <div class="form-item field email required">
                        <label class="title">Email Address <span class="required">*</span></label>
                        <input class="field-element" name="email" id="email" x-autocompletetype="email" type="text" spellcheck="false">
			<p class="contact-er"></p>
                    </div>
                    <div class="form-item field email required">
                        <label class="title">Subject<span class="required">*</span></label>
                        <input class="field-element" name="subject" id="subject" x-autocompletetype="text" type="text" spellcheck="false">
			<p class="contact-er"></p>
                    </div>
                    <div class="form-item field textarea required">
                        <label class="title">Message <span class="required">*</span></label>
                        <textarea class="field-element" name="message" id="message"></textarea>
                        <p class="contact-er"></p>
                    </div>
                    <div class="form-button-wrapper">
                        <input class="global-btn " type="submit" value="Submit">
                    </div>

                </form>
                <div class="thanks-given">
                    <p>We look forward to hearing from you. <span><a href="{{ url('/app-download') }}">Thanks!</a></span></p>
                </div>
            </div>
        </div>

    </div>
@include('frontend.include.footer')
<div id="contact-thanks" class="modal fade custom-modal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thank You!</h4>
      </div>
      <div class="modal-body">
        <p>Our support team will contact you very soon.</p>
      </div>
    </div>
  </div>
</div>
<script src="{{ asset('public/frontend/js/jquery.min.js') }}"></script>
<script src="{{ asset('public/frontend/js/bootstrap.js') }}"></script>
<script src="{{ asset('public/frontend/js/jquery.validate.js') }}"></script>
<script>
$(document).ready(function() {
    
    $('#contactData').validate({
        errorElement: "p",
     rules: {
          fname: "required",
          lname: "required",

          email: {
           required: true,
           email: true
          },
          subject: "required",

          message: "required"
     },
     messages: {
          fname: "Please enter your firstname",
          lname: "Please enter your lastname",

          email: {
           required: "Please provide a email",
           email: "Please enter a valid email address"
          },
          subject: "Please Enter Subject",
          message: "Please Write a Message"
     },
     submitHandler: function(form) {
      $('#contact-thanks').modal('show');
      }
     });
    
  $('#contactData').on('submit', function(e){
      e.preventDefault();
      var fname = $('#fname').val();
      var lname = $('#lname').val();
      var email = $('#email').val();
      var subject = $('#subject').val();
      var message = $('#message').val();
      
      var email_valid = validateEmail(email);
      
      // csrf token
      var token = $('input[name=_token]').val();
      if($('#contactData').valid()){
          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          $.ajax({
            url: 'createContact',
            type: 'post',
            data: {_token: token, fname: fname, lname: lname, email: email, subject: subject, message: message},
            success:function(res){
//                $("#contactData").html(res);
                $("#contactData")[0].reset();
            },
            error: function(err){
//                alert(JSON.stringify(err));
                console.log('Something went wrong', status, err);
            }
          });
      }      
  })
  // validate signup form on keyup and submit

  

 });
 
 function validateEmail(email){
    var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    var valid = emailReg.test(email);
      
    if(!valid) {
        return false;
    } else {
        return true;
    }
 }
</script>
<script type="text/javascript">
    var image = $('#page-image').text();
    var addres = "storage/app/public/images/" + image ;
    console.log(addres);
    $(".contact-header2").css('background-image', 'url(' + addres + ')');
</script>
    
</body>
