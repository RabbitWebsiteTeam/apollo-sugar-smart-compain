<?php
date_default_timezone_set("Asia/Kolkata");
$todaydate=date('Y-m-d');
$todaytime=date('H:i:s');
//echo 'today date:'.$todaydate;
//echo 'today time:'.$todaytime;
//require_once('../Config/Auth.php'); 
include '../Config/Connection.php'; 

	$userid= $_POST['loginuserid'];
	$password = $_POST['loginpassword'];
	$venue = $_POST['loginvenue'];
	$logindate = $_POST['logindate'];

 $data = mysql_query("SELECT * FROM login where UserId = '$userid' AND Password = '$password' ");              
 //echo mysql_num_rows($data); exit;
     if(mysql_num_rows($data) > 0){
                        
		 $member = mysql_fetch_assoc($data);
			
		$res = array('status'=>1,'data'=>$member);
	 }else{
		 $res = array('status'=>0,'message'=>'No data found');
	 }
echo json_encode($res); 



?>