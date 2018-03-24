<?php
session_start();
//print_r($_SESSION);exit;
 if(!isset($_SESSION['email']) && $_SESSION['email'] == '') { 
    header("Location: login.php");
}
require_once('config.php');

 $slotId = $_REQUEST['id'];

if(!isset($slotId) && empty($slotId)) { 
    header("Location: view_slot.php");
}  
    //print_r($row) ;    
    
/*if(isset($_POST['addCenter'])){
    // check bran exitence
    $sql1 = "SELECT * FROM branch_centers where centerName ='".$_POST['centername']."' and idBranch ='".$branchId."'";  
    $result = mysqli_query($conn,$sql1);
    $resultCnt  = mysqli_num_rows($result); 
        if ($resultCnt > 0 )  {
            $addingErr = "'".$_POST['centername']."' name is already exiting with this branch, Please try with other name.";
        }else{
            $sql = "INSERT INTO `branch_centers` (`centerName`,idBranch) VALUES ('".$_POST['centername']."','".$branchId."')";
            $result = mysqli_query($conn,$sql);
            if($result){
                header('Location: centers.php?id='.$branchId);
                die;
            }else{
                $addingErr ="Not added successfully, Please check data";

            }
        }
}*/
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
        <!-- Optional theme -->
        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css" >
        <script src="assets/js/jquery.min.js"></script>
      

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
                <div class="col-md-6 col-md-offset-3">
                    <h2> Edit Slot</h2> 
                	<?php 
                	$sql1 = "SELECT * FROM slots where id ='".$slotId."'";  
					$result = mysqli_query($conn,$sql1);
					$resultCnt  = mysqli_num_rows($result); 
					$dataRes = mysqli_fetch_object($result); 
					 $maxCount = $dataRes->maxCount;
					 $idBranch = $dataRes->idBranch;

					 $idCenter = $dataRes->idCenter;
					
					 $slotDate = $dataRes->slotDate;
					 $currentCount = $dataRes->currentCount;

					
					// $date = $_POST['date1'];   
    				 $datenew = date("Y-m-d", strtotime($slotDate));
					
					?>
                    <form role="form" method="post" id="createSlotFrm">
                     
                        <div class="row">
                                                   
                          
                             <div class="col-sm-6 form-group">
                                 <label for="name"> Max Count:</label>
                              <input type="text" name="maxCount"  id="maxCount" class="form-control" value="<?php echo $dataRes->maxCount; ?>">
                            </div>
                       
                                
                         	 <div class="col-sm-6 form-group">
                                 <label for="name"> Current Count:</label>
                              <input type="text" name="currentCount"  id="currentCount" class="form-control" value="<?php echo $currentCount; ?>" disabled>
                            </div>
                              <div class="col-sm-6 form-group">
                               
                                 <div class="col-sm-6 form-group">
                                    <button type="submit" name="saveSlot" class="btn btn-sm btn-success btn-block" id="saveSlot">Edit </button>
                                </div>
                            </div>
                        </div>
                        
                       
                    </form>
                    <div id="success_message" style="width:100%; height:100%; color:green;">  </div>
                     <div id="error_message" style="width:100%; height:100%;color:red; "> 
                        
                    </div>
                </div>
            </div>
            <div class="row">
                 <div class="col-md-6 col-md-offset-3">
                    <?php include_once('left_manu.php');?>
                 </div>
      
            </div>
        </div>
        <script src="assets/js/jquery.validate.min.js"></script>

    <script>
                $( document ).ready(function() {
                    //alert();
                 $.validator.addMethod("valueNotEquals", function(value, element, arg){
                      return arg !== value;
                     });

                 $("#createSlotFrm").validate({
                    rules: {                          
                                                   
                        maxCount: { required : true,
                                    number : true, },            
                     },
                    messages: {

                                                    
                        maxCount : { required :"Please enter max count",
                                     number : "Please enter number only",
                                 },
                     
                    },

              /*  submitHandler: function(form) {
                    form.submit();
                }*/
                 submitHandler: function(form) {      
                        
                        var slotId = '<?php echo $slotId; ?>'
                         
                        var maxCount = $('#maxCount').val();
                       // alert(branch + ','+ center +','+date1 +','+maxCount);
                        $.ajax({  
                              type: 'POST',
                              url: 'editSlotAjax.php',
                              data: { slotId : slotId,maxCount : maxCount, },
                              success : (function(data) {
                                    var b=JSON.parse(data);
                                    var status = b.status;
                                    if(status == 1){
                                        $("#success_message").fadeIn(); 
                                         $('#success_message').html(b.message);  
                                          $("#success_message").fadeOut(5000);                                    
                                        $("#createSlotFrm")[0].reset();
                                        location.reload();
                                    }else{
                                          $("#error_message").fadeIn(); 
                                         $('#error_message').html(b.message);
                                         $("#error_message").fadeOut(5000);                                     
                                        //$("#createSlotFrm")[0].reset();
                                    }
                              }),
                              error : (function(){
                                alert('Whoops! This didn\'t work. Please contact us.')
                              }),
                        });
                     }// end submit handler
         
                         
            });
                });
            </script>

            
            
            <script type="text/javascript">
                $('#branch').change(function(){
                var branch = $(this).val();
               // alert(branch);    
                if(branch){
                    $.ajax({
                            type: "POST",
                            url: "getCenters.php",
                            data: { branch : branch},
                            success: function(html) {

                                  // console.log(msg);
                                  $('#center').html(html);
                                 
                                 },
                            error: function() {
                            alert('Try Again.');
                            //$(".loader").fadeOut("slow");
                            }
                            });
                          

                           

                }else{
                    $('#center').html('<option value="">Select branch first</option>'); 
                   // $("#branch").empty();
                   // $("#center").empty();
                }  

               });
                
            </script>
    </body>

</html>