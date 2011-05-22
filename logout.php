<?php
    session_start();
    if(isset($_SESSION['lemail'])){
        $_SESSION = array();
        session_destroy();
        $message = '<p>You have logged out.<br /><meta http-equiv="refresh" content="1;url=index.php">';
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
