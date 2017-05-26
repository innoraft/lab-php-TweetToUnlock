<?php
include "dbconnect.php";
include "oauthconnect.php";
include "variable_credentials.php";
$user_array = array();
?>

<?php
//--------------fetching the users table from db and storing in array-----------
$fetch_users= mysql_query("SELECT * FROM users");

	while($user_row = mysql_fetch_array($fetch_users)){
	   		$user_array[$user_row['user_id']][0] = $user_row['user_name'];
	   		$user_array[$user_row['user_id']][1] = $user_row['last_tweet_time'];
	   		$user_array[$user_row['user_id']][2] = $user_row['t_count'];
		}
//----------------------------end of data fetching from db----------------------
// print_r($user_array);
// exit();
//-------------fetching the tweets from twitter and updating the user array----------------
foreach($tweets->statuses as $key=>$tweet)
{
	//--------------checking the since_id and updating it---------------
	if($key==0)	{
		if($since_id==0){
			$insert_last_id=mysql_query("INSERT INTO lasttweet (last_id) VALUES('".$tweet->id_str."')");
		}
		else{
		$update_last_id= mysql_query("UPDATE lasttweet SET last_id='".$tweet->id_str."'");
		}
	}
	//-------------------checking the user limitations-------------------
	if(array_key_exists($tweet->user->id,$user_array)){
			if($user_array[$tweet->user->id][2] < $user_tweet_allowance){
				$user_array[$tweet->user->id][0]= $tweet->user->screen_name;
				$user_array[$tweet->user->id][1]= strtotime($tweet->created_at);
				$user_array[$tweet->user->id][2]= $user_array[$tweet->user->id][2] + 1;
			}
	}
	else{
		$user_array[$tweet->user->id][0]= $tweet->user->screen_name;
		$user_array[$tweet->user->id][1]= strtotime($tweet->created_at);
		$user_array[$tweet->user->id][2]= 1;
	}
}
//---------------------end of fetching-----------------------
// print_r($user_array);
// exit();
?>

<?php
//---------------inserting the array values in database---------------
		$truncate_sql= mysql_query("TRUNCATE users");

		$insert_sql= "INSERT INTO users(user_id,user_name,last_tweet_time,t_count) VALUES";
		foreach ($user_array as $key=>$value) {
		    $insert_sql .= "('".$key."', '".$value[0]."', '".$value[1]."', ".$value[2]."),";
		}
		// print_r($insert_sql);
		// exit();
		$insert_sql = rtrim($insert_sql, "," );
		mysql_query($insert_sql);

//-------------------end of insertion---------------------

//------------------updating the trees--------------------

$total_users= mysql_num_rows(mysql_query("SELECT * FROM users"));  //total no. of users
$total_tweet_sum_sql= mysql_query("SELECT SUM(t_count) AS val FROM users"); 
	$total_tweet_sum_arr= mysql_fetch_assoc($total_tweet_sum_sql);
	$total_tweet_sum= $total_tweet_sum_arr['val'];  //total no. of tweets

$total_tree_sql= mysql_query("SELECT * FROM donated_items");
$total_trees_rows= mysql_num_rows($total_tree_sql);		//total trees

$total_trees_to_donate_quotient= $total_tweet_sum/$tweet_req_to_unlock;	//total trees
$total_trees_to_donate_remainder= $total_tweet_sum%$tweet_req_to_unlock;	//will be used in UI

$total_tree_division_quotient= floor($total_trees_to_donate_quotient/$total_trees_rows);
$total_tree_division_remainder= ($total_trees_to_donate_quotient)%($total_trees_rows);

$update_tree= mysql_query("UPDATE donated_items SET donated=".$total_tree_division_quotient."");
	$update_tree_division_sql= mysql_query("UPDATE donated_items SET donated= donated + 1 ORDER BY item_id ASC LIMIT ".$total_tree_division_remainder."");

//ajax call
// if(isset($_GET['moreTweetLeft']) && ($_GET['moreTweetLeft']=='yes')){
// 	$total_users= mysql_num_rows(mysql_query("SELECT * FROM users"));  //total no. of users
// 	$total_tweet_sum= array_sum($user_array);  //total no. of tweets

// 	$total_tree_sql= mysql_query("SELECT * FROM donated_items");
// 	$total_trees_rows= mysql_num_rows($total_tree_sql);		//total trees

// 	$total_trees_to_donate_quotient= $total_tweet_sum/$tweet_req_to_unlock;	//total trees donated
// 	$total_trees_to_donate_remainder= $total_tweet_sum%$tweet_req_to_unlock;

// 	$donation_array= array();
// 	$donation_array[0]= $total_trees_to_donate_remainder;
// 	$donation_array[1]= $total_users;
// 	$donation_array[2]= floor($total_trees_to_donate_quotient);
// 	$donation_array[3]= $total_tweet_sum;
// 	echo json_encode($donation_array);
// }

// if(isset($_GET['DonationUpdate']) && ($_GET['DonationUpdate']=='yes')){
	
// 	$donated_array= mysql_query("SELECT * FROM donated_items");

// 	while($donated_row = mysql_fetch_array($donated_array)){
// 	   		$donation[]= $donated_row['donated'];
// 		}
// 		echo json_encode($donation);
// 	}
	?>
