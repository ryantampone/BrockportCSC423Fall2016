<?php

// Jodi L. Hess //

require('db_cn.inc');

require('CreateOrderResultUi.inc');

CreateOrder();

function CreateOrder(){

connect_and_select_db(DB_SERVER, DB_UN, DB_PWD, DB_NAME);

   $orderId = $_POST['OrderId'];
   $vendorId = $_POST['VendorId'];
   $storeId = $_POST['StoreId'];
   $dateTimeOfOrder = $_POST['DateTimeofOrder'];
   $status = $_POST['Status'];
   $dateTimeOfFulfilment = $_POST['DateTimeOfFulfilment'];

// Unsure if code below is correct for entering data into database.

   $insertOrder = "INSERT INTO CreateOrder(OrderId, VendorId, StoreId,
   DateTimeOfOrder, Status,  DateTimeOfFulfilment)
   values ('$orderId', '$vendorId','$storeId', '$dateTimeOfOrder', '$status',
   '$dateTimeOfFulfilment',);";

   $result = mysql_query($insertOrder);
   echo $result;
   $message = "";

   if(!$result){

   $message = "Error in creating order: $order". mysql_error();

   }
   else{

   $message = "Item: $order inserted successfully.";
   }

/// Do we need additional file entitled "UiShowCreateOrderResult"?
/// I have "CreateOrderResultUi.inc" ?????

   CreateOrderResultUi($message, $order, $result);
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
