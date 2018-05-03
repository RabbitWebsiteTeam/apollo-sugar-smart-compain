<?php
date_default_timezone_set("Asia/Kolkata");
$todaydate=date('Y-m-d');
$todaytime=date('H:i:s');
echo 'today date:'.$todaydate;
echo 'today time:'.$todaytime;
require_once('../Config/Auth.php'); 
include '../Config/Connection.php'; 
$fullname=$_POST['name']; 
$gender=$_POST['gender']; 
$age=$_POST['age']; 
$mobile=$_POST['phone']; 
$location=$_SESSION['SESS_LOCATION']; 
$diabetic=$_POST['diabetic']; 
$sugar=$_POST['sugar'];
//$email=$_POST['email']; 
$weight=$_POST['weight'];
$height=$_POST['height'];
$familyhistory=$_POST['familyhistory']; 
$interestedin=$_POST['interestedin']; 
//$dt = array_push($_POST,$_SESSION['SESS_NAME'],$location,$_SESSION['SESS_CLINIC'],$_SESSION['SESS_CITY']);
//print_r($_POST);
//exit;
//echo $_SESSION[SESS_CITY];
//exit;
//if(!empty($_SESSION[SESS_CITY])){
//if(ucfirst($_SESSION['SESS_CITY'])=='Vijayawada' || ucfirst($_SESSION['SESS_CITY'])=='Hyderabad'){	
	if($_SESSION['SESS_CITY']!='Nashik' && $_SESSION['SESS_CITY']!='Kolkata' && $_SESSION['SESS_CLINIC']!='Tolichowki' && $_SESSION['SESS_CLINIC']!='Warangle'){
if($sugar>139 || $familyhistory=='yes')
{	
$data = http_build_query($_POST, 'flags_');
//print_r($_POST);
//$data = file_get_contents("https://apolloprism.com/data/sugar/getlabresultsdump?startDate=1492473601000&endDate=1492732801000");
//var_dump($data);
//exit;
$ch = curl_init();                    // initiate curl
//$url = "http://tcupads.com/curl/index2.php"; // where you want to post data
$url = "http://adjetter.com/lp/book-an-appointment.html";
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_POST, true);  // tell curl you want to post something
curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // define what you want to post
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return the output in string format
$output = curl_exec ($ch); // execute
 $info = curl_getinfo($ch);

curl_close ($ch); // close curl handle
}
	}
//}
//}
//echo 
//$url = "http://apollosugar.aavaz.biz/aavaz/api/Campaign/addProspect?formID=1&logonID=vikranth.s@apollosugar.com&password=apollo&phone=$mobile&gender=$gender&firstName=$fullname&Height=$height&Weight=$weight&age=$age&Diabetic=$diabetic&RBG=$sugar&FamilyHistory=$familyhistory&Interestedin=$interestedin&Location=$location";
//exit;
//file_get_contents("http://apollosugar.aavaz.biz/aavaz/api/Campaign/addProspect?formID=1&logonID=vikranth.s@apollosugar.com&password=apollo&phone=$mobile&gender=$gender&firstName=$fullname&Height=$height&Weight=$weight&age=$age&Diabetic=$diabetic&RBG=$sugar&FamilyHistory=$familyhistory&Interestedin=$interestedin&Location=$location");
//exit;
$ms = "Dear $fullname, 
Greetings from Apollo Sugar Clinics. Thank you for attending our Diabetes Screening Camp.Your RBS levels are $sugar mg/dl. To know more, please visit http://bit.ly/2tINHju  To manage your diabetes better, download our unique Diabetes Mobile App here: http://bit.ly/2llWu4N ";

$mss = urlencode($ms);
				//$runfile = "http://api.smscountry.com/SMSCwebservice_bulk.aspx?User=apollosugar&passwd=apollosugar123&mobilenumber=".$mobile."&message=".$mss."&sid=ASugar&mtype=N&DR=Y";
				//$runfile = "https://www.icebergnetworks.in/api//DynamSMS.php?username=apollosc&password=asc8765&from=APSUGR&text=".$mss."&to=".$mobile."";
		$runfile = "http://203.212.70.200/smpp/sendsms?username=icbrghttp5&password=icbr8765&to=".$mobile."&from=APSUGR&text=".$mss;


 $ch1 = curl_init();
    curl_setopt($ch1, CURLOPT_URL, $runfile);

    curl_setopt ($ch1, CURLOPT_RETURNTRANSFER, 1);

    $conte = curl_exec ($ch1);

    curl_close ($ch1);

/***
*  Mobile Number Validation
**/

$api_url = "http://apilayer.net/api/validate?access_key=4529a5d1d5e8ba5759033c5e85918234&number=%s&country_code=IN&format=1";
$mobile = str_replace("+91", "", $mobile);
$url = sprintf($api_url, $mobile);

 $ch1 = curl_init();
curl_setopt($ch1, CURLOPT_URL, $url);

curl_setopt ($ch1, CURLOPT_RETURNTRANSFER, 1);

$mobContent = curl_exec ($ch1);

curl_close ($ch1);

$mobContent = get_object_vars(json_decode($mobContent));
$mobValid = $mobContent['line_type'] == 'mobile'?'Valid':'Invalid';
$apiResponse = serialize($mobContent);
$mob_location = $mobContent['location'];
$mob_carrier = $mobContent['carrier'];
$mob_line_type = $mobContent['line_type'];

 if(!empty($fullname)){    
			
		$sql="INSERT INTO memberdata (fullname,gender,age,mobile,height,weight,diabetic,sugar,exename,location,clinic,city,updateddate,updatedtime,familyhistory,interestedin,logindate,mobile_valid,mobile_location,mobile_network,mobile_linetype)
                           VALUES 
                           ('$fullname','$gender','$age','$mobile','$height','$weight','$diabetic','$sugar','$_SESSION[SESS_NAME]','$location','$_SESSION[SESS_CLINIC]','$_SESSION[SESS_CITY]','$todaydate','$todaytime','$familyhistory','$interestedin','$_SESSION[SESS_LOGINDATE]', '$mobValid', '$mob_location', '$mob_carrier','$mob_line_type')";
				
echo 'SQL Query: '.$sql;
$logData=$sql.' - '.$_SESSION['SESS_NAME'].$todaydate;
		   
						   if (!mysql_query($sql))
                           {
                                                  file_put_contents("CampaignMemberLog.txt",$logData,FILE_APPEND);

						  header('Location: ../Home/ExecutiveHome.php');

						   $_SESSION['SESS_RESULT']="false";

                             die('Error: ' . mysql_error($con));
                             }	
						  else{
                                                  file_put_contents("../Logs/CampaignMemberLog.txt",logData,"FILE_APPEND");

						  header('Location: ../Home/ExecutiveHome.php');

							$_SESSION['SESS_RESULT']="true";
							}


}							
   	
			

							mysql_close($con);
							exit();



?>