
   $(document).ready(function($) {
       var callback = GetURLParameter('callback');
if(callback=='questions'){
    var islogin = getCookie('islogin');
     if (islogin == 'yes') {
            var edit_email = getCookie('edit_email');

            var access_token = getCookie('access_token');

            var edit_name = getCookie('edit_name');

            var edit_phone = getCookie('edit_phone');
            var phone_number_verfied = getCookie('phone_number_verfied');

          
            $('#access_token').val(access_token);
            $('#edit_email').html(edit_email);
            $('#edit_name').html(edit_name);
            $('#edit_name_input').val(edit_name);
            $('#edit_email_input').val(edit_email);
            $('#edit_phone').html(edit_phone);
            $('#register_login_div').hide();
            Questionnaire(event);

        }
}else{
       var LoginWithFb=0;
           var isthankspage= window.location.pathname;
if(isthankspage=='/experiment/thanks'){
    thanksfunction();
  
}else{
     var islogin = getCookie('islogin');

if (islogin == 'yes') {
var edit_email = getCookie('edit_email');

var access_token = getCookie('access_token');

var edit_name = getCookie('edit_name');

var edit_phone = getCookie('edit_phone');
var phone_number_verfied = getCookie('phone_number_verfied');

  
    $('#access_token').val(access_token);
    $('#edit_email').html(edit_email);
    $('#edit_name').html(edit_name);
    $('#edit_name_input').val(edit_name);
    $('#edit_email_input').val(edit_email);
    $('#edit_phone').html(edit_phone);
    $('#register_login_div').hide();
  thanksfunction();
       $('#update').show();
	
} 
}
}
 function urlParam(name) {

                var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);

                if (results == null) {
                    return null;
                }
                else {
                    return results[1] || 0;
                }
            }
   });
         


<!-- Login JS -->


    $(document).ready(function ($) {
       var LoginWithFb=0;
           window.fbAsyncInit = function() {
          FB.init({appId: '620810454655743', status: true, cookie: true, xfbml: true, version: 'v2.6'});

      };
      (function() {
        var e = document.createElement('script'); e.async = true;
        e.src = document.location.protocol +
          '//connect.facebook.net/en_US/all.js';
        document.getElementById('fb-root').appendChild(e);
      }());
  
    $("#profil").hide();
    $("#requst").on("click", function () {
        document.forms["myform"].reset();
       LoginWithFb=0;
         $('#reg_password_div').show();
        $('#fb_btn').show();
        $("#login_1").removeClass("active");
        $("#register_me").addClass("active")
        $("#profil").show()
        $("#home").hide();
         $("#forgot_page").hide();
          $("#account_id").val('');
    $("#password").val('');
     $('#account_id_error').hide();
     $('#password_error').hide();
    });
    $("#acept").on("click", function () {
        $('#reg_password_div').show();
        $('#fb_btn').show();
        $("#home").show();
        $("#profil").hide();
               $("#reset_p").hide();
        $("#register_me").removeClass("active");
        $("#login_1").addClass("active");
    });
});
  function login(event) {
    event.preventDefault();
    setCookie('invite_link', '', -15);
    $("#reset_p").hide();
    var login_type = 'EMAIL';
    var error = 0;
    var account_id = $("#account_id").val();
    var password = $("#password").val();
    if (account_id.length == 0) {
        $('#account_id_error').html('<span>Please enter email</span>');
        document.getElementById('account_id_error').style.display = 'block';
        error = 1;
    } else {
        document.getElementById('account_id_error').style.display = 'none';
    }
    if (password.length == 0) {
        $('#password_error').html("<span>Please enter password</span>");
        document.getElementById('password_error').style.display = 'block';
        error = 1;
    } else {
        document.getElementById('password_error').style.display = 'none';
    }
    if (error == 0) {
        $('#or').hide();
        $('#fb_btn').hide();
        $('#password_error').hide();
        $('#account_id_error').hide();
        $("#login_submit").attr("disabled", "disabled");
        $("#loading").show();
        $("#login_submit").hide();
        $("#forgot_password_link").hide();
        var senddata = {"account_id": account_id, "password": password, "login_type": login_type};

        $.ajax({
            url: "https://engine.twodegrees.io/profile/login",
            headers: {
                'X-TWO_DEGREE-APP_ID': '2kEtmnFQrLK4'},
            method: 'POST',
            data: senddata,
           success: function (data) {
                var callback = GetURLParameter('callback');

                console.log(data);
                $('#or').show();
                $('#fb_btn').show();
                $("#reset_p").hide();
                var phone_number_verfied = data.phone_number_verfied;
              
                $('#access_token').val(data.access_token);
                $('#edit_email').html(data.email);
                $('#edit_name').html(data.name);
                $('#edit_name_input').val(data.name);
                $('#edit_email_input').val(data.email);
                $('#edit_phone').html(data.phone_number);
                $('#register_login_div').hide();
               
                checkCookie(data.email);
                 setCookie('invite_link',data.invite_ink,1);
                 setCookie('chat_id', data.chat_id, 1);
                setCookie('access_token', data.access_token, 1);
                setCookie('edit_email', data.email, 1);
                setCookie('edit_name', data.name, 1);
                setCookie('edit_name_input', data.name, 1);
                setCookie('edit_phone', data.phone_number, 1);
                setCookie('phone_number_verfied', phone_number_verfied, 1);
                if(callback=='questions'){
                    Questionnaire(event);
                }else{
                    thanksfunction();
 $('#update').show();
                }
            },
            error: function (e) {
                $('#or').show();
                $('#fb_btn').show();
                $("#reset_p").hide();
                $("#login_submit").removeAttr("disabled", "disabled");
                $("#loading").hide();
                $("#login_submit").show();
                $("#forgot_password_link").show();
                $('#password_error').hide();
                $('#account_id_error').hide();
                var errorText = e.responseText;

                var json = $.parseJSON(errorText);
                var error_code = json.error;
                var msg = json.status;
                if (error_code == '2001') {
                    $('#account_id_error').html('');
                    $('#account_id_error').html("<span>" + json.message + "</span>");
                    $('#account_id_error').show();

                } else if (error_code == '1000') {
                    $('#password_error').html('');
                    $('#password_error').html("<span>" + json.message + "</span>");
                    $('#password_error').show();
                } else if (error_code == '2003') {
                    $('#password_error').html('');
                    $('#password_error').html("<span><a id='download_link' href='http://www.twodegrees.io/download/'>Download</a> the app and verify your phone # to confirm your account.</span>");
                    $('#password_error').show();
                } else {
                    $('#password_error').hide();
                    $('#account_id_error').hide();
                    $('#result').html("<span>" + json.message + "</span>");
                    $('#result').show();
                }
            }
        });
    } else {
        $("#reset_p").hide();
        $("#login_submit").removeAttr("disabled", "disabled");
        $('#result').hide();
    }


}



