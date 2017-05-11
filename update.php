<?php
include "dbconnect.php";
session_start();
?>
<?php 

if(isset($_POST['submit'])){
	
	$tree_id= $_POST['hidden_tree'];
	$name= $_POST['name'];
	$desc= $_POST['description'];
	$image= $_FILES['image_path']['name'];
	$target= "img/". basename($_FILES['image_path']['name']);
	if(!empty($_FILES['image_path']['name']))
	{
		$update_query= mysql_query("UPDATE donated_items SET name='".$name."', description='".$desc."', image= '".$target."' WHERE tree_id=".$tree_id."");
		if($update_query==1)
		{	
			move_uploaded_file($_FILES['image_path']['tmp_name'],$target);
			header('location:showtree.php?msg=update_successful');
		}
		else{
			header('location:showtree.php?msg=update_unsuccessful');	
		}
	}
	else{
		$update_query= mysql_query("UPDATE donated_items SET name='".$name."',description='".$desc."' WHERE tree_id=".$tree_id."");
		if($update_query==1)
		{
			header('location:showtree.php?msg=update_successful');
		}
		else{
			header('location:showtree.php?msg=update_unsuccessful');	
		}
	}
}
?>