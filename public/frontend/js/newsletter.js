//$(document).ready(function(response){  
//	$('#homesignup').on('submit', function(e){  
//            e.preventDefault();
//            var email = $('#email-letter').val();
//            var email_valid = validateEmail(email);
//            
//            var token = $('input[name=_token]').val();
//            if(email_valid == true){
//              $.ajaxSetup({
//                headers: {
//                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                }
//              });
//              $.ajax({
//                url: 'subscribe',
//                type: 'post',
//                data: {_token: token, email: email},
////                headers: {
////                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
////                },
//                success:function(res)  {
//                    console.log(res);
//                },
//                error: function(err){
//                    alert(JSON.stringify(err));
//                    console.log('Something went wrong', status, err);
//                }
//              });
//            }else{
//              validateEmail(email);
//            }
////            }
//	});
//    });
    
$(document).ready(function(response){
	$('#mc-embedded-subscribe-form').on('submit', function(e){  
            e.preventDefault();
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
//                headers: {
//                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                },
                success:function(res)  {
                    console.log(res);
                },
                error: function(err){
                    alert(JSON.stringify(err));
                    console.log('Something went wrong', status, err);
                }
              });
            }else{
              validateEmail(email);
            }
//            }
	});
    });