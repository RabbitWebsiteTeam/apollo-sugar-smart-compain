<?php
	 require_once('../Config/Auth.php'); 
	  include '../Config/Connection.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 
include '../Bin/PortalCSS.php'; 
include '../Bin/PortalJS.php'; 
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.0-beta.1/angular.min.js"></script>  
<script>

function deleteLME(x,y){
var r = confirm("Do you want to delete the "+y+" LME record!");
if (r == true) {
	window.location.href = "../Campaign/DeleteLMEMember.php?Id="+x;

    } else {
        txt = "You pressed Cancel!";
    }
}
$(document).bind('keydown', function(event) {
  var target = event.srcElement || event.target;
  var tag = target.tagName.toUpperCase();
  var type = target.type.toUpperCase();
  if (tag === 'INPUT' && type === 'NUMBER' && (event.keyCode === 8 || event.keyCode === 13 || event.keyCode === 27 || event.keyCode === 35 || event.keyCode === 46)) {
   
  }
  else if(tag === 'INPUT' && type === 'NUMBER' && (event.keyCode < 48 || event.keyCode > 57  )) {
    event.preventDefault();
  }
});

$(document).ready(function(){   

});
</script>
</head>
<body ng-app="inputExample" class="mobile-text">
  <script>
   angular.module('inputExample', [])
     .controller('ExampleController', ['$scope', function($scope) {
       $scope.interestedin = [{'name': 'Diet'}, {'name': 'Insulin'},{'name': 'Counseling'},{'name': 'Promotion offer'},{'name': 'None'}];
       $scope.familyhistory = [{'name': 'Yes'}, {'name': 'No'}];
       $scope.diabetic = [{'name': '0 Years'}, {'name': '1-5 Years'},{'name': '5-10 Years'},{'name': '>10 Years'}];
     }]);
</script>

<?php 
if(!empty($_SESSION['SESS_RESULT']) && $_SESSION['SESS_RESULT']=='true'){
	$_SESSION['SESS_RESULT']='';
	echo '<script type="text/javascript">';
	echo 'alert("Data Added Successfully")';
	echo '</script>';		
}

if(!empty($_SESSION['SESS_RESULT']) && $_SESSION['SESS_RESULT']=='false'){
	$_SESSION['SESS_RESULT']='';
	echo '<script type="text/javascript">';
	echo 'alert("Error in Adding Data")';
	echo '</script>';		
}
?>
<?php  
  $_SESSION['NAV_Val']=0;   
 include '../Navigation/NavigationExecutive.php'; ?>

<hr>
<div id="page-wrapper">
  <strong>
  
  
  <!-- To fetch the lit of LME's -->
  
		

