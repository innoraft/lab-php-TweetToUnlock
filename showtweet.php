<?php
session_start();
include "dbconnect.php";

$sortingCode = "";
if (isset($_REQUEST['sort_element']) && $_REQUEST['sort_element'] != "") {
    $sort_element = " ORDER BY ".$_REQUEST['sort_element']." ";
} 
if (isset($_REQUEST['sort_type']) && $_REQUEST['sort_type'] != "") {
    $sort_type = " ".$_REQUEST['sort_type']." ";
} 
$sortingCode = "$sort_element $sort_type";

// $sql = "SELECT * FROM `users` WHERE 1 $sortingCode";
?>
<?php 
if (!isset($_GET['startrow']) or !is_numeric($_GET['startrow'])) {
  $startrow = 0;
//otherwise we take the value from the URL
} else {
  $startrow = (int)$_GET['startrow'];
}
$fetch = mysql_query("SELECT * FROM users WHERE 1 $sortingCode LIMIT $startrow, 10");
$num=mysql_num_rows($fetch);
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
  <link rel="stylesheet" type="text/css" href="css/hover.css">
    <style>
body{font-size: 14px; line-height: 18px; font-family: "Oswald";}
.page-header{margin-top: 0px;  border-bottom: 1px solid #1995DC; padding-bottom: 0px; }
.page-header h1{margin-top: 0px; font-size: 24px;}
#next,#prev{ width: 100px; height: 30px; font-size: 16px; background-color: #217def; color: white; border-style: none; margin: 10px;}
#next:hover,#prev:hover{ background-color: #024291; transition-duration: 0.2s; }
th{ background-color: #eeeeee; }
#datatable{ font-family: "Montserrat";}
    </style>
</head>
<body>
        
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WELCOME <?php echo $_SESSION['name'];?></a>
    </div>
    <ul class="nav navbar-nav navbar-right">
    <li class="active"><a href="profile.php"><i class="fa fa-home" aria-hidden="true"></i> HOME</a></li>
      <li class="active"><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> LOGOUT</a></li>

      </ul>
  </div>
</nav>
  
  
<div class="container mainbody">
  <div class="page-header">
    <h1>CONTIBUTORS & TWEETS</h1>
  </div>
  <div class="clearfix"></div>
  <div class="table-responsive">
    <table class="table table-bordered table-hover" id="datatable">
      <tr>

     

      <th>
        <a title="Click to sort by USER NAME" href="showtweet.php?sort_element=user_name&startrow=<?php echo $startrow; ?>&sort_type=<?php echo ($_REQUEST["sort_element"] == "user_name"  && $_REQUEST["sort_type"] == "asc") ? "desc" : "asc"; ?>">USER NAME
        <?php if ($_REQUEST["sort_element"] == "user_name" ) {  if($_REQUEST["sort_type"] == "desc" ) { ?>
        <img class="sorting" src="img/arrowtop.png" alt="asc" style="margin-bottom: 3px;">
        <?php } else { ?>
          <img class="sorting" src="img/arrowbottom.png" alt="desc" style="margin-bottom: 3px;"> 
        <?php } } ?>
        </a>
      </th>

      <th>
        <a title="Click to sort by LAST TWEETED" href="showtweet.php?sort_element=last_tweet_time&startrow=<?php echo $startrow; ?>&sort_type=<?php echo ($_REQUEST["sort_element"] == "last_tweet_time"  && $_REQUEST["sort_type"] == "asc") ? "desc" : "asc"; ?>">LAST TWEETED
        <?php if ($_REQUEST["sort_element"] == "last_tweet_time" ) {  if($_REQUEST["sort_type"] == "desc" ) { ?>
        <img class="sorting" src="img/arrowtop.png" alt="asc" style="margin-bottom: 3px;">
        <?php } else { ?>
          <img class="sorting" src="img/arrowbottom.png" alt="desc" style="margin-bottom: 3px;"> 
        <?php } } ?>
        </a>
      </th>

      <th>
        <a title="Click to sort by TWEET COUNT" href="showtweet.php?sort_element=t_count&startrow=<?php echo $startrow; ?>&sort_type=<?php echo ($_REQUEST["sort_element"] == "t_count"  && $_REQUEST["sort_type"] == "asc") ? "desc" : "asc"; ?>">TWEET COUNT
        <?php if ($_REQUEST["sort_element"] == "t_count" ) {  if($_REQUEST["sort_type"] == "desc" ) { ?>
        <img class="sorting" src="img/arrowtop.png" alt="asc" style="margin-bottom: 3px;">
        <?php } else { ?>
          <img class="sorting" src="img/arrowbottom.png" alt="desc" style="margin-bottom: 3px;"> 
        <?php } } ?>
        </a>
      </th>
    </tr>
    
      <?php 
      // $query = mysql_query($sql);
      $count_records=0;
      if($num>0)
      {
      while($rs = mysql_fetch_array($fetch) ) {
        $count_records++;
      ?>
      <tr>
      <td><?php echo $rs["user_name"]; ?></td>
       <td><?php date_default_timezone_set('Asia/Kolkata'); 
       echo date('M j Y g:i A',$rs["last_tweet_time"]); ?></td>
        <td><?php echo $rs["t_count"]; ?></td>
      </tr>
      <?php } }?>
    </table>
    </div>
    <?php
        $total_rows=mysql_num_rows(mysql_query("SELECT * FROM users"));
        $total_tweets=mysql_fetch_assoc(mysql_query("SELECT SUM(t_count) AS value FROM users"));
        $total_tweets_val=$total_tweets['value'];
       echo $count_records==10?'<a href="'.$_SERVER['PHP_SELF'].'?sort_element='.$_GET['sort_element'].'&startrow='.($startrow+10).'&sort_type='.$_GET['sort_type'].'"><button id="next">NEXT</button></a>':'<button style="display: none;">NEXT</button>';
        //only print a "Previous" link if a "Next" was clicked
    $prev = $startrow - 10;
    if ($prev >= 0){
    echo '<a href="'.$_SERVER['PHP_SELF'].'?sort_element='.$_GET['sort_element'].'&startrow='.$prev.'&sort_type='.$_GET['sort_type'].'"><button id="prev">PREVIOUS</button></a>';
    }
    echo '<span style="float:right; padding-right:10%; font-size:18px; margin:10px;">TOTAL CONTRIBUTORS : '.$total_rows.'</span> <span style="float:right;font-size:18px; margin:10px;">TOTAL TWEETS : '.$total_tweets_val.' ,</span>';
  ?>
  
</div>
</body>
</html>