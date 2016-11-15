
<?php


require('db_cn.inc');

//This file contains php code that will be executed after the
//insert operation is done.
//require('add_to_order_result_ui');

// Main control logic
confirm_return();

//-------------------------------------------------------------
function confirm_return()
{
	// Connect to the 'test' database
        // The parameters are defined in the teach_cn.inc file
        // These are global constants
	connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);
  $numitems = $_POST['numitems'];
  $storeid = $_POST['storeid'];
  $vendorid = $_POST['vendorid'];
  $return_date = date("Y-m-d");
  $return_time = date("h:i:sa");
  $return_date_time = $return_date." ".$return_time;

  // Test for correct values - WORKS
  //echo "Number of items = ".$numitems.", StoreId = ".$storeid.", VendorId = ".$vendorid."<br/>";

  // Create a new entry in ReturnToVendor
  $sql_add_RTV = "INSERT INTO ReturnToVendor (VendorId, StoreId, DateTimeOfReturn) VALUES ('$vendorid', '$storeid', '$return_date_time');";
  $sql_add_result = mysql_query($sql_add_RTV);
  if(!$sql_add_result)
    echo "Error in inserting ReturnToVendor: ".mysql_error();

  // Get the ID of the ReturnToVendor just created above
  // used for creating ReturnToVendorDetail later
  $sql_get_RTVid = "SELECT ReturnToVendorId FROM ReturnToVendor WHERE DateTimeOfReturn='$return_date_time';";
  $sql_get_result = mysql_query($sql_get_RTVid);
  if(!$sql_get_result)
    echo "Error in retrieving ReturnToVendorId: ".mysql_error();
  else
  {
    while($row = mysql_fetch_assoc($sql_get_result))
    {
      $RTV_id = $row['ReturnToVendorId'];
    }
  }

  // Test to see if ReturnToVendorId was retrieved correctly - WORKS
  //echo "RTV ID = ".$RTV_id;

  // For-loop to go through each items
  for($i = 1; $i <= $numitems; $i++)
  {
    // Dynamically retrieve the next itemid to be returned
    $next_desc = $_POST['desc'.$i];
    $esc_next_desc = mysql_real_escape_string($next_desc);
    $sql_get_itemid = "SELECT ItemId FROM InventoryItem WHERE Description='$esc_next_desc'";
    $sql_item_result = mysql_query($sql_get_itemid);
    while($item_row = mysql_fetch_assoc($sql_item_result))
    {
      $next_itemid = $item_row['ItemId'];
    }
    //echo "Item Desc = ".$next_desc.", Item ID = ".$next_itemid."<br/>";

    // Dynamically retrieve the next quantity to be returned
    $next_qty = $_POST['return'.$i];
    //echo "Quantity to return = ".$next_qty."<br/>";

    // Insert new ReturnToVendorDetail
    $sql_RTVD = "INSERT INTO ReturnToVendorDetail (ReturnToVendorId, ItemId, QuantityReturned) VALUES ('$RTV_id', '$next_itemid', '$next_qty')";
		$sql_insert_RTVD = mysql_query($sql_RTVD);
		if(!$sql_insert_RTVD)
			echo "Error in inserting ReturnToVendorDetail: ".mysql_error();

    // Update quantity in inventory
    $sql_inventory_qty = "SELECT QuantityInStock FROM Inventory WHERE StoreId='$storeid' AND ItemId='$next_itemid'";
    $sql_inventory_result = mysql_query($sql_inventory_qty);
    while($inventory_row = mysql_fetch_assoc($sql_inventory_result))
    {
      $inventory_qty = $inventory_row['QuantityInStock'];
    }
    $new_qty = $inventory_qty-$next_qty;
    //echo "Inventory quantity update: ".$inventory_qty." - ".$next_qty." = ".$new_qty."<br/><br/>";

		$sql_update_inventory = "UPDATE Inventory SET QuantityInStock='$new_qty' WHERE ItemId='$next_itemid' AND StoreId='$storeid'";
		$sql_update_result = mysql_query($sql_update_inventory);
		if(!$sql_update_result)
			echo "Error in updating Inventory: ".mysql_error();

  }

	echo "<HTML>";
  echo "<HEAD>";
  echo "</HEAD>";
  echo "<BODY>";

  // If the message is non-null and not an empty string print it
  // message contains the lastname and firstname
	echo '<center><font color="blue">Return processed successfully.</font></center><br />';

	echo "<form action='index.php'><input id='tiny_button' type='submit' id='submit' value='Return to Main Menu'/></form>";
	echo "</BODY>";
	echo "</HTML>";
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
