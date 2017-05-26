
<?php
session_start();
?>
<?php 
if(isset($_SESSION['username'])){
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
  }
  .align-center{
  	text-align: center;
  	margin: 0 auto;
  	padding: 7px 0;
  }
   .align-center img{
  	background-color: #eeeeee;
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
	font-size: 24px;
	width: 300px;
	height: 70px;
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
#welcome-tag{
  margin: 0;
}
.tooltip {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black;
}

.tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: black;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;

    /* Position the tooltip */
    position: absolute;
    z-index: 1;
}

#add-tree:hover .tooltiptext {
    visibility: visible;
}

/*@media only screen and (min-width: 320px) and (max-width: 767px)
  {
  	nav ul{
  		display: none;
  	}
    nav ul li{
      display: none;
    }
  } */

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

<div class="wrapper">
<div class="align-center">
<img src="img/eco_logo_1.png">
</div>

<div class="align-center">
<h1 id="welcome-tag">WELCOME TO ECO TWEET</h1>
</div>


<!-- Button trigger modal -->
<div class="container">
<div class="row align-center">
<button class="tree-btn hvr-icon-bob bob1" data-toggle="modal" data-target="#myModalHorizontal" id="add-tree"> 
     ADD TREES</button>
     <!-- <span class="tooltiptext">ADD A NEW TREE TO THE DONATION STACK</span> -->
</div>
<div class="row align-center">
<form action="showtree.php" method="post">
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
                        data-dismiss="modal">
                            CLOSE
                </button>
                <button type="submit" class="btn btn-primary" name="submit">
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

