  <?php                            
                 
 	session_start();
						
	              			  
	$userid= $_POST['loginuserid'];
	$password = $_POST['loginpassword'];
	$venue = $_POST['loginvenue'];
	$logindate = $_POST['logindate'];
 	
            
    include './Config/Connection.php';
						
    $data = mysql_query("SELECT * FROM login where(UserId='$userid') AND Password='$_POST[loginpassword]'");              

     if(mysql_num_rows($data) > 0){
                        
			 $member = mysql_fetch_array($data);                         

			
			$_SESSION['SESS_MEMBERID'] = $member['Id'];
			$_SESSION['SESS_USERID'] = $member['UserId'];
			$_SESSION['SESS_Role'] = $member['Role'];
			$_SESSION['SESS_PASSWORD'] = $member['Password'];
			$_SESSION['SESS_CLINIC'] = $member['Clinic'];
			$_SESSION['SESS_CITY'] = $member['City'];
			$_SESSION['SESS_LOCATION'] = $venue;	
			$_SESSION['SESS_LOGINDATE']= $logindate;		
			$_SESSION['SESS_NAME'] = $member['Name'];
			$_SESSION['SESS_DISPLAYNAME'] = $member['DisplayName'];
			$_SESSION['SESS_EMAIL'] = $member['Email'];					
											
			
			if($_SESSION['SESS_Role']!='admin'){

				header("location: ./Home/ExecutiveHome.php");							
			}
			else
			{
				header("location: ./Home/AdminHome.php");	
			}
								
				}                                                                    
                     else{

               
			     $_SESSION['SESS_LOGIN'] ='false';             
			     header('Location: ./index.php');

                               mysql_close($con);
				exit();
			     
				 }
 
                         
    ?> 

