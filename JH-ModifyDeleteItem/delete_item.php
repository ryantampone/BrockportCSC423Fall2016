
// Jodi L. Hess

<!-- delete_item.php
   A PHP script to delete an item into the test database
  -->
<?php

require('db_cn.inc');

//This file contains php code that will be executed after the
//delete operation is done.

require('item_delete_result_ui.inc');

// Main control logic
delete_item();

//-------------------------------------------------------------
function delete_item()
{

	// Connect to the 'test' database
  // The parameters are defined in the teach_cn.inc file
  // These are global constants

	connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);

	// Get the information entered into the webpage by the user
  // These are available in the super global variable $_POST
	// This is actually an associative array, indexed by a string

	$itemid = $_POST['itemid'];
	$status = "Inactive";

	//echo"Item ID is: $itemid";
	// Create a String consisting of the SQL command. Remember that
  // . is the concatenation operator. $varname within double quotes
 	// will be evaluated by PHP

	$sql_stmt = "UPDATE Item SET Status='$status' WHERE ItemId='$itemid';";

	//Execute the query. The result will just be true or false

	$result = mysql_query($sql_stmt);
	echo $result;
	$message = "";

	if (!$result)
	{
  	  $message = "Error in deleting Item: Item $itemid not found". mysql_error();
	}
	else
	{
	  $message = "Item: $itemid removed successfully.";
	}

  ui_show_item_delete_result($message, $itemid, $description);
	
	// ui_show_item_delete_result($message, $itemcode, $itemname);
}

//---------------------------------------------------------------


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
