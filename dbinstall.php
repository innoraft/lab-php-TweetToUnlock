<?php
include "variable_credentials.php";
$dbcon=mysql_connect($servername,$username,$password) or die(mysql_error()); //change the credentials
mysql_query("CREATE DATABASE IF NOT EXISTS ".$dbname."") or die(mysql_error());  //change db name
mysql_select_db($dbname,$dbcon) or die(mysql_error());
mysql_query("CREATE TABLE IF NOT EXISTS users(user_id TEXT NOT NULL, t_count INT(2) NOT NULL)") or die(mysql_error()); //change the table names
mysql_query("CREATE TABLE IF NOT EXISTS donated_items(item_id INT(11) NOT NULL, name TEXT NOT NULL, description TEXT, donated INT(11) DEFAULT 0, image VARCHAR(255) NOT NULL)") or die(mysql_error());
mysql_query("CREATE TABLE IF NOT EXISTS lasttweet(id INT(2) NOT NULL AUTO_INCREMENT, last_id TEXT, PRIMARY KEY(id))") or die(mysql_error());
mysql_query("CREATE TABLE IF NOT EXISTS admin(email_id VARCHAR(255) NOT NULL, password VARCHAR(50) NOT NULL, PRIMARY KEY(email_id))") or die(mysql_error());
mysql_query("INSERT INTO admin(email_id,password) VALUES('admin@admin.com','admin123')") or die(mysql_error());
header("Location: login.php");
?>
