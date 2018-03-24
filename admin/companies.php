<?php
session_start();
//print_r($_SESSION);exit;
 if(!isset($_SESSION['email']) && $_SESSION['email'] == '') { 
    header("Location: login.php");
}
require_once('config.php');


if(isset($_POST['addBranch'])){
    // check bran exitence
     $sql1 = "SELECT * FROM branches where branchName ='".$_POST['branchname']."'";  
    $result = mysqli_query($conn,$sql1);
    $resultCnt  = mysqli_num_rows($result); 
        if ($resultCnt > 0 )  {
            $addingErr = "'".$_POST['branchname']."' name is already exiting, Please try with other name.";
        }else{
            $sql = "INSERT INTO `branches` (`branchName`) VALUES ('".$_POST['branchname']."')";
            $result = mysqli_query($conn,$sql);
            if($result){
                header('Location: '.$_SERVER['PHP_SELF']);
                die;
            }else{
                $addingErr ="Not added successfully, Please check data";

            }
        }
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
      
<script type='text/javascript'>
function confirmDelete()
{
   return confirm("Are you sure you want to delete this?");
}
</script>
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
               <div class="col-md-3">
                  <h2>Companies</h2> 
              </div>
                <div class="col-md-6">
                  
                    <p> Add Company  </p>
                    <form role="form" method="post" id="branchFrm">
                         <label for="name"> Name:</label>
                        <div class="row">
                            <div class="col-md-12 ">
  

                                    <div class="col-sm-8 form-group">
                                        
                                        <input type="text" class="form-control" id="branchname" name="branchname" maxlength="100" required >
                                    </div>
                                    
                                     <div class="col-sm-4 form-group">
                                        <button type="submit" name="addBranch" class="btn btn-sm btn-success btn-block" id="btnContactUs">Add </button>
                                    </div>
                              </div>      

                        </div>
                        
                       
                    </form>
                    <div id="success_message" style="width:100%; height:100%; display:none; "> <h3>Added successfully!</h3> </div>
                     <div id="error_message" style="width:100%; height:100%; "> 
                        <?php if(isset($addingErr)){
                            echo $addingErr;

                        }?>
                    </div>
                </div>
            </div>
            <div class="row">
                 <div class="col-md-12 ">
  
                 <div class="col-md-3">
                    <?php include_once('left_manu.php');?>
                 </div>
                <div class="col-md-9">
                    <h3> Companies List </h3>
                   <table id="branch-table">
                        <?php $sql = "SELECT * FROM branches";
                    
                            $branches_res = mysqli_query($conn,$sql);
                             $branches_cnt = mysqli_num_rows($branches_res); ?>

                              <tr><td style="padding-right: 10px;"> branchName </td> <td style="padding-right: 10px;">  Status  </td> <td style="padding-right: 10px;" colspan="2">  Actions  </td>

                                            </tr> 
                           <?php if( $branches_cnt > 0){
                                        
                                  
                                       while ($row = mysqli_fetch_assoc($branches_res))
                                         {                                             //  print_r($row);
                                           ?>
                                            <tr>
                                            <td style="padding-right: 10px;"> <?php echo $row['branchName']; //echo $row['id']; ?> </td>
                                            <td style="padding-right: 10px;">
                                             <?php echo $status = $row['status'] == 1 ? 'Activated':'De-Activated'; ?>
                                            

                                                 </td>
                                          
                                            <td class="dlbtn">
                                               <!--  <form action='delete.php' method="post">
                                                    <input type="hidden" name="branchid" value="<?php echo $row['id']; ?>">
                                                    <input type="submit" name="submit" value="Delete" onclick='return confirmDelete(<?php echo $row['id']; ?>)'>
                                                </form> -->
                                                <?php if ($row['status'] == 1) { ?>
                                               <a name="delete" style="color:red;"  onclick="return confirm('Are you sure, want to de-activate?')"  value="Delete" href="delete.php?status=<?php echo $row['status'];?>&id=<?php echo $row['id']; ?>" > De-Activate </a>
                                               <?php } else{ ?>
                                                <a name="delete"  value="Delete"  onclick="return confirm('Are you sure, want to activate?')"  href="delete.php?status=<?php echo $row['status'];?>&id=<?php echo $row['id']; ?>" > Activate </a>
                                                <?php } ?>
                                            </td></tr>
                               
                                     <?php } // end while
                            }else {?>

                             <tr><td> Not available data </td></tr>

                            <?php 
                            } // end if ?>

                    </table>
                </div>
            </div>
            </div>
        </div>
    </body>
</html>