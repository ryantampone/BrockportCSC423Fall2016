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
		<h2>Total Inventory Report : Please select a store location</h2>
		<form action='report_all_item_list.php' method='post'>
			<table align='center'>
			<tr>
				<td ><span align='right'>Store ID:</span></td>
				<td>
								<select id='StoreName' name='StoreName' >
							";
									connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);
									$sql_storeLocations = "SELECT StoreName FROM RetailStore;";
									$StoreName_result = mysql_query($sql_storeLocations);
									if (!$StoreName_result)
									{
										echo "StoreId's retrieved unsuccessfully: ".mysql_error();
										exit;
									}
									while ($row = mysql_fetch_assoc($StoreName_result))
									{
										$storeName = $row['StoreName'];
										echo "<option>".$storeName."</option>";
									}
			  echo "</select>";
			  	 /*$vendorinfo = $_POST['VendorInfo'];
				$vendorid = split(':',$vendorinfo);
				$vendorid = $vendorid[0];
				echo "$vendorid";
			  	echo "<input type='hidden' id='vendorId' name='vendorId' value='$vendorid' />";*/
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
