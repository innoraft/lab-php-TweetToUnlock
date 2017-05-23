<?php include "dbconnect.php";
session_start();
?>
<?php
if(isset($_GET['item_id']))
{
	$tree_name_delete= $_GET['item_id'];
	$delete_query= mysql_query("DELETE FROM donated_items WHERE item_id=".$tree_name_delete."");
	header('location:showtree.php?msg=deletion_successful');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADMIN PORTAL</title>
  
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
   <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
	body{
  	font-family:"Oswald";
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
  .row-tree a{
  	color: white;
  }

  .row-tree a:focus{
  	color: white;
  }
  .tree-img{
  	border-radius: 50%;
  	width: 200px;
  	height: 200px;
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
	margin-right: 5px;
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
	margin-left: 5px;
  }
  #delete a:hover{
  	text-decoration: none;
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
    <li class="active"><a href="profile.php"><i class="fa fa-home" aria-hidden="true"></i> HOME</a></li>
      <li class="active"><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> LOGOUT</a></li>
      </ul>
  </div>
</nav>

<div class="container">
	<div class="align-center">
		<h1>ALL TREES</h1>
	</div>
<?php 
$query= mysql_query("SELECT * FROM donated_items");
if(mysql_num_rows($query)> 0){
	$i=1;
while($row= mysql_fetch_array($query)){
?>

<div class="row row-tree">
	<div class="col-md-3 col-sm-4 col-xs-3">
	<img src="<?php echo $row['image'];?>" class="tree-img">
	</div>
	<div class="col-md-9 col-sm-8 col-xs-9">
		<h2><?php echo $row['name'];?></h2>
		<h4><?php echo $row['description'];?></h4>
		<h3 id="donated">Donated: <?php echo $row['donated'];?></h3>
		<div id="buttons">
				<a href="updateform.php?item_id=<?php echo $row['item_id'];?>"><button id="update">
				<i class="fa fa-wrench aria-hidden="true"></i> UPDATE</button></a>
				<a href="showtree.php?item_id=<?php echo $row['item_id'];?>"><button id="delete" name="delete" onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE?')"><i class="fa fa-trash" aria-hidden="true"></i> DELETE
				</button></a>
		</div>
	</div>
</div>

<?php $i++;}
} 
else{
	?><h3>NO TREES TO SHOW</h3><?php
}
?>


</body>
</html>