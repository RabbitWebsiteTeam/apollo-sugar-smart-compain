<?php 
session_start();
unset($_SESSION['SESS_ROLE']);
unset($_SESSION['SESS_LOCATION']);

session_destroy();
header('Location: ../index.php');
exit;
?>