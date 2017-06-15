<!DOCTYPE html>
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
	<title></title>
</head>
<body>

</body>
</html>
<?php 
session_start();
include 'dbconnect.php';
include 'mail.php';

if(isset($_POST['submit']))
{
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = mysql_query("SELECT * FROM admin WHERE email='".$email."'");
$s=mysql_num_rows($sql);
if($s > 0)
{
$_SESSION['admin_exist']= "EMAIL ALREADY REGISTERED AS ADMIN !!";
header('location: profile.php?msg=admin_exists')
}
else
{
$sql = mysql_query("INSERT INTO admin(name,email_id,password) VALUES ('".$name."','".$email."','".md5($password)."')");

   	$admin= '<html><head><link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet"></head><body><div style="font-family:"Oswald";"><h2>WELCOME TO ECOTWEET !!</h2><h4>YOU HAVE BEEN MADE ADMIN OF ECOTWEET</h4><h4>Your Username is: '.$email.'<br> Your Password is:'.$password.'</h4><div></body></html>';


$mail->Subject = 'ADMIN INVITATION FROM ECOTWEET';
$mail->Body    = $admin;
   
$mail->addAddress($email);       
$mail->isHTML(true);                               
if(!$mail->send()) {
   echo 'Message could not be sent.';
  echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
   echo 'Message has been sent'.$email.'<br>';
   $_SESSION['admin_added']= "ADMIN ADDED AND INVITATION MAIL HAS BEEN SENT SUCCESSFULLY";
}

$mail->clearAddresses();
// $_SESSION['admin_added']= "ADMIN ADDED AND INVITATION MAIL HAS BEEN SENT SUCCESSFULLY";
  header('location: profile.php');
    }
}
?>