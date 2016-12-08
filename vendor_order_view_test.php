<?php
	include 'headerVendor.php';
	
?>
<?php
 echo"
   <h2>All Pending Orders</h2>";
function show_order($result, $orderStatus)
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
		 $status = $row['Status'];
		 $completedatetime = $row['DateTimeOfFulfillment'];
		 
		 
		 echo"
	 		<div id='callToAction'>
				<br>
	       <form action='view_result_ui.php' method='post'>
				<input type='hidden' name='pop_storeid' value='$storeid' />
				<input type='hidden' name='pop_status' value='$status' />
				<input type='hidden' name='pop_orderdatetime' value='$orderdatetime' />
				<input type='hidden' name='pop_completedatetime' value='$completedatetime' />
				<input type='hidden' name='pop_orderid' value='$orderid' />
				
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
			 // Get the description and size from each item in the order
			 while($item_row = mysql_fetch_assoc($item_result))
			 {
				 $_id_for_next_item = "item".$count;
				 $_description = $item_row['Description'];
				 $_size = $item_row['Size'];
			
				 echo"
				 	
				 		<input type='hidden' name='item$count' value='$_description' />
						<input type='hidden' size='5' name='qty$count' value='$qty' />
					
				 ";
			 }
		 }
				
				echo"
				<input type='hidden' name='count' value='$count' />
	 			<h3>Order Id: $orderid
				 <input type='submit' id='submit' name='submit' value='View Detail'>

				 </form>
	 		</div>
	 		";
    
		/*echo"
			<p align='center'>-----------------------------------------------------------------------------------------------</p>
		<table align='center'>

			<tr>
				<th><font color='black'><u><strong><p style=\"padding-right: 30px;\" align='center'>Item Description</p></font></strong></u></td>
				<th><font color='black'><u><strong><p style=\"padding-right: 30px;\" align='center'>Quantity</p></font></strong></u></td>
			</tr>


		 ";
*/
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

			 // Get the description and size from each item in the order
			 while($item_row = mysql_fetch_assoc($item_result))
			 {
				 $_id_for_next_item = "item".$count;
				 $_description = $item_row['Description'];
				 $_size = $item_row['Size'];
				 /*
				 echo"
				 	<tr>
				 		<td><p style=\"padding-right: 30px;\" align='left'>".$_description.", ".$_size."</p></td>
						<td><input type='text' size='5' id='".$_id_for_next_item."' value='$qty' readonly/></td>
					</tr>
				 ";*/
			 }
		 }

	}




	echo "</table>";
	echo "</form>";




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
