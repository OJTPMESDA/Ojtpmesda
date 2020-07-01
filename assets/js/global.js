var clickedButton   =   '';

$(document).on('click', 'button[type=submit], input[type=submit]', function(){
    clickedButton   =   $(this);
});

/**
 * For url param use
 */
function jsUri(id) {
    var num = url_path.split('/');
    if (id < num.length) {
        return num[id]
    } else {
        return ''
    }
}