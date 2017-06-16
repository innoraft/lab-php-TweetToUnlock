<?php
session_start();
include "dbconnect.php";
?>

<html>
<head>
<title>ADMIN PORTAL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Montserrat:400,700|Cardo:400,400italic,700">
  <link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
   <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<style>
body{
font-size: 14px; 
line-height: 18px; 
font-family: "Oswald";}
.page-header{margin-top: 0px;  border-bottom: 1px solid #1995DC; padding-bottom: 0px; }
.page-header h1{margin-top: 0px; font-size: 24px;}
/*#next,#prev{ width: 100px; height: 30px; font-size: 16px; background-color: #217def; color: white; border-style: none; margin: 10px;}
#next:hover,#prev:hover{ background-color: #024291; transition-duration: 0.2s; }*/
th{ 
background-color: #eeeeee; 
color: #337ab7;}
#datatable{ font-family: "Montserrat";}
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
      <a href="javascript:void(0);" style="font-size: 20px;padding-right: 20px;
    padding-top: 15px;color: #3e86f1;" class="humburger" onclick="menubar();">&#9776;</a>
    </div>
    <ul class="nav navbar-nav navbar-right" id="navbar-right">
    <li class="active"><a href="profile.php"><i class="fa fa-home" aria-hidden="true"></i> HOME</a></li>
      <li class="active"><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> LOGOUT</a></li>

      </ul>
  </div>
</nav>

<div class="container mainbody">
  <div class="page-header">
    <h1>ALL ADMINS OF ECOTWEET</h1>
  </div>
  <div class="clearfix"></div>
  <div class="table-responsive">
    <table class="table table-bordered table-hover" id="datatable">
      <tr>
      <th>NAME</th>
      <th>EMAIL ID</th>
      <th>ADMIN ADDED BY</th>
    </tr>
    
      <?php 
      $admin_sql= mysql_query("SELECT * FROM admin");
      while($rs = mysql_fetch_array($admin_sql) ) {
      ?>
      <tr>
      <td><?php echo $rs["name"]; ?></td>
      <td><?php echo $rs["email_id"]; ?></td>
        <td><?php echo $rs["admin_added_by"]; ?></td>
      </tr>
      <?php } ?>
    </table>
    </div>  
</div>
</body>
</html>