<?php
session_start();
include "mail.php";
include "dbconnect.php";
include "variable_credentials.php";

if(isset($_POST["forgot-password"])){
		
		$mail_id = $_POST['email_id'];
		$sql_fetch = mysql_query("SELECT * FROM admin WHERE email_id= '".$mail_id."'");
		$mail_fetch = mysql_fetch_array($sql_fetch);
		$get_mail_id = $mail_fetch['email_id'];
		$arg = base64_encode( json_encode($get_mail_id) );
		if(mysql_num_rows($sql_fetch) > 0) {
			// include "forgot-password-recovery-mail.php";
			$emailBody = "<div>" . $mail_fetch['email_id'] . ",<br><p>Click this link to recover your password<br><a href='".$home."/forgot_password_reset.php?mail=" . $arg. "'>".$home."/forgot_password_reset.php?mail='".$arg."'</a><br></div>";
	
			$mail->AddAddress($mail_fetch['email_id']);
			$mail->Subject = "Forgot Password Recovery";		
			$mail->MsgHTML($emailBody);
			$mail->IsHTML(true);

			if(!$mail->Send()) {
				$_SESSION['forgot_error'] = 'Problem in Sending Password Recovery Email';
			} else {
				$_SESSION['forgot_success'] = 'Please check your email to reset password!';
			}
		}
		 else {
			$_SESSION['forgot_error'] = 'No User Found';
		}
	}
	header('location:login.php');
?>