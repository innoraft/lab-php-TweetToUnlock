<?php
// header("Access-Control-Allow-Origin: *");
include "dbconnect.php";
$donation_array= array();
$donation= array();
?>

<?php
//ajax call

if(isset($_GET['moreTweetLeft']) && ($_GET['moreTweetLeft']=='yes')){
	
	$total_tweet_sum= 0;
	$total_users= 0;
	$total_tweet_sum_sql= 0;
	$total_trees_to_donate_quotient= 0;
	$total_trees_to_donate_remainder= 0;

	$total_users= mysql_num_rows(mysql_query("SELECT * FROM users"));  //total no. of users
	$total_tweet_sum_sql= mysql_query("SELECT SUM(t_count) AS val FROM users"); //total tweets
	$total_tweet_sum_arr= mysql_fetch_assoc($total_tweet_sum_sql);
	$total_tweet_sum= $total_tweet_sum_arr['val'];

	$total_tree_sql= mysql_query("SELECT * FROM donated_items");
	$total_trees_rows= mysql_num_rows($total_tree_sql);		//total trees

	$total_trees_to_donate_quotient= $total_tweet_sum/5;	//total trees donated
	$total_trees_to_donate_remainder= $total_tweet_sum%5;

	$donation_array[0]= $total_trees_to_donate_remainder;
	$donation_array[1]= $total_users;
	$donation_array[2]= floor($total_trees_to_donate_quotient);
	$donation_array[3]= $total_tweet_sum;
	echo json_encode($donation_array);

}


?>