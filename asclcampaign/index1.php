
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<?php 
include './Bin/PortalCSS.php'; 
include './Bin/PortalJS.php'; 

?>

<?php 
session_start();
if(!empty($_SESSION['SESS_LOGIN']) && $_SESSION['SESS_LOGIN']=='false'){
	$_SESSION['SESS_LOGIN']='';
	echo '<script type="text/javascript">';
	echo 'alert("Login Failed, Please try again !!")';
	echo '</script>';		
}
session_write_close();
?>



      <link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
      <!-- <script src="http://code.jquery.com/jquery-1.10.2.js"></script> -->
      <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

      <!-- Javascript -->
      <script>
         $(function() {
            $( "#logindate" ).datepicker({  dateFormat:"yy-mm-dd", });
         });
      </script>


</head>
<body ng-app="inputExample" class="mobile-text" style="background-color:0081A0;">

  <script>
   angular.module('inputExample', [])
     .controller('ExampleController', ['$scope', function($scope) {
       //$scope.user = {name: 'guest', last: 'visitor'};
     }]);
</script>

 <script>
	  $(document).ready(function(){

	$("#loginnovalidationdiv").hide();
	$("#loginvalidationdiv").show();
	$("#loginuserid").val('');
	$("#loginpassword").val('');
        $("#logindate" ).datepicker();

        $("#loginuserid").focusout(function(){
            if($(this).val().toUpperCase()=='ADMIN'){
				$("#loginvenue").val("Jubliee Hills");
				$("#loginvenuediv").hide();		
				$("#loginvalidationdiv").hide();	
				$("#loginnovalidationdiv").show();				
			}
			else{
				$("#loginvenue").val("");
				$("#loginvenuediv").show();	
				$("#loginvalidationdiv").show();	
				$("#loginnovalidationdiv").hide();								
			}
        });
    })
</script>




<div id="page-wrapper" style="background-color:0081A0;">

	
	
<div ng-controller="ExampleController">
<form name="myForm" novalidate ng-submit="myForm.$valid && login.submit()" id="memberrecord" action="SignIn.php" method="POST">		
	<div class="loginpage">
	<div style="padding-left:10px;padding-right:10px;border:3px solid #CCD1D9;background-color:FFFFFF;">	
	<div class="row">
	<div class="col-sm-2 text-center">
	
	<span class="input-group-addon" style="border:0px;background-color:#ffffff;"><img src="./Images/sugarlogo2.jpg" class="" width="100" height="40" alt="Apollo Sugars"></span>   
	<div class="row">
	<div class="col-sm-2 text-center">
	<l3 style="font-size:24px;color:0081A0;"><bold>ASCL Campaign</bold></l3>
	</div>
	</div>
	</div>
	</div>
	</br>  <strong>
	<div class="row">
	<div class="col-sm-2"> 
	<div class="form-group">	
			<span class="error" ng-show="myForm.loginuserid.$error.required">*</span>
			<label for="loginuserid">User ID</label>			 
			<label class="error" ng-show="myForm.loginuserid.$error.minlength">Too short!</label>	
				<div class="input-group">  			
				<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>   
				<input type="text" class="form-control input-sm" id="loginuserid" name="loginuserid" placeholder="User Id" ng-model="loginuserid" ng-minlength="3" required></input>
				</div>
			</div>	
	</div>
	</div>	
	
	<div class="row">
		<div class="col-sm-2">
		<div class="form-group">			
			<span class="error" ng-show="myForm.loginpassword.$error.required">*</span>
			<label for="loginpassword">Password </label>			 			
			  <div class="input-group">  
					<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>   
					<input type="password" class="form-control input-sm" id="loginpassword" name="loginpassword" placeholder="Password" ng-model="loginpassword" required> 
				</div>
			</div>				
		</div>
	</div>
	

	<div class="row" id="loginvenuediv">		
		<div class="col-sm-2">
		<div class="form-group">			
			<span class="error" ng-show="myForm.loginvenue.$error.required">*</span>
			<label id="loginvenuelabel" for="loginvenue">Venue </label>	
			<label class="error" ng-show="myForm.loginvenue.$error.minlength">Too short!</label>				
			  <div class="input-group">  
					<span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>   
					<input type="text" class="form-control input-sm" id="loginvenue" name="loginvenue" placeholder="Location/ Venue" ng-minlength="3" ng-model="loginvenue" required> 
				</div>	
		</div>				
		</div>
	</div>	
	
	<div class="row" id="logindatediv">		
		<div class="col-sm-2">
		<div class="form-group">			
			 <span class="error" ng-show="myForm.logindate.$error.required">*</span>
			<label id="logindatelabel" for="logindate">Campaign Date </label>	
			<!-- <label class="error" ng-show="myForm.logindate.$error.minlength"></label>	-->
			  <div class="input-group">  
					<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>   
					<input type="text" class="form-control input-sm" id="logindate" name="logindate" placeholder="Date of Campaign" ng-model="logindate" required> 
				</div>	
		</div>				
		</div>
	</div>	



       
   

	
	</br>
	
	<div class="row" id="loginvalidationdiv">
	<div class="col-sm-2 control-label">		
		<button type="submit" ng-disabled="myForm.$invalid" name="submit" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-log-in"></span> Login</button> </div>
	</div>
	
	<div class="row" id="loginnovalidationdiv" style="display:none">
	<div class="col-sm-2 control-label">		
		<button type="submit" name="submit" class