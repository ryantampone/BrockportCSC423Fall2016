<?php
	include 'header.php';
?>

<?php
  echo"
    <br>
		<div id='callToAction'>
	    <h2>Please Enter the Order ID of the Order to Modify</h2>
	  </div>
    <div id='userdataform'>
      <form action='add_to_existing_order.php' method='post'>
        <table align='center'>
          <tr>
            <td><span align='right'>Enter Order ID:</span></td>
            <td><input id='orderid' NAME='orderid' TYPE='text' SIZE='50' onKeyPress='return hasToBeNumber()' onpaste='return false' required/></td>
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
