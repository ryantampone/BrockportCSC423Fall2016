<?php
	include 'header.php';
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
            <td><input id='Description' name='Description' type='textarea' onKeyPress='return anythingButQuotes(event)' onpaste='return false' required/></td>
          </tr>
          <tr>
            <td align='right'>Size:</td>
          	<td><input id='Size' name='Size' TYPE='text' SIZE='50' onKeyPress='return hasToBeNumber(event)' onpaste='return false' required/></td>
          </tr>
          <tr>
            <td align='right'>Division:</td>
						<td>
							<select name='Division'>
								<option value='food_convenience'>Food Convenience</option>
								<option value='meat_convenience'>Meat Convenience</option>
							</select>
						</td>
          </tr>
		    	<tr>
            <td align='right'>Department:</td>
						<td>
							<select name='Department'>
								<option value='meat_department'>Meat Department</option>
								<option value='beverages_department'>Beverages Department</option>
								<option value='frozen_foods_department'>Frozen Foods Department</option>
								<option value='produce_department'>Produce Department</option>
								<option value='bread/bakery_department'>Bread/Bakery Department</option>
							</select>
						</td>
					</tr>
  				<tr>
              <td align='right'>Category:</td>
              <td>
								<select name='Category'>
										<option value='beverages'>Beverages</option>
										<option value='bread/bakerty'>Bread/Bakery</option>
										<option value='meat'>Meat</option>
										<option value='frozen foods'>Frozen Foods</option>
								</select>
							</td>
          </tr>
					<tr>
							<td align='right'>Item Cost:</td>
							<td><input id='ItemCost' name='ItemCost' TYPE='text' onKeyPress='return isPrice(event)' onpaste='return false' SIZE='50' required/></td>
					</tr>
					<tr>
							<td align='right'>Item Retail:</td>
							<td><input id='ItemRetail' name='ItemRetail' TYPE='text' SIZE='50' onKeyPress='return isPrice(event)' onpaste='return false' required/></td>
					</tr>
					<tr>
							<td align='right'>Vendor Id:</td>
							<td><input id='VendorId' name='VendorId' TYPE='text' SIZE='50' required/></td>
					</tr>
					<tr>
							<td align='right'>Image Filename:</td>
							<td><input id='ImageFileName' name='ImageFileName' TYPE='text' SIZE='50' onKeyPress='return isImageFileName(event)' onpaste='return false'   value='BrockportCSC423Fall2016/src/' /></td>
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
