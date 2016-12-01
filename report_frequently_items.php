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
     $storeName;
	echo"
		<br>
		<h2>Frequently Return Items Report : Please select a vendor name</h2>
		<form action='report_frequently_item_list.php' method='post'>
			<table align='center'>
			<tr>
				<td ><span align='right'>Vendor ID:</span></td>
				<td>
								<select id='VendorName' name='VendorName' >
							";
									connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);
									$sql_storeLocations = "SELECT VendorName FROM Vendor;";
									$vendorName_result = mysql_query($sql_storeLocations);
									if (!$vendorName_result)
									{
										echo "Vendor Id's retrieved unsuccessfully: ".mysql_error();
										exit;
									}
									while ($row = mysql_fetch_assoc($vendorName_result))
									{
										$vendorName = $row['VendorName'];
										echo "<option>".$vendorName."</option>";
									}
			  echo "</select>";
			  

			
			  echo"
			</td>
			</tr>
				
		
			</table>
		<div class='button'>
						<input id='tiny_button' type='submit' id='submit' name='submit' >
						<input id='tiny_button' type='reset' id='reset' name='reset'>
					</div>
		</form>";
?>
