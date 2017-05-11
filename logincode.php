<?php
session_start();
include "dbconnect.php";

if(!empty($_POST['login']))
{
	$get_value= mysql_query("SELECT * FROM admin WHERE email_id= '".$_POST['loginname']."' AND password= '".$_POST['password']."'");
	$get_value_result= mysql_num_rows($get_value);
	if($get_value_result > 0)
	{
		$_SESSION['username']= $_POST['loginname'];
		header('location:profile.php');
		}
	else{
		$_SESSION['error']= "INVALID USERNAME / PASSWORD";
		die(header('location:login.php?msg=invalid_username_password'));
	}
}
else
{
	echo "connection error";
}
?>