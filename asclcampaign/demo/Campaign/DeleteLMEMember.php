<?php
require_once('../Config/Auth.php'); 
include '../Config/Connection.php'; 
$lmeuniqueid=$_GET['Id'];

 if(!empty($lmeuniqueid)){    
			
	$sql="DELETE FROM `login` WHERE id='$lmeuniqueid'";	
				
		echo 'SQL Query: '.$sql;
		   
						   if (!mysql_query($sql))
                           {
							header('Location: ../Home/AdminHome.php');
							$_SESSION['SESS_RESULT']="false";
							$_SESSION['SESS_TYPE']="delete";						   
                             die('Error: ' . mysql_error($con));
                             }	
						  else{
							header('Location: ../Home/AdminHome.php');
							$_SESSION['SESS_RESULT']="true";
							$_SESSION['SESS_TYPE']="delete";							
							}
	}							
							mysql_close($con);
							exit();



?>