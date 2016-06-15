jQuery(document).ready(function ($) {
    $.fn.api.settings.api = {
        'signin': '/login'
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
//            $.ajax({
//                url: "/login",
//                type: "POST",
//                data: $( this ).serialize(),
//                success: function( result ) {
//                    console.log(result);
//                }
//            });
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
                    alert(json.data);
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
});