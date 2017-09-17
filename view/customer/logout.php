<?php
session_start();
if(isset($_SESSION['customer_login']))
{
	session_destroy();
	//setcookie('rem_user',null,time()-1);
	header("location:login.php");
}
else 
{
	header("location:login.php");
	//echo "Logout Done";
}
?>