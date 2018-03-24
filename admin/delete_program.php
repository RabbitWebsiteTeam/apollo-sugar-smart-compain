<?php
session_start();
include_once('config.php');
//print_r($_REQUEST);exit;
 if(!isset($_SESSION['email']) && $_SESSION['email'] == '') { 
    header("Location: login.php");
}

/*$servername = "callhealthreg.db.9139005.0fc.hostedresource.net";
$username = "callhealthreg";
$password = "CHnew@123";
$dbname = "callhealthreg";*/

// Create connection
//$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
}
if($_REQUEST['status'] == 1){
	$status = 0;
}else{
	$status = 1;
}
//mysql_select_db("callhealthreg",$conn);
//echo $id=$_POST['branchid'];


//$sql="delete from branches where id=".$_POST['branchid'];
 $sql = "UPDATE `programs` SET `status` = '".$status."' WHERE `id` =".$_REQUEST['id'];
$result=$conn->query($sql);
header("location:programs.php");


?>