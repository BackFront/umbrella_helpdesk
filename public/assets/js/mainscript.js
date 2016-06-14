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
            $.ajax({
                url: "/login",
                type: "POST",
                data: $( this ).serializeArray(),
                success: function( result ) {
                    console.log(result);
                }
            });
            return false;
        }

    });
});