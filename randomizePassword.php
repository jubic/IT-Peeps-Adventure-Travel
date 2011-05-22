<?php

    include ('dbFunctions.php');

    $newPwd = createRandomPassword();

    $email = clean($_POST['email']);

    $updatePwd = "UPDATE user SET password = sha1('$newPwd') WHERE email = '$email'";

    $status = executeUpdateQuery($updatePwd);

    if ($status) {

        //send mail
        $to = $email;
        $subject = "New Password";
        $message = "Hello! Your password has been changed to ".$newPwd;
        $from = "no-reply@localhost";
        $headers = "From: $from";
        mail($to,$subject,$message,$headers);
        $statusMessage = "Mail Sent.";
        $statusMessage = '<meta http-equiv="refresh" content="2;url=index.php">';

    }

    else {

        $statusMessage = "Mail not sent";

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
        echo $statusMessage;
        ?>
    </body>
</html>
