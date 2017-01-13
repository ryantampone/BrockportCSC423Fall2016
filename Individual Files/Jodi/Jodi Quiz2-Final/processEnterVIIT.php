
<?php

// Jodi L. Hess CSC423 Final December   2016

require('dblogin.inc');
require('item_insert_result_ui.inc');


insert_item();

function insert_item(){

connect_and_select_db(DB_SERVER, DB_UN, DB_PWD, DB_NAME);

   $id = $_POST['Id'];
   $vendorName = $_POST['VendorName'];
   $inventoryItemName =  $_POST['InventoryItemName'];
   $vendorDescript = $_POST['vendorDescript'];
   $currPrice  = $_POST['CurrPrice'];
   $priceUnit = $_POST['PriceUnit'];
   $dateLastPurchase = $_POST['DateLastPrice']
   $vendorItemNum = $_POST['VendorItemNum'];


   $esc_id = mysql_real_escape_string($_POST['Id']);
   $esc_vendorName = mysql_real_escape_string($_POST['VendorName']);
   $esc_inventoryItemName= mysql_real_escape_string($_POST['InventoryItemName']);
   $esc_vendorDescript = mysql_real_escape_string($_POST['VendorDescript']);
   $esc_currPrice = mysql_real_escape_string($_POST['CurrPrice']);
   $esc_priceUnit = mysql_real_escape_string($_POST['PriceUnit']);
   $esc_dateLastPurchase = mysql_real_escape_string($_POST['DateLastPurchase']);
   $esc_VendorItemNum = mysql_real_escape_string($_POST['VendorItemNum']);

   $insertitem  = "INSERT INTO VendorInventoryItemType
   (Id, VendorName, InventoryItemType, VendorDescript, currPrice, PriceUnit,
   DateLastPurchase, VendorItemNum) values ('$esc_id', '$esc_vendorName',
  '$esc_inventoryItemName', '$esc_vendorDescript', '$esc_currPrice', '$esc_priceUnit',
  '$esc_dateLastPurchase', '$esc_VendorItemNum');";

   $result = mysql_query($insertitem);
   echo $result;
   $message = "";

   if(!$result){

   $message = "Error in inserting item: $itemTypeName .". mysql_error();

   }
   else{

   $message = "Item: $itemTypeName inserted successfully.";

   }

   ui_show_item_insert_result($message, $itemTypeName, $result);
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
