$(function() {
    $("form").submit(function() { return false; });
});

$(document).ready(function () {
    $('#myModal').modal('show');	
});

$("#index-letter").click(function(){
    $("#index_letter_error").html("");
    var input_val = $("#email-letter").val();
    if(input_val){
        var email = validateEmail(input_val);
            if(email == true){
                var token = $('input[name=_token]').val();
                $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: 'subscribe',
                    type: 'post',
                    data: {_token: token, email: input_val},
                    success:function(res){
                        $('#homesignup')[0].reset();
                        $('#thanks').modal('show');
                    },
                    error: function(err){
                        alert(JSON.stringify(err));
                        console.log('Something went wrong', status, err);
                    }
                });
            }else{
                $("#index_letter_error").html("<img src='public/frontend/images/error.png'/>Please enter a valid email");
            }
    }else{
        $("#index_letter_error").html("<img src='public/frontend/images/error.png'/>Email is Requaired");
    }
});

$("#news-submit").click(function(){
    $("#news-error").html("");
    var input_val = $("#pop-input").val();
    if(input_val){
        var email = validateEmail(input_val);
            if(email == true){
                var token = $('input[name=_token]').val();
                $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: 'subscribe',
                    type: 'post',
                    data: {_token: token, email: input_val},
                    success:function(res){
                        $('#news-form')[0].reset();
                        $('#myModal').modal('hide');
                        $('#thanks').modal('show');
                    },
                    error: function(err){
                        alert(JSON.stringify(err));
                        console.log('Something went wrong', status, err);
                    }
                });
            }else{
                $("#news-error").html("<img src='public/frontend/images/error.png'/>Please enter a valid email");
            }
    }else{
        $("#news-error").html("<img src='public/frontend/images/error.png'/>Email is Requaired");
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