function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie(email) {
    var islogin = getCookie("islogin");
    var useremail = getCookie("email");
    if (useremail != "") {
       // alert("Welcome again " + useremail);
    } else {
        useremail = email;
        if (useremail != "" && useremail != null) {
            setCookie("email", useremail, 1);
            setCookie("islogin", 'yes', 1);
        }
    }
}
function forgot(event){

	event.preventDefault();
	 var reg = /\S+@\S+\.\S+/;
	 var error = 0;
    var forgot_email = $("#forgot_email").val();
    var phone_number = $("#forgot_phone_number").val();
    if (forgot_email.length == 0 && phone_number.length == 0) {
        $("#error_div").show();
        $('#forgot_result').hide();
        
        error = 1;
    }
    if (error == 0) {
		 $("#error_div").hide();
        $("#forgot_loading").show();
        $("#form_submit").hide();
        $("#form_cancel").hide();
        
        var senddata = {"email": forgot_email,'phone_number':phone_number};

                        $.ajax({
                            url: 'https://engine.twodegrees.io/profile/user/forget_password',
                            headers: {
                                'X-TWO_DEGREE-APP_ID': '2kEtmnFQrLK4'},
                            method: 'POST',
                            data: senddata,
                            success: function (data) {
		$("#reset_p").show();
                $("#forgot_loading").hide();
                       hide_forgot_page(event);
                            },
                            error: function (e) {
	 $("#forgot_loading").hide();
                                $("#form_submit").show();
                                 $("#form_cancel").show();
                               
                                var errorText = e.responseText;

                                var json = $.parseJSON(errorText);
                                var error_code = json.error;
  $('#forgot_result').html("<span>" + json.message + "</span>");
  $('#forgot_result').show();
                           
                            }
                        });
	}
 
}
 function show_forgot_page(event){
     event.preventDefault();
   $("#reset_p").hide();
     $("#home").hide();
      $("#error_div").hide();
           $("#form_submit").show();
        $("#form_cancel").show()
 $("#account_id").val('');
    $("#password").val('');
     $('#account_id_error').hide();
     $('#password_error').hide();
    $("#forgot_email").val('');
     $("#forgot_phone_number").val('');
        $("#update").hide();
      $("#forgot_page").show();
     
}
function hide_forgot_page(event){
  event.preventDefault();
   $('#or').show();
       $('#fb_btn').show();
        $('#forgot_result').hide();
     $("#error_div").hide();
      $("#update").hide();
      $("#forgot_page").hide();
       $("#home").show();   
     
}

