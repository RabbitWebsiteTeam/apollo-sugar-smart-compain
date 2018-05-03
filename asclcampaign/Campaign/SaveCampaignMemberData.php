<?php
date_default_timezone_set("Asia/Kolkata");
$todaydate=date('Y-m-d');
$todaytime=date('H:i:s');
echo 'today date:'.$todaydate;
echo 'today time:'.$todaytime;
require_once('../Config/Auth.php'); 
include '../Config/Connection.php'; 
$login_id = $_SESSION['SESS_MEMBERID'];  

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

// new fields 
$inch=$_POST['inch']; 
$rating=$_POST['rating']; 

$servicetype=''; //$_POST['servicetype']; 
$amount=0; //$_POST['amount']; 


// BMI calculation
$height_inch = $height.'.'.$inch;
//echo ' weight  ' .$weight; 
$final_heigh = ($height_inch * 30.48)/100; //1.219 
//echo ' final_heigh ' .$final_heigh.'<br>';

  $bmi= ($weight / ($final_heigh * $final_heigh));

			   
					$cal=round($bmi,2);


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
$ms = "Dear $fullname, Greetings from Apollo Sugar Clinics. Thank you for attending our Diabetes Screening Camp.Your RBS levels  are $sugar mg/dl and BMI $cal . To know more, please missed call 08033507134 To manage your diabetes better, download our unique Diabetes Mobile App here: http://bit.ly/2llWu4N ";

$mss = urlencode($ms);
				//$runfile = "http://api.smscountry.com/SMSCwebservice_bulk.aspx?User=apollosugar&passwd=apollosugar123&mobilenumber=".$mobile."&message=".$mss."&sid=ASugar&mtype=N&DR=Y";
				$runfile = "https://lms.icebergnetworks.in/api//DynamSMS.php?username=apollosc&password=asc8765&from=APSUGR&text=".$mss."&to=".$mobile."";

 $ch1 = curl_init();
    curl_setopt($ch1, CURLOPT_URL, $runfile);

    curl_setopt ($ch1, CURLOPT_RETURNTRANSFER, 1);

     $conte = curl_exec ($ch1);
//exit;
    curl_close ($ch1);

	//
	$ch = curl_init();
$curlConfig = array(
    CURLOPT_URL            => "http://apollosugar.com/btl_leads.php",
    CURLOPT_POST           => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS     => array(
        'name' => $fullname,
        'gender' => $gender,
		'age'=>$age,
		'phone'=>$mobile,
		'location'=>$location,
		'diabetic'=>$diabetic,
		'sugar'=>$sugar,
		'weight'=>$weight,
		'height'=>$height,
		'familyhistory'=>$familyhistory,
		'interestedin'=>$interestedin,
		'inch'=>$inch,
		'rating'=>$rating,
		'SESS_CLINIC'=>$_SESSION['SESS_CLINIC'],
		'SESS_CITY'=>$_SESSION['SESS_CITY'],
		'SESS_NAME'=>$_SESSION['SESS_NAME'],
		'SESS_LOGINDATE'=>$_SESSION['SESS_LOGINDATE'],		
    )
);
curl_setopt_array($ch, $curlConfig);
$result = curl_exec($ch);
curl_close($ch);

//
	
	
 if(!empty($fullname)){    
			
		$sql="INSERT INTO memberdata (fullname,gender,age,mobile,height,weight,diabetic,sugar,exename,location,clinic,city,updateddate,updatedtime,familyhistory,interestedin,logindate,inch,rating,bmi,login_id,amount,service_type)
                           VALUES 
                           ('$fullname','$gender','$age','$mobile','$height','$weight','$diabetic','$sugar','$_SESSION[SESS_NAME]','$location','$_SESSION[SESS_CLINIC]','$_SESSION[SESS_CITY]','$todaydate','$todaytime','$familyhistory','$interestedin','$_SESSION[SESS_LOGINDATE]','$inch','$rating','$cal','$login_id','$amount','$servicetype')";
				
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