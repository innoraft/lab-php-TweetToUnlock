<?php
include "dbconnect.php";
session_start();
if(isset($_POST['submit']))
{
    $name= $_POST['name'];
    $desc= $_POST['description'];

    $file = $_FILES['image']['tmp_name']; 
$source_properties = getimagesize($file);
$image_type = $source_properties[2]; 
if( $image_type == IMAGETYPE_JPEG ) {   
$image_resource_id = imagecreatefromjpeg($file);  
$target_layer = fn_resize($image_resource_id,$source_properties[0],$source_properties[1]);
$image_path = "img/".$_FILES['image']['name']."_".rand().".jpg";
imagejpeg($target_layer,$image_path);
}
elseif( $image_type == IMAGETYPE_GIF )  {  
$image_resource_id = imagecreatefromgif($file);
$target_layer = fn_resize($image_resource_id,$source_properties[0],$source_properties[1]);
$image_path = "img/".$_FILES['image']['name']."_".rand().".gif";
imagegif($target_layer,$image_path);
}
elseif( $image_type == IMAGETYPE_PNG ) {
$image_resource_id = imagecreatefrompng($file); 
$target_layer = fn_resize($image_resource_id,$source_properties[0],$source_properties[1]);
$image_path = "img/".$_FILES['image']['name']."_".rand().".png";
imagepng($target_layer,$image_path);
}

    $sql_query= mysql_query("INSERT INTO donated_items(name,description,added_by,image) VALUES('".$name."','".$desc."','".$_SESSION['name']."','".$image_path."')");

    $message="ADDED SUCCESSFULLY!";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header('location:showtree.php');
}

function fn_resize($image_resource_id,$width,$height) {
$target_width =360;
$target_height =360;
$target_layer=imagecreatetruecolor($target_width,$target_height);
imagecopyresampled($target_layer,$image_resource_id,0,0,0,0,$target_width,$target_height, $width,$height);
return $target_layer;
}
?>