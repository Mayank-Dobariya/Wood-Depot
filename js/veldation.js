$(document).ready(function () {
    // design form velidation start-------------------------
    $("#design_form").submit(function () {


        var y_sub = $('.your_sub').val();

        if (y_sub == "") {
            // alert("enter Password")
            // return false;
            $('.your_sub').next('.err').css('display', 'inline')
            return false;
        }
        var y_desc = $('.your_descr').val();

        if (y_desc == "") {
            $('.your_descr').next('.err').css('display', 'inline')
            return false;
        }

        var y_bed = $('.your_bud').val();

        if (y_bed == "") {
            $('.your_bud').next('.err').css('display', 'inline')
            return false;
        }




    })
    $('.your_sub  , .your_bud').keypress(function () {
        $(this).next('.err').hide()
    })
    $('.your_descr').keypress(function () {
        $('.err').hide()
    })

    // design form velidation end-------------------------



    // client login  velidation   start-----------------------------
    $("#login_client").submit(function () {

        var c_email = $('.client_email').val();
        var c_email_patten = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;


        if (c_email_patten.test(c_email) == "") {

            $('.client_email').next('.err').css('display', 'flex')
            return false;
        }
        var c_password = $('.client_password').val();

        if (c_password == "") {
            $('.client_password').next('.err').css('display', 'flex');
            return false;
        }

    })
    $('.client_email , .client_password').keypress(function () {
        $(this).next('.err').hide()
    })
    // client login  velidation   end-----------------------------

    //client registration velidation start----------------------------
    $("#reg_client").submit(function () {

        var c_first_name = $('.first_name').val();
        var c_f_pattn =/^[A-Za-z]+$/;


        if (c_f_pattn.test(c_first_name)=="") {
            $('.first_name').next('.err').css('display', 'flex');
            return false;
        }
        var c_last_name = $('.last_name').val();
        var c_l_pattn =/^[A-Za-z]+$/;


        if (c_l_pattn.test(c_last_name)=="") {
            $('.last_name').next('.err').css('display', 'flex');
            return false;
        }

        var r_email = $('.reg_email').val();
        var r_email_patten = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        if (r_email_patten.test(r_email) == "") {
            $('.reg_email').next('.err').css('display', 'flex');
            return false;
        }

        var r_pwd = $('.reg_password').val();
        var r_confirm_patten = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;


        if (r_confirm_patten.test(r_pwd) == "") {
            $('.reg_password').next('.err').css('display', 'flex');
            return false;
        }

        var r_c_pwd = $('.reg_c_password').val();

        if (r_c_pwd !== r_pwd) {
            $('.reg_c_password').next('.err').css('display', 'flex');
            return false;
        }

        var c_number = $('.reg_contect').val();
        var c_number_patten = /^(\+\d{1,3}[- ]?)?\d{10}$/;

        if (c_number_patten.test(c_number) == "") {
            $('.reg_contect').next('.err').css('display', 'flex');
            return false;
        }

        var g = $('input[type="radio"]:checked').length;
        if (g == 0) {
            $('.edit_err').css('display', 'flex');
            return false;
        }
        var c_date = $('.r_date').val();
        if (c_date == "") {
            $('.r_date').next('.err').css('display', 'flex');
            return false;
        }
        var c_img = $('.reg_img').val();
        if (c_img == "") {
            $('.reg_img').next('.err').css('display', 'flex');
            return false;
        }

    })
    $('.first_name , .last_name , .reg_email , .reg_password , .reg_c_password , .reg_contect  ').keypress(function () {
        $(this).next('.err').hide()
    })
    $('.r_gen').click(function () {
        $('.edit_err').hide()
    })

    $('.r_date').click(function () {
        $(this).next('.err').hide()
    })

    //client registration velidation end------------------------------

    //chang password start-----------------------------------------------
    $("#chang_password_form").submit(function () {
        var curr_password = $('.current_password').val();
        if (curr_password == "") {
            $('.current_password').next('.err').css('display', 'inline')
            return false;
        }

        var new_password = $('.new_password').val();
        var new_password_patten =/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;

        if (new_password_patten.test(new_password) == "") {
            $('.new_password').next('.err').css('display', 'inline')
            return false;
        }
        var confirm_password = $('.confirm_password').val();

        if (confirm_password !== new_password) {
            $('.confirm_password').next('.err').css('display', 'inline')
            return false;
        }

    })

    $('.current_password , .new_password , .confirm_password').keypress(function () {
        $(this).next('.err').hide()
    })

    //chang password end-----------------------------------------------

    // edit profile start------------------------------------------------
    $('.edit_form').submit(function () {
        var edit_f_name = $('.edit_first_name').val();
        if (edit_f_name == "") {
            // alert("enter Password")
            // return false;
            $('.edit_first_name').next('.err').css('display', 'inline')
            return false;
        }
        var edit_l_name = $('.edit_last_name').val();
        if (edit_l_name == "") {
            $('.edit_last_name').next('.err').css('display', 'inline')
            return false;
        }
        var edit_email = $('.edit_email').val();
        var edit_email_patten = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        if (edit_email_patten.test(edit_email) == "") {
            $('.edit_email').next('.err').css('display', 'inline')
            return false;
        }
        var edit_cno = $('.edit_contect').val();
        var edit_number_patten = /^(\+\d{1,3}[- ]?)?\d{10}$/;

        if (edit_number_patten.test(edit_cno) == "") {
            $('.edit_contect').next('.err').css('display', 'inline');
            return false;
        }

        var gen = $('input[type="radio"]:checked').length;
        if (gen == 0) {
            $('.edit_err').css('display', 'block');
            return false;
        }
        var dob_date = $('.dob_date').val();
        if (dob_date == "") {
            $('.dob_date').next('.err').css('display', 'inline');
            return false;
        }

        var edit_file = $('.edit_file').val();
        if (edit_file == "") {
            $('.edit_file').next('.err').css('display', 'inline');
            return false;
        }
    })
    $('.edit_first_name , .edit_last_name , .edit_email , .edit_contect').keypress(function () {
        $(this).next('.err').hide()


    })
    $('.edit_r_gen ').click(function () {
        $('.edit_err').hide()
    })
    $('.dob_date , .edit_file').click(function () {
        $(this).next('.err').hide()
    })
    // edit profile end------------------------------------------------



    // inquiry start------------------------------------------------
    $("#inquiry_form_velidation").submit(function () {
        var inquiry_email = $('.inquery_email').val();
        var inquiry_email_patten = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        if (inquiry_email_patten.test(inquiry_email) == "") {
            $('.inquery_email').next('.err').css('display', 'inline')
            return false;
        }
        var inquiry_contect = $('.inquery_contect').val();
        var inquiry_contect_patten = /^(\+\d{1,3}[- ]?)?\d{10}$/;

        if (inquiry_contect_patten.test(inquiry_contect) == "") {
            $('.inquery_contect').next('.err').css('display', 'inline')
            return false;
        }
        var inquiry_sub = $('.inquery_sub').val();
        if (inquiry_sub == "") {
            $('.inquery_sub').next('.err').css('display', 'inline');
            return false;
        }
        var inquiry_desc = $('.inquery_desc').val();
        if (inquiry_desc == "") {
            $('.inquery_desc').next('.err').css('display', 'inline');
            return false;
        }
    })
    $('.inquery_email , .inquery_contect , .inquery_sub  ').keypress(function () {
        $(this).next('.err').hide()
    })
    $('.inquery_desc').keypress(function () {
        $('.err').hide()
    })
    // inquiry end------------------------------------------------

    //check out form start-------------------------------
    $('#check_out_form').submit(function() {
        var chek_out_fname = $('.check_fname').val();

        if (chek_out_fname == "") {
            $('.check_fname').next('.err').css('display', 'block')
            return false;
        }
        var chek_out_lname = $('.check_lname').val();

        if (chek_out_lname == "") {
            $('.check_lname').next('.err').css('display', 'block')
            return false;
        }
        var check_phno = $('.check_phno').val();
        var check_phno_patten = /^(\+\d{1,3}[- ]?)?\d{10}$/;

        if (check_phno_patten.test(check_phno) == "") {
            $('.check_phno').next('.err').css('display', 'inline')
            return false;
        }

        var check_mail = $('.check_mail').val();
        var check_mail_patten = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        if (check_mail_patten.test(check_mail) == "") {
            $('.check_mail').next('.err').css('display', 'inline')
            return false;
        }
        var chk_address = $('.chk_address').val();

        if (chk_address == "") {
            $('.chk_address').next('.err').css('display', 'block')
            return false;
        }

    })
    $('.check_fname , .check_lname , .check_phno , .check_mail , .chk_address').keypress(function() {
        $('.err').hide()
    })
    //check out form end-------------------------------


    // interior reg start-------------------------------------------
    $('#interior_reg').submit(function () {
        var i_fname = $('.fname_i').val();
        var i_f_pattn =/^[A-Za-z]+$/;

        if (i_f_pattn.test(i_fname) == "") {
            $('.fname_i').next('.err').css('display', 'flex')
            return false;
        }
        var i_sname = $('.sname_i').val();
        var i_s_pattn =/^[A-Za-z]+$/;

        if (i_s_pattn.test(i_sname) == "") {
            $('.sname_i').next('.err').css('display', 'flex')
            return false;
        }
        var i_qua = $('.qua').val();
        if (i_qua == "") {
            $('.qua').next('.err').css('display', 'flex')
            return false;

        }
        var i_exp = $('.exp').val();
        if (i_exp == "") {
            $('.exp').next('.err').css('display', 'flex')
            return false;

        }
        
        var i_descr = $('.i_your_descr').val();
        if (i_descr == "") {
            $('.i_your_descr').next('.err').css('display', 'flex');
            return false;
        }

        var i_email = $('.int_email').val();
        var i_email_vel = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;


        if (i_email_vel.test(i_email) == "") {
            $('.int_email').next('.err').css('display', 'flex')
            return false;

        }

        var i_password = $('.int_password').val();
        var i_password_patten = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;

        if (i_password_patten.test(i_password) == "") {
            $('.int_password').next('.err').css('display', 'flex')
            return false;
        }
        var i_c_password = $('.int_c_password').val();

        if (i_c_password !== i_password) {
            $('.int_c_password').next('.err').css('display', 'flex')
            return false;
        }

        var i_contect = $('.int_contect').val();
        var i_contect_patten = /^(\+\d{1,3}[- ]?)?\d{10}$/;

        if (i_contect_patten.test(i_contect) == "") {
            $('.int_contect').next('.err').css('display', 'flex')
            return false;
        }

        var i_pincode = $('.int_pincode').val();
        var i_pincode_patten =  /^(\d{4}|\d{6})$/ ;
        if (i_pincode_patten.test(i_pincode) == "") {
            $('.int_pincode').next('.err').css('display', 'flex')
            return false;
        }

        var i_file = $('.int_file').val();
        if (i_file == "") {
            $('.int_file').next('.err').css('display', 'flex')
            return false;

        }


    })
    $('.fname_i , .sname_i  , .qua , .exp ,  .i_your_descr  , .int_email , .int_password , .int_c_password , .int_contect , .int_pincode  ').keypress(function () {
        $('.err').hide()
    })
    $('.int_file').click(function(){
        $('.err').hide();
    })
    // interior reg end-------------------------------------------
   

})