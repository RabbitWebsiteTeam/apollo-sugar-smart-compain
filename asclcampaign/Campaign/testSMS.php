<?php
 $fullname = 'kali';
 $sugar =22;
 $mobile = $_REQUEST['mobile'];
 // https://lms.icebergnetworks.in/api/DynamSMS.php?username=apollosc&password=asc8765&from=APSUGR&text=The%20text%20you%20want%20to%20filter%20goes%20here.%20http://lms.icebergnetworks.in/?utm_source=ictest%20T&CApply.&to=9819612269
 if(!empty($mobile)){
	 
$msg = "Dear $fullname, Greetings from Apollo Sugar Clinics. Thank you for attending our Diabetes Screening Camp.Your RBS levels are $sugar mg/dl. To know more, please visit http://bit.ly/2tINHju  To manage your diabetes better, download our unique Diabetes Mobile App here: http://bit.ly/2llWu4N ";
//$msg ="The%20text%20you%20want%20to%20filter%20goes%20here.%20http://lms.icebergnetworks.in/?utm_source=ictest%20T";

$mss = urlencode($msg);
				//$runfile = "http://api.smscountry.com/SMSCwebservice_bulk.aspx?User=apollosugar&passwd=apollosugar123&mobilenumber=".$mobile."&message=".$mss."&sid=ASugar&mtype=N&DR=Y";
				echo $runfile = "https://lms.icebergnetworks.in/api//DynamSMS.php?username=apollosc&password=asc8765&from=APSUGR&text=".$mss."&to=".$mobile."";
				//echo $runfile = "https://lms.icebergnetworks.in/api/DynamSMS.php?username=apollosc&password=asc8765&from=APSUGR&text=".$msg."&CApply.&to=9703038009";
echo '<br>';
 $ch1 = curl_init();
    curl_setopt($ch1, CURLOPT_URL, $runfile);

    curl_setopt ($ch1, CURLOPT_RETURNTRANSFER, 1);

     echo $conte = curl_exec ($ch1);
//exit;
    curl_close ($ch1);
 }else{
	 echo 'provide mobile no';
 }
?>