
<?php
session_start();
?>
<?php
if(isset($_SESSION['admin_exist']))
{
  ?>
<script type="text/javascript">
  alert("EMAIL ALREADY REGISTERED AS ADMIN !!");
</script>
  <?php
  unset($_SESSION['admin_exist']);
}
?>

<?php
if(isset($_SESSION['admin_added']))
{
  ?>
<script type="text/javascript">
  alert("ADMIN ADDED AND INVITATION MAIL HAS BEEN SENT SUCCESSFULLY");
</script>
  <?php
  unset($_SESSION['admin_added']);
}
?>

<?php
if(isset($_SESSION['pass_change']))
{
  ?>
<script type="text/javascript">
  alert("PASSWORD HAS BEEN CHANGED!!");
</script>
  <?php
  unset($_SESSION['pass_change']);
}
?>
<?php 
if(isset($_SESSION['pass_error']))
{
  ?>
<script type="text/javascript">
  alert("PASSWORD INCORRECT! ERROR OCCURED");
</script>
<?php
unset($_SESSION['pass_error']);
}
?>


<?php 
if(isset($_SESSION['username']) && isset($_SESSION['name'])){
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADMIN PORTAL</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
   <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/hover.css">

  <style>
  
  body{
  	font-family:"Oswald";
    min-height: 100vh;
    /*background-image: url("img/Free Green Hexagon Background Vector  TitanUI.jpg");
    background-size: cover;
    background-repeat: no-repeat;*/
    /*background-color: #a2c544;*/
    /*background-color: rgba(227, 245, 113, 0.75);*/
    background-image: -webkit-linear-gradient(bottom, rgba(120, 196, 7,.64) 0%, rgba(120, 196, 7,0) 100%);
    /*background-size: cover;*/
  }
  .align-center{
  	text-align: center;
  	margin: 0 auto;
  	padding: 7px 0;
  }
   .align-center img{
  	background-color: #ffffff;
  	border-radius: 50%;
    width: 150px;
    height: 150px;
    }

  .modal-body .form-horizontal .col-sm-2,
.modal-body .form-horizontal .col-sm-10 {
    width: 100%
}

.modal-body .form-horizontal .control-label {
    text-align: left;
}
.modal-body .form-horizontal .col-sm-offset-2 {
    margin-left: 15px;
}

.tree-btn{
	background-color: #3e86f1;
	color: white;
	font-size: 20px;
	width: 280px;
	height: 60px;
	text-decoration: none;
	border-radius: 5px;
	box-shadow: 0 6px 12px -6px black;
}

.bob1:before{
  content: "\f067";
}
.bob2:before{
  content: "\f03a";
}
.bob3:before{
  content: "\f099";
}
.bob4:before{
  content: "\f007";
}
.bob5:before{
  content: "\f0c0";
}
#welcome-tag{
  margin: 0;
}
.confirmMessage{
  font-size: 14px;
}

.humburger{
  display: none;
}


@media only screen and (max-width: 767px) {
  .navbar-right {
    display: none;
  }
  .navbar-header .humburger {
    float: right;
    display: block;
  }
  .navbar-header .humburger a:visited, a:focus, a:active{
    text-decoration: none;
  }
}
  </style>
</head>
<body>

<script>
function menubar() {

  var x= document.getElementById('navbar-right');

    if(x.style.display=== 'block')
      {
        x.style.display= 'none';
      }
       else
      {
        x.style.display= 'block';
      }
}
</script>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header" id="navbar-header">
      <a class="navbar-brand" href="#" style="text-transform: uppercase;">WELCOME <?php echo $_SESSION['name'];?></a>
       <a href="javascript:void(0);" style="font-size: 20px;padding-right: 20px;padding-top: 9px;color: #3e86f1;" class="humburger" onclick="menubar();">&#9776;</a>
    </div>
    <ul class="nav navbar-nav navbar-right" id="navbar-right">
    <li class="active"><a href="profile.php"><i class="fa fa-home" aria-hidden="true"></i> HOME</a></li>
    <li class="active"><a href="#" data-toggle="modal" data-target="#changepass"><i class="fa fa-key" aria-hidden="true"></i> CHANGE PASSWORD</a></li>
      <li class="active"><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> LOGOUT</a></li>

      </ul>
  </div>
