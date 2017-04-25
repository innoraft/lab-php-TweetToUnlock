<?php
include "dbconnect.php";
session_start();
?>
<?php
if(isset($_GET['tree_id']))
{
	$tree_name_delete= $_GET['tree_id'];
	$delete_query= mysql_query("DELETE FROM trees WHERE id=".$tree_name_delete."");
	header('location:showtree.php');
}
?>