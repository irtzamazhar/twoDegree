$(document).ready(function() {
    $('#yearly').click(function() {
        $('#y').show();
        $('#m').hide();
        $('#d').hide();
    });

    $('#monthly').click(function() {
        $('#m').show();
        $('#y').hide();
        $('#d').hide();
    });

    $('#daily').click(function() {
        $('#d').show();
        $('#m').hide();
        $('#y').hide();
    });
});
