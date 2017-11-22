//$(document).ready(function(response){
//    $('#mc-embedded-subscribe-form').on('submit', function(e){  
//        e.preventDefault();
//        var email = $('#mce-EMAIL').val();
//        var email_valid = validateEmail(email);
//
//        var token = $('input[name=_token]').val();
//        if(email_valid == true){
//          $.ajaxSetup({
//            headers: {
//              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//            }
//          });
//          $.ajax({
//            url: 'subscribe',
//            type: 'get',
//            data: {_token: token, email: email},
//            success:function(res){
//                $('#mc-embedded-subscribe-form')[0].reset();
//                $('#thanks').modal('show');
//            },
//            error: function(err){
//                alert(JSON.stringify(err));
//                console.log('Something went wrong', status, err);
//            }
//          });
//        }else{
//          validateEmail(email);
//        }
//    });
//});

function checkEmail(){
    var email = $('#mce-EMAIL').val();
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