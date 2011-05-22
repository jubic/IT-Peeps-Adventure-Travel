<?php

    include ('dbFunctions.php');
    session_start();

    if(isset($_SESSION['lemail'])) {

        $email = $_SESSION['lemail'];
        $role = $_SESSION['role'];

    }
    else {

        // Not logged in

    }

    $arrMembers = executeSelectQuery("SELECT * FROM user");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>View Members List</title>
    </head>
    <body>
        <a href="index.php">Home</a> | <a href="add.php">Add Travel Packages</a> | <a href="members.php">View Members</a> | <a href="logout.php">Log Out</a>
        <hr/>
        <h2>Members</h2>
        <table border="1">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Country</th>
                <th>Details</th>
            </tr>
        <?php
                    for($countMembers=0;$countMembers<count($arrMembers);$countMembers++) {

                        $id = $arrMembers[$countMembers]['id'];
                        $name = $arrMembers[$countMembers]['full_name'];
                        $email = $arrMembers[$countMembers]['email'];
                        $country = $arrMembers[$countMembers]['country'];
        ?>
                        <tr>
                            <td><?php echo $name;?></td>
                            <td><?php echo $email;?></td>
                            <td><?php echo $country;?></td>
                            <td><a href="memberDetails.php?id=<?php echo $id;?>">More Info</a></td>
                        </tr>
        <?php
            }
        ?>
                    </table>
    </body>
</html>
