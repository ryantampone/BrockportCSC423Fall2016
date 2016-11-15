<?php
// File that contains login info for database
require('db_cn.inc');
require('process_delivery_result_ui.php');
require('process_delivery_message.inc');

process_delivery();
function process_delivery()
{
	// Connect to the database with the 'db_cn.ini' file required above
	connect_and_select_db(DB_SERVER, DB_UN, DB_PWD, DB_NAME);

	// Get the info the user enters on the webpage
	$orderid = $_POST['orderid'];

	// Set the SQL command
	$sql_stmt = "SELECT * FROM `Order` WHERE (OrderId='$orderid' AND Status='Pending');";

	//Execute the query. The result will just be true or false
	$result = mysql_query($sql_stmt);

	if (!$result)
  {
     echo "The retrieval was unsuccessful: ".mysql_error();
     exit;
  }

  //$result is non-empty. So count the rows
  $numrows = mysql_num_rows($result);
  $message = "";
  if ($numrows == 0)
     $message = "No order found in database with the provided ID";

  //Display the results
  show_order($message, $result);

  //Free the result set
  mysql_free_result($result);
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
