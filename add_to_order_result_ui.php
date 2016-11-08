<?php
	include 'header.php';
?>
<?php
/*
  $sql_stmt = SELECT Description, Size FROM InventoryItem WHERE (VendorId='$vendorid');
  $result = mysql_query($sqp_stmt);
  if (!result)
  {
    echo "Retrieval of Items unsuccessful";
    exit;
  }
  $count = 0;
  $item_array = array();
  while($row = mysql_fetch_assoc($result))
  {
    $item_for_next_item = "item".$count;
    $_description = $row['Description'];
    $_size = $row['Size'];

    echo "
      <label>".$_description.", ".$_size."</label>
      <input type='text' size='5' id='".$_id_for_next_item."' />
      <br/>
    ";

    $item_array[] = $id_for_next_item;
    $count++;

  }
*/

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
			<h2>Current Item in your Order</h2>
		</div>
		";

  // If the message is non-null and not an empty string print it
  // message contains the lastname and firstname
  if ($message)
  {
    if ($message != "")
       {
	 echo '<center><font color="blue">'.$message.'</font></center><br />';
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

		 echo"
		 <form action='' method='post'>
			 	<table align='center'>
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
				 	<tr>
				 		<td><p style=\"padding-right: 15px;\" align='right'>".$_description.", ".$_size."</p></td>
						<td><input type='text' size='5' id='".$_id_for_next_item."' value='$qty'/></td>
					</tr>
				 ";
			 }
		 }

	}

	echo "</table>";
	echo "</form>";
	echo "<hr/>";



  echo "</BODY>";
  echo "</HTML>";


}

?>
