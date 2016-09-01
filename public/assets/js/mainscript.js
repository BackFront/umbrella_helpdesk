jQuery(document).ready(function ($) {
    $.fn.api.settings.api = {
        'signin': '/login',
        'get open tikets': '/tikets/open'
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


    $('#dashboard_nav .item').tab({
        context: '#teste',
        auto: true,
        path: '/modules/tab.html'
    });

    $('.menu .item').tab({
        cache: false,
        apiSettings: {
            action: 'get open tikets',
            mockResponse: function (settings) {
                var response = {
                    first: 'AJAX Tab One',
                    second: 'AJAX Tab Two',
                    third: 'AJAX Tab Three'
                };
                return response[settings.urlData.tab];
            },
            onResponse: function (response) {
                // make some adjustments to response
                alert();
            },
            successTest: function (response) {
                // test whether a JSON response is valid
                alert();
            },
            onComplete: function (response) {
                // always called after XHR complete
                alert();
            },
            onSuccess: function (response) {
                // valid response and response.success = true
                alert();
            },
            onFailure: function (response) {
                // request failed, or valid response but response.success = false
                alert();
            },
            onError: function (errorMessage) {
                // invalid response
                alert();
            },
            onAbort: function (errorMessage) {
                // navigated to a new page, CORS issue, or user canceled request
                alert();
            }
        },
        context: 'parent',
        auto: true,
        path: '/'
    });
});