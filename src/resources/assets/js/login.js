$(document).ready(function () {
    $("#buttonSignIn").on("click", function (e) {
        var form = $("#formSignIn");
        var action = form.attr('action');
        var request = form.serialize();

        ajaxCall("POST", action, request, function (response) {

            // 422 is validation error code, let's process validation error
            if (response.code === 422) {
                displayValidationError(response);
                return false;
            }

            if (response.code === 200) {
                if (response.json.status !== 'success') {
                    tostMe(response.json.message, response.json.status);
                    return false;
                }

                window.location.replace(HOME);
            }


            return true;

            // // I am done, let's have a vacation (cool)
            // if (response.code === 200) {
            //     location.reload();
            // }
        });
    });
});