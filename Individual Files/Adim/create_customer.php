
<!-- add_customer.php
   A PHP script to add a customer into the test database
  -->
<?php

require('db_cn.inc');

//This file contains php code that will be executed after the
//add customer operation is done.

require('customer_add_result_ui.inc');

// Main control logic
add_customer();

//-------------------------------------------------------------
function add_customer()
{

	// Connect to the 'test' database
  // The parameters are defined in the teach_cn.inc file
  // These are global constants

	connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);

	// Get the information entered into the webpage by the user
  // These are available in the super global variable $_POST
	// This is actually an associative array, indexed by a string

	$customerid = $_POST['customerid'];
	$name = $_POST['name'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zip = $_POST['zip'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$status = "Active";


	// Create a String consisting of the SQL command. Remember that
  // . is the concatenation operator. $varname within double quotes
 	// will be evaluated by PHP

	$sql_tmt = "INSERT INTO Customer (CustomerId, Name, Address, City, State, ZIP, Phone, Email, Status) values ('$customerid', '$name', '$address', '$city', '$state', '$zip', '$phone', '$email', '$status');";
	//Execute the query. The result will just be true or false

	$result = mysql_query($sql_stmt);
	echo $result;
	$message = "";

	if (!$result)
	{
  	  $message = "Error in inserting User: $customerid, $name: ". mysql_error();
	}
	else
	{
	  $message = "Data for User: $customerid , $name inserted successfully.";
	}

  ui_show_customer_insert_result($message, $customerid, $name, $result);

	// ui_show_item_delete_result($message, $itemcode, $itemname);
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
