<?php

	$conn=mysqli_connect("localhost","root","","ruper");
	session_start();
	function SessionCheck()  
	{
		if($_SESSION["AdminID"]=="" || $_SESSION["AdminID"]==NULL)
		{
			// header("location:index.php");
			$url="index.php";
			echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
			
		}
	}
?>