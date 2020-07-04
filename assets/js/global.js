var clickedButton   =   '';
var base_url = window.location.origin;
var url_path = new URL(window.location.href).pathname;
var dropzone = null;

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

function IsEmpty(value) {
    return ( $.trim( value ) == '' );
}

function _form(f) {
		
    var b = clickedButton;
    var t = b.text();
    var dt = b.data('type');

    $.ajax({
        type: f.attr('method'),
        url: f.attr('action'),
        data: f.serialize(),
        dataType: 'json',
        beforeSend: function() {
        	b.attr('disabled', true);
        	b.text('Loading...');
        	$('.alert-dismissible').fadeOut(function() { $(this).remove(); });
		    $('.text-danger').fadeOut(function() { $(this).remove(); });
        },
        success: function(res) {
            if (res.status == true) {

                if (typeof res.text != 'undefined') {
                    var success = $('<div class="alert alert-success alert-dismissible fade show" />').html(res.text);
                    success.insertBefore(f);
                    $('html, body').animate({scrollTop:$(f).offset().top - 200}, 500);
                    b.text(t);
                    b.removeAttr('disabled');
                } 

                if (res.action == 'redirect') {
                    if (typeof res.slow != 'undefined') {
                        setTimeout(function() {
                            window.location = res.url;
                        }, 2500);
                    } else {
                        setTimeout(function() {
                            window.location = res.url;
                        }, 1000);
                    }
                }

            } else {
            	b.text(t);
                b.removeAttr('disabled');

                if (!IsEmpty(res.text.data)) {
                    $.each(res.text.data, function(key, data){
                        $(data.attr_class).parents('.form-group').append('<span class="text-danger">' + data.message + '</span>');
                    });
                } else {
                    if (!IsEmpty(res.text)) {
                        var danger = $('<div class="alert alert-danger alert-dismissible fade show" />').html(res.text);
                        danger.insertBefore(f);
                    }
                }
            }

            if (res.action == 'redirect') {
                if (typeof res.slow != 'undefined') {
                    setTimeout(function() {
                        window.location = res.url;
                    }, 2500);
                } else {
                    setTimeout(function() {
                        window.location = res.url;
                    }, 1000);
                }
            }
        }
    });
}