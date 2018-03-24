<?php
ob_start();
require_once('config.php');
require 'Mailer/Exception.php';
require 'Mailer/PHPMailer.php';
require 'Mailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


//echo '<pre>';
//print_r($_POST);
//exit;
$branch = $_POST['branch'];

$empfname = $_POST['empfname'];
$emplname = $_POST['emplname'];
$empphone = $_POST['empphone'];
$address = $_POST['address'];
$empgender = $_POST['empgender'];
$empdob = $_POST['empdob'];
$program = $_POST['program'];

//if(empty($_POST['vaccincheckbox'])){
	//	$vaccincheckbox = 0;
	//}else{
	//	$vaccincheckbox = $_POST['vaccincheckbox'][$i];
//	}
//$empdob = date('Y-m-d', strtotime($_POST['empdob']));
//echo '<br>';
$empemail = $_POST['empemail'];
$empid = $_POST['empid'];
$pincode = $_POST['pincode'];


$quant = $_POST['quant'][1];

$totalRec = $quant + 1;
//echo $totalRec; exit;
  $sql1 = "INSERT INTO `registerdata` ( `fname`, `lname`, `mobileNo`, `age`, `gender`, `address`, `pincode`,branchId,empid,emailid,program) 
 VALUES ('".$empfname."', '".$emplname."', '".$empphone."', '".$empdob."', '".$empgender."', '".$address."', '".$pincode."','".$branch."','".$empid."','".$empemail."','".$program."')";  
 $result = mysqli_query($conn,$sql1);

 $last_id = mysqli_insert_id($conn);
 //$ccmail = $ccmail = 'mahesh.kumar@callhealth.com';
 $ccmail = 'murali49.a@gmail.com';


 