</nav>

<div class="wrapper">
<div class="align-center">
<img src="img/eco_logo_1.png">
</div>

<div class="align-center">
<h2 id="welcome-tag">WELCOME TO ECO TWEET</h2>
</div>


<!-- Button trigger modal -->
<div class="container" style="padding-bottom: 15px;">
<div class="row align-center">
<button class="tree-btn hvr-icon-bob bob4" data-toggle="modal" data-target="#AddAdmin" id="add-admin"> 
     ADD ADMIN</button>
     <!-- <span class="tooltiptext">ADD A NEW TREE TO THE DONATION STACK</span> -->
</div>
<div class="row align-center">
<button class="tree-btn hvr-icon-bob bob1" data-toggle="modal" data-target="#myModalHorizontal" id="add-tree"> 
     ADD TREES</button>
     <!-- <span class="tooltiptext">ADD A NEW TREE TO THE DONATION STACK</span> -->
</div>
<div class="row align-center">
<form action="showadmin.php" method="post" style="margin-bottom: 0px;">
<button class="tree-btn hvr-icon-bob bob5">
     SHOW ADMINS
</button>
</form>
</div>
<div class="row align-center">
<form action="showtree.php" method="post" style="margin-bottom: 0px;">
<button class="tree-btn hvr-icon-bob bob2">
     SHOW TREES
</button>
</form>
</div>
<div class="row align-center">
<form action="showtweet.php" method="post">
<button class="tree-btn hvr-icon-bob bob3">
     SHOW TWEETS
</button>
</form>
</div>

</div>
</div>

