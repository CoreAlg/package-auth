$(document).ready(function () {
    $("#buttonForgetPassword").on("click", function (e) {
        var form = $("#formForgetPassword");
        var action = form.attr('action');
        var request = form.serialize();

        ajaxCall("POST", action, request, function (response) {

            // 422 is validation error code, let's process validation error
            if (response.code === 422) {
                displayValidationError(response);
                return false;
            }

            return true;

            // // I am done, let's have a vacation (cool)
            // if (response.code === 200) {
            //     location.reload();
            // }
        });
    });

    $("#buttonUpdatePassword").on("click", function (e) {
        var form = $("#formUpdatePassword");
        var action = form.attr('action');
        var request = form.serialize();

        ajaxCall("POST", action, request, function (response) {

            // 422 is validation error code, let's process validation error
            if (response.code === 422) {
                displayValidationError(response);
                return false;
            }

            return true;

            // // I am done, let's have a vacation (cool)
            // if (response.code === 200) {
            //     location.reload();
            // }
        });
    });
});