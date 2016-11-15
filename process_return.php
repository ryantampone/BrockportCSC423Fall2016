<?php

// File that contains login info for database
require('db_cn.inc');

require('process_return_result_ui.php');

process_return();

function process_return()
{
	// Connect to the database with the 'db_cn.ini' file required above
	connect_and_select_db(DB_SERVER, DB_UN, DB_PWD, DB_NAME);

	// Get the info the user enters on the webpage
	$vendorname = $_POST['vendorname'];
	$esc_vendorname = mysql_real_escape_string($vendorname);
  $storecode = $_POST['storecode'];

  // Get store info based on user input
  $sql_store = "SELECT StoreId, StoreName FROM RetailStore WHERE StoreCode = '$storecode';";
  $sql_store_result = mysql_query($sql_store);
  while($store_row = mysql_fetch_assoc($sql_store_result))
  {
    $storeid = $store_row['StoreId'];
    $storename = $store_row['StoreName'];
  }

  // Get vendor info based on user selection
  $sql_vendor = "SELECT VendorId, VendorCode FROM Vendor WHERE VendorName='$esc_vendorname';";
  $sql_vendor_result = mysql_query($sql_vendor);
  while($vendor_row = mysql_fetch_assoc($sql_vendor_result))
  {
    $vendorid = $vendor_row['VendorId'];
    $vendorcode = $vendor_row['VendorCode'];
  }

	// Set the SQL command
	$sql_item = "SELECT * FROM Inventory, InventoryItem WHERE (StoreId='$storeid' AND VendorId='$vendorid' AND Inventory.ItemId = InventoryItem.ItemId);";

	//Execute the query. The result will just be true or false
	$sql_item_result = mysql_query($sql_item);

	if (!$sql_item_result)
  {
     echo "The item retrieval was unsuccessful: ".mysql_error();
     exit;
  }

  //$result is non-empty. So count the rows
  $numrows = mysql_num_rows($sql_item_result);
  $message = "";
  if ($numrows == 0)
     $message = "No items found for the given store location and vendor.";

  //Display the results
  show_items($message, $sql_item_result);

  //Free the result set
  mysql_free_result($result);
}

// Function to connect to the database
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
