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
     $vendorid;


	echo"
		<br>
		<h2>Please fill out the new order form below.</h2>
		<form action='new_order.php' method='post'>
			<table align='center'>
		
			<tr>
				<td ><span align='right'>Vendor ID:</span></td>
				
				<td>
								<select id='VendorInfo'name='VendorInfo' />
							";
							       
									$next_option=
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
										echo "<option>".$vendorid." : ".$vendorname."</option>";
									}
								
			  echo "</select>
	
			</td>
				
			</tr>
			
			
			
			</table>
		<div class='button'>
						<input id='tiny_button' type='submit' id='submit' name='submit' >
						<input id='tiny_button' type='reset' id='reset' name='reset'>
					</div>
		</form>";

?>

</body>
