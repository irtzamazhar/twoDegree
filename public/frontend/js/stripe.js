Stripe.setPublishableKey('pk_test_D7R3KmuY3m0USr5bZKJBivBS');
var $form = $('#payment-form');

$form.submit(function(e){
   $('#payment-error').addClass('hidden');
   $form.find('button').prop('disabled', true);
   Stripe.createToken({
    name: $('.card-name').val(),
    number: $('.card-number').val(),
    cvc: $('.card-cvc').val(),
    exp_month: $('.card-expiry-month').val(),
    exp_year: $('.card-expiry-year').val()
   }, stripeResponseHandler);
   return false;
});

function stripeResponseHandler(status, response) {
    if (response.error) {
        $('#payment-error').removeClass('hidden');
        $('#payment-error').text(response.error.message);
        $form.find('button').prop('disabled', false);
    } else {
        // token contains id, last4, and card type
        var token = response.id;
        $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
        $form.get(0).submit();
    }
}