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
}
else
{
$sql = mysql_query("INSERT INTO admin(name,email_id,password) VALUES ('".$name."','".$email."','".md5($password)."')");

   	$admin= '<h2>WELCOME TO ECOTWEET !!</h2><h4>YOU HAVE BEEN MADE ADMIN OF ECOTWEET</h4><h4>Your Username is: '.$email.'<br> Your Password is:'.$password.'</h4>';


$mail->Subject = 'ADMIN INVITATION FROM ECOTWEET';
$mail->Body    = $admin;
   
$mail->addAddress($email);       
$mail->isHTML(true);                               
if(!$mail->send()) {
  // echo 'Message could not be sent.';
   //echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
   //echo 'Message has been sent'.$email.'<br>';
}

$mail->clearAddresses();
$_SESSION['admin_added']= "ADMIN ADDED AND INVITATION MAIL HAS BEEN SENT SUCCESSFULLY";
  header('location: profile.php');
    }
}
?>