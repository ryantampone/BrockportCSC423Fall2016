<?php
	include 'header.php';
?>

<div id="callToAction">
  <h2>Please Select an Option From the Navigation Bar</h2>
</div>


	<br>
	<div id='callToAction'>
		<h2>Please Fill out the New Item Form Below</h2>
	</div>

	<div id='userdataform'>
		<form action='insert_item.php' method='post'>
			<table align='center'>
				<tr>
					<td align='right'>Item ID:</td>
					<td><input id='ItemId' name='ItemId' TYPE='text' SIZE='50' onKeyPress='return hasToBeNumber(event)' onpaste='return false' required/></td>
				</tr>
				<tr>
					<td align='right'>Description:</td>
					<td><input id='Description' name='Description' type='textarea' required/></td>
				</tr>
				<tr>
					<td align='right'>Size:</td>
					<td><input id='Size' name='Size' TYPE='text' SIZE='50' required/></td>
				</tr>
				<tr>
					<td align='right'>Division:</td>
					<td>
						<select name='Division'>
							<option value='Food Convenience'>Food Convenience</option>
							<option value='Meat Convenience'>Meat Convenience</option>
						</select>
					</td>
				</tr>
				<tr>
					<td align='right'>Department:</td>
					<td>
						<select name='Department' id='Department' onchange='check_dept()' onpaste='return false'>
							<option value='Meat Department'>Meat Department</option>
							<option value='Beverages Department'>Beverages Department</option>
							<option value='Candy Department'>Candy Department</option>
							<option value='Cookies/Crackers Department'>Cookies/Crackers Department</option>

						</select>
					</td>
				</tr>
				<tr>
						<td align='right'>Category:</td>
						<td>
							<select name='Category'>
									<option id='Category_1' value='Beef'>Beef</option>
									<option id='Category_2' value='Chicken'>Chicken</option>

							</select>
						</td>
				</tr>
				<tr>
						<td align='right'>Item Cost:</td>
						<td><input id='ItemCost' name='ItemCost' TYPE='text' onblur='isItemCost()' onpaste='return false' SIZE='50' required/></td>
				</tr>
				<tr>
						<td align='right'>Item Retail:</td>
						<td><input id='ItemRetail' name='ItemRetail' TYPE='text' SIZE='50' onblur='isItemRetail()' onpaste='return false' required/></td>
				</tr>
				<tr>
						<td align='right'>Vendor Id:</td>
						<td>
							<select id='VendorId' name='VendorId' required/>
						";
								connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);
								$sql_vendors = "SELECT VendorId, VendorName FROM Vendor WHERE Status='Active';";
								$vendors_result = mysql_query($sql_vendors);

								if (!$vendors_result)
								{
									echo "VendorId's retrieved unsuccessfully: ".mysql_error();
									exit;
								}
								while ($row = mysql_fetch_assoc($vendors_result))
								{
									$vendorid = $row['VendorId'];
									$vendorname = $row['VendorName'];
									echo "<option>".$vendorid.": ".$vendorname."</option>";
								}
			echo "</select>
					</td>
				</tr>
				<tr>
						<td align='right'>Image Filename:</td>
						<td><input id='ImageFileName' name='ImageFileName' TYPE='text' SIZE='50' onKeyPress='return isImageFileName(event)' onpaste='return false' value='src/' /></td>
				</tr>
				</table>
				<div class='button'>
					<input id='tiny_button' type='submit' id='submit' name='submit' >
					<input id='tiny_button' type='reset' id='reset' name='reset'>
				</div>
			</form>
			</div>
	<?php
		include 'footer.php';
	?>
</body>
</html>
