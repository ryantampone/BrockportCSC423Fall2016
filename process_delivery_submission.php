<?php
require('db_cn.inc');
require('process_delivery_message.inc');

process_delivery_submission();

function process_delivery_submission()
{
		//Get values from Post method
		$storeID = $_POST['storeID'];
		$orderid = $_POST['passorderid'];
		$numRecords = $_POST['numRecords'];
		$dateFulfilled = $_POST['fulfillmentDate'];
		$status = 'Delivered';


		//Update Order with Status Delivered and Fulfillment Date
		$updateOrderQuery = = "UPDATE `Order` SET Status='$status', DateTimeOfFulfillment='$dateFulfilled';";
		$resultOrder = mysql_query($updateOrderQuery);
		echo $resultOrder;
		$messageOrder = "";
		if (!$resultOrder)
		{
	  	  $messageOrder = "Error Processing Delivery For Order ID: $orderid: ". mysql_error();
		}
		else
		{
		  $messageOrder = "Data for order: $dateFulfilled , $status processed successfully.";

		}


//--------------Dynamic Item Updates-----------------------------
		$count=0;
		while ($numRecords >= 0)
		{
			$count++;
			//Get a variable with descX in it to be used to reference in the post method
			$desc='desc'.$count;
			$itemDec = $_POST[$desc];
			//Get a variable with qtyX in it to be used to reference in the post method
			$item='item'.$count;//gets qty
			$qty = $_POST[$item];
			//$ItemNum = "item".$count;


			//Step 1: Get Item Id from Description
			$sqlGetItemID = "SELECT ItemId FROM `InventoryItem` WHERE Description='$desc'";
			$resultItemID = mysql_query($sqlGetItemID);
			if (!$resultItemID)
			{
				 echo "The retrieval od Item ID was unsuccessful: ".mysql_error();
				 exit;
			}
			//$result is non-empty. So count the rows
			$numrowsID = mysql_num_rows($resultItemID);
			$messageID = "";
			if ($numrowsID == 0)
				 $messageID = "No Item found in database with the provided ID";


			//Step 2: Get the QTY of the item ID from aboves
			$sqlGetItemQTY = "SELECT QuantityInStock FROM `Inventory` WHERE ItemId='$resultItemID'";
			$resultItemQTY = mysql_query($sqlGetItemQTY);
			if (!$resultItemQTY)
			{
				 echo "The retrieval of Item ID was unsuccessful: ".mysql_error();
				 exit;
			}
			//$result is non-empty. So count the rows
			$numrowsID = mysql_num_rows($resultItemQTY);
			$messageQTY = "";
			if ($numrowsID == 0)
			{
				 //just insert a new item into inventory with the QTY provided, need StoreId, ItemId, QuantityInStock
				 $insertNewInventoryItemQuery = "INSERT INTO `Inventory` (StoreId, ItemId, QuantityInStock) values ('$storeID', '$resultItemID', '$resultItemQTY');";
				 $resultInsert = mysql_query($insertNewInventoryItemQuery);
			   echo $resultInsert;
			   $messageInsert = "";
			   if(!$resultInsert)
				 {
			   $messageInsert = "Error in inserting item: $resultItemID". mysql_error();
			   }
			   else
				 {
			   $messageInsert = "Item: $resultItemID inserted successfully.";
			   }

			}
			else
			{
				//Add QTY currently in Table with QTY being Delivered
				$newTotalQTY = ($resultItemQTY + $qty);
				$updateInventoryItemQuery = "UPDATE `Inventory` SET QuantityInStock='$newTotalQTY' WHERE ItemId='$resultItemID'";
				$resultUpdateQty = mysql_query($updateInventoryItemQuery);
				echo $resultUpdateQty;
				$messageUpdateQTY = "";
				if (!$resultUpdateQty)
				{
			  	  $messageUpdateQTY = "Error in updating QTY". mysql_error();
				}
				else
				{
				  $messageUpdateQTY = "QTY for Item: $resultItemID updated successfully to $newTotalQTY.";
				}
			}
			$numRecords--;
		}

	 show_delivery_result($messageOrder, $messageInsert, $messageUpdateQTY)
}

// Function to connect to the database
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
