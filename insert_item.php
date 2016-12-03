<?php

require('db_cn.inc');

require('item_insert_result_ui.inc');

insert_item();

function insert_item(){

connect_and_select_db(DB_SERVER, DB_UN, DB_PWD, DB_NAME);

   $itemId = $_POST['ItemId'];
   $description = $_POST['Description'];
   $size = $_POST['Size'];
   $division = $_POST['Division'];
   $department = $_POST['Department'];
   $category = $_POST['Category'];
   $itemCost = $_POST['ItemCost'];
   $itemRetail = $_POST['ItemRetail'];
   $imageFileName = $_POST['ImageFileName'];
   $vendorID = $_POST['VendorId'];

   $esc_itemId = mysql_real_escape_string($_POST['ItemId']);
   $esc_description = mysql_real_escape_string($_POST['Description']);
   $esc_size = mysql_real_escape_string($_POST['Size']);
   $esc_imageFileName = mysql_real_escape_string($_POST['ImageFileName']);
   $esc_vendorID = mysql_real_escape_string($_POST['VendorId']);

   $insertitem = "INSERT INTO InventoryItem(ItemId, Description, Size, Division, Department, Category, ItemCost, ItemRetail, ImageFileName, VendorId) values ('$esc_itemId', '$esc_description', '$esc_size', '$division', '$department', '$category', '$itemCost', '$itemRetail', '$esc_imageFileName', '$esc_vendorID');";

   $result = mysql_query($insertitem);
   echo $result;
   $message = "";

   if(!$result){

   $message = "Error in inserting item: $itemId .". mysql_error();

   }
   else{

   $message = "Item: $itemId inserted successfully.";

   }

   ui_show_item_insert_result($message, $itemId, $result);
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
