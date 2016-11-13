<?php
require('db_cn.inc');
require('process_delivery_message.inc');

process_delivery_submission();

function process_delivery_submission()
{
		$orderid = $_POST['passorderid'];
		$orderid = $_POST['passorderid'];


	 show_delivery_result($message)
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
