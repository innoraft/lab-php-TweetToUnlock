<?php
include "dbconnect.php";
include "variable_credentials.php";
session_start();

if(isset($_POST['change_pass']))
{
	$update_sql = mysql_query("UPDATE admin SET password = '".md5($_POST['password'])."' WHERE email_id = '".$_GET['mail']."'");
	if(mysql_num_rows($update_sql) > 0)
	{
		$_SESSION['update_msg'] = "Password has been changed";
	}
	else
	{
		$_SESSION['update_msg_err'] = "Error occured while saving";
	}
}
header('location: forgot_password_reset.php');

?>