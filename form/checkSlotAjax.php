<?php 
session_start();

require_once('config.php');
//print_r($_POST);
if(isset($_POST['empid'])){
if(empty($_POST['empid'])){
   $data = array('status' => 0, 'message' => "Please enter unique id");
    echo json_encode($data);  
}else{
    if(isset($_POST['branch']) || isset($_POST['center']) || isset($_POST['date1']) || isset($_POST['maxCount']) ){
        $quant = $_POST['quant'];
        $date = $_POST['date1'];   
        $datenew = date("Y-m-d", strtotime($date));
        //check emp id already registered

        $sql3 = "SELECT empid FROM registerdata where empid ='".$_POST['empid']."'";  
        $result3 = mysqli_query($conn,$sql3);
        $regResultCnt  = mysqli_num_rows($result3); 

        //$resultData = mysqli_fetch_object($result);
        if($regResultCnt <= 0){

        $sql1 = "SELECT * FROM slots where idBranch ='".$_POST['branch']."' and idCenter ='".$_POST['center']."' and slotDate ='".$datenew."' ";  
        $result = mysqli_query($conn,$sql1);
        $resultCnt  = mysqli_num_rows($result); 
        $resultData = mysqli_fetch_object($result);
       // print_r($resultData);
       if($resultCnt > 0){
        $maxCount = $resultData->maxCount;
        $currentCount = $resultData->currentCount;
        $total = $currentCount + $quant;

            if ($total > $maxCount )  {
            
                 $data = array('status' => 0, 'message' => "No slots available on '" .$date ."'" , 'maxCnt' => $maxCount, 'currentCount'=>$currentCount);
                 echo json_encode($data);
            }else{
                $data = array('status' => 1, 'message' => "Slots available");
                 echo json_encode($data);
            }
        }else{

            $data = array('status' => 0, 'message' => "No slots availables on '" .$date ."'");
            echo json_encode($data);   
        }

      }else{

            $data = array('status' => 0, 'message' => "This employee with unique id is already registered");
            echo json_encode($data);   
        }

    }else{

    	$data = array('status' => 0, 'message' => "Please check branch name, center name and selected date.");
        echo json_encode($data);
                  	
    }
}
}else{

  $data = array('status' => 0, 'message' => "Please enter unique id");
    echo json_encode($data);  
}


?>