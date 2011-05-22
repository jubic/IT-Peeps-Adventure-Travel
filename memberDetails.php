<?php

    $userID = $_GET['id'];

    include 'dbFunctions.php';
    $arrMemberDetails = executeSelectQuery("SELECT * FROM user WHERE id = '$userID'");

    $name = $arrMemberDetails[0]['full_name'];
    $email = $arrMemberDetails[0]['email'];
    $contact = $arrMemberDetails[0]['contact_no'];
    $address = $arrMemberDetails[0]['res_address'];
    $country = $arrMemberDetails[0]['country'];

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Member Details</title>
    </head>
    <body>
        <table border="1">
            <tr>
                <th>Name</th>
                <th><?php echo $name;?></th>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo $email;?></td>
            </tr>
            <tr>
                <td>Contact No.</td>
                <td><?php echo $contact;?></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><?php echo $address;?></td>
            </tr>
            <tr>
                <td>Country</td>
                <td><?php echo $country;?></td>
            </tr>
        </table>
    </body>
</html>
