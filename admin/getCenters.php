<?php

require_once('config.php');
 
  //$_POST['branch'];
if(!empty($_POST["branch"])){
    //Fetch all state data
    $sql = "SELECT * FROM branch_centers WHERE idBranch = ".$_POST['branch']." AND status = 1 ORDER BY centerName ASC";
     $branches_res = mysqli_query($conn,$sql);
	 $branches_cnt = mysqli_num_rows($branches_res);
    //Count total number of rows
   // $rowCount = $query->num_rows;
    
    //State option list
    if($branches_cnt > 0){
        echo '<option value="0">Select center</option>';
        while($row = mysqli_fetch_assoc($branches_res)){ 
            echo '<option value="'.$row['id'].'">'.$row['centerName'].'</option>';
        }
    }else{
        echo '<option value="0">Centers not available</option>';
    }
}else{
  echo '<option value="0">please select branch first</option>';
}
?>