for($i = 0; $i < count($_POST['pdob']); $i++)  
{ 
	$b = $i+1;

	  $ccmail .=','.$_POST['email'][$i];
	  //$dob = date('Y-m-d',strtotime($_POST['pdob'][$i]));  
	  $dob = $_POST['pdob'][$i];
	 
	
		$sql2 = "INSERT INTO `registerdata` ( `fname`, `lname`, `mobileNo`, `age`, `gender`, relation, branchId,registerId,empRel,emailid) 
		VALUES ('".$_POST['fname'][$i]."', '".$_POST['lname'][$i]."', '".$_POST['phone'][$i]."', '".$dob."', '".$_POST['gender'][$i]."', '".$_POST['prelation'][$i]."', '".$branch."','".$last_id."','".$empfname."','".$_POST['email'][$i]."')";  
		$result = mysqli_query($conn,$sql2);	
	 $relmails = $_POST['email'][$i];
	 $relname = $_POST['fname'][$i];
	 
	 
	//send mail to relation

	$message1 = "<html> <body style='margin:0'>";
	$message1 .= "<table cellspacing='0' cellpadding='0' border='0' width='600' align='center' style='border:1px solid #ccc;'>
	<tr>
	<td><img src='http://wellness.callhealth.com/form/confirmation/images/banner.jpg' border='0'/></td>
	</tr>
	<tr><td style='padding:30px 50px 10px 50px; font-family:Calibri; font-size:14px; color:#000;'>Hi $relname </td> </tr>
	<tr><td style='padding:10px 50px 10px 50px; font-family:Calibri; font-size:14px; color:#000;'>Thank you for successfully booking your slot.</td></tr>
	<tr><td style='padding:10px 50px 20px 50px; font-family:Calibri; font-size:14px; color:#000;'>You are now a step closer to embracing Good Health as your Annual Health Check Up is scheduled for-</td></tr>
	<tr>
	<td>
	<table cellspacing='0' cellpadding='0' border='0' width='550' align='center' style='background-color:#f2f2f2'>
	
	</table>
	</td>
	</tr>
	
	<tr>
	<td align='center'>
	<table cellspacing='0' cellpadding='0' border='0' width='550' align='center'>
	<tr>
	<td valign='top' width='150' style='padding:10px 10px 10px 10px; font-family:Calibri; font-size:14px; color:#000;text-align:center;'>You can reach the location as per your convenience</td>
	<td valign='top' style='padding:10px 10px 10px 10px; font-family:Calibri; font-size:14px; color:#000;text-align:center;'>A CallHealth officer will be available at the lab to facilitate your sample collection</td>
	<td valign='top' style='padding:10px 10px 10px 10px; font-family:Calibri; font-size:14px; color:#000;text-align:center;'>Your test reports will be duly collected and delivered to you at your workplace.</td>
	</tr>
	</table>
	</td>
	</tr>

	<tr>
	<td>
	<table cellspacing='0' cellpadding='0' border='0' width='550' align='center' style='background-color:#f2f2f2'>
	<tr>
	<td style='padding:15px 20px 15px 20px; font-family:Calibri; font-size:14px;font-weight:bold;color:#000;text-align:center;'>Please note, you are required to fast for 10-12 hours prior to the sample collection.<br/>You can only drink water during this period.</td>
	</tr>
	</table>
	</td>
	</tr>

	<tr><td style='padding:15px 50px 15px 50px; font-family:Calibri; font-size:14px; color:#000;'>Healthy living begins with the right commitment to yourself. Thank you for making the right choice.</td></tr>
	<tr><td style='padding:5px 50px 5px 50px; font-family:Calibri; font-size:14px;font-weight:bold; color:#000;'><i>Stay Healthy, Stay Happy</i></td></tr>
	<tr><td style='padding:15px 50px 10px 50px; font-family:Calibri; font-size:20px;font-weight:bold; color:#75ab3b;text-align:center;'><img src='http://wellness.callhealth.com/form/confirmation/images/shape2.png' border='0'/> <a href='tel:9133557799' style='color:#75ab3b;text-decoration:none;'>91 33 55 77 99</a>&nbsp;&nbsp;&nbsp;<img src='http://wellness.callhealth.com/form/confirmation/images/wicon.png' border='0'/> <a href='https://www.callhealth.com/' target='_blank' style='color:#75ab3b;text-decoration:none;'>callhealth.com</a></td> </tr>
	<tr><td style='padding:15px 50px 10px 50px; font-family:Calibri; font-size:20px;font-weight:bold; color:#75ab3b;text-align:center;'><img src='http://wellness.callhealth.com/form/confirmation/images/1487161933831.png' border='0'/>&nbsp;&nbsp;&nbsp;<img src='http://wellness.callhealth.com/form/confirmation/images/1487161933831-1.png' border='0'/>&nbsp;&nbsp;&nbsp;<img src='http://wellness.callhealth.com/form/confirmation/images/chqr.png' border='0'/></td> </tr>

	<tr>
	<td>
	<table cellspacing='0' cellpadding='0' border='0' width='350' align='center'>
	<tr>
	<td style='padding:15px 20px 15px 20px; font-family:Calibri; font-size:16px;color:#000;text-align:center;border:1px solid #ccc;border-radius:20px;'>For all Healthcare Services at your doorstep</td>
	</tr>
	</table>
	</td>
	</tr>
	<tr><td style='padding:25px 50px 25px 50px; font-family:Calibri; font-size:14px; font-weight:bold; color:#000;background-color:#f2f2f2;'>Doctor Consultation | Diagnostics & imaging | Medicines | Nursing | Physiotherapy | Wellness | Medical Equipment Rentals | Health Insurance | Medical Tourism</td></tr>
	</table>
	</div>
	</body>
	</html>";



	$to = $relmails;
	$cc = $empemail;	
	//$from_mail="mahesh.kumar@callhealth.com";
	$from_mail="corporate@callhealth.com";
	$subject = "CallHealth - Diagnostic centre appointment confirmation";
	$header = "From: ".$from_mail." \r\n";
	$header .= "Cc: ".$cc."\r\n";
	$header .= "MIME-Version: 1.0\r\n";
	$header .= "Content-type: text/html\r\n";

	//	$sent = mail($to,$subject,$message1,$header); 

	$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
	try {
		//Server settings
		$mail->SMTPDebug = 2;                                 // Enable verbose debug output
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'corporate@callhealth.com';                 // SMTP username
		$mail->Password = 'Hindol@123';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to

		//Recipients
		$mail->setFrom('corporate@callhealth.com', 'CallHealth');
		$mail->addAddress($to);     // Add a recipient
		$mail->addReplyTo('corporate@callhealth.com', 'CallHealth');
		$mail->addCC($cc);
	 //   $mail->addBCC('bcc@example.com');

		//Content
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = $subject;
		$mail->Body    = $message1;
		//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		$mail->send();
		echo 'Message has been sent';
		$sent = 1;
	} catch (Exception $e) {
		echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
	}
	 
	if($sent) { ?>
	<script>
	   //   window.location = "thankyou.html";
	</script>
	<?php
		//header('location:thankyou.html');
	}else{
		echo 'mail not sent successfully';
	}

}
//echo $ccmail;
//exit;
// 

