<?php
	//Start session
	session_start();
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['SESS_NAME']) || (trim($_SESSION['SESS_NAME']) == '')) {
	if(!isset($_SESSION['SESS_LOCATION']) || (trim($_SESSION['SESS_LOCATION']) == '')) {
	
		header("location: ../index.php");
		exit();
	}
		header("location: ../index.php");
		exit();
	}
?>