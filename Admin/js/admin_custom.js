//   admin login js start-----------------------

$(document).ready(function () {
    $("#admin_log").submit(function () {


        var aemail = $('.admin_email').val();
        var email_patten = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;


        if (email_patten.test(aemail) == "") {

            $('.admin_email').next('.err').css('display', 'inline')
            return false;
        }
        var apssword = $('.admin_password').val();

        if (apssword == "") {
            // alert("enter Password")
            // return false;
            $('.admin_password').next('.err').css('display', 'inline')
            return false;
        }
    })
    //   admin login js end-----------------------


    //   admin confirm password  js start-----------------------


    $("#upassword").submit(function () {


        var pwd = $('.opassword').val();

        if (pwd == "") {
            // alert("enter Password")
            // return false;
            $('.opassword').next('.err').css('display', 'inline')
            return false;
        }
        var cpwd = $('.cpassword').val();

        if (cpwd !== pwd) {
            // alert("enter Password")
            // return false;
            $('.cpassword').next('.err').css('display', 'inline')
            return false;
        }
        $('.opassword ,.cpassword').keypress(function () {
            $(this).next('.err').hide()
        })
    })


    //   admin confirm password  js end-----------------------



    //   admin fogot password  js start-----------------------


    $("#forget_password").submit(function () {

        var forgot_email = $('.forget_email').val();
        var forgot_email_patten = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;


        if (forgot_email_patten.test(forgot_email) == "") {

            $('.forget_email').next('.err').css('display', 'inline')
            return false;
        }

    })

    //   admin fogot password  js end-----------------------


    $('.admin_email , .admin_password , .opassword , .cpassword , .forget_email').keypress(function () {
        $(this).next('.err').hide()
    })

})













