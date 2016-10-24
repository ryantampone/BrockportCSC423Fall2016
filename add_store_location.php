<!-- addStoreLocation
	inserts a new row into the RetailStore table -->

<?php

// File that contains login info for database
require('db_cn.inc');

require('store_location_confirm.php');

insert_store();

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


function insert_store()
{
	// Connect to the database with the 'db_cn.ini' file required above
	connect_and_select_db(DB_SERVER, DB_UN, DB_PWD, DB_NAME);

	// Get the info the user enters on the webpage
	$storecode = $_POST['storecode'];
	$storename = $_POST['storename'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zip = $_POST['zip'];
	$phone = $_POST['phone'];
	$mgrname = $_POST['mgrname'];

	// Set the SQL command
	$insertCmd = "INSERT INTO RetailStore (StoreCode, StoreName, Address, City, State, ZIP, Phone, ManagerName) values ('$storecode', '$storename', '$address', '$city', '$state', '$zip', '$phone', '$mgrname');";

	$result = mysql_query($insertCmd);
	echo $result;
	$message = "";

	if (!$result)
		$message = "Error in inserting Store: $storeCode, $storeName: ". mysql_error();
	else
		$message = "$storecode, $storename: inserted successfully.";

	show_store_confirm($message);
}

?>

