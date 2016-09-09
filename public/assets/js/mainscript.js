jQuery(document).ready(function ($) {
     $.fn.api.settings.api = {
        'signin': '/login',
        'get open tikets': '/tikets/open',
        'get tikets': '/tikets'
    };

    //define the response
    $.fn.api.settings.successTest = function (response) {
        if (response && response.success) {
            return response.success;
        }
        return false;
    };

    $('.ui.form').form({
        fields: {
            email: {
                identifier: 'email',
                rules: [
                    {
                        type: 'empty',
                        prompt: 'Please enter your e-mail'
                    },
                    {
                        type: 'email',
                        prompt: 'Please enter a valid e-mail'
                    }
                ]
            },
            password: {
                identifier: 'password',
                rules: [
                    {
                        type: 'empty',
                        prompt: 'Please enter your password'
                    },
                    {
                        type: 'length[6]',
                        prompt: 'Your password must be at least 6 characters'
                    }
                ]
            }
        },
        onSuccess: function (e) {
            $(this).api({
                loadingDuration: 100,
                action: 'signin',
                method: 'POST',
                serializeForm: true,
                data: this,
                onComplete: function (json, element) {
                    console.log('onComplete');
                    console.log(json);
                },
                onSuccess: function (json, element) {
                    console.log('onSuccess');
                    console.log(json);

                    if (json.success) {
                        window.location.pathname = "/dashboard";
                    } else {
                        $("#login_msg_error").show();
                    }

                },
                onFailure: function (json, element) {
                    console.log('onFailure');
                    console.log(json);
                },
                onError: function (errorMessage, element) {},
                onAbort: function (errorMessage, element) {}
            });
            return false;
        }

    });

    var responseContext = $('#response')
    $('#dashboard_nav .item').tab({
        cache: false, /** @alterar alterar valor para true */
        method: 'GET',
        context: responseContext,
        auto: true,
        path: '/view/tickets',
        onSuccess: function (response) {
            console.log(response);
        },
        onError: function (response) {
            responseContext.text(response.message);
            console.log(response.message);
        }
    });

});