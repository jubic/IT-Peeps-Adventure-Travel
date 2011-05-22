<?php

    include("dbFunctions.php");

    if(isset($_POST)) {
        
        $rname = clean($_POST['rname']);
        $remail = clean($_POST['remail']);
        $rcemail = clean($_POST['rconfirmemail']);
        $rpassword = sha1(clean($_POST['rpass']));
        $rcpassword = sha1(clean($_POST['rconfirmpass']));
        $rnationality = clean($_POST['rnationality']);
        $raddress = clean($_POST['raddress']);
        $rpostal = clean($_POST['rpostal']);
        $rcountry = clean($_POST['rcountry']);
        $rcontact = clean($_POST['rcontact']);

            //Test for duplicate emails
            $duplicate = "SELECT * FROM user WHERE email = '$email'";
            $duplicateResult = mysqli_query($link, $duplicate) or die(mysqli_error());
            $duplicateRows = mysqli_num_rows($duplicateResult);

            if($duplicateRows == 0) {

                //Test to see if email and password tally
                if(($email == $cemail) && ($password == $cpassword)) {
                
                    //Insert into database
                    $register = "INSERT INTO user(password, role, full_name, email, nationality, res_address, postal_code, country, contact_no) VALUES ('".$rpassword."','Member','".$rname."','".$remail."','".$rnationality."','".$raddress."','".$rpostal."', '".$rcountry."', '".$rcontact."')";
                    $registerResult = executeInsertQuery($register);
                
                    if ($registerResult) {

                        $message = '<p>Your new account has been successfully created. You are now ready to <a href="index.php">login</a>.</p>';
                        $message .= '<p><a href="index.php">Home</a>';
                        
                        $emailSubject = "New Member";
                        $emailMsg = "You've just registered with ITPeeps Adventure Travel.";
                        $emailFrom = "From: noreply@localhost";

                        mail($remail, $emailSubject, $emailMsg, $emailFrom);

                    }

                }

                else if ($email != $cemail) {

                    $message = '<p>Your email does not tally</p>';
                    $message .= '<p>Please try again</p>';

                }

                else {

                    $message = '<p>Your password does not tally</p>';
                    $message .= '<p>Please try again';

                }

            }

            else{

                echo "Duplicate emails found in database";

            }
        
        }
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            
            echo $message;
            
        ?>
    </body>
</html>
