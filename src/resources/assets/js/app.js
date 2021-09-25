
// Ajax function
var ajaxCall = function (method, url, data, callback) {

    $("#ajaxloader").show();
    $(".validation-error").empty();

    $.ajax({
        url: url,
        type: method,
        data: data,
        complete: function (response) {
            $("#ajaxloader").hide();

            var output = {
                "code": response.status,
                "json": response.responseJSON,
                "text": response.responseText,
                "raw": response,
            };

            callback(output);
        }
    });
};

// Auto Log Off
var autoLogoffCall = function () {
    var logoff = BASE_URL + "/logoff";
    var current_url = window.location.href;
    ajaxCall("GET", logoff, { current_url: current_url }, function (response) {
        window.location.replace(response.json.data);
    });
};

function displayValidationError(response) {
    var errors = response.json.errors;

    $.each(errors, function (index, value) {
        $("#ve-" + index).html(value[0]);
    });

    tostMe('Validation Error.', 'error');

    return false;
}

function tostMe(message, type = 'success') {

    var title = "Success";
    var class_name = 'success';

    if (type !== 'success') {
        var title = "Error";
        class_name = 'danger';
    }
    console.log(type);
    $(document).Toasts('create', {
        class: 'bg-' + class_name,
        title: title,
        // subtitle: subtitle,
        body: message
    })
}

$(document).ready(function (e) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});