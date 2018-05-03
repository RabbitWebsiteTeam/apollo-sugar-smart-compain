<?php
set_include_path('/var/www/html/PHPExcel/Classes/');
date_default_timezone_set("Asia/Kolkata");
$today=date("Y-m-d",strtotime("-1 days"));

require 'PHPExcel.php';
set_include_path('/var/www/html/PHPMailer/');
require 'class.phpmailer.php';

include '/var/www/html/Bin/PortalCSS.php'; 
include '/var/www/html/Bin/PortalJS.php'; 
include '/var/www/html/asclqol/Config/Connection.php'; 

// Create your database query
$query = "SELECT * FROM asclcampaign.memberdata WHERE updateddate='$today'";  
echo 'query'.$query;
// Execute the database query
$result = mysql_query($query); 
$count=mysql_num_rows($result);

// Instantiate a new PHPExcel object
$objPHPExcel = new PHPExcel(); 
// Set the active Excel worksheet to sheet 0
$objPHPExcel->setActiveSheetIndex(0); 
// Initialise the Excel row number
$rowCount = 2;
$alreadyDiabetic= 0; 
$diabeticCount = 0; 
$BPCount = 0; 
$potentialDiabetic=0;
// Iterate through each result from the SQL query in turn
// We fetch each database result row into $row in turn

echo "Before Creating Excel";
	$sheet = $objPHPExcel->getActiveSheet();

	$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Member ID'); 
   	$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Member Name');
	$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Gender'); 
	$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Age'); 	
	$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Mobile'); 	
	$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Height'); 
	$objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Weight');	
	$objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Diabetic');
	$objPHPExcel->getActiveSheet()->SetCellValue('I1', 'RBG');
	$objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Family History');
	$objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Interested In'); 		
	$objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Executive Name'); 
	$objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Location'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('N1', 'Clinic');       
        $objPHPExcel->getActiveSheet()->SetCellValue('O1', 'City'); 	
        $objPHPExcel->getActiveSheet()->SetCellValue('P1', 'Campiagn Date');
	$objPHPExcel->getActiveSheet()->SetCellValue('Q1', 'Date'); 
	$objPHPExcel->getActiveSheet()->SetCellValue('R1', 'Time'); 


while($row = mysql_fetch_array($result)){ 
    
	$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $row['memberid']); 
        $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, strtoupper($row['fullname']));
	$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $row['gender']); 
	$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $row['age']); 	 
	$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $row['mobile']); 
	$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $row['height']); 
	$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $row['weight']); 	
	$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $row['diabetic']);
	$objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $row['sugar']);
	$objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $row['familyhistory']);
	$objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, $row['interestedin']);
	$objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, $row['exename']); 
	$objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, $row['location']); 
	$objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, $row['clinic']); 
	$objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, $row['city']); 
	$objPHPExcel->getActiveSheet()->SetCellValue('P'.$rowCount, $row['logindate']); 
	$objPHPExcel->getActiveSheet()->SetCellValue('Q'.$rowCount, $row['updateddate']); 
	$objPHPExcel->getActiveSheet()->SetCellValue('R'.$rowCount, $row['updatedtime']); 
	
		

	if($row['sugar']>120 || $row['sugar']<80){
		$diabeticCount++;
        }
	
	        if($row['diabetic']=="Yes" && $row['sugar']<=140){

		cellColor('A'.$rowCount.':Q'.$rowCount, 'FFEB84');
		} 

	      
              if($row['sugar']>140){
		cellColor('A'.$rowCount.':Q'.$rowCount, 'F54E53');
	       }

	
	
	 
	
    $rowCount++; 
} 

function cellColor($cells,$color){
    global $objPHPExcel;

    $objPHPExcel->getActiveSheet()->getStyle($cells)->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => $color
        )
    ));
}

cellColor('A1:Q1', 'FFCE9A');

/** Borders for all data */
 $styleArray = array(
      'borders' => array(
          'allborders' => array(
              'style' => PHPExcel_Style_Border::BORDER_THIN
          )
      )
  );
$objPHPExcel->getDefaultStyle()->applyFromArray($styleArray);

// Auto-Size all columns

   $cellIterator = $sheet->getRowIterator()->current()->getCellIterator();
    $cellIterator->setIterateOnlyExistingCells(true);
    /** @var PHPExcel_Cell $cell */
    foreach ($cellIterator as $cell) {
        $sheet->getColumnDimension($cell->getColumn())->setAutoSize(true);
    }

// Instantiate a Writer to create an OfficeOpenXML Excel .xlsx file
$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
// Write the Excel file to filename some_excel_file.xlsx in the current directory
$filename="CampaignReport1".$today."_".time().".xlsx";
$objWriter->save("/home/smartcliniq/public_html/ReportFiles/".$filename);


// Sending Email
$email = new PHPMailer();
$email->From      = 'dinesh.godavarthi@smartcliniq.com';
$email->FromName  = 'Smart Campaign Management Team';
$email->Subject   = 'Apollo Sugars Campaign '.$today;
$email->IsHTML(true); 
$email->Body      = '<html><body>Hello Apollo Sugar,<br><br> Please find the attached excel for Campaign Data on '.$today.'.<br><br>Quick Analysis: <br><table ><tr border="0"><td>Total People Screened: </td><td>'.$count.
			'</td></tr><tr border="0"><td>Potential Bearers: </td><td>'.$diabeticCount.'</td></tr></table><br><br>Regards,<br>Smart Team';


$file_to_attach = getcwd();
echo $filename;
$email->AddAttachment("/home/smartcliniq/public_html/ReportFiles/".$filename);
$email->AddAddress( 'smartcliniq@gmail.com' );
$email->AddAddress( 'vikranth.s@apollosugar.com' );
$email->AddAddress( 'sailendra.v@apollosugar.com' );

//$email->AddAddress( 'satish.kumar@apollosugar.com' );
//$email->AddAddress( 'gagan.bhalla@apollosugar.com' );
//$email->AddAddress( 'Bijo.joseph@apollosugar.com' );
//$email->AddAddress( 'sharath.chandran@apollosugar.com' );
//$email->AddAddress( 'Drvamsi.kolukula@apollosugar.com' );
//$email->AddAddress( 'keerthi.b@apollosugar.com' );
//$email->AddAddress( 'sharath.chandran@apollosugar.com' );
//$email->AddAddress( 'fasiyoddin.md@apollosugar.com' );
//$email->AddAddress( 'lalit.pandey@apollosugar.com' );
//$email->AddAddress( 'madhu.kiran@apollosugar.com' );
//$email->AddAddress( 'mrudula.ks@apollosugar.com' );
//$email->AddAddress( 'Satish.kokkula@apollosugar.com' );
//$email->AddAddress( 'shashi.kumar@apollosugar.com' );


if(!$email->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $email->ErrorInfo;
   exit;
}

echo "Message has been sent";
echo "end";

?>