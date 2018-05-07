<?php
date_default_timezone_set("Asia/Kolkata");
$todaydate=date('Y-m-d');
$todaytime=date('H:i:s');
//echo 'today date:'.$todaydate;
//echo 'today time:'.$todaytime;
//require_once('../Config/Auth.php'); 
include '../Config/Connection.php'; 

$login_id=$_POST['login_id']; 
if(empty($login_id)){
	
	$res = array('status'=>0,'message'=>'Please check user login id');   
	echo json_encode($res); 
}else{
	

	$fullname=$_POST['name']; 
	$gender=$_POST['gender'];  //Female/Male/others
	$age=$_POST['age'];  //only numbers
	$mobile=$_POST['phone']; 

	$diabetic=$_POST['diabetic']; //0 Years, 1-5 Years, 5-10 Years >10 Years
	$sugar=$_POST['sugar']; //only numbers
	//$email=$_POST['email']; 
	$weight=$_POST['weight']; //25-500
	$height=$_POST['height']; //4,5,6,8
	$familyhistory=$_POST['familyhistory']; 
	$interestedin=$_POST['interestedin']; 
	$rating=$_POST['rating'];
	$inch=$_POST['inch'];
	// added 04-30-2018
	$servicetype=''; //$_POST['servicetype']; 
	$amount=0; //$_POST['amount']; 



	$SESS_NAME = $_POST['SESS_NAME'];
	$SESS_LOCATION= $_POST['SESS_LOCATION'];  //$_SESSION['SESS_LOCATION']; 
	$SESS_CLINIC = $_POST['SESS_CLINIC'];
	$SESS_CITY = $_POST['SESS_CITY'];
	$LOGIN_DATE = $_POST['LOGIN_DATE'];

	// BMI calculation
	$height_inch = $height.'.'.$inch;
	//echo ' weight  ' .$weight; 
	$final_heigh = ($height_inch * 30.48)/100; //1.219 
	//echo ' final_heigh ' .$final_heigh.'<br>';

	  $bmi= ($weight / ($final_heigh * $final_heigh));  
	//exit; 
				   
						$cal=round($bmi,2);

						if ($cal < "18.5") {
							
							$bodyMsg =  "You are underweight and have a low body mass index. This does not mean you are free from the risk of diabetes. Underweight and lean people can develop type 2 diabetes due to: Family history Stress Non-alcoholic fatty liver Inflammation Autoimmunity. Modifying diet and being physically active reduces the risk of type 2 diabetes. Consult our diabetes specialists and dieticians for total risk assessment and diet modification.";
							$img= 1;
							$bmi_bw = ' < 18.5';
							$bmi_codition = 'Underweight';
						}
						elseif($cal<= "18.5" || $cal <= "24.9" ){
							
							$bodyMsg = "Congrats your body mass index is in range. Though you have a normal BMI, if you have increased waist circumference, you are at a risk of getting type 2 diabetes.						Increased waist circumference also increases your risk of high cholesterol, hypertension, cardiovascular diseases, heart disease, and stroke. Consuming a diet with the optimum amount of protein, carbohydrates, and fat along with good physical activity reduces the risk of type 2 diabetes. If you have a family history of type 2 diabetes, consult our doctors and dieticians for total risk assessment and diet modification.";
							$img= 2;
							$bmi_bw = '18.5-24.9';
							$bmi_codition = 'Normal';
						}
						elseif($cal<= "25" || $cal <= "29.9" ){
							$bodyMsg = "You have a high BMI. You are overweight. It’s time to act now. 85% of people who have type 2 diabetes are overweight or obese. Obesity increases the risk of diabetes, high cholesterol, high blood pressure, heart diseases, and stroke. It’s time to work up your muscles and be physically active. It’s also time to change your diet in order to reduce weight and reduce the risk of diabetes. Visit your nearest Apollo Sugar Clinics for a total risk assessment and diet plan.";
							$img= 3;
							$bmi_bw = '25-29.9';
							$bmi_codition = 'Overweight';
						}

						elseif($cal<= "30.0" || $cal <= "34.9" ){
							$bodyMsg = "You have a high BMI. You are overweight. It’s time to act now. 85% of people who have type 2 diabetes are overweight or obese. Obesity increases the risk of diabetes, high cholesterol, high blood pressure, heart diseases, and stroke. It’s time to work up your muscles and be physically active. It’s also time to change your diet in order to reduce weight and reduce the risk of diabetes. Visit your nearest Apollo Sugar Clinics for a total risk assessment and diet plan.";
							$img= 4;
							$bmi_bw = '30.0-34.9';
							$bmi_codition = 'Obese';
						}

						elseif($cal<= "35" || $cal > "35" ){
							$bodyMsg = "Your body mass index is very high. You need aggressive measures to reduce your weight. You need to work to reduce your waist circumference. Having a very high BMI can lead to serious health complications including type 2 diabetes, high cholesterol, hypertension, heart diseases, and blood vessel problems. Consult our doctors and dieticians for a total health assessment and diet modifications.";
							$img= 5;
							$bmi_bw = '35 >';
							$bmi_codition = 'Extremely Obese';
						}
						else{

							$bodyMsg =  "Oops!, something wrong...";
							$img= '';
							$bmi_bw = '';
							$bmi_codition = '';
							
						}
						
					$bmi_data = array('bmi'=>$cal,'img'=>$img,'bodyMsg'=>$bodyMsg,'bmi_bw'=>$bmi_bw,'bmi_codition'=>$bmi_codition);


	//end BMI calculation

	//echo $height_inch; exit;


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
	
	//send sms
	
	$ms = "Dear $fullname, Greetings from Apollo Sugar Clinics. Thank you for attending our Diabetes Screening Camp.Your RBS levels  are $sugar mg/dl and BMI $cal . To know more, please missed call 08033507134 To manage your diabetes better, download our unique Diabetes Mobile App here: http://bit.ly/2llWu4N ";

	$mss = urlencode($ms);
				$runfile = "https://lms.icebergnetworks.in/api//DynamSMS.php?username=apollosc&password=asc8765&from=APSUGR&text=".$mss."&to=".$mobile."";

	$ch1 = curl_init();
    curl_setopt($ch1, CURLOPT_URL, $runfile);

    curl_setopt ($ch1, CURLOPT_RETURNTRANSFER, 1);

     $conte = curl_exec ($ch1);
	//exit;
    curl_close ($ch1);

	
	//end send sms

	 if(!empty($fullname)){    
				
			$sql="INSERT INTO memberdata (fullname,gender,age,mobile,height,weight,diabetic,sugar,exename,location,clinic,city,updateddate,updatedtime,familyhistory,interestedin,logindate,mobile_valid,mobile_location,mobile_network,mobile_linetype,inch,rating,bmi,login_id,amount,service_type)
							   VALUES 
							   ('$fullname','$gender','$age','$mobile','$height','$weight','$diabetic','$sugar','$SESS_NAME','$SESS_LOCATION','$SESS_CLINIC','$SESS_CITY','$todaydate','$todaytime','$familyhistory','$interestedin','$LOGIN_DATE', '$mobValid', '$mob_location', '$mob_carrier','$mob_line_type','$inch','$rating','$cal','$login_id','$amount','$servicetype')";
					
	//echo 'SQL Query: '.$sql;
	//$logData=$sql.' - '.$_SESSION['SESS_NAME'].$todaydate;
				   
		if(mysql_query($sql)){
			
			$res = array('status'=>1,'message'=>'Saved data successfully.','bmi_data' => $bmi_data);
			
		}else{
			
			$res = array('status'=>0,'message'=>'Something went wrong please try again.');
		}


	}else{
	$res = array('status'=>0,'message'=>'Please check name');
	 
	 }      
	echo json_encode($res); 

}

?>