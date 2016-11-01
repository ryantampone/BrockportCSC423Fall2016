<?php
	include 'header.php';
?>

<?php
	echo"
		<br>
		<div id='callToAction'>
	    <h4 align='center'>Please Fill out the New Item Form Below</h4>
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
                        <td><input id='Description' name='Description' type='textarea' onKeyPress='return anythingButQuotesOrSlash(event)' onpaste='return false' required/></td>
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

						/td>
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


    connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);


	$sql_vendorid = "SELECT VendorId FROM Vendor;";
	$result = mysql_query($sql_vendorid);
	echo "<select id='VendorId' name='VendorId'>";
	while($row = mysql_fetch_array($result)){
		 echo "<option value='". $row['VendorId'] ."'>" . $row['VendorId'] ."</option>";
		}
	echo "</select>";

?>
		</tr>

		<tr>
			<td align='right'>Image Filename:</span></td>
			<td><input id='ImageFileName' name='ImageFileName' TYPE='text' SIZE='50' onKeyPress='return isImageFileName(event)' onpaste='return false'   value='BrockportCSC423Fall2016/src/' /></td>
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
