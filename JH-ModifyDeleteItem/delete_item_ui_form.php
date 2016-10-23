<?php
	include 'header.php';
?>

// Jodi L. Hess

<?php
	echo"
		<br>
		<div id='callToAction'>
	    <h4 align='center'>Please Enter the Item ID to Remove</h4>
	  </div>
    	<div id='userdataform'>
            <form action='delete_item.php' method='post'>
                <table align='center'>
                    <tr>
                        <td><span align='right'>Enter Item ID:</span></td>
                        <td><input NAME='itemid' TYPE='text' SIZE='50' required/></td>
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
