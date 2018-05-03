<?php
date_default_timezone_set("Asia/Kolkata");
$todaydate=date('Y-m-d');
$todaytime=date('H:i:s');
echo 'today date:'.$todaydate;
echo 'today time:'.$todaytime;
require_once('../Config/Auth.php'); 
include '../Config/Connection.php'; 

$lmename=$_POST['lmename']; 
$lmeuserid=$_POST['lmeuserid']; 
$lmedisplayname=$_POST['lmedisplayname']; 
$lmepassword=$_POST['lmepassword']; 
$lmecity=$_POST['lmecity']; 
$lmeclinic=$_POST['lmeclinic']; 
$lmemobile=$_POST['lmemobile'];
$lmeemail=$_POST['lmeemail'];
echo 'clinic'.$lmeclinic;
echo 'city'.$lmecity;
 if(!empty($lmename)){    
			
	$sql="INSERT INTO login (UserId,Name,Password,Clinic,City,DisplayName,Email,Mobile)
                           VALUES ('$lmeuserid','$lmename','$lmepassword','$lmeclinic','$lmecity','$lmedisplayname','$lmeemail','$lmemobile')";	
				
		echo 'SQL Query: '.$sql;
		   
						   if (!mysql_query($sql))
                           {
							header('Location: ../Home/AdminHome.php');
						   $_SESSION['SESS_RESULT']="false";	
						$_SESSION['SESS_TYPE']="insert";					 
                             die('Error: ' . mysql_error($con));
                             }	
						  else{
							header('Location: ../Home/AdminHome.php');
							$_SESSION['SESS_RESULT']="true";
							$_SESSION['SESS_TYPE']="insert";							
							}


}							

							mysql_close($con);
							exit();



?>