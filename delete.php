<?php
include "dbconnect.php";
session_start();
?>
<?php
if(isset($_POST['delete']))
{
	
	$tree_name_delete= $_POST['tree_name'];
	$delete_query= mysql_query("DELETE FROM trees WHERE name='".$tree_name_delete."'");
	header('location:showtree.php');
}

?>