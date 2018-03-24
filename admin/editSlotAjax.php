<?php 
session_start();
//print_r($_SESSION);exit;
 if(!isset($_SESSION['email']) && $_SESSION['email'] == '') { 
    header("Location: login.php");
}
require_once('config.php');
//print_r($_POST);
if(isset($_POST['slotId']) || isset($_POST['maxCount'])){
  
   
        //$sql = "INSERT INTO `slots` ( `idBranch`, `idCenter`, `slotDate`, `maxCount`) VALUES ('".$_POST['branch']."', '".$_POST['center']."', '".$datenew."', '".$_POST['maxCount']."')";
        $sql = "UPDATE slots SET maxCount = '".$_POST['maxCount']."' WHERE slots.id = ".$_POST['slotId'];
        $result = mysqli_query($conn,$sql);
        if($result){
           
           $data = array('status' => 1, 'message' => "Update successfully.");
          echo json_encode($data);
          
        }else{
          
             $data = array('status' => 0, 'message' => "Not added successfully, Please check data.");
        	 echo json_encode($data);
          

        }
    
}else{

	$data = array('status' => 0, 'message' => "Whoops! This didn\'t work. Please contact admin.");
    echo json_encode($data);
              	
}


?>