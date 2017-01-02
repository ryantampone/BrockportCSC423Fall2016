
<?php

require('db_cn.inc');

//This file contains php code that will be executed after the
require('item_modify_result_ui.inc');

// Main control logic
modify_item();

//-------------------------------------------------------------
function modify_item()
{

	// Connect to the 'test' database
        // The parameters are defined in the teach_cn.inc file
        // These are global constants
	connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);

	// Get the information entered into the webpage by the user
        // These are available in the super global variable $_POST
	// This is actually an associative array, indexed by a string
	$itemId = $_POST['ItemId'];
	$esc_itemId = mysql_real_escape_string($_POST['ItemId']);
	//echo"Vendor ID is: $vendorid";
	// Create a String consisting of the SQL command. Remember that
        // . is the concatenation operator. $varname within double quotes
 	// will be evaluated by PHP
	$sql_stmt = "SELECT * FROM InventoryItem WHERE ItemId='$esc_itemId';";

	//Execute the query. The result will just be true or false
	$result = mysql_query($sql_stmt);

	if (!$result)
  {
     echo "The retrieval was unsuccessful: ".mysql_error();
     exit;
  }

  //$result is non-empty. So count the rows
  $numrows = mysql_num_rows($result);

  //Create an appropriate message
  $message = "";
  if ($numrows == 0)
     $message = "No items found in database with the provided ID";

  //Display the results
  show_all_items($message, $result);


  //Free the result set
  mysql_free_result($result);

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
