<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include_once 'connection.php';
    include_once './AdminLink.php';
    include_once 'AdminHome.php';
    SessionCheck();
    extract($_REQUEST);


    require 'PHPMailer/PHPMailerAutoload.php';
    // require 'connection.php';

    function send_password_reset($txtEmail, $txtDescription)
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
        $mail->addAddress($txtEmail);     // Add a recipient
        // $mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo($mail->Username);
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = "Wood Depot";

        $email_template = $txtDescription;
        $mail->Body    = $email_template;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            $url = "Newsletter.php";
            echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
        }
    }
    if (isset($btnSend)) {
        send_password_reset($txtEmail, $txtDescription);
    }









    if (isset($NID)) {
        $strSel = "select email from tbl_newsletter where newsletterid=" . $NID;
        $rsSel = mysqli_query($conn, $strSel) or die(mysqli_error($conn));
        $resSel = mysqli_fetch_array($rsSel);
    }


    ?>
    <div class="content-wrapper bg-white">
        <div class="content-header mt-5">

            <div class="container-fluid">

                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">

                        <!-- jquery validation -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h2 class="card-title">shoes</h2>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="quickForm" class="pkg_form" method="post">
                                <div class="card-body">

                                    <div class="form-group">
                                        <label>Email ID :</label>
                                        <b><input type="text" readonly="" name="txtEmail" value="<?php if (isset($resSel))
                                                                                                        echo $resSel["email"];

                                                                                                    ?>"> </b>

                                        </label>
                                    </div>


                                    <div class="form-group">
                                        <label>Reply :</label>


                                        <textarea id="" cols="90" rows="10" name="txtDescription"></textarea>
                                        <?php //send_password_reset($txtEmail, $txtDescription);  
                                        ?>
                                        <div class="card-footer">
                                            <!-- <button type="submit" class="btn btn-primary" name="btnSave">Save</button> -->
                                            <input type="submit" class="btn btn-primary" name="btnSend" value="Save">
                                        </div>






                                    </div>




                                </div>
                                <!-- /.card-body -->

                            </form>
                        </div>

                    </div>
                </div>



            </div>
        </div>
    </div>


</body>

</html>