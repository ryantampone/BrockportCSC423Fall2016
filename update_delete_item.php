<?php
require('db_cn.inc');
//This file contains php code that will be executed after the
//insert operation is done.
require('item_insert_result_ui.inc');
// Main control logic
update_item();
//-------------------------------------------------------------
function update_item()
{
	// Connect to the 'test' database
        // The parameters are defined in the teach_cn.inc file
        // These are global constants
	connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);
	// Get the information entered into the webpage by the user
        // These are available in the super global variable $_POST
	// This is actually an associative array, indexed by a string

   $itemId = $_POST['ItemId'];
   $description = $_POST['Description'];
   $size = $_POST['Size'];
   $division = $_POST['Division'];
   $department = $_POST['Department'];
   $category = $_POST['Category'];
   $itemCost = $_POST['ItemCost'];
   $itemRetail = $_POST['ItemRetail'];
   $imageFileName = $_POST['ImageFileName'];
   $vendorID = $_POST['VendorId'];



	// Create a String consisting of the SQL command. Remember that
        // . is the concatenation operator. $varname within double quotes
 	// will be evaluated by PHP
	$sql_stmt = "DELETE FROM InventoryItem WHERE ItemId='$itemId';";
	//Execute the query. The result will just be true or false
	$result = mysql_query($sql_stmt);
	echo $result;
	$message = "";
	if (!$result)
	{
  	  $message = "Error in deleting Vendor: $vendorcode , $vendorname: ". mysql_error();
	}
	else
	{
	  $message = "Data for Item: $itemId Deleted successfully.";
	}
	ui_show_item_insert_result($message, $itemId);
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
