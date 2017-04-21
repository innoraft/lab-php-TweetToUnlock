<?php
include "dbconnect.php";
include "twitteroauth/twitteroauth.php";

$consumer_key = "nL5Rd0xqnAJ8JLz2M5Aje0Ium";
$consumer_secret = "CRaKId5hj2nUxtW8LAoeaBsadt4uqAX8I3qeHpOnsdpyRWeAFa";
$access_token = "2937099032-WPGL18SyWpMQ21KVV5qFBAf6C8uw7rd1hfZlbx2";
$access_token_secret = "a4YPQAIxpYreLFPsdlARIgRnHUpmqHuLl4pLaiFqnOVZd";

$twitter = new TwitterOAuth($consumer_key,$consumer_secret,$access_token,$access_token_secret);

$get_sql=mysql_query("SELECT last_id from lasttweet WHERE id= 1");
$get_last_id=mysql_fetch_assoc($get_sql);
$last_tweet_num = mysql_num_rows($get_sql);
$since_id= $last_tweet_num == 0 ? 0 : $get_last_id['last_id'];

$tweets = $twitter->get('https://api.twitter.com/1.1/search/tweets.json?q=%23saveearth&since_id='.$since_id.'&result_type=recent&count=100');
?>