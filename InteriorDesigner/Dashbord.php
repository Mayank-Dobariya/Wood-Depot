<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
  <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

  <?php
  include_once 'connection.php';
  include_once './AdminLink.php';
  include_once 'AdminHome.php';

  SessionCheck();
  extract($_REQUEST);
  $strInquiry = "select * from tbl_inquiry i left join tbl_product p on p.product_id = i.product_id where i.interior_designer_id=" . $_SESSION["InteriorDesignerID"];
  $rsInquiry = mysqli_query($conn, $strInquiry) or die(mysqli_error($conn));
  $cntInquiry = mysqli_num_rows($rsInquiry);

  $strProject = "select * from tbl_designer_project where interior_designer_id=" . $_SESSION["InteriorDesignerID"];
  $rsProject = mysqli_query($conn, $strProject) or die(mysqli_error($conn));
  $cntProject = mysqli_num_rows($rsProject);



  ?>

  <style>
    .card-text {
      font-size: 25px;
    }
  </style>

</head>


<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">




  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard DEPOT</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard DEPOT</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->



        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Info boxes -->


          <div class="row">


            <div class="col-sm-12  col-md-4 col-lg-4 col-xl-3">
              <div class="border border-5 card">
                <div class="card-body">
                  <a href="Inquiry.php">
                    <div class="d-flex justify-content-between mb-5">
                      <i class="icon-info-sign fa-3x"></i>
                      <h1><?php echo $cntInquiry; ?></h1>
                    </div>
                    <p class="card-text text-center">Inquiry</p>
                </div>
              </div>
              </a>
            </div>

            <div class="col-sm-12  col-md-4 col-lg-4 col-xl-3">
              <div class="border border-5 card">
                <div class="card-body">
                  <a href="#">
                    <div class="d-flex justify-content-between mb-5">
                      <i class="fa-solid fa-message fa-3x"></i>
                      <h1>1</h1>
                    </div>
                    <p class="card-text text-center">Feedback</p>
                </div>
              </div>
              </a>
            </div>

            <div class="col-sm-12  col-md-4 col-lg-4 col-xl-3">
              <div class="border border-5 card">
                <div class="card-body">
                  <a href="ProjectList.php">
                    <div class="d-flex justify-content-between mb-5">
                      <i class="icon-th-large fa-3x"></i>
                      <h1><?php echo $cntProject; ?></h1>
                    </div>
                    <p class="card-text text-center">Product</p>
                </div>
              </div>
              </a>
            </div>

          </div>



        </div><!--/. container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->





  </div>



  <!-- ./wrapper -->











</body>

</html>