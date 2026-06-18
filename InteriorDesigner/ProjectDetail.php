<!DOCTYPE html>
<html lang="en">
<?php
include_once 'connection.php';
include_once './AdminLink.php';
include_once 'AdminHome.php';

SessionCheck();
extract($_REQUEST);
?>
</head>

<body>


  <?php
  if (isset($ProjectID)) {
    $_SESSION["ProjectID"] = $ProjectID;
  }
  // $str="select d.*,i.*,t.DesignTypeName from tbldesignerproject d,tbldesigntype t,tbldesignerprojectimage i where i.DesignerProjectID=d.DesignerProjectID and d.DesignTypeID=t.DesignTypeID and IsDefault=1 and d.DesignerProjectID=".$ProjectID;
  $str = "select d.*,i.*,t.design_type_name from tbl_designer_project d,tbl_design_type t,tbl_designer_project_image i where i.designer_project_id=d.designer_project_id and d.design_type_id=t.design_type_id and is_default=1 and d.designer_project_id=" . $ProjectID;
  $rs = mysqli_query($conn, $str) or die(mysqli_error($conn));
  while ($res = mysqli_fetch_array($rs)) {
  ?>
    <div class="content-wrapper bg-white">
      <div class="content-header mt-5">
        <div class="container-fluid">
          <div class="row d-flex center mb-3">
            <h1 class="page-title"><b><?php echo $res["designer_project_name"] . " Product"; ?></b></h1>
          </div>
          <table class="table bg-white ">
            <tr>
              <!-- <form class="form-horizontal" method="post"> -->
              <td>
                <?php if ($res["desciption"] != null) { ?>

                  <h4><strong>Description</strong></h4>

                  <h4><?php echo $res["desciption"]; ?></h4>
              </td>
              <td>

              <?php } ?>
              <!-- <br><br> -->
              <h4><strong>Location</strong></h4>
              <h4><?php echo $res["location"]; ?></h4>
              </td>
              <td>

                <!-- <br><br> -->
                <h4><strong>Design Type</strong></h4>

                <h4><?php echo $res["design_type_name"]; ?></h4>
              </td>
              <td>

                <?php
                $imgName = $res["image_url"];
                // if(!file_exists("../Uploadfile/$imgName"))
                // {
                //   $imgName="no-profile-image.png";
                // }
                ?>
                <a href="ProjectImage.php?id=<?php echo $ProjectID; ?>"><img src="../<?php echo $imgName; ?>" class="img-fluid" alt="Design" title="View More" style="width: 300px;height: 300px;"></a>
              </td>

              <!-- </form> -->
            <?php
          }
            ?>
            <!-- </form> -->
            </tr>
          </table>

        </div>
      </div>
    </div>

</body>