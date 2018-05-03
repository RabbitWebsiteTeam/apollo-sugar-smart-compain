<?php
date_default_timezone_set("Asia/Kolkata");
$todaydate=date('Y-m-d');
$todaytime=date('H:i:s');
//echo 'today date:'.$todaydate;
//echo 'today time:'.$todaytime;
//require_once('../Config/Auth.php'); 
include '../Config/Connection.php'; 

$login_id = $_POST['login_id'];
if(empty($login_id)){
	
	$res = array('status'=>0,'message'=>'Please check user login id');   
	echo json_encode($res); 
}else{
	
	$data = mysql_query("SELECT view_only,Clinic FROM login where Id = '$login_id'");              
 //echo mysql_num_rows($data); exit;
     if(mysql_num_rows($data) > 0){
                        
		 $member = mysql_fetch_assoc($data);
		//print_r($member);
		  $Clinic = $member['Clinic'];
		 $view_only =  $member['view_only'];
		//	$test1='2010-04-19 18:31:27';
		//	echo date('d/m/Y',strtotime($test1));
		 $sDate = date('Y-m-d',strtotime($_POST['startDate']));
		 $eDate = date('Y-m-d',strtotime($_POST['endDate']));

//$sql="select * from memberdata";
	if($view_only == 1){
		$result = mysql_query("SELECT * FROM memberdata where clinic = '".$Clinic."' and updateddate >= '".$sDate."' and  updateddate <= '".$eDate."' order by memberid DESC");
	
	}else{
		$result = mysql_query("SELECT * FROM memberdata where login_id = ".$login_id." and updateddate >= '".$sDate."' and  updateddate <= '".$eDate."' order by memberid DESC");
	}
	
	if (!empty($result)) {
		
		$rows = [];
		
		 while ($row = mysql_fetch_assoc($result))
		 {
			 $rows[] = $row;
		 }
	//	print_r(rows);
		if( count($rows) > 0){
			
			$res = array('status'=>1,'data'=>$rows);
		}else{
			$res = array('status'=>0,'message'=>'No data found.');
		}
	}else{
		
		$res = array('status'=>0,'message'=>'Something went wrong please try again!.');
	}
 }else{
		
		$res = array('status'=>0,'message'=>'Something went wrong, please check session id.');
	}
     
echo json_encode($res); 

}

?>