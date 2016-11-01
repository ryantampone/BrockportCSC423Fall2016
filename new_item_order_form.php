<?php
	include 'header.php';
	require('db_cn.inc');

	function connect_and_select_db($server, $username, $pwd, $dbname)
{
	// Connect to db server
	$conn = mysql_connect($server, $username, $pwd);
	if (!$conn) {
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
		<h2>Please fill out the new order form below.</h2>
		<form action='new_order.php' method='post'>
			<table align='center'>
			<tr>
				<td><span align='right'>Order ID:</span></td>
				<td><input type='text' id='OrderId' name='OrderId' size='50' /></td>
			</tr>
			<tr>
				<td ><span align='right'>Vendor ID:</span></td>
				
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
										$vendorname = mysql_real_escape_string($row['VendorName']);
										echo "<option>".$vendorid.": ".$vendorname."</option>";
									}
			  echo "</select>
						</td>
				
			</tr>
			<tr>
					<td><span align='right'>Store ID:</span></td>
					<td>
					<select id='StoreId' name='StoreId' required />";
					$sql_store = "SELECT StoreName FROM RetailStore WHERE Status='Active';";
					$store_result = mysql_query($sql_store);
					if (!$store_result)
					{
						echo "Store's retrieved unsuccessful: ".mysql_error();
						exit;
						
						}	
					while($row = mysql_fetch_assoc($store_result)){
						
						$storeid = $row['StoreId'];
						$storename = mysql_real_escape_string($row['StoreName']);
						echo "<option>".$storeid.": ".$storename."</option>";
						}
					echo "<option value='$vendorId'>$vendorId</option>
					</select>
				</td>
			</tr>
			<tr>
				<td ><span align='right'>Date:</span></td>
				<td><input type='date'  id='DateTimeOfOrder' name='DateTimeOfOrder' required /></td>
			</tr>
			<tr>
				<td><span align='right'>Status:</span></td>
				<td><input type='text' id='Status' name='Status' value='Pending' /></td>
			</tr>
			
			</table>
		<div class='button'>
						<input id='tiny_button' type='submit' id='submit' name='submit' >
						<input id='tiny_button' type='reset' id='reset' name='reset'>
					</div>
		</form>";

?>

</body>
</html>
