<?php
include "dbconnect.php";
session_start();
?>
<?php
if(isset($_GET['item_id']))
{
	$tree_name_delete= $_GET['item_id'];
	$delete_query= mysql_query("DELETE FROM donated_items WHERE item_id=".$tree_name_delete."");
	header('location:showtree.php');
}
?>