<!-- Update JS -->

  
   function valueChanged()
{
                   if($('#edit_student_enrolled').is(":checked")) {  
        $("#edit-school-name").show();
                   } else{
        $("#edit-school-name").hide(); 
}
}
 function editForm()
{ var phoneinputFlag=1;
     var allgood = 1;
                var reg = /\S+@\S+\.\S+/;
                var num_reg = /^[0-9]+$/;
                 var device_token = document.forms["updateform"]["device_token"].value;
                
                var profile_type = document.forms["updateform"]["profile_type"].value;
                var referred_by = document.forms["updateform"]["referred_by"].value;
                var country_code = document.forms["updateform"]["country_code"].value;
              
                  var email = document.forms["updateform"]["email"].value;
           
              var age = $('input[name=edit_age]:checked').val();
                if (age == '-18') {
                    allgood = 0;
                    $("#edit_age_limit_error").css("display", "block");
                } else {
                    $("#edit_age_limit_error").css("display", "none");
                }
              
				 var access_token = document.forms["updateform"]["access_token"].value;
				 var phone_number_verfied = getCookie("phone_number_verfied");
				 
				 if(phone_number_verfied=='true'){
					phoneinputFlag=0;
					 					 var edit_phone = getCookie("edit_phone");
					var phone_num =edit_phone;
                
				}else{
					phoneinputFlag=1;
					var phone1 = document.forms["updateform"]["phone1"].value;
                var phone2 = document.forms["updateform"]["phone2"].value;
                var phone3 = document.forms["updateform"]["phone3"].value;
				 if (phone1 == null || phone1 == "") {
                    allgood = 0;
                    $("#edit_phone_error").css("display", "block");
                }
                else {
                    $("#edit_phone_error").css("display", "none");
                }
                var phone_num = phone1 + phone2 + phone3;
				 var check1 = $.isNumeric(phone_num);
                var allfill = phone_num.length;
                if (!check1) {
                    allgood = 0;
                    $("#edit_phone_error").html('<span>Please enter valid phone number</span>');
                    $("#edit_phone_error").css("display", "block");
                } else if (allfill < 10) {
                    allgood = 0;
                    $("#edit_phone_error").html('<span>Please enter valid phone number</span>');
                    $("#edit_phone_error").css("display", "block");
                } else {
                    $("#edit_phone_error").css("display", "none");
                }
					
				}
                        
                if ($('#edit_terms').is(":checked")) {
                    if (allgood == 1) {
                       
                        $("#edit_submit").css("display", "none");
                       
                        $("#edit_wait").css("display", "block");
                       
                        $("#edit_terms_error").css("display", "none");
                       
                       var name = document.forms["updateform"]["name"].value;
                        document.getElementById("edit_phone_number").value = phone_num;
                        document.getElementById("edit_name").value = name;
                        var name = $("#edit_name").val();
if(phoneinputFlag==1){
                        var senddatalist = {"phone_number": phone_num,"device_type":'IOS', "referred_by": referred_by,"device_token": device_token, "profile_type": profile_type,"pay_account_type":'PAYPAL',"pay_account_id":'PAYPAL',"country_code":'US'};
}else{
	                        var senddatalist = {"device_type":'IOS', "referred_by": referred_by,"device_token": device_token, "profile_type": profile_type,"pay_account_type":'PAYPAL',"pay_account_id":'PAYPAL',"country_code":'US'};

}
                      
                        $.ajax({
                            url: "https://engine.twodegrees.io/profile/user/"+email+"",
                            headers: {
                                'X-TWO_DEGREE-APP_ID': '2kEtmnFQrLK4',
                            'X-TWO_DEGREE-APP_TOKEN':access_token},
                            method: 'PUT',
                            data: senddatalist,
                            success: function (data) {
                        
                                var invite_ink=data.invite_ink;
                                if(invite_ink=='' || !invite_ink){
                                    invite_ink='#';
                                }
 setCookie('invite_link', data.invite_ink, 1);
 window.location.href = "http://twodegrees.io/experiment/thanks";
                              
                            },
                            error: function (e) {
                              alert('something wrong.Please try again');

                                $("#edit_submit").show();
                                $("#edit_wait").hide();
                                var errorText = e.responseText;

                                var json = $.parseJSON(errorText);
                                var error_code = json.error;

                                if (error_code == '2011') {
                                    $('#edit_referred_by_error').html("<span>" + json.message + "</span>");

                                    $('#edit_referred_by_error').show();
                                    $('#edit_username-error').hide();
                                } else if (error_code == '2012') {
                                    $("#edit_username-error").html("<span>" + json.message + "</span>");
                                    $("#edit_username-error").css("display", "block");
                                                                        $('#edit_referred_by_error').hide();
                                } else {
                                    $("#edit_sys_error").html(json.message);
                                    $("#edit_sys_error").show();
                                }
                            }
                        });

                    }
                } else {
                    $("#edit_terms_error").css("display", "block");
                }
}

