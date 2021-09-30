
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

    return false;
}

$(document).ready(function (e) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});