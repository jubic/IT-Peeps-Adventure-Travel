<?php

    // Connection information
    $HOST = 'localhost';
    $USERNAME = 's92807';
    $PASSWORD = 'e5d5e4d7';
    $DB = 's92807';

    $link = mysqli_connect($HOST,$USERNAME,$PASSWORD,$DB) or die(mysqli_connect_error());

    // Function for querying database.
    function executeSelectQuery($query)
    {
        $result = mysqli_query($GLOBALS['link'], $query) or die(mysqli_error($GLOBALS['link']));
        while($row=mysqli_fetch_array($result))
        {
            $returnArray[] = $row;
        }
        return $returnArray;
    }

    // Function to insert queries into database
    function executeInsertQuery($query) {
        
        return mysqli_query($GLOBALS['link'], $query) or die(mysqli_error($GLOBALS['link']));
        
    }

    // Function to purify strings
    function clean($string) {

		$string = trim($string); // This function returns a string with whitespace stripped from the beginning and end of str. Without the second parameter, trim() will strip these characters
		$string = htmlentities($string, ENT_COMPAT); // This function is identical to htmlspecialchars() in all ways, except with htmlentities(), all characters which have HTML character entity equivalents are translated into these entities.
                $string = addslashes($string); // Returns a string with backslashes before characters that need to be quoted in database queries etc. These characters are single quote ('), double quote ("), backslash (\) and NUL (the NULL byte).
                $string = mysqli_real_escape_string($GLOBALS['link'], $string);

		return $string;

    }

    // Function to input update queries into database
    function executeUpdateQuery($query) {

        return mysqli_query($GLOBALS['link'], $query) or die(mysqli_error($GLOBALS['link']));
        
    }

    // Function to create random password in forgetPassword.php
    function createRandomPassword() {

        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz0123456789";
        $i = 0;
        $pass = '' ;

        while ($i <= 8) {
            $num = mt_rand(0,58);
            $tmp = substr($chars, $num, 1);
            $pass = $pass . $tmp;
            $i++;
        }
        return $pass;
        
    }
?>