//$email = $_POST['email'];



 $message = "<html> <body style='margin:0'>";
$message .= "<table cellspacing='0' cellpadding='0' border='0' width='600' align='center' style='border:1px solid #ccc;'>
<tr>
<td><img src='http://wellness.callhealth.com/form/confirmation/images/banner.jpg' border='0'/></td>
</tr>
<tr><td style='padding:30px 50px 10px 50px; font-family:Calibri; font-size:14px; color:#000;'>Hi $empfname </td> </tr>
<tr><td style='padding:10px 50px 10px 50px; font-family:Calibri; font-size:14px; color:#000;'>Thank you for successfully booking your slot.</td></tr>
<tr><td style='padding:10px 50px 20px 50px; font-family:Calibri; font-size:14px; color:#000;'>You are now a step closer to embracing Good Health as your Annual Health Check Up is scheduled for-</td></tr>
<tr>
<td>
<table cellspacing='0' cellpadding='0' border='0' width='550' align='center' style='background-color:#f2f2f2'>
<tr>
<td width='150' style='padding:10px 10px 10px 10px; font-family:Calibri; font-size:14px; color:#000;'><img src='http://wellness.callhealth.com/form/confirmation/images/calendar.png' border='0'/>&nbsp;&nbsp; $slotDate </td>
<td style='padding:10px 10px 10px 10px; font-family:Calibri; font-size:14px; color:#000;'><img src='http://wellness.callhealth.com/form/confirmation/images/maps-and-flags.png' border='0'/>&nbsp;&nbsp; ". $centerName. ' ,'.$centerAdd. "</td>
</tr>
</table>
</td>
</tr>
<tr>
<td align='center'style='padding:30px 10px 10px 10px;'><img src='http://wellness.callhealth.com/form/confirmation/images/group5.png' border='0'/></td>
</tr>

<tr>
<td align='center'>
<table cellspacing='0' cellpadding='0' border='0' width='550' align='center'>
<tr>
<td valign='top' width='150' style='padding:10px 10px 10px 10px; font-family:Calibri; font-size:14px; color:#000;text-align:center;'>You can reach the location as per your convenience</td>
<td valign='top' style='padding:10px 10px 10px 10px; font-family:Calibri; font-size:14px; color:#000;text-align:center;'>A CallHealth officer will be available at the lab to facilitate your sample collection</td>
<td valign='top' style='padding:10px 10px 10px 10px; font-family:Calibri; font-size:14px; color:#000;text-align:center;'>Your test reports will be duly collected and delivered to you at your workplace.</td>
</tr>
</table>
</td>
</tr>

<tr>
<td>
<table cellspacing='0' cellpadding='0' border='0' width='550' align='center' style='background-color:#f2f2f2'>
<tr>
<td style='padding:15px 20px 15px 20px; font-family:Calibri; font-size:14px;font-weight:bold;color:#000;text-align:center;'>Please note, you are required to fast for 10-12 hours prior to the sample collection.<br/>You can only drink water during this period.</td>
</tr>
</table>
</td>
</tr>

