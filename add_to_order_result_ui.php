<?php
	include 'header.php';
?>
<?php

function show_order($message, $result)
{
  //----------------------------------------------------------
  // Start the html page
  echo "<HTML>";
  echo "<HEAD>";
  echo "</HEAD>";
  echo "<BODY>";

	echo"
		<div id='callToAction'>
			<h2>Current Items in your Order</h2>
		</div>
		";

  // If the message is non-null and not an empty string print it
  // message contains the lastname and firstname
  if ($message)
  {
    if ($message != "")
       {
	 		 	echo '<center><font color="blue">'.$message.'</font></center><br />';
				exit;
       }
  }

   //While there are more rows in the $result, get the next row
   //as an associative array

   while ($row = mysql_fetch_assoc($result))
   {
		 $orderid = $row['OrderId'];
		 $vendorid = $row['VendorId'];
		 $storeid = $row['StoreId'];
		 $orderdatetime = $row['DateTimeOfOrder'];
		 $status = $row['Status'];
		 $completedatetime = $row['DateTimeOfFulfillment'];

		 $sql_vendor_info = "SELECT * FROM Vendor WHERE VendorId=$vendorid;";
		 $vendor_result = mysql_query($sql_vendor_info);

		 echo"
		 <form action='update_order.php' method='post'>
		 		<input type='hidden' name='myorderid' value='$orderid' />
			 	<table align='center'>
					<tr>
						<td style=\"padding-right: 30px;\" align='center'>Item Description</td>
						<td style=\"padding-right: 30px;\" align='center'>Size</td>
						<td style=\"padding-right: 30px;\" align='center'>Quantity</td>
					</tr>
		 ";

		 $order_sql = "SELECT * FROM OrderDetail WHERE (OrderId = $orderid);";
		 $order_result = mysql_query($order_sql);

		 // Get the value of each orderdetail ordered within the given order
		 $count = 0;
		 while($order_row = mysql_fetch_assoc($order_result))
		 {
			 $count++;
			 $itemid = $order_row['ItemId'];
			 $qty = $order_row['QuantityOrdered'];

			 $item_sql = "SELECT Description, Size FROM InventoryItem WHERE (ItemId = '$itemid');";
			 $item_result = mysql_query($item_sql);

			 // Get the description and size from each item in the order
			 while($item_row = mysql_fetch_assoc($item_result))
			 {
				 $_id_for_next_item = "item".$count;
				 $order_desc_id = "order_desc".$count;
				 $_description = $item_row['Description'];
				 $_size = $item_row['Size'];
				 //$item_array[] = $_description;
				 echo"
				 	<tr>
				 		<td><p style=\"padding-right: 30px;\">".$_description."</p></td>
						<td><p style=\"padding-right: 30px;\">".$_size."</p></td>
						<td><input type='text' size='5' name='$_id_for_next_item' value='$qty' style=\"background-color: #d6dbdf;\" readonly/></td>
					</tr>
				 ";
				 echo "<input type='hidden' name=\"$order_desc_id\" value=\"$_description\" />";
			 }
		 }

	}

	echo "</table>";
	//echo "</form>";
	echo "<input type='hidden' name='order_numitems' value='$count' />";
	echo "<hr/><br/><br/>";

	// End form of items in current order
	// Begin form of list of items to add to order
	//

	$vendor_row = mysql_fetch_assoc($vendor_result);
	if ($vendor_row)
		$vendorname = $vendor_row['VendorName'];
	else echo "No vendor obtained.";

	echo "
		<h2>Add Items to Order</h2>
		<h4 align='center'>Vendor $vendorid: $vendorname</h4>
		<!--<form action='update_order.php' method='post'>-->
			<table align='center'>
				<tr>
					<td style=\"padding-right: 30px;\" align='center'>Item Description</td>
					<td style=\"padding-right: 30px;\" align='center'>Size</td>
					<td style=\"padding-right: 30px;\" align='center'>Quantity</td>
				</tr>
	";

	$sql_vendor_items = "SELECT Description, Size FROM InventoryItem WHERE (VendorId = '$vendorid');";
	$vendor_items_result = mysql_query($sql_vendor_items);
	$num_items = mysql_num_rows($vendor_items_result);

	if ($num_items == 0)
		echo "This vendor does not have any items.";

	$item_count = 0;
	$vendor_item_id = "";
	while ($vendor_items_row = mysql_fetch_assoc($vendor_items_result))
	{
		$item_count++;
		$vendor_item_id = "getItem".$item_count;
		$vendor_desc_id = "vendor_desc".$item_count;
		$vendor_item_desc = $vendor_items_row['Description'];
		$vendor_item_size = $vendor_items_row['Size'];
		echo "
			<tr>
				<td><p style=\"padding-right: 30px;\">".$vendor_item_desc."</p></td>
				<td><p style=\"padding-right: 30px;\">".$vendor_item_size."</p></td>
				<td><input type='text' size='5' name='$vendor_item_id' id='$vendor_item_id' onKeyPress='return hasToBeNumber(event)' onpaste='return false' /></td>
			</tr>
		";
		echo "<input type='hidden' name=\"$vendor_desc_id\" value=\"$vendor_item_desc\" />";
	}

	echo "
			</table>
			<div class='button'>
				<input id='tiny_button' type='submit' id='submit' name='submit' >
				<input id='tiny_button' type='reset' id='reset' name='reset'>
			</div>
			<input type='hidden' name='vendor_numitems' value='$num_items' />
		</form>
	";

  echo "</BODY>";
  echo "</HTML>";


}

?>
