<?php
 	mysql_connect("localhost", "root", "1234") or die(mysql_error());
    mysql_query("CREATE DATABASE IF NOT EXISTS twitter") or die(mysql_error());
    mysql_select_db("twitter") or die(mysql_error());
    mysql_query("CREATE TABLE IF NOT EXISTS users(user_id TEXT, t_count INT(2))") or die(mysql_error());
    mysql_query("CREATE TABLE IF NOT EXISTS donated_items(tree_id INT(11), name TEXT, donated INT(11) DEFAULT (0), image VARCHAR(255))") or die(mysql_error());
    mysql_query("CREATE TABLE IF NOT EXISTS lasttweet(id INT(2) NOT NULL AUTO_INCREMENT, last_id TEXT,)") or die(mysql_error());
        // header("Location: index.php");
?>