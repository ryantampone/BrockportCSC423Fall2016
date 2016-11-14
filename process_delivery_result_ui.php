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


   //While there are more rows in the $result, get the next row
   //as an associative array
   while ($row = mysql_fetch_assoc($result))
   {
		 $orderid = $row['OrderId'];
		 $vendorid = $row['VendorId'];
		 $storeid = $row['StoreId'];
		 $orderdatetime = $row['DateTimeOfOrder'];
		 $status = 'Delivered';//$row['Status'];
		 $completedatetime = date("Y-m-d");
		 echo"
	 		<div id='callToAction'>
				<br>
	 			<h2>Order ID: $orderid: </h2>
	 		</div>
	 		";
		}


		 echo"
		 <form action='process_delivery_submission.php' method='post'>
			 <table align='center'>

			 <tr>
				 <td><p style=\"padding-right: 30px;\" align='right'>Nanno's Foods Store Location:</p></td>
				 <td><p style=\"padding-right: 30px;\" align='left'>$storeid</p></td>
			 </tr>
			 <tr>
	 			 <td><p style=\"padding-right: 30px;\" align='right'>Date and Time of Order Placement:</p></td>
	 			 <td><p style=\"padding-right: 30px;\" align='left'>$orderdatetime</p></td>
	 		 </tr>
			 <tr>
				 <td><p style=\"padding-right: 30px;\" align='right'>Date and Time of Order Fulfillment:</p></td>
				 <td><p style=\"padding-right: 30px;\" align='left'>$completedatetime</p></td>
			 </tr>
			</table>
			<input name='fulfillmentDate' id='fulfillmentDate' TYPE='hidden' SIZE='50' value='$completedatetime'/>
			<input name='updatedOrderStatus' id='updatedOrderStatus' TYPE='hidden' SIZE='50' value='$status'/>
			<input name='passorderid' id='passorderid' TYPE='hidden' SIZE='50' value='$orderid'/>
			<input name='storeID' id='storeID' TYPE='hidden' SIZE='50' value='$storeid'/>
		 ";

		 echo"
			<p align='center'>-----------------------------------------------------------------------------------------------</p>
		<table align='center'>

			<tr>
				<th><font color='black'><u><strong><p style=\"padding-right: 30px;\" align='center'>Item Description</p></font></strong></u></td>
				<th><font color='black'><u><strong><p style=\"padding-right: 30px;\" align='center'>Quantity</p></font></strong></u></td>
			</tr>


		 ";

		 $order_sql = "SELECT * FROM OrderDetail WHERE (OrderId = $orderid);";
		 $order_result = mysql_query($order_sql);

		 // Get the value of each orderdetail ordered within the given order
		 $count = 0;
		 $item_array = array();
		 while($order_row = mysql_fetch_assoc($order_result))
		 {
			 $count++;
			 $itemid = $order_row['ItemId'];
			 $qty = $order_row['QuantityOrdered'];

			 $item_sql = "SELECT Description, Size FROM InventoryItem WHERE (ItemId = $itemid);";
			 $item_result = mysql_query($item_sql);


			 while($item_row = mysql_fetch_assoc($item_result))
			 {
				 $_id_for_next_item = "item".$count;
				 $_description = $item_row['Description'];
				 $_size = $item_row['Size'];
				 echo"
				 	<tr>
				 		<td><p style=\"padding-right: 30px;\" align='right'>".$_description.", ".$_size."</p></td>
						<input name='desc$count' id='desc' TYPE='hidden' SIZE='5' value='$_description'/>
						<td><input type='text' size='5' name='$_id_for_next_item' id='$_id_for_next_item' value='$qty' readonly/></td>
						<td><input name='numRecords' id='numRecords' TYPE='hidden' SIZE='50' value='$count'/></td>
					</tr>
				 ";
			 }
		 }

	echo "</table>";
	echo"
	<div class='button'>
		<input id='tiny_button' type='submit' id='submit' name='submit' value='Process Delivery' >
	</div>
	";
	echo "</form>";
	echo "<br><br>";

  echo "</BODY>";
  echo "</HTML>";

}

function show_order_not_found($message)
{
  //----------------------------------------------------------
  // Start the html page
  echo "<HTML>";
  echo "<HEAD>";
  echo "</HEAD>";
  echo "<BODY>";

  // If the message is non-null and not an empty string print it
  // message contains the lastname and firstname
  if ($message)
  {
    if ($message != "")
       {
	 echo '<center><font color="blue">'.$message.'</font></center><br />';
       }
  }

	echo "</BODY>";
	echo "</HTML>";
}
?>
