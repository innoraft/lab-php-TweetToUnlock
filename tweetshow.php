<?php 
include "dbconnect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>eco tweet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="css/vendor/font-awesome.min.css" type="text/css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
    <link href="css/jquery.bdt.css" type="text/css" rel="stylesheet">
    <link href="css/styletable.css" type="text/css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
            <div class="box clearfix">
            <h3>CONTRIBUTORS AND THEIR TWEETS</h3>
            <p>Easily turn your tables into datatables.</p>

            <table class="table table-hover" id="bootstrap-table">
                <thead>
                <tr>
                    <th>USER ID</th>
                    <th>TWEET COUNT</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    $sql_query= mysql_query("SELECT * FROM users");
                    while($fetch_row= mysql_fetch_array($sql_query))
                    {
                    echo "<tr>";
                    echo"<td>$fetch_row[0]</td>";
                    echo"<td>$fetch_row[1]</td>";
                    echo"</tr>";
                    }
                ?>
                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>

<script src="http://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/jquery.sortelements.js" type="text/javascript"></script>
<script src="js/jquery.bdt.min.js" type="text/javascript"></script>
<script>
    $(document).ready( function () {
        $('#bootstrap-table').bdt({
            showSearchForm: true,
            showEntriesPerPageField: true
        });
    });
</script>
</body>
</html>