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
		<h2>Total Items Delivered Report : Please select a store location and the date</h2>
		<form action='report_delivered_item_list.php' method='post'>
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
			  
			  $startDate = date('Y-m-d', strtotime('today - 7 days'));
			 
			  $endDate = date('Y-m-d');
			
			  echo"
			</td>
			</tr>
				<tr>
				<td ><span align='right'>Start Date:</span></td>
				<td><input type='date' name='startDate' value='$startDate'></td>
				
			</tr>
			<tr>
				<td ><span align='right'>End Date:</span></td>
				<td><input type='date' name='endDate' value='$endDate'></td>
				
			</tr>
		
			</table>
		<div class='button'>
						<input id='tiny_button' type='submit' id='submit' name='submit' >
						<input id='tiny_button' type='reset' id='reset' name='reset'>
					</div>
		</form>";
?>
