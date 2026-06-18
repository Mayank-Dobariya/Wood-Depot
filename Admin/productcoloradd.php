<!DOCTYPE html>
<?php
session_start();
?>

<html lang="en">
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    var counter = 2;
    $("#addButton").click(function () {
   if(counter>10){
            alert("Only 10 textboxes allow");
            return false;
   }        
   var newTextBoxDiv = $(document.createElement('div'))
        .attr("id", 'TextBoxDiv' + counter);
   newTextBoxDiv.after().html('<label style="margin-left:120px;margin-bottom:20px;">Color #'+ counter + ' : </label>' +
         '<input type="color" name="txtColor[]" id="textbox' + counter + '" value="" >');            
   newTextBoxDiv.appendTo("#TextBoxesGroup");
   counter++;
});
    $("#removeButton").click(function () {
   if(counter==1){
          alert("No more textbox to remove");
          return false;
       }       
   counter--;  
        $("#TextBoxDiv" + counter).remove(); 
     });
   
  });
</script>
<?php 

$conn = mysqli_connect("localhost", "root", "", "ruper");
// SessionCheck();
extract($_REQUEST);
if(isset($_GET["procid"]))
{
  $Pid=$_GET["procid"];
  $_SESSION['procid']=$Pid;
}
if(isset($_REQUEST["btnSave"]))
{
  
	// $Pid=$_SESSION["procid"];
 
	foreach ($txtColor as  $value) {
    $strColor="insert into tbl_product_variance values(null,'$value',1,$Pid)";
    mysqli_query($conn,$strColor) or die(mysqli_error($conn));
    } 
    echo '<script>alert("inserted")</script>';         
	header("location:productcolorlist.php?procid=".$_SESSION['procid']);
}
?>

<head>
   
<?php

  include_once './AdminLink.php';
  include_once 'AdminHome.php';
  ?>
</head>
<body>
  
<div class="content-wrapper">
        <div class="content-header mt-5">

            <div class="container-fluid">
              
<div class="row">
					<div class="col-lg-12 animatedParent animateOnce z-index-47">
						<div class="panel panel-default animated fadeInUp">
							<div class="panel-heading clearfix">
              

								<h3 class="page-title pull-left">Add Color</h3>
							</div>
							<div class="panel-body">
								<form class="form-horizontal" method="post">
								<div class="form-group"> 
                           <div id='TextBoxesGroup'>
                              <div id="TextBoxDiv1">
                                 <label class="control-label" style="margin-left:120px;margin-bottom:20px;">Color #1 : </label>
                                 <input type="color" id='textbox1' name="txtColor[]">
                              </div>
                           </div>

                           <div class="form-group"> 
                              <div class="col-sm-offset-2 col-sm-10">
                                 <input type='button' value='Add Button' id='addButton'>
                                 <input type='button' value='Remove Button' id='removeButton'>
                              </div>
                           </div>
                           </div>
								<div class="line-dashed"></div>
									<div class="form-group"> 
										<div class="col-sm-offset-2 col-sm-10"> 
											<button class="btn btn-primary" type="submit" name="btnSave">Save</button> 
										</div> 
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
</div>

</body>
</html>