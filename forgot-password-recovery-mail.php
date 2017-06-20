<?php
session_start();
include "mail.php";

$emailBody = "<div>" . $mail_fetch['email_id'] . ",<br><p>Click this link to recover your password<br><a href='http://akash.com/lab-php-TweetToUnlock/reset_password.php?mail=" . $mail_fetch['email_id'] . "'>http://akash.com/lab-php-TweetToUnlock/reset_password.php?mail='".$mail_fetch['email_id']."'</a><br></div>";


//$mail->ReturnPath=SERDER_EMAIL;	
$mail->AddAddress($mail_fetch['email_id']);
$mail->Subject = "Forgot Password Recovery";		
$mail->MsgHTML($emailBody);
$mail->IsHTML(true);

if(!$mail->Send()) {
	$_SESSION['forgot_error'] = 'Problem in Sending Password Recovery Email';
} else {
	$_SESSION['forgot_success'] = 'Please check your email to reset password!';
}
?>
