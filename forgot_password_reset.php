<?php
include "dbconnect.php";
include "variable_credentials.php";
session_start();

if(isset($_POST['change_pass']))
{
	$get_data = json_decode(base64_decode($_GET['mail']));
	$update_sql = mysql_query("UPDATE admin SET password = '".md5($_POST['password'])."' WHERE email_id = '".$get_data."'");
	if($update_sql==1)
	{
		$_SESSION['update_msg'] = "Password has been changed";
	}
	else
	{
		$_SESSION['update_msg_err'] = "Error occured while saving";
	}
}
unset($_POST['change_pass']);
?>

<!DOCTYPE html>
<html>
<head>
	<title>ADMIN PORTAL</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
<!-- <link rel="stylesheet" type="text/css" href="css/admin.css"> -->
<style>
body{
	background-color: #f9f9f9;
}
.panel-heading {
    padding: 5px 15px;
}

.panel-footer {
	padding: 1px 15px;
	color: #A0A0A0;
}

.profile-img {
	width: 96px;
	height: 96px;
	margin: 0 auto 10px;
	display: block;
	-moz-border-radius: 50%;
	-webkit-border-radius: 50%;
	border-radius: 50%;
	background-color: #eeeeee;
}
.cont{
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%,-50%);
}
.overlay{
	background-color: rgba(0,0,0,0.5);
	width: 100%;
	height: 100%;
}
.align-center
{
	text-align: center;
	margin: 0 auto;
}
@media only screen and (min-width: 320px) and (max-width: 467px)
{
	.cont{
		width: 100vw;
	}
}
</style>
</head>

<body>
<script>
            function checkPass()
            {
                var pass1 = document.getElementById('password');
                var pass2 = document.getElementById('confirm_password');
                var message = document.getElementById('confirmMessage');
                var btn_submit = document.getElementById('change_pass');
                var goodColor = "#66cc66";
                var badColor = "#ff6666";
                if(pass1.value == pass2.value){
                    pass2.style.backgroundColor = goodColor;
                    message.style.color = goodColor;
                    message.innerHTML = "Passwords Match!"
                    btn_submit.disabled = false;
                }else{
                    pass2.style.backgroundColor = badColor;
                    message.style.color = badColor;
                    message.innerHTML = "Passwords Do Not Match!"
                    btn_submit.disabled = true;
                }
            }  
            </script>
    <div class="container cont">
    <div class="overlay"></div>
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4 col-xs-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong>Reset Your Password</strong>
					</div>
					<div class="panel-body">
						<form role="form" method="POST">
							<fieldset>
								<div class="row">
									<div class="center-block">
										<img class="profile-img"
											src="img/eco_logo_1.png" alt="">
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 col-md-10  col-md-offset-1 ">
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-lock"></i>
												</span>
												<input class="form-control" placeholder="Enter New Password" name="password" type="password" id="password" required>
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-lock"></i>
												</span>
												<input class="form-control" placeholder="Re-enter Password" name="confirm_password" id="confirm_password" type="password" onkeyup="checkPass(); return false;" required>
											</div>
											<span id="confirmMessage" class="confirmMessage"></span>
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-lg btn-primary btn-block" name="change_pass" id="change_pass" value="Save Changes">
										</div>
										
									</div>
									<!-- <div class="align-center">
									<span style="color:#337ab7;">Forgot Password ? <a data-toggle="modal" data-target="#myModal">Click Here</a></span>
									</div> -->
								</div>
							</fieldset>
						</form>
					</div>
				</div>
				<?php if(isset($_SESSION['update_msg'])) { ?>
		<div class="alert alert-success alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> <?php echo $_SESSION['update_msg']; unset($_SESSION['update_msg']); ?>
</div>
<?php } ?>
<?php if(isset($_SESSION['update_msg_err'])) { ?>
		<div class="alert alert-danger alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Sorry!</strong> <?php echo $_SESSION['update_msg_err']; unset($_SESSION['update_msg_err']); ?>
</div>
<?php } ?>
		</div>
		</div>