<tr><td style='padding:15px 50px 15px 50px; font-family:Calibri; font-size:14px; color:#000;'>Healthy living begins with the right commitment to yourself. Thank you for making the right choice.</td></tr>
<tr><td style='padding:5px 50px 5px 50px; font-family:Calibri; font-size:14px;font-weight:bold; color:#000;'><i>Stay Healthy, Stay Happy</i></td></tr>
<tr><td style='padding:15px 50px 10px 50px; font-family:Calibri; font-size:20px;font-weight:bold; color:#75ab3b;text-align:center;'><img src='http://wellness.callhealth.com/form/confirmation/images/shape2.png' border='0'/> <a href='tel:9133557799' style='color:#75ab3b;text-decoration:none;'>91 33 55 77 99</a>&nbsp;&nbsp;&nbsp;<img src='http://wellness.callhealth.com/form/confirmation/images/wicon.png' border='0'/> <a href='https://www.callhealth.com/' target='_blank' style='color:#75ab3b;text-decoration:none;'>callhealth.com</a></td> </tr>
<tr><td style='padding:15px 50px 10px 50px; font-family:Calibri; font-size:20px;font-weight:bold; color:#75ab3b;text-align:center;'><img src='http://wellness.callhealth.com/form/confirmation/images/1487161933831.png' border='0'/>&nbsp;&nbsp;&nbsp;<img src='http://wellness.callhealth.com/form/confirmation/images/1487161933831-1.png' border='0'/>&nbsp;&nbsp;&nbsp;<img src='http://wellness.callhealth.com/form/confirmation/images/chqr.png' border='0'/></td> </tr>

<tr>
<td>
<table cellspacing='0' cellpadding='0' border='0' width='350' align='center'>
<tr>
<td style='padding:15px 20px 15px 20px; font-family:Calibri; font-size:16px;color:#000;text-align:center;border:1px solid #ccc;border-radius:20px;'>For all Healthcare Services at your doorstep</td>
</tr>
</table>
</td>
</tr>
<tr><td style='padding:25px 50px 25px 50px; font-family:Calibri; font-size:14px; font-weight:bold; color:#000;background-color:#f2f2f2;'>Doctor Consultation | Diagnostics & imaging | Medicines | Nursing | Physiotherapy | Wellness | Medical Equipment Rentals | Health Insurance | Medical Tourism</td></tr>
</table>
</div>
</body>
</html>";
//echo $message;

$to = $empemail;
$from_mail="corporate@callhealth.com";
$subject = "CallHealth - Diagnostic centre appointment confirmation";
$header = "From: ".$from_mail." \r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/html\r\n";

//$sent = mail($to,$subject,$message,$header); 
$mail1 = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail1->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail1->isSMTP();                                      // Set mailer to use SMTP
    $mail1->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail1->SMTPAuth = true;                               // Enable SMTP authentication
    $mail1->Username = 'corporate@callhealth.com';                 // SMTP username
    $mail1->Password = 'Hindol@123';                           // SMTP password
    $mail1->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail1->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail1->setFrom('corporate@callhealth.com', 'CallHealth');
    $mail1->addAddress($to);     // Add a recipient
    $mail1->addReplyTo('corporate@callhealth.com', 'CallHealth');
   // $mail1->addCC($cc);
 //   $mail->addBCC('bcc@example.com');

    //Content
    $mail1->isHTML(true);                                  // Set email format to HTML
    $mail1->Subject = $subject;
    $mail1->Body    = $message;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail1->send();
    echo 'Message has been sent';
	$sent = 1;
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail1->ErrorInfo;
}


 
if($sent) { ?>
<script>
      window.location = "thankyou.html";
</script>
<?php // echo 'text';
	header('location:thankyou.html');
}else{
	//echo 'mail not sent successfully';
	header('location:thankyou.html');
}
 

?>
