<?php

require('db_cn.inc');
require('store_location_confirm.php');

update_store();

function update_store()
{
  // Connect to the 'test' database
        // The parameters are defined in the teach_cn.inc file
        // These are global constants
	connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);

	// Get the information entered into the webpage by the user
        // These are available in the super global variable $_POST
	// This is actually an associative array, indexed by a string
	$storeid = $_POST['storeid'];
	$storecode = $_POST['storecode'];
	$storename = $_POST['storename'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zip = $_POST['zip'];
	$phone = $_POST['phone'];
	$mgrname = $_POST['mgrname'];
	$status = $_POST['status'];

	// Create a String consisting of the SQL command. Remember that
        // . is the concatenation operator. $varname within double quotes
 	// will be evaluated by PHP
	$sql_stmt = "UPDATE RetailStore SET StoreCode='$storecode', StoreName='$storename', Address='$address', City='$city', State='$state', ZIP='$zip', Phone='$phone', ManagerName='$mgrname', Status='$status' WHERE StoreId='$storeid';";

	//Execute the query. The result will just be true or false
	$result = mysql_query($sql_stmt);
	echo $result;
	$message = "";

	if (!$result)
	{
  	  $message = "Error in updating Store: $storecode , $storename: ". mysql_error();
	}
	else
	{
	  $message = "Data for Store: $storeid , $storecode , $storename updated successfully.";

	}

	show_store_confirm($message);
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
