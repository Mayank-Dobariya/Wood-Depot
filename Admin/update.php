<?php
include_once "connection.php";
	if(isset($_POST["id"]))
	{
		$query = "update tbl_order_detail set order_status='".$_POST["s"]."' where order_detail_id = ".$_POST["id"];
		mysqli_query($conn,$query); 
	} 
?>