<?php
include "dbconnect.php";
include "oauthconnect.php";
$user_array = array();
?>

<?php
//--------------fetching the users table from db and storing in array-----------
$fetch_users= mysql_query("SELECT * FROM users");

	while($user_row = mysql_fetch_array($fetch_users)){
	   		$user_array[$user_row['user_id']] = $user_row['t_count'];
		}
//----------------------------end of data fetching from db----------------------

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
			if($user_array[$tweet->user->id] < 5){
				$user_array[$tweet->user->id]= $user_array[$tweet->user->id] + 1;
			}
	}
	else{
		$user_array[$tweet->user->id]=1;
	}
}
//---------------------end of fetching-----------------------
//print_r($user_array);
?>

<?php
//---------------inserting the array values in database---------------
		$truncate_sql= mysql_query("TRUNCATE users");

		$insert_sql= "INSERT INTO users(user_id,t_count) VALUES";
		foreach ($user_array as $u_id=>$t_c) {
		    $insert_sql .= "('".$u_id."', ".$t_c."),";
		}
		$insert_sql = rtrim($insert_sql, "," );
		mysql_query($insert_sql);

		//$tweet_func_value= tweet_func($user_array);
		//$user_func_value= user_func();
		//$donated_func_value= donated_func();

//-------------------end of insertion---------------------

//------------------updating the trees--------------------

$total_users= mysql_num_rows(mysql_query("SELECT * FROM users"));  //total no. of users
$total_tweet_sum= array_sum($user_array);  //total no. of tweets

$total_tree_sql= mysql_query("SELECT * FROM donated_items");
$total_trees_rows= mysql_num_rows($total_tree_sql);		//total trees

$total_trees_to_donate_quotient= $total_tweet_sum/5;	//total trees
$total_trees_to_donate_remainder= $total_tweet_sum%5;	//will be used in UI

$total_tree_division_quotient= floor($total_trees_to_donate_quotient/$total_trees_rows);
$total_tree_division_remainder= ($total_trees_to_donate_quotient)%($total_trees_rows);

$update_tree= mysql_query("UPDATE donated_items SET donated=".$total_tree_division_quotient."");
	$update_tree_division_sql= mysql_query("UPDATE donated_items SET donated= donated + 1 ORDER BY tree_id ASC LIMIT ".$total_tree_division_remainder."");

//ajax call
if(isset($_GET['moreTweetLeft']) && ($_GET['moreTweetLeft']=='yes')){
	$total_users= mysql_num_rows(mysql_query("SELECT * FROM users"));  //total no. of users
	$total_tweet_sum= array_sum($user_array);  //total no. of tweets

	$total_tree_sql= mysql_query("SELECT * FROM donated_items");
	$total_trees_rows= mysql_num_rows($total_tree_sql);		//total trees

	$total_trees_to_donate_quotient= $total_tweet_sum/5;	//total trees donated
	$total_trees_to_donate_remainder= $total_tweet_sum%5;

	$donation_array= array();
	$donation_array[0]= $total_trees_to_donate_remainder;
	$donation_array[1]= $total_users;
	$donation_array[2]= floor($total_trees_to_donate_quotient);
	$donation_array[3]= $total_tweet_sum;
	echo json_encode($donation_array);
}
	?>