function logoutmyaccount(event){
	event.preventDefault();
         setCookie('chat_id', '', -15);
	setCookie("email", '', -15);
            setCookie("islogin", 'no', -15);
			setCookie('access_token','', -15);
                setCookie('edit_email','', -15);
                setCookie('edit_name','', -15);
   setCookie('invite_link','', -15);
                setCookie('edit_name_input','', -15);
                setCookie('edit_phone','', -15);
				 setCookie('phone_number_verfied','', -15);
				  window.location = "http://www.twodegrees.io/experiment";
}
  function Referal_Link(event){
 
    event.preventDefault();
     var invite_link = getCookie("invite_link");
   window.location = invite_link;
  }
 function thanksfunction() {
    $("#rf_link_input_div").hide();
    $("#rf_link_a_div").show();
    var invite_link = getCookie("invite_link");
    $('#rf_link_span').html('');
    $('#rf_link_span').html(invite_link);

    $('#rf_link_span').attr('href', invite_link);
    if (!invite_link) {
        invite_link = 'http://www.twodegrees.io/';
    }
    $('#tweet_button_id').attr('data-text', "Download #TwoDegrees with my referral link and we both can earn $100 #iPhone #Android");

    $('#tweet_button_id').attr('data-url', invite_link);
    $('#fb_button_id').attr('data-href', invite_link);
    var isUseAble = document.queryCommandSupported("copy");

    if (isUseAble == false) {
        $("#copy_btn").addClass("safari_btn_for_copy");
        $("#rf_link_input_div").show();
        $('#rf_link_input').val(invite_link);
        $('#rf_link_input').focus();
        $('#rf_link_input').select();

        $("#rf_link_a_div").hide();
        $('#copy_btn').html('Press Ctrl+C');
        document.getElementById("copy_btn").disabled = true;
    }


}


   
    function logout() {
FB.getLoginStatus(function(response) {
    if (response && response.status === 'connected') {

        FB.logout(function(response) {
            
        });
    } else if (response.status === 'not_authorized') 
        {
             FB.logout(function(response) {
            
            });
        }
});}

     function runAPI(accessToken) {

    var accessToken = accessToken;
    console.log(accessToken);
    LoginWithFb = 1;
    var url = '/me?fields=name,email,about,gender';
    FB.api(url, function (response) {
        console.log(response);
        var gender = response.gender;
        if (gender.length > 0) {reg
            gender = gender.toUpperCase();
        } else {
            gender = 'FEMALE';
        }
        // response will now have everything you need
        var user_id = response.id;
        var user_name = response.name;
        var user_email = response.email;

        var myurl = 'https://engine.twodegrees.io/profile/check_social_login/FACE_BOOK/' + user_id;
        $.ajax({
            url: myurl,
            headers: {
                'X-TWO_DEGREE-APP_ID': '2kEtmnFQrLK4'},
            method: 'GET',
            data: '',
            success: function (data) {
                console.log(data);
                $('#reg_password_div').show();
                var senddata = {"account_id": user_id, "password": accessToken, "login_type": 'FACE_BOOK'};

                $.ajax({
                    url: "https://engine.twodegrees.io/profile/login",
                    headers: {
                        'X-TWO_DEGREE-APP_ID': '2kEtmnFQrLK4'},
                    method: 'POST',
                    data: senddata,
                   success: function (data) {
                         var callback = GetURLParameter('callback');
                        console.log(data);

                        $("#reset_p").hide();
                        $("#home").hide();
                        $('#password_error').hide();
                        var phone_number_verfied = data.phone_number_verfied;
                        if (phone_number_verfied == true) {

                            document.getElementById("edit_phone_div").style.display = "none";
                        }

                        $('#access_token').val(data.access_token);
                        $('#edit_email').html(data.email);
                        $('#edit_name').html(data.name);
                        $('#edit_name_input').val(data.name);
                        $('#edit_email_input').val(data.email);
                        $('#edit_phone').html(data.phone_number);
                        $('#register_login_div').hide();
                       
                        checkCookie(data.email);
                         setCookie('invite_link',data.invite_ink,1);
                        setCookie('chat_id', data.chat_id, 1);
                        setCookie('access_token', data.access_token, 1);
                        setCookie('edit_email', data.email, 1);
                        setCookie('edit_name', data.name, 1);
                        setCookie('edit_name_input', data.name, 1);
                        setCookie('edit_phone', data.phone_number, 1);
                        setCookie('phone_number_verfied', phone_number_verfied, 1);
   if(callback=='questions'){
                    Questionnaire(event);
                }else{
                    thanksfunction();
 $('#update').show();
                }
 
                    },
                    error: function (e) {
                        $("#reset_p").hide();
                        $("#login_submit").removeAttr("disabled", "disabled");
                        $("#loading").hide();
                        $("#login_submit").show();
                        $("#forgot_password_link").show();
                        $('#password_error').hide();
                        $('#account_id_error').hide();
                        var errorText = e.responseText;
                        console.log(e);
                        var json = $.parseJSON(errorText);
                        var error_code = json.error;
                        var msg = json.status;
                        if (error_code == '2001') {
                            $('#account_id_error').html('');
                            $('#account_id_error').html("<span>" + json.message + "</span>");
                            $('#account_id_error').show();

                        } else if (error_code == '1000') {
                            $('#password_error').html('');
                            $('#password_error').html("<span>" + json.message + "</span>");
                            $('#password_error').show();
                        } else {
                            $('#password_error').hide();
                            $('#account_id_error').hide();
                            $('#result').html("<span>" + json.message + "</span>");
                            $('#result').show();
                        }
                    }
                });
            },
            error: function (e) {
                LoginWithFb = 1;
                var rqst_status = e.status;
                if (rqst_status == '400') {
                    $("#requst").click();
                    $("#name").val(user_name);
                    $("#email").val(user_email);
                    document.getElementById('gender_in_register').value = gender;
                    $('#fbSignup_div').hide();
                    $('#reg_password_div').hide();
                    $("#reg_user_id_for_fb").val('');
                    $("#reg_user_id_for_fb").val(user_id);
                    $("#profile_type").val('');
                    $("#profile_type").val('FACE_BOOK');
                    $("#reg_accessToken_for_fb").val(accessToken);
                }


            }
        });
//                                   
    });
}
           
    function checkFacebookLogin() 
    {
        
        FB.getLoginStatus(function(response) {
          if (response.status === 'connected') {
             var accessToken=response.authResponse.accessToken;
                    // fetchUserDetail();
                   
           runAPI(accessToken);
          // logout();
          $('#fb_btn').hide();
          } 
          else 
          {  $('#fb_btn').show();
            initiateFBLogin();
          }
         });
    }
    function initiateFBLogin()
    {
        FB.login(function(response) {
            checkFacebookLogin();
         },{'scope':'public_profile,email'});
    }
    function signupAPI(accessToken){
                LoginWithFb=1;
                 var accessToken=accessToken;
                                var url = '/me?fields=name,email,about,gender';
                                FB.api(url, function (response) {
                                 console.log(response);
                                
                                   // response will now have everything you need
                                    var user_id = response.id;
                                    var gender=response.gender;
                                    if(gender.length>0){
                                         gender=gender.toUpperCase();
                                    }else{
                                        gender='FEMALE';
                                    }
                                  
                                  var user_name = response.name;
                                    var user_email = response.email;
                                   
                                   
    
                    $("#name").val(user_name);
                     $("#email").val(user_email);
                     document.getElementById('gender_in_register').value = gender;
                     $('#fbSignup_div').hide();
                      $('#reg_password_div').hide();
                       $("#reg_user_id_for_fb").val('');
                       $("#reg_user_id_for_fb").val(user_id);
                        $("#profile_type").val('');
                       $("#profile_type").val('FACE_BOOK');
                       $("#reg_accessToken_for_fb").val(accessToken);
//                                   
                                   });
           }
           function SignupWithFb(){
          
    FB.getLoginStatus(function(response) {
          if (response.status === 'connected') {
             var accessToken=response.authResponse.accessToken;
          
           // fetchUserDetail();
           signupAPI(accessToken);
         //  logout();
          } 
          else 
          {
            initiateFBLoginforSignup();
          }
         });
}
function initiateFBLoginforSignup()
    {
        FB.login(function(response) {
            SignupWithFb();
         },{'scope':'public_profile,email'});
    }
   
    <!-- Register JS -->


    var LoginWithFb=0;
    
 function registerForm(event) {
    
     setCookie('invite_link','', -15);
event.preventDefault();
    var allgood = 1;
    var reg = /\S+@\S+\.\S+/;
    var num_reg = /^[0-9]+$/;
    var device_token = document.forms["myForm"]["device_token"].value;
    var profile_type = document.forms["myForm"]["profile_type"].value;
    var referred_by = document.forms["myForm"]["referred_by"].value;
    var country_code = document.forms["myForm"]["country_code"].value;
    var name = document.forms["myForm"]["name"].value;
    var gender = document.forms["myForm"]["gender"].value;
    var user_id=document.forms["myForm"]["user_id"].value;
    var accessToken=document.forms["myForm"]["accessToken"].value;
var gender_length= gender.length;
if(gender_length <1){
   allgood = 0;
     $("#gender-error").css("display", "block");
}else{
     $("#gender-error").css("display", "none");
}
    var name_length = name.length;
    if (name_length ==0) {
        allgood = 0;
        $("#name-error").css("display", "block");
    } else if (name_length < 5) {
        allgood = 0;
        $("#name-error").html('<span>please enter at least 5 characters</span>')
        $("#name-error").css("display", "block");
    } else {
        $("#name-error").hide();
    }

    var email = document.forms["myForm"]["email"].value;
    var email_verify = reg.test(email);
    if (email == null || email == "") {
        allgood = 0;
        $("#username-error").css("display", "block");
    } else if (!email_verify) {
        allgood = 0;
        $("#username-error").html('<span>Please enter valid email</span>');
        $("#username-error").css("display", "block");
    } else {
        $("#username-error").css("display", "none");
    }
    if(LoginWithFb!=1){
    var password = document.forms["myForm"]["password"].value;
    var pass = password.length;
  if (password == null || password == "") {
					                    allgood = 0;
                    $("#password-error_2").css("display", "none");
                    $("#password-error").css("display", "block");
                } else if (pass < 6) {
                    allgood = 0;
                    $("#password-error").css("display", "none");
                    $("#password-error_2").css("display", "block");
                } else if (pass > 16) {
                    allgood = 0;
                    $("#password-error").css("display", "none");
                    $("#password-error_2").css("display", "block");
                } else {
                    $("#password-error_2").css("display", "none");
                    $("#password-error").css("display", "none");
                }
				 var confirm_password = document.forms["myForm"]["confirm_password"].value;
				 var confirm_pass_length = confirm_password.length;
				 if(confirm_pass_length > 0){
                                    
					   $("#reg_confirm_password_error").css("display", "none");
				 if(confirm_password!=password){
                                      $("#reg_confirm_password_error").html('<span>Password mismatch</span>');
					 					  allgood = 0;
					 $("#reg_confirm_password_error").css("display", "block");
				 }
				 }else if(confirm_pass_length ==0){
                                     
					  allgood = 0;
					 $("#reg_confirm_password_error").html('<span>Please enter confirm password</span>');
					  $("#reg_confirm_password_error").css("display", "block");
				 }
                                 
                                 }
      var age = $('input[name=age]:checked').val();
    if (age == '-18') {
        allgood = 0;
        $("#age_limit_error").css("display", "block");
    } else {
        $("#age_limit_error").css("display", "none");
    }

    var phone1 = document.forms["myForm"]["phone1"].value;
    var phone2 = document.forms["myForm"]["phone2"].value;
    var phone3 = document.forms["myForm"]["phone3"].value;

    if (phone1 == null || phone1 == "") {
                    allgood = 0;
                    $("#phone_error").css("display", "block");
                }
                else {
                    $("#phone_error").css("display", "none");
                }
                var phone_num = phone1 + phone2 + phone3;
                var check1 = $.isNumeric(phone_num);
                var allfill = phone_num.length;
                if (!check1) {
                    allgood = 0;
                    $("#phone_error").html('<span>Please enter valid phone number</span>');
                    $("#phone_error").css("display", "block");
                } else if (allfill < 10) {
                    allgood = 0;
                    $("#phone_error").html('<span>Please enter valid phone number</span>');
                    $("#phone_error").css("display", "block");
                } else {
                    $("#phone_error").css("display", "none");
                }

    if ($('#terms').is(":checked")) {
        if (allgood == 1) {
            $("#submit").css("display", "none");
           
            $("#wait").css("display", "block");
            
            $("#terms_error").css("display", "none");
 if(LoginWithFb!=1){
      var testdata = {"name": name, "gender": gender, "phone_number": phone_num, "email": email, "password": password, "referred_by": referred_by, "country_code": country_code, "device_token": device_token,'device_type':'IOS',"profile_type":profile_type,'pay_account_type':'PAYPAL','pay_account_id':'PAYPAL'};

 }else{
         
      var testdata = {"name": name, "gender": gender, "phone_number": phone_num, "email": email,"referred_by": referred_by, "country_code": country_code, "device_token": device_token,'device_type':'IOS','profile_id':user_id,'profile_token':accessToken,"profile_type":'FACE_BOOK','pay_account_type':'PAYPAL','pay_account_id':'PAYPAL'};

 }
           
           
          
                        $.ajax({
                            url: 'https://engine.twodegrees.io/profile/user',
                            headers: {
                                'X-TWO_DEGREE-APP_ID': '2kEtmnFQrLK4'},
                            method: 'POST',
                            data: testdata,
                            success: function (data) {
   var invite_ink=data.invite_ink;
                                if(invite_ink=='' || !invite_ink){
                                    invite_ink='#';
                                }
                                 $('#fb-share-button').attr('data-href',invite_ink);
 setCookie('invite_link', data.invite_ink, 1);
                                window.location = "http://twodegrees.io/experiment/thanks";
                            },
                            error: function (e) {

                                $("#submit").show();
                                $("#wait").hide();
                                var errorText = e.responseText;

                                var json = $.parseJSON(errorText);
                                var error_code = json.error;

                                if (error_code == '2011') {
                                    $('#referred_by_error').html("<span>" + json.message + "</span>");

                                    $('#referred_by_error').show();
                                    $('#username-error').hide();
                                } else if (error_code == '2012') {
                                    $("#username-error").html("<span>" + json.message + "</span>");
                                    $("#username-error").css("display", "block");
                                    // $('#username-error').show();
                                    $('#referred_by_error').hide();
                                } else {
                                    $("#sys_error").html(json.message);
                                    $("#sys_error").show();
                                }
                            }
                        });

                    }
                } else {
                    $("#terms_error").css("display", "block");
                }
            }
               function myFunction() {
                var textdata = $("#check_ref").html();
                var referred_by = document.forms["myForm"]["referred_by"].value;
                var rf_lg = referred_by.length;
                if (rf_lg > 0) {
                    $('#referred_by').attr('readonly', 'readonly');
                    $("#check_ref").html('Remove');
                    $('#check_ref').addClass('redclass');
                }

            }
			function removeRef() {
                var textdata = $("#check_ref").html();
                if (textdata == 'Remove') {
                    $('#check_ref').removeClass('redclass');
                    $("#check_ref").html('');
                    $('#referred_by').val('');
                    $('#referred_by').removeAttr('readonly');
                }
            }
				function removeRef2() {
                var textdata = $("#edit_check_ref").html();
                if (textdata == 'Remove') {
                     $("#edit_check_ref").html('');
                    $('#edit_referred_by').val('');
                    $('#edit_referred_by').removeAttr('readonly');
					 $('#edit_check_ref').removeClass('redclass');
                }
            }
			       function myFunction2() {
                var textdata = $("#edit_check_ref").html();
                var referred_by = document.forms["updateform"]["referred_by"].value;
                var rf_lg = referred_by.length;
                if (rf_lg > 0) {
                    $('#edit_referred_by').attr('readonly', 'readonly');
					$("#edit_check_ref").html('Remove');
                    $('#edit_check_ref').addClass('redclass');
                }

             
            }
             function autotab(original, destination) {
                if (original.getAttribute && original.value.length == original.getAttribute("maxlength")){
                    destination.focus();
                }
            }
                function autotab2(original, destination) {
                if (original.getAttribute && original.value.length == original.getAttribute("maxlength")){
                    destination.focus();
                }
            }
                function student_school_name(school_div) {
                                        var via = "none";
                                        var chboxs = document.getElementsByName("student_enrolled");
                                        for (var i = 0; i < chboxs.length; i++) {
                                            if (chboxs[i].checked) {
                                                via = "block";
                                                break;
                                            }
                                        }
                                        document.getElementById(school_div).style.display = via;
                                    }
   function shareFbLink(event){
     event.preventDefault();
        var invite_link = getCookie("invite_link");
        if(!invite_link){
          invite_link='http://www.twodegrees.io/';
      }
   var descr='Download #TwoDegrees with my referral link and we both can earn $100 #iPhone #Android @AppStore @GooglePlay ';
   FB.ui(
    {
      method: 'share',
 name: 'name',
        href: invite_link,
       description: descr,
         caption: invite_link,
          display: 'popup'
    },
    function(response) {
        if (response && !response.error_code) {
          //alert('Posting completed.');
        } else {
         // alert('Error while posting.');
        }
      return false;
    });
}
            $("#age_limit_error").css("display", "none");
            $("#referred_by_error").css("display", "none");
            $("#email-error").css("display", "none");
            
         function copy(event)
        {
            
            try
            {
               var isUseAble= document.queryCommandSupported("copy");
               if(isUseAble=='false'){
                     document.getElementById("copy_btn").disabled = true;
                     $( "#copy_btn" ).addClass( "safari_btn_for_copy" );
                   return false;
               }else{
               
               var invite_link = getCookie("invite_link");
                     var $temp = $("<input>");
  $("body").append($temp);
  $temp.val(invite_link).select();
  document.execCommand("copy");
  $temp.remove();
  $("#copy_btn").addClass("copied_act");
  $('#copy_btn').html('copied');
  document.getElementById("copy_btn").disabled = true;
            }
        }
            catch(e)
            {
           alert(e);
            }
        }
 function Questionnaire(event) {
    var chat_id = getCookie("chat_id");
    $.ajax({
        url: "https://engine.twodegrees.io/campaign/survey/SC_EXP_QUES/user/" + chat_id,
        headers: {
            'X-TWO_DEGREE-APP_ID': '2kEtmnFQrLK4'           
        },
        method: "GET",
       
        success: function (data) {
            var i;
            var j;

            var questions = data.questions;
            console.log(questions);
            var Qlength = questions.length;
            var html = '';
            for (i = 0; i < Qlength; i++) {
                var myAnswer=questions[i].answer;
                var Qtitle = questions[i].name;
                var is_required = questions[i].is_required;
               var ans_id=myAnswer.id;
              
               var ans=myAnswer.ans;
               
                 var id = questions[i].id;
                
                           
                html += "<div class='form-group'><h3>" + Qtitle + "</h3>";
                if (questions[i].kind == "SELECT" || questions[i].kind == "BOOLEAN") {
                    var options = questions[i].options;
                    var Oplength = options.length;
                    html += "<div class='radio-clas'>";
                                    
                    for (j = 0; j < Oplength; j++) {
                        
                        if(ans==options[j]){
                               html += "<div class='field'><input type='radio'  name=" + id + " class='input_class' checked='' id=" + id + "  value=" + options[j] + "><span>" + options[j] + "</span></div>";
                        }else{
                                html += "<div class='field'><input type='radio'  name=" + id + " class='input_class' id=" + id + "  value=" + options[j] + "><span>" + options[j] + "</span></div>"; 
                  
                        }
                    }
                    html += "</div>";
                }
                else if (questions[i].kind == "TEXT") {
                   
                   if (is_required == true) {
                          if(ans){
                        html += "<textarea type='text' class='form-control input_class'  id=" + id + " name=" + id + " required='true'>"+ans+"</textarea>";
                      }else{
                       html += "<textarea type='text' class='form-control input_class'  id=" + id + " name=" + id + " required='true'></textarea>";
                      } } else {
                       if(ans){
                        html += "<textarea type='text' class='form-control input_class'  id=" + id + " name=" + id + ">"+ans+"</textarea>";
                      }else{
                        html += "<textarea type='text' class='form-control input_class'  id=" + id + " name=" + id + "></textarea>";
                    }
                      }

                }
                else if (questions[i].kind == "DATE") {
                    if (is_required == true) {
                        if(ans){
                             var res = ans.split("T");
                             
                               var partsOfDate = res[0].split('-');
                   var mm=partsOfDate[1];
                   var dd=partsOfDate[2];
                   var yyyy=partsOfDate[0];
                  
                       res = mm+'/'+dd+'/'+yyyy;
                       
                        html += "<input type='text' class='form-control input_class' id=" + id + "  name=" + id + " placeholder='MM/DD/YYYY' value="+res+" required='true' />";
                                           }else{
                                         html += "<input type='text' class='form-control input_class' id=" + id + "  name=" + id + " placeholder='MM/DD/YYYY' required='true' />";
                               
                                           }
                                       } else {
                                           if(ans){
                                               var res = ans.split("T");
                                                
                               var partsOfDate = res[0].split('-');
                   var mm=partsOfDate[1];
                   var dd=partsOfDate[2];
                   var yyyy=partsOfDate[0];
                  
                       res = mm+'/'+dd+'/'+yyyy;
                       
                        html += "<input type='text' class='form-control input_class' id=" + id + "  name=" + id + " value="+res+" placeholder='MM/DD/YYYY'  />";
                    }else{
                            html += "<input type='text' class='form-control input_class' id=" + id + "  name=" + id + " placeholder='MM/DD/YYYY'  />";
                    
                    }}
                }
                html += "<div class='col-sm-12 error' id=" + id + "_error></div>";
                html += "</div>";
            }
            html += "<div id='result_rs' class='col-sm-12 error'></div>";
            html += "<div class='form-group'><button onclick='submitQestions(event)' id='qestion_submit' type='button' class='btn btn-defult'>Submit</button></div> ";

            $('#Qform').append(html);

        },
        error: function (e) {
            console.log(e);
        }
    });

    $('#QuestionnaireForm').show();
    $("#register_login_div").hide();
    $("#update").hide();

}
function submitQestions(event) {
    $('#result_rs').hide();
    var chat_id = getCookie("chat_id");
    var access_token = getCookie('access_token');
    var allgood = 1;
    event.preventDefault();

    var answers = {};
    $(".input_class").each(function (index) {
        var id = $(this).attr("id");
        var type = $(this).attr("type");
        var placeholder = $(this).attr('placeholder');

        if (type == 'radio') {
            var value = $("input[name=" + id + "]:checked").val();

            if (!value) {
                allgood = 0;
                $("#" + id + "_error").html('<span>Please select an Option</span>');
                $("#" + id + "_error").show();
            } else {
                $("#" + id + "_error").hide();
            }
        } else if (type == 'text') {
            var value = $(this).val();
          
            if (placeholder == 'MM/DD/YYYY') {

                if (value.length > 0) {
                    var re = /^(0[1-9]|1[0-2])\/([0-2]\d|3[01])\/\d{4}$/;
                    var response = re.test(value);

                    if (response) {
                       
                        
                   var partsOfDate = value.split('/');
                   var mm=partsOfDate[0];
                   var dd=partsOfDate[1];
                   var yyyy=partsOfDate[2];
                  
                        var value = yyyy+'-'+mm+'-'+dd+' 00:00:00';
                       
                        $('#' + id + '_error').hide();
                    } else {
                        allgood = 0;
                        $('#' + id + '_error').html('Please enter date in given format.(MM/DD/YYYY)');
                        $('#' + id + '_error').show();

                    }
                } else if ($(this).prop('required')) {
                    allgood = 0;
                    $('#' + id + '_error').html('Please enter date in given format.(MM/DD/YYYY)');
                    $('#' + id + '_error').show();
                } else {
                    $('#' + id + '_error').hide();
                }
            } else {
                if (value.length < 1 && $(this).prop('required')) {
                    allgood = 0;
                    $('#' + id + '_error').html('Please enter this field');
                    $('#' + id + '_error').show();
                } else {
                    $('#' + id + '_error').hide();
                }
            }

        }
        if (!value) {

        } else {
            answers[id] = value;
        }
    });

    if (allgood == 1) {
        var myForm = {};
        var ans_string = JSON.stringify(answers);
        myForm["answers"] = ans_string;

        $.ajax({
            url: "https://engine.twodegrees.io/campaign/survey/SC_EXP_QUES/user/" + chat_id + "/answer",
            headers: {
                'X-TWO_DEGREE-APP_ID': '2kEtmnFQrLK4',
                'X-TWO_DEGREE-APP_TOKEN': access_token},
            method: 'POST',
            data: myForm,
            success: function (data) {
                console.log(data);
                window.location.href = "http://twodegrees.io/experiment/thanks";
            },
            error: function (e) {

                $('#result_rs').show();
                var errorText = e.responseText;

                var json = $.parseJSON(errorText);
                var error_code = json.error;

                if (error_code == '4000') {
                    // $('#result_rs').html("<span>" + json.message + "</span>");
                    $('#result_rs').html("<span>Please enter valid Birthday date(MM/DD/YYYY)</span>");
                } else {
                    $('#result_rs').html("<span>" + json.message + "</span>");
                }

            }
        });
    }
}
function GetURLParameter(name) {
       var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results==null){
       return null;
    }
    else{
       return results[1] || 0;
    }
    }
  
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){

	//if(animating) return false;
	animating = true;
	
	
	current_fs = $(this).parent();
	console.log(current_fs.context.id);
		next_fs = $(this).parent().next();
	
	if(current_fs.context.id =="step1" ){
		
		
		  $('#msform').validate({
		  errorElement: "p",
		   rules: {
			company_name: "required",
			address1: "required",

			business_email: {
			 required: true,
			 email: true
			},
			
		   },
		   messages: {
			company_name: "Please enter your firstname",
			address1: "Please enter your lastname",
		
			business_email: {
			 required: "Please provide a email",
			 email: "Please enter a valid email address"
			},
			
										
		   },
		
		   submitHandler: function(form) {
     alert("cxvcvcvxcvcxv dfdsfsdfd");
		
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'transform': 'scale('+scale+')'});
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 1, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'linear'
	})
          }
		   
		  });
		 
		  
		
	}
	
	if(current_fs.context.id =="step2" ){
		alert(current_fs.context.id);
		
		  $('#msform').validate({
		  errorElement: "p",
		   rules: {
			incentive: "required",
			msg_friends: "required",

			
			
		   },
		   messages: {
			incentive: "Please enter your firstname",
			msg_friends: "Please enter your lastname",
		
			
			
										
		   },
		   submitHandler: function(form) {
     alert(current_fs.context.id);
		
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'transform': 'scale('+scale+')'});
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 1, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'linear'
	})
          }
		   
		  });
		 
		  
		
	}

	
	
	
});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 1, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'linear'
	});
});

