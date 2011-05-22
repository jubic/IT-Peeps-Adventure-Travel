<?php

    $detailID = $_GET['id'];

    include 'dbFunctions.php';
    $arrPackageDetails = executeSelectQuery("SELECT * FROM tour_package WHERE id = '$detailID'");

    $name = $arrPackageDetails[0]['name'];
    $description = $arrPackageDetails[0]['description'];
    $location = $arrPackageDetails[0]['location'];
    $image = $arrPackageDetails[0]['image'];

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>ITPeeps Adventure Travel - Package Details</title>
    </head>
    <body>
        <a href="index.php">Back to Index</a>
            <table align="center">
                <tr>
                    <td><img src="packages/<?php echo $image;?>" width="500"/></td>
                    <td><center><b><?php echo $name;?></b><br/><?php echo $location;?></center></td>
                </tr>
                
                <tr>
                    <td colspan="2"><?php echo $description;?></td>
                </tr>
            </table>
    </body>
</html>
