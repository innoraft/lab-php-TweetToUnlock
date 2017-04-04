<?php 
$con = mysql_connect('localhost','root','1234');
mysql_select_db('twitter',$con);

include "twitteroauth/twitteroauth.php";

$consumer_key = "nL5Rd0xqnAJ8JLz2M5Aje0Ium";
$consumer_secret = "CRaKId5hj2nUxtW8LAoeaBsadt4uqAX8I3qeHpOnsdpyRWeAFa";
$access_token = "2937099032-WPGL18SyWpMQ21KVV5qFBAf6C8uw7rd1hfZlbx2";
$access_token_secret = "a4YPQAIxpYreLFPsdlARIgRnHUpmqHuLl4pLaiFqnOVZd";

$twitter = new TwitterOAuth($consumer_key,$consumer_secret,$access_token,$access_token_secret);

$tweets = $twitter->get('https://api.twitter.com/1.1/search/tweets.json?q=%23saveearth&result_type=recent&count=50');
//$tweets = $twitter->get('https://api.twitter.com/1.1/search/tweets.json?q=%23saveearth&since_id=847668399245148161&result_type=recent');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Twitter API SEARCH</title>
</head>
<style>
.row{
	    float: left;
    margin: 15px;
}
.container{
	
}
</style>
<body>
<?php foreach ($tweets->statuses as $key => $tweet) { 
 //echo $tweet->user->id; die();
 //var_dump($tweet); die();
 
 $date = strtotime($tweet->created_at);
 if($date>strtotime('03/31/2017') && $tweet->retweeted==false):

// get last record 
//$get_last = mysql_query("SELECT * FROM counter ORDER BY DESC LIMIT 1");
//$result_last = mysql_fetch_assoc($get_last);

 //check duplicate
 $duplicate = mysql_query("SELECT * FROM counter WHERE tweet_id='".mysql_real_escape_string($tweet->id_str)."'");
 
 if(mysql_num_rows($duplicate)==0){
	 //check for user having moer than 5 tweet
	 $check_user = mysql_query("SELECT * FROM counter WHERE user_id='".mysql_real_escape_string($tweet->user->id)."'");
	 
	 if(mysql_num_rows($check_user)<=5){
	 $limit_tree = 5; // set tree limit
	 
	 //check for flag to start with
	 $get_flag = mysql_query("SELECT * FROM counter WHERE flag='1'");

	 if(mysql_num_rows($get_flag)>0){
		 $result_flag = mysql_fetch_assoc($get_flag);
		 
		 //check this tree donation history
		 $get_tree_info = mysql_query("SELECT * FROM counter WHERE tree_name='".mysql_real_escape_string($result_flag['tree_name'])."'");
		 $flag_tree_count = mysql_num_rows($get_tree_info);
		 
		 if($flag_tree_count==0 || $flag_tree_count%5!=0)   //check if tree is filled
		 {
			 $update_flag = mysql_query("UPDATE counter SET flag='0'"); // reset flag
			 
			 $insert = mysql_query("INSERT INTO counter(user_id,tweet_id,tree_name,flag) VALUES('".mysql_real_escape_string($tweet->user->id)."','".mysql_real_escape_string($tweet->id_str)."','".mysql_real_escape_string($result_flag['tree_name'])."','1')");
			 
		 }
		 else{ 
		 //$current_name = $result_flag['tree_name'];
			 $result_flag['tree_name'] +=1;
			if($result_flag['tree_name']<=$limit_tree){
					$update_flag = mysql_query("UPDATE counter SET flag='0'"); // reset flag
					
					$insert = mysql_query("INSERT INTO counter(user_id,tweet_id,tree_name,flag) VALUES('".mysql_real_escape_string($tweet->user->id)."','".mysql_real_escape_string($tweet->id_str)."','".mysql_real_escape_string($result_flag['tree_name'])."','1')");
					
			}else{ // again restart from tree 1
				$update_flag = mysql_query("UPDATE counter SET flag='0'"); // reset flag
					$insert = mysql_query("INSERT INTO counter(user_id,tweet_id,tree_name,flag') VALUES('".mysql_real_escape_string($tweet->user->id)."','".mysql_real_escape_string($tweet->id_str)."','1','1')");
					
			}
		 }
	 }

	 else{ // db is empty going for first 
		 $insert = mysql_query("INSERT INTO counter(user_id,tweet_id,tree_name,flag) VALUES('".mysql_real_escape_string($tweet->user->id)."','".mysql_real_escape_string($tweet->id_str)."','1','1')");
			 
		 }
 }}
	 //assign for tree
	/* $check_tree_availability1 = mysql_query("SELECT * FROM counter WHERE tree_name='1'");
	 $total_tree1 = mysql_num_rows($check_tree_availability1);
	 
	 $check_tree_availability2 = mysql_query("SELECT * FROM counter WHERE tree_name='2'");
	 $total_tree2 = mysql_num_rows($check_tree_availability2);
	 
	 $check_tree_availability3 = mysql_query("SELECT * FROM counter WHERE tree_name='3'");
	 $total_tree3 = mysql_num_rows($check_tree_availability3);
	
	 
	 if($total_tree1==0 || $total_tree1%5!=0){
		 
		$insert = mysql_query("INSERT INTO counter(tweet_id,tweet,tree_name) VALUES('".mysql_real_escape_string($tweet->id_str)."','".mysql_real_escape_string($tweet->text)."','1')"); 
		
		
	 }else if($total_tree2==0 || $total_tree2%5!=0 || floor($total_tree1/5)>floor($total_tree2/5)){
		 
		 $insert = mysql_query("INSERT INTO counter(tweet_id,tweet,tree_name) VALUES('".mysql_real_escape_string($tweet->id_str)."','".mysql_real_escape_string($tweet->text)."','2')"); 
		 
		 
	 }else if($total_tree3==0 || $total_tree3%5!=0 || floor($total_tree2/5)>floor($total_tree3/5)){
		 
		 $insert = mysql_query("INSERT INTO counter(tweet_id,tweet,tree_name) VALUES('".mysql_real_escape_string($tweet->id_str)."','".mysql_real_escape_string($tweet->text)."','3')");
		 
	 }else{ 
	 
		 $insert = mysql_query("INSERT INTO counter(tweet_id,tweet,tree_name) VALUES('".mysql_real_escape_string($tweet->id_str)."','".mysql_real_escape_string($tweet->text)."','1')"); 
		 
	 }
		 
 }
	*/
 
?>

<?php 
	endif;
} ?>
 
