<?php 
include "dbconnect.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<form method='get'>
<?php
if (!isset($_GET['startrow']) or !is_numeric($_GET['startrow'])) {
  $startrow = 0;
//otherwise we take the value from the URL
} else {
  $startrow = (int)$_GET['startrow'];
}
//this part goes after the checking of the $_GET var
$fetch = mysql_query("SELECT * FROM users LIMIT $startrow, 10")or
die(mysql_error());
   $num=mysql_num_rows($fetch);
        if($num>0)
        {
        echo "<table border=2>";
        echo "<tr><td>USER ID</td><td>TWEET COUNT</td></tr>";
        for($i=0;$i<$num;$i++)
        {
        $row=mysql_fetch_row($fetch);
        echo "<tr>";
        echo"<td>$row[0]</td>";
        echo"<td>$row[1]</td>";
        echo"</tr>";
        }
        echo"</table>";
        }

echo '<a href="'.$_SERVER['PHP_SELF'].'?startrow='.($startrow+10).'">Next</a>';

$prev = $startrow - 10;

//only print a "Previous" link if a "Next" was clicked
if ($prev >= 0)
    echo '<a href="'.$_SERVER['PHP_SELF'].'?startrow='.$prev.'">Previous</a>';
?>
</form>
</body>
</html>
