<?php

session_start();
//print_r($_SESSION);exit;
 if(!isset($_SESSION['email']) && $_SESSION['email'] == '') { 
    header("Location: login.php");
}
require_once('config.php');

$filename = "leads.csv";

$fp = fopen('php://output', 'w');


header('Content-type: text/csv');
header('Content-Disposition: attachment; filename="reports.csv"');
 
// do not cache the file
header('Pragma: no-cache');
header('Expires: 0');
//$result = mysql_query("SELECT * from registerdata");
$result=$conn->query("SELECT * from registerdata");
$result_header=$conn->query("SHOW COLUMNS FROM registerdata");

 fputcsv($fp, array('First Name', 'Last Name', 'Mobile Number', 'Email', 'Employee ID','Age','Gender','Address','Pincode','Program','Branch Name','empRel','relation','Relation Id','Id'));

	
 while ($row = $result->fetch_assoc()) {
	//fputcsv($fp, $row);
	fputcsv($fp, array($row['fname'],$row['lname'],$row['mobileNo'],$row['emailid'],$row['empid'],$row['age'],$row['gender'],$row['address'],$row['pincode'],$row['program'],getbranchname($row['branchId']),$row['empRel'],$row['relation'],$row['registerId'],$row['id'] ));

	
}	 
/*function getcentername($centerid){
	global $conn;
$result=$conn->query("SELECT * from branch_centers where id=".$centerid);
	$row = $result->fetch_assoc();
	return $row['centerName'];
	
}*/

function getbranchname($branchid){
	global $conn;
	$result=$conn->query("SELECT * from branches where id=".$branchid);
	$row = $result->fetch_assoc();
	return $row['branchName'];
	
}
//mysql_close($conn);
?>