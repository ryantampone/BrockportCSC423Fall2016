// Jodi L. Hess Quiz2 CSC423

<?php
	require('dblogin.inc');

	function connect_and_select_db($server, $username, $pwd, $dbname)
{
	// Connect to db server
	$connect = mysql_connect($server, $username, $pwd);
	if (!$connect) {
	    echo "Unable to connect to DB: " . mysql_error();
    	    exit;
	}
	// Select the database
	$dbh = mysql_select_db($dbname);
	if (!$dbh){
    		echo "Unable to select ".$dbname.": " . mysql_error();
		exit;
	}
}
?>

<?php

	echo"
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
            <td><input id='Description' name='Description' type='text' size='50' required/></td>
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
							<select name='Department' id='Department' onchange='check_dept(this)' onpaste='return false'>
								<option value='Baked Goods'>Baked Goods</option>
								<option value='Beverages Department'>Beverages Department</option>
								<option value='Candy Department'>Candy Department</option>
								<option value='Cookies/Crackers Department'>Cookies/Crackers Department</option>
								<option value='Dairy Department'>Dairy Department</option>
								<option value='Meat Department'>Meat Department</option>
							</select>
						</td>
					</tr>
  				<tr>
              <td align='right'>Category:</td>
              <td>
								<select name='Category' id='Category'>
										<option id='Category_1' value='Donuts'>Donuts</option>
										<option id='Category_2' value='Pie'>Pie</option>
										<option id='Category_3' value='Other'>Other</option>
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
	";
?>
