<?php
$ms = "Dear $fullname, 
Greetings from Apollo Sugar Clinics. Thank you for attending our Diabetes Screening Camp.Your RBS levels are $sugar mg/dl. To know more, please visit http://bit.ly/2tINHju  To manage your diabetes better, download our unique Diabetes Mobile App here: http://bit.ly/2llWu4N ";

$mss = urlencode($ms);
				//$runfile = "http://api.smscountry.com/SMSCwebservice_bulk.aspx?User=apollosugar&passwd=apollosugar123&mobilenumber=".$mobile."&message=".$mss."&sid=ASugar&mtype=N&DR=Y";
				//$runfile = "https://www.icebergnetworks.in/api//DynamSMS.php?username=apollosc&password=asc8765&from=APSUGR&text=".$mss."&to=".$mobile."";
		$runfile = "https://lms.icebergnetworks.in/api//DynamSMS.php?username=apollosc&password=asc8765&from=APSUGR&to=9966086199&text=".$mss;


 $ch1 = curl_init();
    curl_setopt($ch1, CURLOPT_URL, $runfile);

    curl_setopt ($ch1, CURLOPT_RETURNTRANSFER, 1);

    $conte = curl_exec ($ch1);
    print_r($conte);
    curl_close ($ch1);