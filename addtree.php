<?php
include "dbconnect.php";
session_start();
if(isset($_POST['submit']))
{
    $target= "img/". basename($_FILES['image']['name']);
    // $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $name= $_POST['name'];
    $desc= $_POST['description'];
    // $uploadOk = 1;

    
    // list($width,$height)=getimagesize($uploadedfile);
    // $newwidth= 360;
    // $newheight= 360;
    // $tmp=imagecreatetruecolor($newwidth,$newheight);
    // imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

    // if ($_FILES["image"]["size"] > 5000000) {
    // header('location: profile.php?msg=SORRY FILE SIZE IS TOO LARGE');
    // $uploadOk = 0;
    // }

    // if($extension=="jpg" || $extension=="jpeg" )
    // {
    // $uploadedfile = $_FILES['image']['tmp_name'];
    // $src = imagecreatefromjpeg($uploadedfile);

    // }
    // else if($extension=="png")
    // {
    // $uploadedfile = $_FILES['image']['tmp_name'];
    // $src = imagecreatefrompng($uploadedfile);

    // }
    // else 
    // {
    // $src = imagecreatefromgif($uploadedfile);
    // }

//     if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
// && $imageFileType != "gif" ) {
//      header('location: profile.php?msg=SORRY ONLY JPG,JPEG,GIF & PNG FILES ARE ALLOWED');
//     $uploadOk = 0;
//     }
    //$image_upload= $_FILES['image']['name'];
   // else{

    $sql_query= mysql_query("INSERT INTO donated_items(name,description,added_by,image) VALUES('".$name."','".$desc."','".$_SESSION['name']."','".$target."')");

    move_uploaded_file($_FILES['image']['tmp_name'], $target);
    $message="ADDED SUCCESSFULLY!";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header('location:showtree.php');

// }
}
?>