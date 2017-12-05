function checkEmail(){
    var email = $('#mce-EMAIL').val();
    console.log(email);
    var token = $('input[name=_token]').val();
    if(email){
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'post',
            url: "checkEmail",
            data: {email: email},
            success: function(res){
                $( '#email_status' ).html(res);
                if(res=="Thanks"){
                    alert('done');
                    var email = $('#mce-EMAIL').val();
                    var email_valid = validateEmail(email);

                    var token = $('input[name=_token]').val();
                    if(email_valid == true){
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
                            $('#mc-embedded-subscribe-form')[0].reset();
                            $('#thanks').modal('show');
                        },
                        error: function(err){
                            alert(JSON.stringify(err));
                            console.log('Something went wrong', status, err);
                        }
                      });
                    }else{
                      validateEmail(email);
                    }
                }else{
                    return false;	
                }
            }
        });
    }else{
        $( '#email_status' ).html("");
        return false;
    }
}

$("#mc-embedded-subscribe").click(function(){
    $("#mc-embedded-letter-error").html("");
    var input_val = $("#mce-EMAIL").val();
    if(input_val){
       var email = validateEmail(input_val);
       
         if(email == true){
    	   $("#mc-embedded-letter-error").html("");
    	 }else{
    	   $("#mc-embedded-letter-error").html("<img src={{ asset('public/frontend/images/error.png') }}/>Please enter valide email");
    	 }
    }else{
        $("#mc-embedded-letter-error").html("<img src={{ asset('public/frontend/images/error.png') }}/>Email is Requaired");
    }
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
$("#scroll-den").click(function(){
    var n = $(document).height();
    $('html, body').animate({ scrollTop: $(window).scrollTop() + 600}, 500);
});

$('#news-form input').keydown(function(e) {
    if (e.keyCode == 13) {
       $("#news-submit").click();
    }
});