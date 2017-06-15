<?php 
session_start();
if(isset($_SESSION['error'])) {
	$message = "INVALID USERNAME / PASSWORD";
}
?> 

<!DOCTYPE html>
<html>
<head>
	<title>ADMIN PORTAL</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
<!-- <link rel="stylesheet" type="text/css" href="css/admin.css"> -->
<style>
body{
	background-color: #eeeeee;
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
    <div class="container cont">
    <div class="overlay"></div>
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4 col-xs-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong> Sign in to continue</strong>
					</div>
					<div class="panel-body">
						<form role="form" action="logincode.php" method="POST">
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
													<i class="glyphicon glyphicon-user"></i>
												</span> 
												<input class="form-control" placeholder="Username" name="loginname" type="email" autofocus required>
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-lock"></i>
												</span>
												<input class="form-control" placeholder="Password" name="password" type="password" required>
											</div>
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-lg btn-primary btn-block" name="login" value="Sign in">
										</div>
										<div class="align-center"><span style="color: red"><?php echo $message;?></span><?php unset($_SESSION['error']); ?> </div>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>