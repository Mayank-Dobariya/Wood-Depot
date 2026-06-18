<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include_once 'connection.php';
  include_once 'AdminLink.php';
  include_once 'AdminHome.php';
  SessionCheck();
  extract($_REQUEST);

  ?>

</head>

<body>


  <div class="content-wrapper ">
    <div class="content-header mt-5">
      <div class="container-fluid">
        <div class="row d-flex center mb-3">

          <h1 style="color:black;">Order</h1>

        </div>
        <?php
        $str = "select o.*,u.first_name,u.last_name from tbl_order o,tbluser u where o.user_id=u.user_id and order_id=" . $OID;
        $rs = mysqli_query($conn, $str) or die(mysqli_error($conn));
        $res = mysqli_fetch_array($rs);
        ?>
        <div style="font-weight: bold;font-size: 17px;">
          <div style="text-align:left;">Order No : <?php echo $res["order_id"]; ?></div>
          <div style="text-align:right;">User Name : <?php echo $res["first_name"] . " " . $res["last_name"]; ?><br>
            Date : <?php echo $res["CreatedOn"]; ?></div>
        </div>
        <table class="table bg-white display nowrap" id="example" style="width:100%">
          <thead>
            <tr>
              <th scope="col">SR NO></th>
              <th scope="col">PRODUCT NAME</th>
              <th scope="col">PRICE</th>
              <th scope="col">QUANTITY</th>
              <th scope="col">TOTAL AMOUNT</th>
              <th scope="col">ORDER STATUS</th>
              <th scope="col">ORDER ON</th>


            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            $total = 0;
            $strA = "select od.*,p.product_name from tbl_order_detail od,tbl_product p where od.product_id=p.product_id and p.admin_id!= 'null' and order_id=" . $OID;
            $rsA = mysqli_query($conn, $strA) or die(mysqli_error($conn));
            while ($resA = mysqli_fetch_array($rsA)) {
            ?>
              <tr>
                <td>
                  <?php
                  echo $no;
                  ?>
                </td>
                <td><?php echo $resA["product_name"]; ?></td>
                <td>
                  <?php echo $resA["price"]; ?>
                </td>
                <td>
                  <?php echo $resA["quantity"]; ?>
                </td>
                <td>
                  <?php echo $resA["total_amount"]; ?>
                </td>
                <td>
                  <select name="cmbStatus" ids="<?php echo $resA["order_detail_id"] ?>" class="OrderStatus form-control">
                    <?php
                    if ($resA["order_status"] == "Order Processing") {
                    ?>
                      <option value="Order Processing" selected="">Order Processing</option>
                      <option value="Shipped">Shipped</option>
                      <option value="Delivered">Delivered</option>
                    <?php
                    } elseif ($resA["order_status"] == "Shipped") {
                    ?>
                      <option value="Order Processing" disabled="">Order Processing</option>
                      <option value="Shipped" selected="">Shipped</option>
                      <option value="Delivered">Delivered</option>
                    <?php
                    } elseif ($resA["order_status"] == "Delivered") {
                    ?>
                      <option value="Order Processing" disabled="">Order Processing</option>
                      <option value="Shipped" disabled="">Shipped</option>
                      <option value="Delivered" selected="">Delivered</option>
                    <?php
                    } else {
                    ?>
                      <option value="null" disabled="">Select Order Status</option>
                      <option value="Order Processing">Order Processing</option>
                      <option value="Shipped">Shipped</option>
                      <option value="Delivered">Delivered</option>
                    <?php
                    }
                    ?>
                  </select>
                </td>
                <td>
                  <?php echo $resA["OrderOn"]; ?>
                </td>
              </tr>
            <?php
              $no++;
              $total += $resA["total_amount"];
            }
            ?>
          </tbody>
          <tr>
            <td colspan="4"></td>
            <td align="center"><b>Total : <?php echo $total; ?></b></td>
            <td colspan="2"></td>
          </tr>
        </table>
      </div>


    </div>
  </div>

</body>
<script type="text/javascript">
  $(document).ready(function(){
    $(".OrderStatus").change(function(){
      var id =$(this).attr("ids");
      var s = $(this).val();
      $.ajax({
        url:"update.php",
        method:"post",
        data:{id:id,s:s},
        success:function(){
          document.location.href='OrderDetail.php?OID=<?php echo $OID ?>';
        }
      });
    });
  });
</script>

</html>