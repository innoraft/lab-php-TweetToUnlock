<?php
include "dbconnect.php";
session_start();
?>
<?php 

if(isset($_POST['submit'])){
	
	$item_id= $_POST['hidden_tree'];
	$name= $_POST['name'];
	$desc= $_POST['description'];

	if(!empty($_FILES['image_path']['name']))
	{

		$file = $_FILES['image_path']['tmp_name']; 
	$source_properties = getimagesize($file);
	$image_type = $source_properties[2]; 
	if( $image_type == IMAGETYPE_JPEG ) {   
	$image_resource_id = imagecreatefromjpeg($file);  
	$target_layer = fn_resize($image_resource_id,$source_properties[0],$source_properties[1]);
	$image_path = "img/".$_FILES['image_path']['name']."_".rand().".jpg";
	imagejpeg($target_layer,$image_path);
	}
	elseif( $image_type == IMAGETYPE_GIF )  {  
	$image_resource_id = imagecreatefromgif($file);
	$target_layer = fn_resize($image_resource_id,$source_properties[0],$source_properties[1]);
	$image_path = "img/".$_FILES['image_path']['name']."_".rand().".gif";
	imagegif($target_layer,$image_path);
	}
	elseif( $image_type == IMAGETYPE_PNG ) {
	$image_resource_id = imagecreatefrompng($file); 
	$target_layer = fn_resize($image_resource_id,$source_properties[0],$source_properties[1]);
	$image_path = "img/".$_FILES['image_path']['name']."_".rand().".png";
	imagepng($target_layer,$image_path);
	}


		$update_query= mysql_query("UPDATE donated_items SET name='".$name."', description='".$desc."', image= '".$image_path."' WHERE item_id=".$item_id."");
		if($update_query==1)
		{	
			header('location:showtree.php?msg=update_successful');
		}
		else{
			header('location:showtree.php?msg=update_unsuccessful');	
		}
	}
	else{
		$update_query= mysql_query("UPDATE donated_items SET name='".$name."',description='".$desc."' WHERE item_id=".$item_id."");
		if($update_query==1)
		{
			header('location:showtree.php?msg=update_successful');
		}
		else{
			header('location:showtree.php?msg=update_unsuccessful');	
		}
	}
}

function fn_resize($image_resource_id,$width,$height) {
$target_width =360;
$target_height =360;
$target_layer=imagecreatetruecolor($target_width,$target_height);
imagecopyresampled($target_layer,$image_resource_id,0,0,0,0,$target_width,$target_height, $width,$height);
return $target_layer;
}

?>