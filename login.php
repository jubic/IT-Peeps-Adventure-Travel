<?php

    include("dbFunctions.php");

    session_start();
    $lemail = clean($_POST['lemail']);
    $lpassword = clean($_POST['lpassword']);

    $_SESSION['lemail'] = $lemail;

    $query = "SELECT id,email,role FROM user WHERE email = '$lemail' AND password = SHA1('$lpassword')";
    //echo $query.'<br>';
    $result = mysqli_query($link, $query) or die (mysqli_error($link));

    $row = mysqli_num_rows($result);

    if ($row == 1)
    {
        $row = mysqli_fetch_array($result);
        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
	$_SESSION['role'] = $row['role'];
        $msg = "You have logged in successfully";
        echo '<meta http-equiv="refresh" content="2;url=index.php">';
    }
    else
    {
        $msg = "Your login has failed, please try again";
    }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <h3>Login</h3>
        <hr/>
        <?php

            echo $msg;

        ?>
    </body>
</html>
