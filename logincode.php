<?php
session_start();

if(!empty($_POST['login']))
{
	if($_POST['loginname']=='admin@admin.com' && $_POST['password']=='1234')
	{
		$_SESSION['username']= $_POST['loginname'];
		header('location:profile.php');
		}
	else{
		$message = "Incorrect Username/Password ";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header('location:login.php?msg=invalid_username_password');
	}
}
else
{
	echo "connection error";
}
?>