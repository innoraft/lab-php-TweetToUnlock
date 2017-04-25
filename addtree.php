<?php
include "dbconnect.php";
session_start();
if(isset($_POST['submit']))
{
	 $target= "img/". basename($_FILES['image']['name']);
    // $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    //$image_upload= $_FILES['image']['name'];
    $name= $_POST['name'];
    $desc= $_POST['description'];

    $sql_query= mysql_query("INSERT INTO trees (name,description,image) VALUES('".$name."','".$desc."','".$target."')");

    move_uploaded_file($_FILES['image']['tmp_name'], $target);
    $message="ADDED SUCCESSFULLY!";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header('location:showtree.php');
}


?>