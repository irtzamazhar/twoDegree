var form_fields;


function step1func() {
            
    form_fields = $(":input").serializeArray();
      $('.compny-prof').empty();
    var html = "<li><div class='icon-wrapper'><img src='images/mobie-icon.png' /></div>";
    html += "<p>Phone Number : <span>" + form_fields[6]['value'] + " " + form_fields[7]['value'] + "</span></p></li>";
    
    html += "<li><div class='icon-wrapper'><img src='images/mail-icon.png' /></div>";
    html += "<div class='overflow'><p>Email : </p><span>" + form_fields[8]['value'] + "</span></div></li>";
    
    html += "<li><div class='icon-wrapper'><img src='images/gps-icon.png' /></div>";
    html += "<div class='overflow'><p>Address : </p><span>" + form_fields[1]['value'] + " " + form_fields[3]['value'] + "</span></div></li>";
    
    $('.compny-prof').append(html);
	$('#company-nm').html(form_fields[0]['value']);
	$("html, body").animate({ scrollTop: 260 }, "slow");
}
function step2func() {
            
    form_fields = $(":input").serializeArray();
    $('.advertise-list').empty();
   
    var html = "<li><div class='icon-wrapper'><img src='images/plan-icon.png' /></div>";
    html += "<p>Promotion : <span>Until " + form_fields[26]['value'] + " days</span></p></li>";
    
    $('.advertise-list').append(html);
	$("html, body").animate({ scrollTop: 260 }, "slow");
}
function step3func() {
    form_fields = $(":input").serializeArray();
    $('.audiens-list').empty();
   
    var html = "<li><div class='icon-wrapper'><img src='images/wifi-icon.png' /></div>";
    html += "<p>Advertise in Miles : <span>" + form_fields[30]['value'] + " Miles</span></p></li>";
    
    html += "<li><div class='icon-wrapper'><img src='images/gender-icon.png' /></div>";
    html += "<p>Target Gender : <span>" + form_fields[31]['value'] + "</span></p></li>";
    
    $('.audiens-list').append(html);
	$("html, body").animate({ scrollTop: 260 }, "slow");
}
function step4func() {
    $('#summary-company-name').val(form_fields[0]['value']);
    $('#summary-company-email').val(form_fields[8]['value']);
    $('#summary-company-address').val(form_fields[1]['value']);
    $('#summary-company-type').val(form_fields[9]['value']);
    $('#summary-incentive').val(form_fields[25]['value']);
    $('#summary-promotion-days').val(form_fields[26]['value']);
    $('#summary-msd-friends').val(form_fields[27]['value']);
    $('#summary-promotion-discription').val(form_fields[28]['value']);
    $('#summary-target-audience').val(form_fields[30]['value']);
    $('#summary-target-gender').val(form_fields[31]['value']);
    $('#summary-target-age').val(form_fields[32]['value'] + " to " + form_fields[33]['value']);
	$("html, body").animate({ scrollTop: 260 }, "slow");
    
}

$('#step1').click(step1func);
$('#step2').click(step2func);
$('#step3').click(step3func);
$('#step4').click(step4func);

//$("select").change(showValues);
//showValues();

var inputFrom = document.getElementById('location');

var autocompleteFrom = new google.maps.places.Autocomplete(inputFrom);
google.maps.event.addListener(autocompleteFrom, 'place_changed', function () {
    var place = autocompleteFrom.getPlace();

    var place_id = place.id;
    var place_name = place.name;
    var place_lat = place.geometry.location.lat();
    var place_lng = place.geometry.location.lng();
    var address = place.formatted_address;
    var senddata = {"address": address, "id": place_id, "lat": place_lat, "lng": place_lng, "name": place_name};



});