$(".submit").click(function(){
	return false;
})

window.onload = function(){
	//$('#step1').css('pointer-events','none');
    //Check File API support
    if(window.File && window.FileList && window.FileReader) {
        var filesInput = document.getElementById("files");
		var picFile1;
	   
		var filesInput1 = document.getElementById("files1");
        filesInput1.addEventListener("change", function(event){
            var files1 = event.target.files; //FileList object
            var output1 = document.getElementById("result1");  
           $('#result1').empty();
            for(var i = 0; i< files1.length; i++) {
                var file1 = files1[i];
                //Only pics
                if(!file1.type.match('image'))
                  continue;
                
                var picReader1 = new FileReader();
                picReader1.addEventListener("load",function(event){
                    picFile1 = event.target;
                    var div1 = document.createElement("div");
                    div1.innerHTML = "<img  class='thumbnail' src='" + picFile1.result + "'" +
                            "title='" + picFile1.name + "'/><div onclick='myFunc();' class='mask'><img  src='images/mask.png'/></div>";
							
							 var filesInput2 = document.getElementById("apended_logo");
							   filesInput2.innerHTML = "<div class='logo-over'><img src='"+ picFile1.result+"'></div><div class='company-n'><p id='company-nm'>Comapny Name</p></div>";
							   $('#step1').css('pointer-events','auto');
							   var filesInput3 = document.getElementById("appended_logo_wrapper");
							  
							   filesInput3.innerHTML = "<img src='"+ picFile1.result+"'>";
                    output1.insertBefore(div1,null);   
				
				//	$('#company-nm').html(form_fields[0]['value']);
                    div1.children[1].addEventListener("click", function(event){
                       div1.parentNode.removeChild(div1);
					    
                    });
                });
                 //Read the image
                picReader1.readAsDataURL(file1);
            }
        });
		
		 filesInput.addEventListener("change", function(event){
            var files = event.target.files; //FileList object
			
            var output = document.getElementById("result");
$('#result').empty();            
            for(var i = 0; i< files.length; i++) {
                var file = files[i];
                //Only pics
                if(!file.type.match('image'))
                  continue;
                
                var picReader = new FileReader();
                picReader.addEventListener("load",function(event){
                    var picFile = event.target;
					 
                    var div = document.createElement("div");
                    div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" +
                            "title='" + picFile.name + "'/>";
							var filesInput4 = document.getElementById("main-back-img");
							   filesInput4.innerHTML = "<img src='"+ picFile.result+"' id='advrt-img'><div class='advert-logo' id='apended_logo'><div class='logo-over'><img src='"+ picFile1.result+"'></div><div class='company-n'><p id='company-nm'>Comapny Name</p></div></div><div class='mask'></div>";
							$('#company-nm').html(form_fields[0]['value']);
				
                    output.insertBefore(div,null);   
                    div.children[1].addEventListener("click", function(event){
                       div.parentNode.removeChild(div);
                    });
                });
                 //Read the image
                picReader.readAsDataURL(file);
            }
        });
		
		
    } else {
        console.log("Your browser does not support File API");
    }
}

