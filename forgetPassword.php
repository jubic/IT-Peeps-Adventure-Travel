<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>ITPeeps Adventure Travel - Forget Password</title>
        <script src="validate.js" type="text/javascript"></script>
    </head>
    <body>
        <form action="randomizePassword.php" method="post">
            <table>
                    <tr>
                            <td>Email</td>
                            <td><input type="email" name="email" /></td>
                    </tr>
                    <tr>
                            <td colspan="2"><input type="submit" value="Randomize Password"/></td>
                    </tr>
            </table>
        </form>
        <?php echo $statusMessage;?>
    </body>
</html>
