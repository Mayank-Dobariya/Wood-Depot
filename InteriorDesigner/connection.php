<?php
	$conn=mysqli_connect("localhost","root","","ruper");
	session_start();
	function SessionCheck()  
	{
		if($_SESSION["InteriorDesignerID"]=="" || $_SESSION["InteriorDesignerID"]==NULL)
		{
			// header("location:Index.php");
			$url = "index.php";
            echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
		}
	}
?>
