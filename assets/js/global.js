var clickedButton   =   '';

$(document).on('click', 'button[type=submit], input[type=submit]', function(){
    clickedButton   =   $(this);
});