
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
	$customerid = $_POST['customerid'];
	$customername = $_POST['name'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zip = $_POST['zip'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$status = $_POST['status'];

	// Create a String consisting of the SQL command. Remember that
        // . is the concatenation operator. $varname within double quotes
 	// will be evaluated by PHP
	$sql_stmt = "UPDATE Customer SET Name='$customername', Address='$address', City='$city', State='$state', ZIP='$zip', Phone='$phone', Email='$email' WHERE CustomerId='$customerid';";

	//Execute the query. The result will just be true or false
	$result = mysql_query($sql_stmt);
	echo $result;
	$message = "";

	if (!$result)
	{
  	  $message = "Error in updating Customer: $name: ". mysql_error();
	}
	else
	{
	  $message = "Data for Customer: $customerid , $name updated successfully.";

	}

	ui_show_customer_insert_result($message, $name);

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
