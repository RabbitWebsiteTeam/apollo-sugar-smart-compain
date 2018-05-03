<?php
echo 'test';
include '../Config/Connection.php'; 
$result = mysql_query("SELECT * FROM login");

//print_r($result);
	
	if (!empty($result)) {
		
		
		//$rows = [];
		
		while ($row = mysql_fetch_assoc($result))
		 {
			 //$rows[] = $row;
			//  $row['Id'].' - '.$row['Name'];
			// echo '<br>';
			 
			 ///
			 
			 $result1 = mysql_query("SELECT * FROM memberdata order by memberid DESC limit 0 ,1000");

				
				if (!empty($result1)) {
					
					
					
					 while ($row1 = mysql_fetch_assoc($result1))
					 {
						 echo $row1['exename'];  echo '--';  $row['Name'];  echo '--';   echo $row['Id'];  echo '--';  echo $row1['memberid'];
						 echo '<br>';
					 }
				}
			 
			 
			 ///
		}
	}
?>