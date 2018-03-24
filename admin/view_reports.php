<?php
session_start();
require_once('config.php');
 if(!isset($_SESSION['email']) && $_SESSION['email'] == '') { 
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CallHealth</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" >
        <link rel="stylesheet" href="assets/css/style.css" >
        <!-- Optional theme -->
        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css" >
        <script src="assets/js/jquery.min.js"></script>
        <style type="text/css">
        table {
		    width: 100%;
		}

		th {
		    height: 50px;
		}

		</style>
        
      
    </head>
    <body >
        <div class="container">
			<div class="row" id="topc">
			  <div class="col-xs-6">
			  <a class="navbar-brand pull-left" ><img src="assets/images/logo.png" class="img-responsive"/></a>
			  </div>
			  
			  <div class="col-xs-6">
			 
			  </div>
			  </div>
            <div class="row">
                <div class="col-xs-12">
                 <div class="col-md-3">
                    <?php include_once('left_manu.php');?>
                 </div>

                <div class="col-xs-9">
					<div class="downb"><a href="download-reports.php">Download Reports</a></div>
                    <?php 
                    //echo 'here...';
                    	$sql1 = "SELECT r.*,b.branchName from registerdata as r JOIN branches as b ON b.id = r.branchId ";  
					     $result = mysqli_query($conn,$sql1);
					  	 $resultCnt  = mysqli_num_rows($result); 
					     if ($resultCnt > 0 ) {
					    ?>
                    <table class="table-striped reportstab">
                    	<tr ><th style="margin-top: 25px"> First Name</th><th> Last Name </th><th> Mobile No</th><th> Email</th> <th> Employee Id</th> <th> Age</th> <th> Gender</th> <th> Address</th><th> Pincode</th> <th> Program</th> <th>RegisterOn</th> <th>Branch Name</th> <th>empRel</th> <th>relation</th> <th> Relation Id </th> <th> Id </th> </tr>
                    	<?php while($row = mysqli_fetch_assoc($result)){
                    	?> 
                    	<tr><td style="margin-top: 25px"> <?php echo $row['fname']; ?></td><td> <?php echo $row['lname']; ?></td><td> <?php echo $row['mobileNo']; ?></td><td> <?php echo $row['emailid']; ?></td> <td> <?php echo $row['empid']; ?></td> <td> <?php echo $row['age']; ?></td>  <td> <?php echo $row['gender']; ?></td><td> <?php echo $row['address']; ?></td><td> <?php echo $row['pincode']; ?></td> <td> <?php echo $row['program']; ?></td>  <td> <?php echo $row['registerOn']; ?></td> <td> <?php echo $row['branchName']; ?></td>  <td> <?php echo $row['empRel']; ?></td><td> <?php echo $row['relation']; ?></td>	 <td> <?php echo $row['registerId'] ?> </td> <td> <?php echo $row['id'] ?> </td> </tr>
                    	<?php }
                    	}else{

                    		echo "Not available slot data";
                    	}
                    	 ?>
                    		
                    </table>
                    
                    
                </div>
            </div>
             
      
            </div>
        </div>
    </body>
</html>