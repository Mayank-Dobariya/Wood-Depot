<!DOCTYPE html>

<html lang="en">

<head>
    <!-- <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script> -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="Validation.js"></script>
    <?php

    include_once 'connection.php';
    include_once './AdminLink.php';
    include_once 'AdminHome.php';
    extract($_REQUEST);
    SessionCheck();

    require 'PHPMailer/PHPMailerAutoload.php';

  
    // require 'connection.php';

    function send_password_reset($hdnEmail, $hdnSubject, $txtReply)
    {
        $mail = new PHPMailer;

        // $mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->IsSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'krupaliman@gmail.com';                 // SMTP username
        $mail->Password = 'irdzodficgwlpvda';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->setFrom($mail->Username, 'wood depot');
        $mail->addAddress($hdnEmail);     // Add a recipient
        // $mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo($mail->Username);
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = $hdnSubject;

        $email_template = $txtReply;
        $mail->Body    = $email_template;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }









    if (isset($btnSubmit)) {
        // echo $hdnEmail." ".$hdnSubject." ".$txtReply;exit();
        $strup = "update tbl_inquiry set IsReply=1,Reply='$txtReply',Replyon=now(),ReplyBy='" . $_SESSION["AdminID"] . "' where inquiry_id=" . $IID;
        mysqli_query($conn, $strup) or die(mysqli_error($conn));
        // mail($hdnEmail, $hdnSubject, $txtReply, 'Content-type:text/html;charset=iso-8859-1');
        send_password_reset($hdnEmail, $hdnSubject, $txtReply);
        // {
        //   echo "mail send";
        // }
        // header("location:InquiryList.php");
        $url = "Inquiry.php";
        echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
    }


    ?>
    <style>
        .err {
            color: red;
            display: none;
            letter-spacing: 1px;
            font-weight: 200;
        }
    </style>

</head>




<body>




    <div class="content-wrapper bg-white">
        <div class="content-header mt-5">

            <div class="container-fluid">
                
                
                <?php
                
                    $str = "select * from tbl_inquiry where inquiry_id=" . $IID;
                    $rs = mysqli_query($conn, $str) or die(mysqli_error($conn));
                    while ($res = mysqli_fetch_array($rs)) {
                ?>




                        <div class="row">
                            <!-- left column -->
                            <div class="col-md-12">

                                <!-- jquery validation -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h2 class="card-title"><?php echo $res["subject"]; ?></h2>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form id="quickForm" class="pkg_form" method="post">
                                        <div class="card-body">

                                            <div class="form-group">
                                                <label>Email ID</label>&nbsp;:&nbsp;&nbsp;
                                                <b><?php echo $res["email"]; ?></b>
                                                <input type="hidden" name="hdnEmail" value="<?php echo $res["email"]; ?>">

                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label>Subject</label>&nbsp;:&nbsp;&nbsp;
                                                <b><?php echo $res["subject"]; ?></b>
                                                <input type="hidden" name="hdnSubject" value="<?php echo $res["subject"]; ?>">
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>&nbsp;:&nbsp;&nbsp;
                                                <b><?php echo $res["description"]; ?></b>
                                               

                                            </div>
                                            <div class="form-group">
                                                <label>contact no</label>&nbsp;:&nbsp;&nbsp;
                                                <b><?php echo $res["contactno"]; ?></b>
                                            </div>
                                            <div class="form-group">
                                                <label>Reply</label>&nbsp;:&nbsp;&nbsp;
                                                <?php
                                                if ($res["IsReply"] == 0) {
                                                ?>
                                                    <b><textarea id="" cols="90" rows="10" name="txtReply"></textarea></b>
                                                    <div class="card-footer">
                                                        <!-- <button type="submit" class="btn btn-primary" name="btnSave">Save</button> -->
                                                        <input type="submit" class="btn btn-primary" name="btnSubmit" value="Save">
                                                    </div>
                                                <?php
                                                } else {

                                                ?>

                                                    <b><?php echo $res["Reply"]; ?></b>

                                                    <div class="form-group">
                                                        <label>Reply On</label>&nbsp;:&nbsp;&nbsp;
                                                        <b><?php echo $res["Replyon"]; ?></b>
                                                    </div><br>
                                                <?php
                                                }
                                                ?>

                                            </div>





                                        </div>
                                        <!-- /.card-body -->
                                    </form>
                                </div>

                            </div>
                        </div>
                <?php
                    }
                
                ?>

            </div>
        </div>
    </div>
    <!-- <div class="content-wrapper bg-white">
        <div class="content-header mt-5">

            <div class="container-fluid">
                

            </div>
        </div>
    </div> -->









    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <!-- <script src="plugins/chart.js/Chart.min.js"></script> -->

    <!-- AdminLTE for demo purposes -->
    <!-- <script src="dist/js/demo.js"></script> -->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard2.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/Admn_form_velidation.js"></script>
    <script src="js/Admin_velidation.js"></script>



</body>

</html>