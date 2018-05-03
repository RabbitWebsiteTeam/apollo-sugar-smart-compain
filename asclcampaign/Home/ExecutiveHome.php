﻿<?php
	 require_once('../Config/Auth.php'); 
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
       $scope.familyhistory = [{'name': 'yes'}, {'name': 'no'}];
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

<div ng-controller="ExampleController">
<form name="myForm" novalidate ng-submit="myForm.$valid && login.submit()" id="memberrecord" action="../Campaign/SaveCampaignMemberData.php" method="POST">

	<div id="WebPatientData" class="addpatient">
	<div class="row marginRow">	
		
		<div class="col-sm-1 "> 
			<div class="form-group">
			<span class="error" ng-show="myForm.fullname.$error.required">*</span>
			<label for="fullname">Name</label>					
			<label class="error" ng-show="myForm.fullname.$error.minlength">Too short!</label>		
				<input type="text" id="fullname" name="name" class="form-control input-sm" placeholder="Full Name" value="" ng-model="fullname" ng-minlength="3" required/>		
				<!-- <span class="error" ng-show="myForm.height.$error.required">*</span> -->
<input type="hidden" id="auth" name="auth" value="Z+Bv36zVEz5zP7iauUp7nAyTEQhABSduMaZh/Whk4WU=" />
<input type="hidden" id="primary_source" name="primary_source" value="BTL" />
<input type="hidden" id="secondary_source" name="secondary_source" value="ASCLCampaign" />
<input type="hidden"  name="email" value="" />				
<input type="hidden" name="location" value="<?php echo $_SESSION['SESS_LOCATION']; ?>" />
<input type="hidden" name="city" value="<?php echo $_SESSION['SESS_CITY']; ?>" />
<input type="hidden" name="exename" value="<?php echo $_SESSION['SESS_NAME']; ?>" />
<input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>" />
<input type="hidden" name="time" value="<?php echo date('H:i:s'); ?>" />				
	    </div>
		</div>
		
		<div class="col-sm-1 "> 
			<div class="form-group">			
				<label for="gender">Gender</label>
				<select class="form-control input-sm" id="gender" name="gender"> 
					<option value="Male">Male</option>
					<option value="Female">Female</option>
					<option value="Other">Other</option>
				</select>
			</div>
		</div>
		
		<div class="col-sm-1 "> 
			<div class="form-group">
			<span class="error" ng-show="myForm.age.$error.required">*</span>
				<label for="age">Age</label>
				<span class="error" ng-show="myForm.age.$error.pattern">Not a valid age!</span>
				<input type="number" id="age" name= "age" class="form-control input-sm" maxlength="255" size="8" placeholder="Age" value="" ng-pattern="/^[0-9]{1,2}$/"
					ng-model="age" required/>
			</div>			
		</div>	
				
		<div class="col-sm-1 "> 
			<div class="form-group">
			<span class="error" ng-show="myForm.mobile.$error.required">*</span>
				<label for="mobile">Mobile</label>
                         	
				<span class="error" ng-show="myForm.mobile.$error.pattern">Not a valid mobile!</span>
                        <div class="input-group">  
                          <span class="input-group-addon">+91</i></span>
				<input type="number" id="mobile" name="phone" class="form-control input-sm" maxlength="255" placeholder="Mobile" value="" ng-pattern="/^[1234567890]{10,10}$/"
					ng-model="mobile" required ng-pattern-restrict/>	
                            </div>                 
			</div>
		</div>	

                <div class="col-sm-1 "> 
			<div class="form-group">
                               <span class="error" ng-show="myForm.height.$error.required">*</span> 		
				<label for="height">Height</label>
				<span class="error" ng-show="myForm.height.$error.pattern">Not a valid Height!</span>
				<div class="input-group">  				
				<!--<input type="number" id="height" name= "height" class="form-control input-sm" maxlength="255" size="8" placeholder="Height" value="" ng-pattern="/^[0-9]{1,3}$/"
					ng-model="height"/>	-->
					<select class="form-control input-sm" id="height" name="height" ng-model="height.name" required> 					
                                        <option value="">-- Select --</option>	
                                        <option  value="4" title="4"> 4</option>
										<option  value="5" title="5"> 5</option>
										<option  value="6" title="6"> 6</option>
										<option  value="7" title="7"> 7</option>															
										

					</select>
				<span class="input-group-addon">Feet</i></span>  
				<select class="form-control input-sm" id="inch" name="inch" ng-model="inchess.name" required> 					
			<option value="">-- Select --</option>	
			<option value="1" title="1"> 1</option>
			 <option value="2" title="2"> 2</option>
			  <option  value="3" title="3"> 3</option>
			  <option value="4" title="4"> 4</option>
				<option value="5" title="5"> 5</option>
				 <option value="6" title="6"> 6</option>
				  <option  value="7" title="7"> 7</option>
				  <option  value="8" title="8"> 8</option>
				 <option  value="9" title="9"> 9</option>
				  <option   value="10" title="10"> 10</option>
				 <option value="11" title="11"> 11</option>
			</select>
				<span class="input-group-addon">Inch</i></span>  
				
				</div>					
			</div>			
		</div>	
		
		<div class="col-sm-1 "> 
			<div class="form-group">
                                <span class="error" ng-show="myForm.weight.$error.required">*</span>			
				<label for="weight">Weight</label>
				<span class="error" ng-show="myForm.weight.$error.pattern">Not a valid Weight!</span> <div class="input-group">  				
				<!--<input type="number" id="weight" name= "weight" class="form-control input-sm" maxlength="255" size="8" placeholder="Weight" value="" ng-pattern="/^[0-9]{1,3}$/"
					ng-model="weight"/>	-->  
					<select class="form-control input-sm" id="weight" name="weight" ng-model="weight.name" required> 					
					<option value="">-- Select --</option>
					<?php for($i=25;$i<=500;$i++){ ?>
					<option  value="<?php echo $i;?>" title="<?php echo $i;?>"> <?php echo $i;?></option>
					<?php }?>
										

					</select>					
				<span class="input-group-addon">Kgs</i></span>   
				</div>
			</div>
		</div>			
						
		<div class="col-sm-1 "> 
			<div class="form-group">
                                <span class="error" ng-show="myForm.diabetic.$error.required">*</span>  
				<label for="diabetic">Diabetic</label>
                                <span class="error" ng-show="myForm.diabetic.$error.required">Required!</span>
                                <span class="success" ng-show="myForm.diabetic.$valid">Good!</span>
				<select class="form-control input-sm" id="diabetic" name="diabetic" ng-model="diabetic.name"  required> 					
                                        <option value="">-- Select --</option>	
                                        <option ng-repeat="v in diabetic" value="{{v.name}}" title="{{v.name}}">{{v.name}}</option>					

		</select>
			</div>
		</div>
		
		<div class="col-sm-1 "> 
			<div class="form-group">			
			<span class="error" ng-show="myForm.sugar.$error.required">*</span>
				<label for="sugar">RBG</label>
				<span class="error" ng-show="myForm.sugar.$error.pattern">Not a valid number!</span>	
				<input type="number" id="sugar" name= "sugar" class="form-control input-sm" maxlength="255" size="8" placeholder="Sugar" value="" ng-pattern="/^[0-9]{1,3}$/"
					ng-model="sugar" required />
					
			</div>
		
		</div>

               <div class="col-sm-1 "> 
			<div class="form-group">
                                <span class="error" ng-show="myForm.familyhistory.$error.required">*</span>  			
				<label for="familyhistory">Family History</label>
                                <span class="error" ng-show="myForm.familyhistory.$error.required">Required!</span>
                                <span class="success" ng-show="myForm.familyhistory.$valid">Good!</span>
				<select class="form-control input-sm" id="familyhistory" name="familyhistory" ng-model="familyhistory.name"  required> 
					<option value="">-- Select --</option>	
                                        <option ng-repeat="v in familyhistory" value="{{v.name}}" title="{{v.name}}">{{v.name}}</option>								
				</select>
			</div>
		</div>

                <div class="col-sm-1 "> 
			<div class="form-group">
                                <span class="error" ng-show="myForm.interestedin.$error.required">*</span>            			
				<label for="interestedin">Interested In</label>
                                <span class="error" ng-show="myForm.interestedin.$error.required">Required!</span>
                                <span class="success" ng-show="myForm.interestedin.$valid">Good!</span>
				<select class="form-control input-sm" id="interestedin" name="interestedin" ng-model="interestedin.name"  required> 					
                                        <option value="">-- Select --</option>
                                        <option ng-repeat="v in interestedin" value="{{v.name}}" title="{{v.name}}">{{v.name}}</option>					
				</select> 
			</div>
		</div>
		
		<div class="col-sm-1 "> 
			<div class="form-group">
                                <span class="error" ng-show="myForm.rating.$error.required">*</span>			
				<label for="rating">Rating</label>
				<div class="input-group">  				
		 
					<select class="form-control input-sm" id="rating" name="rating" ng-model="rating.name" required> 					
					<option value="">-- Select --</option>
					<?php for($i=1;$i<=3;$i++){ ?>
					<option  value="<?php echo $i;?>" title="<?php echo $i;?>"> <?php echo $i;?></option>
					<?php }?>
										

					</select>					
				<span class="input-group-addon">***</i></span>   
				</div>
			</div>
		</div>	
		<!--
		<div class="col-sm-1 "> 
			<div class="form-group">
                                <span class="error" ng-show="myForm.servicetype.$error.required">*</span>			
				<label for="servicetype">Service Type</label>
				<div class="input-group">  				
		 
					<select class="form-control input-sm" id="servicetype" name="servicetype" ng-model="servicetype.name" required> 					
					<option value="">-- Select --</option>
					
					<option  value="SISH-599">SISH-599</option>
					<option  value="SA-399">SA-399</option>
					<option  value="GLUCOMETER">GLUCOMETER</option>
					<option  value="CMP BASIC-1399">CMP BASIC-1399</option>
						

					</select>					
				<span class="input-group-addon">***</i></span>   
				</div>
			</div>
		</div>	
		
		<div class="col-sm-1 "> 
			<div class="form-group">
			
				<label for="amount">Amount</label>
			
				<input type="number" id="amount" name= "amount" class="form-control input-sm" placeholder="Amount" />
			</div>			
		</div>	
		-->
		
          </div>
	<div class="row marginRow">	
		<div class="col-sm-1">
		<input type="submit" ng-disabled="myForm.$invalid" value="Save" id="Save" class="btn btn-sm btn-primary btn-block" style="color:#FFF;" onclick="this.disabled=true; this.value='Please Wait...';this.form.submit()"/> 
                </div>
	
	
		</div>		
	
</form>
</div>
<div class="row marginRow text-center">
		<div class="col-md-5">	
<?php echo "Location: ". $_SESSION['SESS_LOCATION']; ?>
</div>
</div>
</strong>

<?php include '../Footer/Footer.php';  ?>
</div>

		
	
		
	</body>
</html>