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
  $strUser = "select * from tbluser";
  $rsUser = mysqli_query($conn, $strUser) or die(mysqli_error($conn));
  $cntUser = mysqli_num_rows($rsUser);

  $strInterior = "select * from tbl_interior_designer";
  $rsInterior = mysqli_query($conn, $strInterior) or die(mysqli_error($conn));
  $cntInterior = mysqli_num_rows($rsInterior);

  $strInquiry = "select * from tbl_inquiry i left join tbl_product p on p.product_id = i.product_id where P.admin_id != 'null' or i.product_id IS NULL and i.interior_designer_id IS NULL";
  $rsInquiry = mysqli_query($conn, $strInquiry) or die(mysqli_error($conn));
  $cntInquiry = mysqli_num_rows($rsInquiry);

  $strProduct = "select * from tbl_product";
  $rsProduct = mysqli_query($conn, $strProduct) or die(mysqli_error($conn));
  $cntProduct = mysqli_num_rows($rsProduct);

  $strPackage = "select * from tbl_package";
  $rsPackage = mysqli_query($conn, $strPackage) or die(mysqli_error($conn));
  $cntPackage = mysqli_num_rows($rsPackage);

  $strOrder = "select * from tbl_order";
  $rsOrder = mysqli_query($conn, $strOrder) or die(mysqli_error($conn));
  $cntOrder = mysqli_num_rows($rsOrder);


  $strFeedback = "select distinct product_id from tbl_feedback";
  $rsFeedback = mysqli_query($conn, $strFeedback) or die(mysqli_error($conn));
  $cntFeedback = mysqli_num_rows($rsFeedback);

  $strSubscriber = "select * from tbl_newsletter";
  $rsSubscriber = mysqli_query($conn, $strSubscriber) or die(mysqli_error($conn));
  $cntSubscriber = mysqli_num_rows($rsSubscriber);

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
      <img class="animation__wobble" src="img/D Rose_logo.png" alt="AdminLTELogo" height="60" width="60">
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
                <li class="breadcrumb-item active">Dashboard</li>
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
              <div class="border border-5 card ">
                <div class="card-body"><a href="UserList.php">
                    <div class="d-flex justify-content-between mb-5">
                      <i class="fa fa-users fa-3x"></i>
                      <h1><?php echo $cntUser; ?></h1>
                    </div>
                    <p class="card-text text-center">Customer</p>
                  </a>
                </div>
              </div>
            </div>

            <div class="col-sm-12  col-md-4 col-lg-4 col-xl-3">
              <div class="border border-5 card">
                <div class="card-body"><a href="InteriorDesignerList.php">
                    <div class="d-flex justify-content-between mb-5">
                      <i class="fa fa-users fa-3x"></i>
                      <h1><?php echo $cntInterior; ?></h1>
                    </div>
                    <p class="card-text text-center">Interior</p>
                  </a>
                </div>
              </div>
            </div>

            <div class="col-sm-12  col-md-4 col-lg-4 col-xl-3">
              <div class="border border-5 card">
                <div class="card-body"><a href="Inquiry.php">
                    <div class="d-flex justify-content-between mb-5">
                      <i class="icon-info-sign fa-3x"></i>
                      <h1><?php echo $cntInquiry; ?></h1>
                    </div>
                    <p class="card-text text-center">Inquiry</p>
                  </a>
                </div>
              </div>
            </div>

            <div class="col-sm-12  col-md-4 col-lg-4 col-xl-3">
              <div class="border border-5 card">
                <div class="card-body"><a href="Productlist.php">
                    <div class="d-flex justify-content-between mb-5">
                      <i class="icon-th-large fa-3x"></i>
                      <h1><?php echo $cntProduct; ?></h1>
                    </div>
                    <p class="card-text text-center">Product</p>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12  col-md-4 col-lg-4 col-xl-3">
              <div class="border border-5 card">
                <div class="card-body"><a href="PackageList.php">
                    <div class="d-flex justify-content-between mb-5">
                      <i class="icon-suitcase fa-3x"></i>
                      <h1><?php echo $cntPackage; ?></h1>
                    </div>
                    <p class="card-text text-center">Package</p>
                  </a>
                </div>
              </div>
            </div>

            <div class="col-sm-12  col-md-4 col-lg-4 col-xl-3">
              <div class="border border-5 card">
                <div class="card-body"><a href="OrderList.php">
                    <div class="d-flex justify-content-between mb-5">
                      <i class="icon-shopping-cart fa-3x"></i>
                      <h1><?php echo $cntOrder; ?></h1>
                    </div>
                    <p class="card-text text-center">Order</p>
                  </a>
                </div>
              </div>
            </div>

            <div class="col-sm-12  col-md-4 col-lg-4 col-xl-3">
              <div class="border border-5 card">
                <div class="card-body"><a href="Custfeedback.php">
                  <div class="d-flex justify-content-between mb-5">
                    <i class="fa-solid fa-message fa-3x"></i>
                    <h1><?php echo $cntFeedback; ?></h1>
                  </div>
                  <p class="card-text text-center">Feedback</p>
                  </a>
                </div>
              </div>
            </div>

            <div class="col-sm-12  col-md-4 col-lg-4 col-xl-3">
              <div class="card border border-5">
                <div class="card-body"><a href="Newsletter.php">
                    <div class="d-flex justify-content-between mb-5">
                      <i class="fa fa-thumbs-up fa-3x"></i>
                      <h1><?php echo $cntSubscriber; ?></h1>
                    </div>
                    <p class="card-text text-center">Subscriber</p>
                  </a>
                </div>
              </div>
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