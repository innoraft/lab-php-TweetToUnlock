<?php 
include "dbconnect.php";
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
												<input class="form-control" placeholder="Email Id" name="loginname" type="email" autofocus required>
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
									<div class="align-center">
									<span style="color:#337ab7;">Forgot Password ? <a data-toggle="modal" data-target="#myModal">Click Here</a></span>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
				<?php if(isset($_SESSION['forgot_success'])) { ?>
		<div class="alert alert-success alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> <?php echo $_SESSION['forgot_success']; unset($_SESSION['forgot_success']); ?>
</div>
	<?php } ?>

		<?php if(isset($_SESSION['forgot_error'])) { ?>
		<div class="alert alert-danger alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Sorry!</strong> <?php echo $_SESSION['forgot_error']; unset($_SESSION['forgot_error']);?>
</div>
	<?php } ?>
			</div>
		</div>
		
</div>

	<!-- MODAL -->
	<div id="myModal" class="modal fade" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Recover Password</h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" role="form" method="post" action="validate_forgot.php">
        <div class="form-group">
                    <label  class="col-sm-2 control-label">Email Id</label>
                    <div class="col-sm-10">
                        <input type="email" name="email_id" class="form-control" placeholder="Enter your registered email id" required/>
                    </div>
                  </div>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
        <input type="submit" class="btn btn-primary" value="SUBMIT" name="forgot-password" required />
      </div>
    </div>
    </form>
  </div>
</div>
</body>
</html>