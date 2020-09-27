jQuery(document).ready(function ($) {

    var appToken = null;

    console.log('init');
    $("#login").addClass('_inline-block');


    $("#link-reg").click(function (e) {
        e.preventDefault();

        $("#login").removeClass('_inline-block');
        $("#reg").addClass('_inline-block');
    });


    $("#link-login").click(function (e) {
        e.preventDefault();

        $("#reg").removeClass('_inline-block');
        $("#login").addClass('_inline-block');
    });


    $("#link-logout").click(function (e) {
        e.preventDefault();

        appToken = null;

        $("#page").removeClass('_block');
        $("#login").addClass('_inline-block');
    });

    $("#button-login").click(function (e) {
        e.preventDefault();

        var phone = $("input[name='login-phone']").val();
        var password = $("input[name='login-password']").val();


        $.ajax({
            type: 'POST',
            url: 'http://localhost/api/login',
            data: {
                phone: phone,
                password: password
            },
            success: function (data) {
                appToken = data.token;

                if (appToken) {
                    initUser();
                }
            }
        });
    });


    function initUser() {

        $("#login").removeClass('_inline-block');
        $("#page").addClass('_block');

        $.ajax({
            type: 'POST',
            url: 'http://localhost/api/profile',
            headers: {
                'Authorization':'Bearer ' + appToken,
            },
            success: function (data) {
                console.log(data.first_name + ' ' + data.surname);
            }
        });
    }




























































});