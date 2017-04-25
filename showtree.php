<?php include "dbconnect.php";
session_start();
?>
<?php
if(isset($_GET['tree_id']))
{
	$tree_name_delete= $_GET['tree_id'];
	$delete_query= mysql_query("DELETE FROM trees WHERE tree_id=".$tree_name_delete."");
	header('location:showtree.php?msg=deletion_successful');
}
?>
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
$query= mysql_query("SELECT * FROM trees");
if(mysql_num_rows($query)> 0){
while($row= mysql_fetch_array($query)){
?>

<div class="row row-tree">
	<div class="col-md-3">
	<img src="<?php echo $row['image'];?>" class="tree-img">
	</div>
	<div class="col-md-9">
		<h2><?php echo $row['name'];?></h2>
		<h4><?php echo $row['description'];?></h4>
		<h3 id="donated">Donated: <?php echo $row['donated'];?></h3>
		<div id="buttons">
				<button id="update" data-toggle="modal" data-target="#myModalHorizontal">
				<i class="fa fa-wrench aria-hidden="true"></i> UPDATE</a>
				</button>
				<button id="delete" name="delete"><a href="showtree.php?tree_id=<?php echo $row['tree_id'];?>"><i class="fa fa-trash" aria-hidden="true"></i> DELETE</a>
				</button>
		</div>
	</div>
</div>

<?php }
} 
else{
	?><h3>NO TREES TO SHOW</h3><?php
}
?>




<!-- Modal -->
<div class="modal fade" id="myModalHorizontal" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    UPDATE TREE
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                
                <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="update.php">
                <div class="form-group">
                    <label  class="col-sm-2 control-label">TREE ID</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" readonly />
                    </div>
                  </div>
                  <div class="form-group">
                    <label  class="col-sm-2 control-label">NAME</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" placeholder="NAME OF THE TREE"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"
                          >DESCRIPTION</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="description" placeholder="DESCRIPTION OF THE TREE"></textarea>
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="col-sm-2 control-label"
                          >OPLOAD AN IMAGE</label>
                    <div class="col-sm-10">
                        <input type="file" name="image" id="image" accept="image/*">
                    </div>
                  </div>
                   <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                            CLOSE
                </button>
                <button type="submit" class="btn btn-primary" name="submit">
                    SAVE CHANGES
                </button>
            </div>
                    </form>
                  </div>          
        </div>
    </div>
</div>


</body>
</html>