$(document).ready(function() {

    $('#check_current').change(function() {
        showPassword(this);
    });

    $('#check_new').change(function() {
        showPassword(this);
    });

    $('#check_confirm').change(function() {
        showPassword(this);
    });

});

function showPassword(checkbox) {
    if (checkbox.checked) {
        $('#' + $(checkbox).attr('inputCheck')).prop('type', 'text');
    } else {
        $('#' + $(checkbox).attr('inputCheck')).prop('type', 'password');
    }
}