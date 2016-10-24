
<!-- insert_user.php
   A PHP script to insert a new user into the test database
  -->
<?php

require('db_cn.inc');

//This file contains php code that will be executed after the
//insert operation is done.
require('customer_insert_result_ui.inc');

// Main control logic
update_customer();

//-------------------------------------------------------------
function update_customer()
{

	// Connect to the 'test' database
        // The parameters are defined in the teach_cn.inc file
        // These are global constants
	connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);

	// Get the information entered into the webpage by the user
        // These are available in the super global variable $_POST
	// This is actually an associative array, indexed by a string
	$customerid = $row['CustomerId'];
	$customername = $row['Name'];
	$address = $row['Address'];
	$city = $row['City'];
	$state = $row['State'];
	$zip = $row['ZIP'];
	$phone = $row['Phone'];
	$email = $row['E-mail'];
	$status = "Inactive";

	// Create a String consisting of the SQL command. Remember that
        // . is the concatenation operator. $varname within double quotes
 	// will be evaluated by PHP
	$sql_stmt = "UPDATE Customer SET Name='$name', Address='$address', City='$city', State='$state', ZIP='$zip', Phone='$phone', Status='$status' WHERE CustomerId='$customerid';";

	//Execute the query. The result will just be true or false
	$result = mysql_query($sql_stmt);
	echo $result;
	$message = "";

	if (!$result)
	{
  	  $message = "Error in deleting Customer: $name: ". mysql_error();
	}
	else
	{
	  $message = "Data for Customer: $customerid , $name Deleted successfully.";

	}

	ui_show_customer_insert_result($message, $vendorname);

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
