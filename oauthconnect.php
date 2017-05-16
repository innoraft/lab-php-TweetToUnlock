<?php
include "dbconnect.php";
include "variable_credentials.php";
include "twitteroauth/twitteroauth.php";

$twitter = new TwitterOAuth($consumer_key,$consumer_secret,$access_token,$access_token_secret);

$get_sql=mysql_query("SELECT last_id from lasttweet WHERE id= 1");
$get_last_id=mysql_fetch_assoc($get_sql);
$last_tweet_num = mysql_num_rows($get_sql);
$since_id= $last_tweet_num == 0 ? 0 : $get_last_id['last_id'];

$tweets = $twitter->get('https://api.twitter.com/1.1/search/tweets.json?q=%23'.$hashtag.'&since_id='.$since_id.'&result_type=recent&count=100');
?>