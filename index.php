<?php 
// databasee connectivity
$con = mysql_connect('localhost','root','1234');
mysql_select_db('twitter',$con);

include "twitteroauth/twitteroauth.php";

$consumer_key = "nL5Rd0xqnAJ8JLz2M5Aje0Ium";
$consumer_secret = "CRaKId5hj2nUxtW8LAoeaBsadt4uqAX8I3qeHpOnsdpyRWeAFa";
$access_token = "2937099032-WPGL18SyWpMQ21KVV5qFBAf6C8uw7rd1hfZlbx2";
$access_token_secret = "a4YPQAIxpYreLFPsdlARIgRnHUpmqHuLl4pLaiFqnOVZd";

$twitter = new TwitterOAuth($consumer_key,$consumer_secret,$access_token,$access_token_secret);

// fetching the tweets from twitter

$tweets = $twitter->get('https://api.twitter.com/1.1/search/tweets.json?q=%23saveearth&since_id=847668399245148161&result_type=recent&count=100');
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Twitter API SEARCH</title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>

<?php foreach ($tweets->statuses as $key => $tweet) { 
 
 $date = strtotime($tweet->created_at);
 if($date>strtotime('03/31/2017')){

 //check duplicate
 $duplicate = mysql_query("SELECT * FROM counter WHERE tweet_id='".mysql_real_escape_string($tweet->id_str)."'");

 if(mysql_num_rows($duplicate)==0){
	 //checking the availability of trees

	 $check_tree_availability1 = mysql_query("SELECT * FROM counter WHERE tree_name='1'");
	 $total_tree1 = mysql_num_rows($check_tree_availability1);
	 
	 $check_tree_availability2 = mysql_query("SELECT * FROM counter WHERE tree_name='2'");
	 $total_tree2 = mysql_num_rows($check_tree_availability2);
	 
	 $check_tree_availability3 = mysql_query("SELECT * FROM counter WHERE tree_name='3'");
	 $total_tree3 = mysql_num_rows($check_tree_availability3);
	
	 $get=mysql_query("SELECT * FROM counter WHERE user_id='".mysql_real_escape_string($tweet->user->id)."'");

if(mysql_num_rows($get)<=5)
{

	 if($total_tree1==0 || $total_tree1%5!=0){
		 
		$insert = mysql_query("INSERT INTO counter(tweet_id,user_id,tree_name) VALUES('".mysql_real_escape_string($tweet->id_str)."','".mysql_real_escape_string($tweet->user->id)."','1')"); 
		
		
	 }
	 else if($total_tree2==0 || $total_tree2%5!=0 || floor($total_tree1/5)>floor($total_tree2/5)){
		 
		 $insert = mysql_query("INSERT INTO counter(tweet_id,user_id,tree_name) VALUES('".mysql_real_escape_string($tweet->id_str)."','".mysql_real_escape_string($tweet->user->id)."','2')"); 
		 
		 
	 }
	 else if($total_tree3==0 || $total_tree3%5!=0 || floor($total_tree2/5)>floor($total_tree3/5)){
		 
		 $insert = mysql_query("INSERT INTO counter(tweet_id,user_id,tree_name) VALUES('".mysql_real_escape_string($tweet->id_str)."','".mysql_real_escape_string($tweet->user->id)."','3')");
		 
	 }
	 else{ 
	 
		 $insert = mysql_query("INSERT INTO counter(tweet_id,user_id,tree_name) VALUES('".mysql_real_escape_string($tweet->id_str)."','".mysql_real_escape_string($tweet->user->id)."','1')"); 
	 	 }
		 
 	   }
 	}
	}
} 
?>
 
<div class="container">
<div class="row cover">
	<div class="col-md-4 section">
	
	<?php $get_tree1 = mysql_query("SELECT * FROM counter WHERE tree_name='1'"); ?>
	
		<h1>Tree1</h1>
		<h2>Current Stat: <?php echo (mysql_num_rows($get_tree1)-(floor(mysql_num_rows($get_tree1)/5))*5);?> </h2>
		<h2>Total Filled: <?php echo floor (mysql_num_rows($get_tree1)/5);?></h2>
	</div>
	
	<div class="col-md-4 section">
	
	<?php $get_tree2 = mysql_query("SELECT * FROM counter WHERE tree_name='2'"); ?>
	
		<h1>Tree 2</h1>
		<h2>Current Stat: <?php echo (mysql_num_rows($get_tree2)-(floor(mysql_num_rows($get_tree2)/5))*5);?></h2>
		<h2>Total Filled: <?php echo floor (mysql_num_rows($get_tree2)/5);?></h2>
	</div>
	<div class="col-md-4 section">
	
	<?php $get_tree3 = mysql_query("SELECT * FROM counter WHERE tree_name='3'"); ?>
	
		<h1>Tree 3</h1>
		<h2>Current Stat:<?php echo (mysql_num_rows($get_tree3)-(floor(mysql_num_rows($get_tree3)/5))*5);?></h2>
		<h2>Total Filled: <?php echo floor (mysql_num_rows($get_tree3)/5);?></h2>
	</div>
</div>
<br>
<?php 
$total_rows= mysql_query("SELECT * FROM counter");
?>
<h1>Total Tweets made: <?php echo (mysql_num_rows($total_rows)); ?></h1>
<h1>Total Trees Donated: <?php echo floor(mysql_num_rows($total_rows)/5);?></h1>
</body>
</html>

