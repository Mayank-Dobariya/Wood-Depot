<?php
	session_start();
	session_unset();
	unset($_SESSION['InteriorDesignerID']);
	unset($_SESSION["FirstName"]);
	unset($_SESSION["LastName"]);
	unset($_SESSION["ImageURL"]);
	session_destroy();
	$url = "index.php";
	echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
