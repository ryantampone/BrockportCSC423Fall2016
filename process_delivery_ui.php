<?php
	include 'header.php';
?>

<?php
  echo"
		<br>
		<h2>Please Enter the Order ID of the Order for Delivery</h2>
		</div>
			<div id='userdataform'>
						<form name='myform' action='process_delivery.php' method='post'>
								<table align='center'>
										<tr>
												<td><span align='right'>Enter Order ID:</span></td>
												<td><input NAME='orderid' id='orderid' TYPE='text' SIZE='50' onKeyPress='return hasToBeNumber(event)' onpaste='return false' required/></td>
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
