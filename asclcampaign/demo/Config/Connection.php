<?php

$con=mysql_connect("asclprod.c6oqod4hmihx.ap-south-1.rds.amazonaws.com:3444","asclprod","Ascl-444"); 
if(mysql_select_db("asclcampaign", $con)){
	echo 'Ok';
}

?>    
