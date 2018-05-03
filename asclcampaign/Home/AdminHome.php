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

	if(!empty($_SESSION['SESS_TYPE']) && $_SESSION['SESS_TYPE']=='insert'){	
	$_SESSION['SESS_RESULT']='';
	$_SESSION['SESS_TYPE']='';
	echo '<script type="text/javascript"> alert("New LME has been Added Successfully")</script>';
	
	}
	
	else if(!empty($_SESSION['SESS_TYPE']) && $_SESSION['SESS_TYPE']=='update'){	
	$_SESSION['SESS_RESULT']='';
	$_SESSION['SESS_TYPE']='';
	echo '<script type="text/javascript"> alert("LME data has been Updated Successfully")</script>';
	
	}
	
	else if(!empty($_SESSION['SESS_TYPE']) && $_SESSION['SESS_TYPE']=='delete'){	
	$_SESSION['SESS_RESULT']='';
	$_SESSION['SESS_TYPE']='';
	echo '<script type="text/javascript"> alert("LME has been Deleted Successfully")</script>';
	
	}


        else if(!empty($_SESSION['SESS_TYPE']) && $_SESSION['SESS_TYPE']=='emailsent'){	
	$_SESSION['SESS_RESULT']='';
	$_SESSION['SESS_TYPE']='';
	echo '<script type="text/javascript"> alert("Email has sent Successfully")</script>';
	
	}
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
<form name="myForm" novalidate ng-submit="myForm.$valid && login.submit()" id="memberrecord" action="../Campaign/SaveCampaignMemberData.php" method="POST">

	<div id="WebPatientData" class="addpatient">
	
		
	</div>
	<div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-3x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo (mysql_num_rows(mysql_query("SELECT Id FROM login where Role !='admin' AND UserId!='user' "))); ?>
					</div>
                                    <div>LME's</div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-3x"></i>
                                </div>
                                <div class="col-xs-9 text-right"> <?php $today=date("Y-m-d",strtotime("0 days")); ?><?php $lastweek=date("Y-m-d",strtotime("-7 days")); ?>
                                    <div class="huge"><?php echo (mysql_num_rows(mysql_query("SELECT memberid FROM memberdata where updateddate='$today' "))); ?></div>
                                    <div>New Regsitraions Today</div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-cog fa-3x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo (mysql_num_rows(mysql_query("SELECT memberid FROM memberdata where updateddate BETWEEN '$lastweek' AND  '$today' "))); ?></div>
                                    <div>Current Week Registrations</div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
             <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-3x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo (mysql_num_rows(mysql_query("SELECT memberid FROM memberdata "))); ?></div>
                                    <div>Total Registrations</div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>


	<div class="row marginRow" style="text-align:center">
		
		<h2>ASCL Campaign LME Records</h2>
	</div>			
	
	<div class="table-responsive">	
	<table class="table table-striped table-hover table-bordered">
	  <thead>
		<tr class="info">		 
		  <th>S.No</th>
		  <th>User ID</th>
		  <th>Name</th>
		  <th>View</th>		  		  
		</tr>
	  </thead>
	  
	  <tbody>  
	<?php 
		$count=0;
		$LMEdata = mysql_query("SELECT * FROM login where Role !='admin' AND UserId!='user' ");                                     
	
		if(mysql_num_rows($LMEdata) > 0){				
			while($LMERecord = mysql_fetch_array($LMEdata)) {
			$count=$count+1;
			
	?>  
	
		<tr> 
		  <td><a href="ViewLME.php?Id=<?php echo $LMERecord['Id']?>"><?php echo $count ?></a></td>
		  <td><a href="ViewLME.php?Id=<?php echo $LMERecord['Id']?>"><?php echo $LMERecord['UserId'] ?></a></td>
		  <td><a href="ViewLME.php?Id=<?php echo $LMERecord['Id']?>"><?php echo $LMERecord['Name'] ?></a></td>    
		  <td><a href="ViewLME.php?Id=<?php echo $LMERecord['Id']?>"><i class="fa fa-search-plus"></i></a></td>    
		</tr> 
	
	<?php

		} 
		
	}	
	?>
	
	</tbody>
</table>	
</div>	


</form>
</div>

</div>
</strong>

<?php include '../Footer/Footer.php';  ?>
</div>

		
	
		
	</body>
</html>