function myFunc() {

   document.getElementById('files1').click();
}
function myFunc2() {

   document.getElementById('files2').click();
}

//jQuery time


$(".submit").click(function(){
	return false;
})
$(".fieldset_head").click(function(){
  $(".filed-set-hendler").hide();
   $(".filed-set-hendler").css('transform','none');
  var id=$(this).find('a').attr('id');
  
  if(id== 'company-filedset'){
	 
     $("#company-name").show();
    $("#company-name").css('opacity','1');
    $("#company-name").css('transform','none');
    $("#company-name").css('position','relative');
     }
  else if(id== 'advertisement-filedset'){
     $("#advertisement").show();
    $("#advertisement").css('opacity','1');
    $("#advertisement").css('transform','none');
    $("#advertisement").css('position','relative');
	
     }
  else if(id== 'audience-filedset'){
     $("#audience").show();
    $("#audience").css('opacity','1');
    $("#audience").css('transform','none');
    $("#audience").css('position','relative');
     }
  else if(id== 'payment-filedset'){
     $("#payment").show();
    $("#payment").css('opacity','1');
    $("#payment").css('transform','none');
    $("#payment").css('position','relative');
     }
});


  
$("#business-type").change(function () {
	
  	$(".sub-hidden").hide();
    var value=$("#business-type :selected").attr('value');
  	var val_id="#"+value;
	$(".sec-hide").show();
  	$(val_id).show();
});
$(".submit").click(function(){
$("#advrt-img").css('src','');
	$("#advrt-img").css('src','images/advertise.jpg');
});