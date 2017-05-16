<?php
include "dbconnect.php";
$donation= array();
?>

<?php
if(isset($_GET['DonationUpdate']) && ($_GET['DonationUpdate']=='yes')){
	
	$donated_sql= mysql_query("SELECT * FROM donated_items");

	while($donated_row = mysql_fetch_array($donated_sql)){
	   		$donation[]= $donated_row['donated'];
		}
		echo json_encode($donation);
	}

?>