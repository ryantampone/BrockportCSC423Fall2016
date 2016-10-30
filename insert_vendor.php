<?php

require('db_cn.inc');

//This file contains php code that will be executed after the
//insert operation is done.
require('vendor_insert_result_ui.inc');

// Main control logic
insert_vendor();

//-------------------------------------------------------------
function insert_vendor()
{

	// Connect to the 'test' database
        // The parameters are defined in the teach_cn.inc file
        // These are global constants
	connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);

	// Get the information entered into the webpage by the user
        // These are available in the super global variable $_POST
	// This is actually an associative array, indexed by a string
	$vendorcode = $_POST['vendorcode'];
	$vendorname = $_POST['vendorname'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zip = $_POST['zip'];
	$phone = $_POST['phone'];
	$contactpersonname = $_POST['contactpersonname'];
	$password = $_POST['password'];
	$status = "Active";

	$esc_vendorname = mysql_real_escape_string($_POST['vendorname']);
	$esc_address = mysql_real_escape_string($_POST['address']);
	$esc_city = mysql_real_escape_string($_POST['city']);
	$esc_contactpersonname = mysql_real_escape_string($_POST['contactpersonname']);
	$esc_password = mysql_real_escape_string($_POST['password']);

	/*$esc_vendorname = mysql_real_escape_string($vendorname);
	$esc_address = mysql_real_escape_string($address);
	$esc_city = mysql_real_escape_string($city);
	$esc_contactpersonname = mysql_real_escape_string($contactpersonname);
	$esc_password = mysql_real_escape_string($password);*/

	// Create a String consisting of the SQL command. Remember that
        // . is the concatenation operator. $varname within double quotes
 	// will be evaluated by PHP

	$insertStmt = "INSERT INTO Vendor (VendorCode, VendorName, Address, City, State, ZIP, Phone, ContactPersonName, Password, Status) values ('$vendorcode', '$esc_vendorname', '$esc_address', '$esc_city', '$state', '$zip', '$phone', '$esc_contactpersonname', '$esc_password', '$status');";

	//Execute the query. The result will just be true or false
	$result = mysql_query($insertStmt);
	echo $result;
	$message = "";

	if (!$result)
	{
  	  $message = "Error in inserting User: $vendorcode , $vendorname: ". mysql_error();
	}
	else
	{
	  $message = "Data for User: $vendorcode , $vendorname inserted successfully.";

	}

	ui_show_vendor_insert_result($message, $vendorcode, $vendorname, $result);

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
