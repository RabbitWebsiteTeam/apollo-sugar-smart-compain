<?php 
session_start();
//print_r($_SESSION);
//if( $_SESSION['email'] !='' || $_SESSION['password'] !='' ){
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
              <br>
              <br>

                <div class="row">
                    <div class="col-md-12 ">

                     <div class="col-md-4">
                            <?php include_once('left_manu.php');?>
                    </div>
                    <div class="col-md-8">
                            <h1 style="color: #70b730;"> Welcome to CallHealth Wellness Program</h1> 
                           
                            
                          
                    </div>
                    
                    </div>
                </div>


        </div>
    </body>
</html>