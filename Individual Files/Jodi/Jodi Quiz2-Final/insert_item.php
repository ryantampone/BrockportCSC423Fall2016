<?php

require('dblogin.inc');

require('item_insert_result_ui.inc');

insert_item();

function insert_item(){

connect_and_select_db(DB_SERVER, DB_UN, DB_PWD, DB_NAME);

   $itemTypeName = $_POST['ItemTypeName'];
   $barCodePrefix = $_POST['BarcodePrefix'];
   $ageSensitive =  $_POST['AgeSensitive'];
   $validityDays = $_POST['ValidityDays'];
   $notes  = $_POST'Notes'];
   $status = $_POST['Status'];


   $esc_itemTypeName = mysql_real_escape_string($_POST['ItemTypeName']);
   $esc_barCodePrefix = mysql_real_escape_string($_POST['BarcodePrefix']);
   $esc_ageSensitive= mysql_real_escape_string($_POST['AgeSensitive']);
   $esc_validityDays = mysql_real_escape_string($_POST['ValidityDays']);
   $esc_notes = mysql_real_escape_string($_POST['Notes']);
   $esc_status = mysql_real_escape_string($_POST['Status']);


   $insertitem = "INSERT INTO InventoryItemType(ItemTypeName, BarcodePrefix, AgeSensitive,
     ValidityDays, Notes, status) values ('$esc_itemTypeName', '$esc_barCodePrefix, '$esc_ageSensitive',
 '$validityDays', '$notes', '$status');";

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