<div ng-controller="ExampleController">
<form name="myForm" novalidate ng-submit="myForm.$valid && login.submit()" id="memberrecord" action="../Campaign/UpdateLMEMember.php" method="POST">

	<div id="WebPatientData" class="addpatient">
	
	<ol class="breadcrumb">
		<li><a href="AdminHome.php">Home</a></li>
		<li class="active">View LME</li>		
	</ol>	
	
	<?php		
		$LMEdata = mysql_query("SELECT * FROM login where Id='$_GET[Id]' ");                                     	
		if(mysql_num_rows($LMEdata) > 0){				
			$LMERecord = mysql_fetch_array($LMEdata);
		}		
	?>
	
	<div class="row marginRow">
	
			
	<input type="hidden" id="lmeid" name="lmeid" class="form-control input-sm" value="<?php echo $LMERecord['Id']; ?>" />				
	    
		 <div class="col-sm-1 "> 
			<div class="form-group">
			<span class="error" ng-show="myForm.lmeuserid.$error.required">*</span>
			<label for="lmeuserid">LME ID</label>					
			<label class="error" ng-show="myForm.lmeuserid.$error.minlength">Too short!</label>		
				<input type="text" id="lmeuserid" name="lmeuserid" class="form-control input-sm" value="<?php echo $LMERecord['UserId']; ?>"  ng-minlength="3" required/>				
	    </div>
		</div>
		
		<div class="col-sm-1 "> 
			<div class="form-group">
			<span class="error" ng-show="myForm.lmename.$error.required">*</span>
			<label for="lmename">LME Name</label>					
			<label class="error" ng-show="myForm.lmename.$error.minlength">Too short!</label>		
				<input type="text" id="lmename" name="lmename" class="form-control input-sm" value="<?php echo $LMERecord['Name']; ?>" ng-minlength="3" required/>				
	    </div>
		</div>
		
		<div class="col-sm-1 "> 
			<div class="form-group">
			<span class="error" ng-show="myForm.lmedisplayname.$error.required">*</span>
			<label for="lmedisplayname">LME Display Name</label>					
			<label class="error" ng-show="myForm.lmedisplayname.$error.minlength">Too short!</label>		
				<input type="text" id="lmedisplayname" name="lmedisplayname" class="form-control input-sm" value="<?php echo $LMERecord['DisplayName']; ?>" ng-minlength="3" required/>				
	    </div>
		</div>
		
		<div class="col-sm-1 "> 
			<div class="form-group">
			<span class="error" ng-show="myForm.lmepassword.$error.required">*</span>
			<label for="lmepassword">Password</label>					
			<label class="error" ng-show="myForm.lmepassword.$error.minlength">Too short!</label>		
				<input type="text" id="lmepassword" name="lmepassword" class="form-control input-sm" value="<?php echo $LMERecord['Password']; ?>" ng-minlength="3" required/>				
	    </div>
		</div>
		
		<div class="col-sm-1 "> 
			<div class="form-group">
			<span class="error" ng-show="myForm.lmeclinic.$error.required">*</span>
			<label for="lmeclinic">Clinic</label>					
			<label class="error" ng-show="myForm.lmeclinic.$error.minlength">Too short!</label>		
				<input type="text" id="lmeclinic" name="lmeclinic" class="form-control input-sm" placeholder="Full Name" value="<?php echo $LMERecord['Clinic']; ?>" ng-minlength="3" required/>				
	    </div>
		</div>
		
		<div class="col-sm-1 "> 
			<div class="form-group">
			<span class="error" ng-show="myForm.lmecity.$error.required">*</span>
			<label for="lmecity">City</label>					
			<label class="error" ng-show="myForm.lmecity.$error.minlength">Too short!</label>		
				<input type="text" id="lmecity" name="lmecity" class="form-control input-sm" placeholder="Full Name" value="<?php echo $LMERecord['City']; ?>" ng-minlength="3" required/>				
	    </div>
		</div>
						
		<div class="col-sm-1 "> 
			<div class="form-group">
			<span class="error" ng-show="myForm.lmemobile.$error.required">*</span>
				<label for="lmemobile">Mobile</label>                         	
				<span class="error" ng-show="myForm.lmemobile.$error.pattern">Not a valid mobile!</span>
                        <div class="input-group">  
                          <span class="input-group-addon">+91</i></span>
				<input type="number" id="lmemobile" name= "lmemobile" class="form-control input-sm" maxlength="255" placeholder="Mobile" value="<?php echo $LMERecord['Mobile']; ?>" ng-pattern="/^[1234567890]{10,10}$/"
					 required ng-pattern-restrict/>	
                            </div>                 
			</div>
		</div>	
		
		<div class="col-sm-1 "> 
			<div class="form-group">
			<span class="error" ng-show="myForm.lmeemail.$error.required">*</span>
			<label for="lmeemail">Email</label>					
			<label class="error" ng-show="myForm.lmeemail.$error.minlength">Too short!</label>		
				<input type="text" id="lmeemail" name="lmeemail" class="form-control input-sm" placeholder="Full Name" value="<?php echo $LMERecord['Email']; ?>" ng-minlength="3" required/>				
	    </div>
		</div>
   
          </div>
	
	
	<div class="row marginRow">	
		<div class="col-sm-1">
			<input type="submit" ng-disabled="myForm.$invalid" value="Update" id="Update" class="btn btn-sm btn-primary btn-block" style="color:#FFF;" onclick="this.disabled=true; this.value='Please Wait...';this.form.submit()"/> 
         </div>
		 
		 <div class="col-sm-1">
			<input type="button" value="Delete" id="Delete" class="btn btn-sm btn-primary btn-block" style="color:#FFF;" onclick="deleteLME('<?php echo $LMERecord['Id']; ?>','<?php echo $LMERecord['UserId']; ?>')"/> 
         </div>
	
	
	</div>		
	
</form>
</div>

</strong>

<?php include '../Footer/Footer.php';  ?>
</div>

		
	
		
	</body>
</html>