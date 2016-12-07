<?php
	include 'header.php';
?>

<?php
	echo"
		<br>
		<div id='callToAction'>
	    <h2>Please Enter the Item ID of the Item to Modify</h2>
	  </div>
    	<div id='userdataform'>
            <form action='modify_item.php' method='post'>
                <table align='center'>
                    <tr>
                        <td><span align='right'>Enter Item ID:</span></td>
                        <td><input id='ItemId' NAME='ItemId' TYPE='text' SIZE='50' required/></td>
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
