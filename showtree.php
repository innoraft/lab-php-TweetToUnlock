<?php include "dbconnect.php";?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
   <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
	body{
  	font-family:"Oswald";
  }
  .align-center{
  	text-align: center;
  	margin: 0 auto;
  	padding: 15px 0;
  }
  .row-tree{
  	background-color: #eeeeee;
  	margin: 20px 0;
  	border-radius: 100px 0 0 100px;
  }
  .tree-img{
  	border-radius: 50%;
  	box-shadow: -5px 0 13px -2px;
  }
  #donated{
  	width: 50%;
  	float: left;
  	margin: 0;
  }
  #buttons{
  	width: 50%;
  	float: right;
  }
  #update{
  	color: white;
  	background-color: #3e86f1;
  	font-size: 14px;
	width: 100px;
	height: 40px;
	text-decoration: none;
	border-radius: 5px;
	box-shadow: 0 6px 12px -6px black;
  }
  #delete{
  	color: white;
  	background-color: #ef3502;
  	font-size: 14px;
	width: 100px;
	height: 40px;
	text-decoration: none;
	border-radius: 5px;
	box-shadow: 0 6px 12px -6px black;
  }
	</style>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WELCOME ADMIN</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li class="active"><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> LOGOUT</a></li>
      </ul>
  </div>
</nav>
<div class="container">
	<div class="align-center">
		<h1>ALL TREES</h1>
	</div>
<?php 
$query= mysql_query("SELECT * FROM trees");
if(mysql_num_rows($query)> 0){
while($row= mysql_fetch_array($query)){
?>
<div class="row row-tree">
	<div class="col-md-3"><img src="<?php echo $row['image'];?>" width="200" height="200" class="tree-img" ></div>
	<div class="col-md-9"><h2 name="tree_name"><?php echo $row['name'];?></h2>
	<h4><?php echo $row['description'];?></h4>
	<h3 id="donated">Donated: <?php echo $row['donated'];?></h3>
	<form action="delete.php" method="post">
	<div id="buttons"><button id="update" name="update"><i class="fa fa-wrench aria-hidden="true"></i> UPDATE</button>
	<button id="delete" name="delete"><i class="fa fa-trash" aria-hidden="true"></i> DELETE</button></div>
	</form>
	</div>
</div>
<?php }
} 
else{
	?><h3>NO TREES TO SHOW</h3><?php
}
?>
</div>
</body>
</html>