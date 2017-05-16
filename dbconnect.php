<?php
include "variable_credentials.php";
$con = mysql_connect($servername,$username,$password);
mysql_select_db($dbname,$con);
?>