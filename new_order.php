<?php
require('db_cn.inc');
include 'header.php';
require('insert_order.php');







show_vendor_item();




function show_vendor_item(){
	connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);

	$vendorName = $_POST['VendorInfo'];

	connect_and_select_db(DB_SERVER, DB_UN, DB_PWD, DB_NAME);
	$sql_vendorId = "SELECT VendorId FROM `Vendor` WHERE VendorName='$vendorName';";
	$sql_result = mysql_query($sql_vendorId);
	while($vendor_row = mysql_fetch_assoc($sql_result))
	{
		$vendorId = $vendor_row['VendorId'];
	}
	//echo"My vendorId:";
	//echo "$vendorId";
	echo"<input type='hidden' id='myvendorid' name='myvendorid' value='$vendorId' />";
	
	
	$sql_showItem = "SELECT ItemId,Description, Size FROM InventoryItem WHERE VendorId='$vendorId';";
	$result_showItem = mysql_query($sql_showItem);
	
	
	if(!$result_showItem){
		
			echo" Unsuccessful:".mysql_error();
			exit;
		}

	
	show_item($message, $result_showItem, $vendorId);
	mysql_free_result($result_showItem);
	}



	
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
