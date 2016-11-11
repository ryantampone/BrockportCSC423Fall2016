
<?php


require('db_cn.inc');

//This file contains php code that will be executed after the
//insert operation is done.
//require('add_to_order_result_ui');

// Main control logic
update_order();

//-------------------------------------------------------------
function update_order()
{
	// Connect to the 'test' database
        // The parameters are defined in the teach_cn.inc file
        // These are global constants
	connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);
  $order_num_items = $_POST['order_numitems'];
  $vendor_num_items = $_POST['vendor_numitems'];

  // Arrays that hold respective info for items that already exist in current order
  $update_desc_array = array();
  $update_qty_array = array();

  // Arrays that holds respective info for are not included in current order
  $add_desc_array = array();
  $add_qty_array = array();

  // This for-loop gets all of the values in the current order
  for($j = 1; $j <= $vendor_num_items; $j++)
  {
    $vendor_desc_id = "vendor_desc".$j;
    $vendor_qty_id = "getItem".$j;
    $vendor_desc = $_POST[$vendor_desc_id];
    $vendor_qty = $_POST[$vendor_qty_id];

    // This for-loop gets all of the values entered in the add to order section
    for($i = 1; $i <= $order_num_items; $i++)
    {
      $order_desc_id = "order_desc".$i;
      $order_qty_id = "item".$i;
      $order_qty = $_POST[$order_qty_id];
      $order_desc = $_POST[$order_desc_id];

      //echo "Vendor Desc = ".$vendor_desc.", Order Desc = ".$order_desc."<br/>";
      if($vendor_desc == $order_desc)
      {
        //echo "Entered<br/>";
        if($vendor_qty != "")
        {
            //echo "Add quantity = ".$vendor_qty." to order item = ".$order_desc."<br/>";
            $new_order_qty = $vendor_qty + $order_qty;
            //echo "New quantity = ".$new_order_qty."<br/>";
            $update_desc_array[] = $order_desc;
            $update_qty_array[] = $new_order_qty;
        }
        break;
      }

    }
    if($vendor_desc != $order_desc)
    {
      if($vendor_qty != "")
      {
        //echo "New item added to order: Desc = ".$vendor_desc.", Quantity = ".$vendor_qty."<br/>";
        $add_desc_array[] = $vendor_desc;
        $add_qty_array[] = $vendor_qty;
      }
    }

    //echo "<br/><br/>";
  }



  $add_array_count = sizeof($add_desc_array);
  //echo $desc_array_count."<br/>";
  $update_array_count = sizeof($update_qty_array);
  //echo $qty_array_count."<br/>";


	// Add item to order that doesn't already exist in current order
  $tmp_cnt = 0;
  // "Add item not in order:<br/>";
  while($tmp_cnt < $add_array_count)
  {
    $_esc_val = mysql_real_escape_string($add_desc_array[$tmp_cnt]);
    $item_sql_res = mysql_query("SELECT ItemId FROM `InventoryItem` WHERE Description='$_esc_val';");
    while ($row = mysql_fetch_assoc($item_sql_res))
    {
 		   $my_item_id = $row['ItemId'];
    }
    $my_order_id = $_POST['myorderid'];
    $my_qty = $add_qty_array[$tmp_cnt];
    //echo $add_desc_array[$tmp_cnt].", ".$add_qty_array[$tmp_cnt]."<br/>";
    // "OrderId = ".$my_order_id.", ItemId = ".$my_item_id.", Quantity = ".$my_qty."<br/>";

    $sql_add = "INSERT INTO OrderDetail (OrderId, ItemId, QuantityOrdered) VALUES ('$my_order_id', '$my_item_id', '$my_qty');";
    $sql_add_res = mysql_query($sql_add);
    // $sql_add_res;
    /*if(!$sql_add_res)
      $messageAdd = "Error in inserting item ".$add_desc_array[$tmp_cnt].": ".mysql_error();
    else $messageAdd = "Item ".$add_desc_array[$tmp_cnt]." added successfully.<br/>";
*/
    $tmp_cnt++;
  }
	if ($add_array_count == 0)
		// "No new items added to order.<br/>";


	// Add quantites of selected items that do exist in current order
  $tmp_cnt = 0;
  // "<br/>Update item quantites in order:<br/>";
  while($tmp_cnt < $update_array_count)
  {
    $_esc_val = mysql_real_escape_string($update_desc_array[$tmp_cnt]);
    $item_sql_res = mysql_query("SELECT ItemId FROM `InventoryItem` WHERE Description='$_esc_val';");
		while($row = mysql_fetch_assoc($item_sql_res))
		{
			$my_item_id = $row['ItemId'];
		}
		$my_order_id = $_POST['myorderid'];
		$my_qty = $update_qty_array[$tmp_cnt];
		// "OrderId = ".$my_order_id.", ItemId = ".$my_item_id.", Quantity = ".$my_qty."<br/>";

		$sql_update = "UPDATE OrderDetail SET QuantityOrdered='$my_qty' WHERE (OrderId='$my_order_id' AND ItemId = '$my_item_id');";
		$sql_update_res = mysql_query($sql_update);
		// $sql_update_res;
		/*if(!$sql_update_res)
			echo = "Error in updating item: ".$update_desc_array[$tmp_cnt].":".mysql_error();
		else $messageUpdate = "Item ".$update_desc_array[$tmp_cnt]." updated successfully.<br/>";
*/
    $tmp_cnt++;
  }
	if ($update_array_count == 0)
		// "No items updated.";

	$message = "Order ".$my_order_id." updated successfully.";

	echo "<HTML>";
  echo "<HEAD>";
  echo "</HEAD>";
  echo "<BODY>";

  // If the message is non-null and not an empty string print it
  // message contains the lastname and firstname
	echo "<center><font color='blue'>$message</font></center><br />";

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
