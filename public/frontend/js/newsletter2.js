$(function() {
    $("form").submit(function() { return false; });
});



//$("#mc-embedded-subscribe").click(function(){
//    $("#news-error").html("");
//    var input_val = $("#pop-input").val();
//    if(input_val){
//       var email =validateEmail(input_val);
//         if(email == true){
//    	 $("#news-error").html("");
//    	 $('#thanks').modal('show');
//    	 $('#myModal').modal('hide');
//    	 }else{
//    	 $("#news-error").html("<img src={{ asset('public/frontend/images/error.png') }}/>Please enter valide email");
//    	 }
//    }else{
//        $("#news-error").html("<img src={{ asset('public/frontend/images/error.png') }}/>Email is Requaired");
//    }
//
//});
//
//$("#index-letter").click(function(){
//    $("#index_letter_error").html("");
//    var input_val = $("#email-letter").val();
//    if(input_val){
//       var email = validateEmail(input_val);
//       
//         if(email == true){
//    	   $('#thanks').modal('show');
//    	   $("#index_letter_error").html("");
//    	 }else{
//    	   $("#index_letter_error").html("<img src={{ asset('public/frontend/images/error.png') }}/>Please enter valide email");
//    	 }
//    }else{
//        $("#index_letter_error").html("<img src={{ asset('public/frontend/images/error.png') }}/>Email is Requaired");
//    }
//});

// Check all fields on submit
//document.addEventListener('submit', function (event) {
//
//    // Only run on forms flagged for validation
//    if (!event.target.classList.contains('validate')) return;
//
//    // Prevent form from submitting
//    event.preventDefault();
//    
//    // Submit the form
//    var submitMailChimpForm = function (form) {
//
//        // Get the Submit URL
//        var url = form.getAttribute('action');
//        console.log(url);
//
//    };
//
//}, false);

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