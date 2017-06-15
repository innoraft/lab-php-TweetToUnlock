<?php 
include "dbconnect.php";
session_start();
?>

<?php
if(isset($_POST['submit']))
{
	$oldpass= $_POST['oldpassword'];
	$newpass= $_POST['newpassword'];
  $pass_sql= mysql_query("SELECT * FROM admin WHERE email_id='".$_SESSION['username']."'");
  $pass_fetch= mysql_fetch_array($pass_sql);
  $pass_val= $pass_fetch['password'];
  if($pass_val== md5($oldpass))
  {
  	$update_sql= mysql_query("UPDATE admin SET password='".md5($newpass)."' WHERE password='".$pass_val."' AND email_id='".$_SESSION['username']."'");
  	$_SESSION['pass_change']="PASSWORD HAS BEEN CHANGED!";
  	header('location:profile.php');
  }
  else
  {
  	header('location:profile.php');
  	$_SESSION['pass_error']= "PASSWORD INCORRECT";
  }
}
else
{
	header('location:profile.php?msg=error_occured_while_submitting');
}


?>