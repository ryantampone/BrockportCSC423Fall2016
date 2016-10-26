<?php
	include 'header.php';
?>

<?php
	echo"
		<br>
		<div id='callToAction'>
	    <h4 align='center'>Please Enter the Customer ID of the Customer You Would Like to Delete</h4>
	  </div>
    	<div id='userdataform'>
            <form action='delete_customer.php' method='post'>
                <table align='center'>
                    <tr>
                        <td><span align='right'>Enter Customer ID:</span></td>
                        <td><input NAME='customerid' TYPE='text' SIZE='50' onKeyPress='return hasToBeNumberOrLetter(event)' onpaste='return false' required/></td>
                    </tr>
                </table>
                <p align='center'>
                    <input type='submit' value='Submit'/>
                    <input type='reset' value='Reset'/>
                </p>
            </form>
        </div>
	";
?>
</body>
</html>
