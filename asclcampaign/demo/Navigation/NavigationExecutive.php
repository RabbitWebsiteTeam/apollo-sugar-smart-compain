<!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="../Images/sugarlogo2.jpg" class="img-rounded" width="110" height="45" alt="Apollo Sugars"></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav nav-pills navbar-right top-nav">
             
                

<?php if($_SESSION['SESS_Role']=='admin') { ?>

				 <li class="dropdown">
					<a href="../Reports/ManualSendEmail.php" onclick="return confirm('Do You Want to Send Email?')"><i class="fa fa-2x fa-envelope"></i> Send Email</a>			
                </li>

				<li class="dropdown">
					<a href="../Home/InsertLME.php"><i class="fa fa-2x fa-plus"></i> Create LME</a>			
                </li>

<?php } ?>

		<li class="dropdown">                    
					<a href="#"><i class="fa fa-2x fa-user"></i> <?php echo $_SESSION['SESS_DISPLAYNAME']; ?></a>
				</li>
				<li class="dropdown">
					<a href="../Logout/Logout.php" onclick="return confirm('Do You Want to Logout?')"><i class="fa fa-2x fa-power-off"></i> Log Out</a>			
                </li>
				
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
           
            <!-- /.navbar-collapse -->
        </nav>