<script>
            function checkPass()
            {
                var pass1 = document.getElementById('password');
                var pass2 = document.getElementById('confirm_password');
                var message = document.getElementById('confirmMessage');
                var btn_submit = document.getElementById('add_admin_btn');
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

            <!-- <script>
            $(document).ready(function () {
              $('#AddAdmin').on('hidden.bs.modal', function () {
                  var $form = $('#AddAdmin');
                  $form.validate().resetForm();
                  $form.find('.pchck').removeClass('.pchck');
            });
            </script> -->
  
<!-- add admin modal -->

<div class="modal fade" id="AddAdmin" tabindex="-1" role="dialog" 
     aria-labelledby="AdminLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal" onclick="window.location.reload()">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="AdminLabel">
                    ADD A NEW ADMIN
                </h4>
            </div>            
            <!-- Modal Body -->
            <div class="modal-body">
                
                <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="addadmin.php" id="admin-form">
                  <div class="form-group">
                    <label  class="col-sm-2 control-label">NAME</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" placeholder="NAME OF THE ADMIN" id="admin_name" required/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">EMAIL ID</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" placeholder="EMAIL ID OF THE ADMIN" required>
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="col-sm-2 control-label">PASSWORD</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control pcheck" name="password" placeholder="ENTER A PASSWORD" id="password" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">CONFIRM PASSWORD</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control pcheck" name="confirm_password" placeholder="RE-ENTER THE PASSWORD" id="confirm_password" onkeyup="checkPass(); return false;" required>
                         <span id="confirmMessage" class="confirmMessage"></span>
                    </div>
                  </div>
                   <div class="modal-footer">
                <button type="button" class="btn btn-default" onclick="window.location.reload()"> CLOSE
                          
                </button>
                <button type="submit" class="btn btn-primary" name="submit" id="add_admin_btn">
                    ADD ADMIN
                </button>
            </div>
                    </form>
                  </div>          
        </div>
    </div>
</div>

<!-- add tree Modal -->
<div class="modal fade" id="myModalHorizontal" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal" onclick="window.location.reload()">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    ADD A NEW TREE
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                
                <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="addtree.php">
                  <div class="form-group">
                    <label  class="col-sm-2 control-label">NAME</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" placeholder="NAME OF THE TREE" required/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"
                          >DESCRIPTION</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="description" placeholder="DESCRIPTION OF THE TREE" required></textarea>
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="col-sm-2 control-label"
                          >UPLOAD AN IMAGE</label>
                    <div class="col-sm-10">
                        <input type="file" name="image" id="image" accept="image/*">
                    </div>
                  </div>
                   <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal" onclick="window.location.reload()">
                            CLOSE
                </button>
                <button type="submit" class="btn btn-primary" name="submit">
                    ADD TREE
                </button>
            </div>
                    </form>
                  </div>          
        </div>
    </div>
</div>

<script>
            function checkPass_change()
            {
                var pass1 = document.getElementById('newpassword');
                var pass2 = document.getElementById('confirm_pass');
                var message = document.getElementById('confirm_msg');
                var btn_submit = document.getElementById('pass_change_btn');
                var goodColor = "#66cc66";
                var badColor = "#ff6666";
                if(pass1.value == pass2.value){
                    pass2.style.backgroundColor = goodColor;
                    message.style.color = goodColor;
                    message.innerHTML = "PASSWORDS MATCH!";
                     btn_submit.disabled = false;
                }else{
                    pass2.style.backgroundColor = badColor;
                    message.style.color = badColor;
                    message.innerHTML = "PASSWORDS DO NOT MATCH!";
                     btn_submit.disabled = true;
                }

            }  
            </script>

            <script type="text/javascript">
              
              function check_oldpass()
              {
                var oldpass= document.getElementById('oldpassword');
                var msg= document.getElementById('oldpassmsg');
                var goodColor = "#66cc66";
                var badColor = "#ff6666";
                var btn_submit = document.getElementById('pass_change_btn');
                if(oldpass.value != "<?php echo $_SESSION['pass']; ?>")
                {
                  oldpass.style.backgroundColor = badColor;
                    msg.style.color = badColor;
                  msg.innerHTML = "PASSWORD INCORRECT";
                  btn_submit.disabled = true;
                }
                else
                {
                   oldpass.style.backgroundColor = goodColor;
                    msg.style.color = goodColor;
                  msg.innerHTML = "CORRECT PASSWORD";
                  btn_submit.disabled = false;
                }
              }
            </script>
<!-- change password modal -->

<div class="modal fade" id="changepass" tabindex="-1" role="dialog" 
     aria-labelledby="change_pass" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal" onclick="window.location.reload()">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    CHANGE PASSWORD
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                
                <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="change_password.php">
                  <div class="form-group">
                    <label  class="col-sm-2 control-label">OLD PASSWORD</label>
                    <div class="col-sm-10">
                        <input type="password" name="oldpassword" class="form-control" placeholder="ENTER OLD PASSWORD" onkeyup="check_oldpass(); return false;" id="oldpassword" required/>
                        <span id="oldpassmsg"></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"
                          >NEW PASSWORD</label>
                    <div class="col-sm-10">
                         <input type="password" name="newpassword" class="form-control" placeholder="ENTER NEW PASSWORD" id="newpassword" required/>
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="col-sm-2 control-label"
                          >CONFIRM PASSWORD</label>
                    <div class="col-sm-10">
                         <input type="password" class="form-control pcheck" name="confirm_pass" placeholder="RE-ENTER THE PASSWORD" id="confirm_pass" onkeyup="checkPass_change(); return false;" required>
                         <span id="confirm_msg" class="confirmMessage"></span>
                    </div>
                  </div>
                   <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal" onclick="window.location.reload()">
                            CLOSE
                </button>
                <button type="submit" class="btn btn-primary" name="submit" id="pass_change_btn">
                    SUBMIT
                </button>
            </div>
                    </form>
                  </div>          
        </div>
    </div>
</div>

  </body>
</html>
<?php
}
else
{
	header('location:login.php');
}
?>

