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
                success:function(res){
                    $('#thanks').css('opacity','1');
                    $('#thanks').show();
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
    $(".close").click(function(){
        $('#thanks').hide();
        $('#thanks').css('opacity','0');
        $('#myModal').hide();
        $('#myModal').css('opacity','0');
    })