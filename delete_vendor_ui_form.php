<?php
	include 'header.php';
?>

<?php
	//creates an html form prompting user to input search parameters
	echo"
		<br>
		<div id='callToAction'>
	    <h2>Please Enter the Vendor ID of the Vendor to Delete</h2>
	  </div>
    	<div id='userdataform'>
            <form name='myform' action='delete_vendor.php' method='post'>
                <table align='center'>
                    <tr>
                        <td><span align='right'>Enter Vendor ID:</span></td>
                        <td><input NAME='vendorid' TYPE='text' SIZE='50' onKeyPress='return hasToBeNumber(event)' onpaste='return false' required/></td>
                    </tr>
                </table>
                <div id='button'>
		<input id='tiny_button' type='submit' id='submit' name='submit' >
		<input id='tiny_button' type='reset' id='reset' name='reset'>
</div>            

            </form>
        </div>
	";
?>
</body>
</html>