<div class="container">
	<div class="row">
	
	<?php $get_tree1 = mysql_query("SELECT * FROM counter WHERE tree_name='1'"); ?>
	
		<h3>Tree1</h3>
		<h5>Current Stat-<small><?php echo (mysql_num_rows($get_tree1)-(floor(mysql_num_rows($get_tree1)/5))*5);?></small></h5>
		<h4>Total Filled - <small><?php echo floor (mysql_num_rows($get_tree1)/5);?></small></h4>
	</div>
	
	<div class="row">
	
	<?php $get_tree2 = mysql_query("SELECT * FROM counter WHERE tree_name='2'"); ?>
	
		<h3>Tree2</h3>
		<h5>Current Stat-<small><?php echo (mysql_num_rows($get_tree2)-(floor(mysql_num_rows($get_tree2)/5))*5);?></small></h5>
		<h4>Total Filled - <small><?php echo floor (mysql_num_rows($get_tree2)/5);?></small></h4>
	</div>
	<div class="row">
	
	<?php $get_tree3 = mysql_query("SELECT * FROM counter WHERE tree_name='3'"); ?>
	
		<h3>Tree3</h3>
		<h5>Current Stat-<small><?php echo (mysql_num_rows($get_tree3)-(floor(mysql_num_rows($get_tree3)/5))*5);?></small></h5>
		<h4>Total Filled - <small><?php echo floor (mysql_num_rows($get_tree3)/5);?></small></h4>
	</div>

	<div class="row">
	
	<?php $get_tree4 = mysql_query("SELECT * FROM counter WHERE tree_name='4'"); ?>
	
		<h3>Tree4</h3>
		<h5>Current Stat-<small><?php echo (mysql_num_rows($get_tree4)-(floor(mysql_num_rows($get_tree4)/5))*5);?></small></h5>
		<h4>Total Filled - <small><?php echo floor (mysql_num_rows($get_tree4)/5);?></small></h4>
	</div>

	<div class="row">
	
	<?php $get_tree5 = mysql_query("SELECT * FROM counter WHERE tree_name='3'"); ?>
	
		<h3>Tree5</h3>
		<h5>Current Stat-<small><?php echo (mysql_num_rows($get_tree5)-(floor(mysql_num_rows($get_tree5)/5))*5);?></small></h5>
		<h4>Total Filled - <small><?php echo floor (mysql_num_rows($get_tree5)/5);?></small></h4>
	</div>
</div>
</body>
</html>

