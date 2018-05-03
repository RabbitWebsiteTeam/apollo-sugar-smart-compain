<?php
date_default_timezone_set("Asia/Kolkata");
$todaydate=date('Y-m-d');
$todaytime=date('H:i:s');
echo 'today date:'.$todaydate;
echo 'today time:'.$todaytime;
require_once('../Config/Auth.php'); 
include '../Config/Connection.php'; 

$lmename=$_POST['lmename']; 
$lmeid=$_POST['lmeid'];
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
			
	/*	$sql="INSERT INTO memberdata (fullname,gender,age,mobile,height,weight,diabetic,sugar,exename,location,clinic,city,updateddate,updatedtime,familyhistory,interestedin)
                           VALUES 
                           ('$fullname','$gender','$age','$mobile','$height','$weight','$diabetic','$sugar','$_SESSION[SESS_NAME]','$location','$_SESSION[SESS_CLINIC]','$_SESSION[SESS_CITY]','$todaydate','$todaytime','$familyhistory','$interestedin')";
				*/
				
	$sql="UPDATE login SET Name='$lmename',userId='$lmeuserid' ,Password='$lmepassword' , Clinic='$lmeclinic', City='$lmecity' ,DisplayName='$lmedisplayname' ,Email='$lmeemail' , Mobile='$lmemobile' WHERE Id='$lmeid'";	
				
				
echo 'SQL Query: '.$sql;
		   
						   if (!mysql_query($sql))
                           {
							header('Location: ../Home/AdminHome.php');
						   $_SESSION['SESS_RESULT']="false";
						   $_SESSION['SESS_TYPE']="update";
                             die('Error: ' . mysql_error($con));
                             }	
						  else{
							header('Location: ../Home/AdminHome.php');
							$_SESSION['SESS_RESULT']="true";
							$_SESSION['SESS_TYPE']="update";
							}


}							

							mysql_close($con);
							exit();



?>