<?php 
session_start();
include "dbconnect.php";
?>

<?php
if(isset($_POST['submit']))
{
$to = $_POST['email'];
$password= $_POST['password'];
$subject = "ADMIN INVITATION FROM ECOTWEET";

$message = "
<html>
<body style="text-align:center;">
<h2>WELCOME TO ECOTWEET!</h2>
<h3>YOU HAVE BEEN MADE ADMIN OF ECOTWEET</h3>
<h4>LOGIN TO ECOTWEET ADMIN PORTAL WITH</h4>
<h5>USERNAME: ".$to."</h5>
<h5>PASSWORD: ".$password."</h5>s
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <'.$_SESSION['username'].'>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to,$subject,$message,$headers);
header('location:profile.php?msg=admin_added');
}
?>