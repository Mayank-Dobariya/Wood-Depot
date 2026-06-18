$(document).ready(function () {
    $('.pkg_form').submit(function () {
        var p_name = $('.pg_name').val();
        if (p_name == "") {
            $('.pg_name').next('.err').css('display', 'block')
            return false;
        }
        var p_duration = $('.pg_duration').val();
        if (p_duration == "") {
            $('.pg_duration').next('.err').css('display', 'inline')
            return false;
        }
        var p_price = $('.pg_price').val();
        if (p_price == "") {
            $('.pg_price').next('.err').css('display', 'inline')
            return false;
        }
        var p_description = $('.pg_description').val();
        if (p_description == "") {
            $('.pg_description').next('.err').css('display', 'inline')
            return false;
        }
        var p_file = $('.pg_file').val();
        if (p_file == "") {
            $('.pg_file').next('.err').css('display', 'inline')
            return false;
        }
    })
    $('.pg_name , .pg_duration ,.pg_price , .pg_description').keypress(function () {
        $('.err').hide();
    })
    $('.pg_file').click(function () {
        $('.err').hide();
    })


    // admin new tregistration start-----------------------------------------------
    $('.admin_new_reg').submit(function () {
        var a_name = $('.arg_name').val();
        if (a_name == "") {
            $('.arg_name').next('.err').css('display', 'inline')
            return false;
        }
    })
    $('.arg_name ').keypress(function () {
        $('.err').hide();
    })
    // admin new tregistration end-----------------------------------------------



    // admin new tregistration start-----------------------------------------------
    $('.admin_new_reg').submit(function () {
        var a_name = $('.arg_name').val();
        if (a_name == "") {
            $('.arg_name').next('.err').css('display', 'inline')
            return false;
        }
        var a_email = $('.arg_email').val();
        var a_email_patten = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        if (a_email_patten.test(a_email) == "") {
            $('.arg_email').next('.err').css('display', 'inline')
            return false;
        }
        var a_pwd = $('.arg_pwd').val();
        var a_confirm_patten = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;

        if (a_confirm_patten.test(a_pwd) == "") {
            $('.arg_pwd').next('.err').css('display', 'inline')
            return false;

        }
        var a_c_pwd = $('.arg_c_pwd').val();
        if (a_c_pwd !== a_pwd) {
            $('.arg_c_pwd').next('.err').css('display', 'inline')
            return false;

        }
        var a_phone = $('.arg_phone').val();
        var a_number_patten = /^(\+\d{1,3}[- ]?)?\d{10}$/;

        if (a_number_patten.test(a_phone) == "") {
            $('.arg_phone').next('.err').css('display', 'inline')
            return false;
        }
        var a_file = $('.arg_file').val();
        if (a_file == "") {
            $('.arg_file').next('.err').css('display', 'inline')
            return false;

        }
    })
    $('.arg_name , .arg_email , .arg_pwd ,.arg_c_pwd , .arg_phone').keypress(function () {
        $('.err').hide();
    })
    $('.arg_file').click(function () {
        $('.err').hide();
    })
    // admin new tregistration end-----------------------------------------------


    // admin add product start-------------------------------
    $('.product_form').submit(function () {

                    $('#error1').hide();


        var p_name = $('.pro_name').val();
        if (p_name == "") {
            $('.pro_name').next('.err').css('display', 'inline');
            return false;
        }
        var p_code = $('.pro_code').val();
        if (p_code == "") {
            $('.pro_code').next('.err').css('display', 'inline');
            return false;
        }
        var x = $('#category-dropdown').val();


        if (x == "--Select category--") {
            $("#error").show();
            return false;
        }
        var x2 = $('#categorytype-dropdown').val();
        if (x2 == "") {
            $("#error1").show();
            return false;
        }


        var p_price = $('.pro_price').val();
        // var p_price_patten = /^(\+\d{1,3}[- ]?)$/;

        if (p_price == "") {
            $('.pro_price').next('.err').css('display', 'inline');
            return false;
        }
        var p_description = $('.pro_description').val();
        if (p_description == "") {
            $('.pro_description').next('.err').css('display', 'inline');
            return false;
        }
        var p_file = $('.pro_file').val();
        if (p_file == "") {
            $('.pro_file').next('.err').css('display', 'inline');
            return false;
        }
        var p_color = $('input[type="color"]').length;
        if (p_color == 1) {
            $('.pro_color').next('.err').css('display', 'flex');
            return false;
        }
    })
    $('.pro_name , .pro_code , .pro_price , .pro_description ').keypress(function () {
        $('.err').hide();
    })
    $('.pro_file , .pro_color').click(function () {
        $('.err').hide();
    })
    $('.pro_cat').click(function () {
        $('#error').hide();
    })
    $('.pro_cat1').click(function () {
        $('#error1').hide();
    })
    // admin add product end-------------------------------
})