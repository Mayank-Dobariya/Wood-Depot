<!DOCTYPE html>
<html lang="en">
<?php
include_once "connection.php";
include_once './AdminLink.php';
include_once 'AdminHome.php';

SessionCheck();
extract($_REQUEST);
if (isset($pid)) {

  if ($isdefault == 0) {
    $strUp = "update tbl_designer_project_image set is_defaultt='1' where designer_project_image_id=" . $pid;
    mysqli_query($conn, $strUp) or die(mysqli_error($conn));

    $strUp = "update tbl_designer_project_image set is_default='0' where designer_project_image_id!=" . $pid . " and designer_project_id=" . $id;
    mysqli_query($conn, $strUp) or die(mysqli_error($conn));
    header("location:ProjectImage.php?id=" . $id);
  }
}
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>

  <?php
  $str = "select * from tbl_designer_project_image where designer_project_id=" . $id;
  $rs = mysqli_query($conn, $str) or die(mysqli_error($conn));
  $str1 = "select count('designer_project_image_id') as c from tbl_designer_project_image where designer_project_id=" . $id;
  $rs1 = mysqli_query($conn, $str1) or die(mysqli_error($conn));
  $data = mysqli_fetch_array($rs1);
  //echo $data["c"];


  ?>
  <!-- <div class="container"> -->
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <?php
      for ($i = 0; $i < $data["c"]; $i++) {
        if ($i == 0) { ?>
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>

        <?php
        } else { ?>
          <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>"></li>

      <?php
        }
      }
      ?>


    </ol>

    <!-- Wrapper for slides -->

    <div class="carousel-inner">
      <?php
      while ($res = mysqli_fetch_array($rs)) {

        if ($res["is_default"]) { ?>
          <div class="item active">
            <a onclick="var r=confirm('do you want to make this image as default Y/N');if(!r){event.preventDefault();}" href="?id=<?php echo $id; ?>&pid=<?php echo $res["designer_project_image_id"] ?>&isdefault=<?php echo $res["is_default"] ?>">
              <img src="../<?php echo $res["image_url"] ?>" style="width:1550px; height: 750px;">
            </a>
          </div>
        <?php
        } else { ?>
          <div class="item">
            <a onclick="var r=confirm('do you want to make this image as default Y/N');if(!r){event.preventDefault();}" href="?id=<?php echo $id; ?>&pid=<?php echo $res["designer_project_image_id"] ?>&isdefault=<?php echo $res["is_default"] ?>">
              <img src="../<?php echo $res["image_url"] ?>" style="width:1550px;height: 750px;">
            </a>
          </div>
      <?php
        }
      }
      ?>

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <!-- </div> -->
</body>

</html>