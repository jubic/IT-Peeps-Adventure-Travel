<?php

    include('dbFunctions.php');

    if (isset($_POST)) {
        // Retrieve file data
        $pimage = clean(basename($_FILES['pimage']['name']));
        $tmpName = $_FILES['pimage']['tmp_name'];
        $targetPath = "packages/".$pimage;

        if(move_uploaded_file($tmpName, $targetPath)) {

            // Retrieve Form Data
            $pname = clean($_POST['pname']);
            $pdesc = clean($_POST['pdesc']);
            $plocation = clean($_POST['plocation']);
            $pprice = clean($_POST['pprice']);
            $insertQuery = "INSERT INTO tour_package(name, description, location, price, image) VALUES('".$pname."', '".$pdesc."', '".$plocation."', '".$pprice."', '".$pimage."')";
            $insertDesign = executeInsertQuery($insertQuery);

            if($insertDesign) {

                $message .= '<meta http-equiv="refresh" content="2;url=index.php">';

                }

            else {

                $message = "Error saving new design";

                }

        }
            
    }
    echo $message;
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>ITPeeps Adventure Travel - Travel Packages</title>
        <script src="validate.js" type="text/javascript"></script>
    </head>
    <body>
        <h1>Add New Package</h1>
        <hr/>
        
	<form enctype="multipart/form-data" method="POST" action="">

		<table width="400px" border="0">
                    
                    <tr>

                        <td><label for="pname">Package Name</label></td>
                        <td><input type="text" id="pname" name="pname" required="required"/></td>

                    </tr>

                    <tr>

                        <td><label for="pdesc">Description</label></td>
                        <td><textarea id="pdesc" name="pdesc" rows="10" cols="16" required="required"></textarea></td>

                    </tr>

                    <tr>

                        <td><label for="plocation">Location</label></td>
                        <td><input type="text" id="plocation" name="plocation" required="required"/></td>

                    </tr>

                    <tr>

                        <td><label for="pprice">Price</label></td>
                        <td><input type="text" id="pprice" name="pprice" required="required"/></td>

                    </tr>

                    <tr>

                        <td><label for="pimage">Image</label></td>
                        <td><input type="file" id="pimage" name="pimage" required="required"></td>

                    </tr>

                    <tr>

                        <td>&nbsp;</td>
                        <td><input name="submit" value="Add Package" type="submit"><input type="reset" value="Reset"></td>

                    </tr>

		</table>

	</form>
        
    </body>
</html>
