<?php
session_start();
require_once('config.php');
 if(isset($_SESSION['email']) && $_SESSION['email'] != '') { 
     header("Location: index.php");
 }

if(isset($_POST['loginBtn'])){

  //  print_r($_POST);   

 $sql = "SELECT * FROM admin where email ='".$_POST['email']."' and password ='".$_POST['password']."'";  
$result = mysqli_query($conn,$sql);
$resultCnt  = mysqli_num_rows($result);
//print_r($row = mysqli_fetch_assoc($result));
    if($resultCnt > 0){
        while ($row = mysqli_fetch_assoc($result))
        {
             $id = $row['id'];
             $email = $row['email'];
             $password = $row['password'];
        }

        $_SESSION['id'] = $id; 
        $_SESSION['email'] = $email; 
        $_SESSION['password'] =$password;
        //print_r($_SESSION);
        header("Location: index.php");
    }else{
        $loginErr ="Please check email and password";
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
                    <h2>Admin Login Page</h2> 
                    <p> Welcome to Admin</p>
                    <form role="form" method="post" id="loginFrm">
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label for="name"> e-mail :</label>
                                <input type="email" class="form-control" id="email" name="email" required maxlength="250">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="name"> password :</label>
                                <input type="password" class="form-control" id="password" name="password" required maxlength="150">
                            </div>
                        </div>
                       
                       
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <button type="submit" name="loginBtn" class="btn btn-lg btn-success btn-block" id="btnContactUs">Login</button>
                            </div>
                        </div>
                    </form>
                    <div id="success_message" style="width:100%; height:100%; display:none; "> <h3>Sent your message successfully!</h3> </div>
                    <div id="error_message" style="width:100%; height:100%; "> 
                        <?php if(isset($loginErr)){
                            echo $loginErr;

                        }?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>