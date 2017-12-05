<form action="https://opensolglobal.us17.list-manage.com/subscribe/post?u=fb6d20aa4e10a25b5c0dd5615&amp;id=537f1a7d8b" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate embed-form" novalidate>
    <div>
        <div class="mc-field-group">
            <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Email Address">
            <button type="submit" class="global-btn clear" id="mc-embedded-subscribe" name="subscribe">Sign up</button>
            <span class="email_status"></span>
        </div>
        <div style="position: absolute; left: -5000px;" aria-hidden="true">
            <input type="text" name="b_fb6d20aa4e10a25b5c0dd5615_537f1a7d8b" tabindex="-1" value="">
        </div>
    </div>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $("form").submit(function (e) {
        $.post('https://opensolglobal.us17.list-manage.com/subscribe/post?u=fb6d20aa4e10a25b5c0dd5615&amp;id=537f1a7d8b', {
           mailchimp_email: $("#mce-EMAIL").val()
        }).success(function (data) {
            console.log(data);
            alert('yes');
         // do stuff on return
        });
        e.preventDefault()
      });
//    $(document).ready( function () {
//        var $form = $('#mc-embedded-subscribe-form');
//        if ( $form.length > 0 ) {
//            $('form button[type="submit"]').bind('click', function ( event ) {
//                if ( event ) event.preventDefault();
//                register($form);
//            });
//        }
//    });
//    
//    function register($form) {
//        $.ajax({
//            type: $form.attr('method'),
//            url: 'https://opensolglobal.us17.list-manage.com/subscribe/post?u=fb6d20aa4e10a25b5c0dd5615&amp;id=537f1a7d8b',
//            data: $form.serialize(),
//            error       : function(err) { alert("Could not connect to the registration server. Please try again later."); },
//            success     : function(data) {
//                if (data.result != "success") {
//                    
//                    alert('not work');
//                    // Something went wrong, do something to notify the user. maybe alert(data.msg);
//                } else {
//                    console.log(data);
//                    alert('done');
//                    // It worked, carry on...
//                }
//            }
//        });
//    }
//    $(".embed-form").submit(function(e){
//        var data = $(".embed-form").serializeArray();
//        console.log(data);
//        
//        $.aja
//    });
</script>