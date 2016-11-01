<?php
	include 'header.php';
?>

<?php
	echo"
		<br>
		<div id='callToAction'>
	    <h2>Please Enter the Customer ID of the Customer You Would Like to Delete</h2>
	  </div>
    	<div id='userdataform'>
            <form action='delete_customer.php' method='post'>
                <table align='center'>
                    <tr>
                        <td><span align='right'>Enter Customer ID:</span></td>
                        <td><input NAME='customerid' TYPE='text' SIZE='50' onKeyPress='return hasToBeNumberOrLetter(event)' onpaste='return false' required/></td>
                    </tr>
                </table>
           <div class='button'>
					<input id='tiny_button' type='submit' id='submit' name='submit' >
					<input id='tiny_button' type='reset' id='reset' name='reset'>
					</div>
            </form>
        </div>
	";
?>
</body>
</html>
