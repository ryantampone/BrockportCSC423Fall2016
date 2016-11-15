<?php
require('db_cn.inc');


	 
	   
	  
				
	   
insert_new_order();

function insert_new_order()
{
	
	   
	  /* $add_item = array();
	   $add_qty = array();
	   
	   
	   
	   for($j = 1; $j<$total_row; $j++){
		   
		   $input_qty = $qty[$j];
		   echo $input_qty;
		   
		   if($qty[$j] != ""){
			   
			   $add_item[$j] = $item[$j];
			   echo "New Item = ".$add_item[$j]."<br />";
			   $add_qty[$j] = $qty[$j];
			    echo "New Item = ".$add_qty[$j]."<br />";
			  
			   
			   }
		   
		   
		   
		   }
		   
		 */
	   
	   $vendorId = $_POST['vendor_id'];
	   //echo "$vendorId";
	   $storeName = $_POST['StoreId'];
	  //  echo "StoreName"." ".$storeName;
		

	connect_and_select_db(DB_SERVER, DB_UN, DB_PWD, DB_NAME);
	$sql_storeId = "SELECT StoreId FROM RetailStore WHERE StoreName='$storeName';";
	$sql_result = mysql_query($sql_storeId);

	while($row = mysql_fetch_assoc($sql_result))
	{
		$storeId = $row['StoreId'];
	}
	//echo "$storeId";
	

	   $dateTimeOfOrder = $_POST['DateTimeOfOrder'];
	   //echo "$dateTimeOfOrder";
	 
	   $status = $_POST['Status'];
	   //echo "$status";
	   $DateTimeOfFulfillment="";
	   connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);
	   $sql_last_orderID = "SELECT `OrderId` FROM `Order` ORDER BY `OrderId` DESC LIMIT 1";
	   $result_last_orderID = mysql_query($sql_last_orderID);
	   while($order_row = mysql_fetch_assoc($result_last_orderID))
		{
			$orderId = $order_row['OrderId'];
		}
		//echo "$orderId";
	   $orderId = $orderId +1;
	  echo "$orderId";
	  
	  
	   $sql_last_orderDetailID = "SELECT `OrderDetailId` FROM `OrderDetail` ORDER BY `OrderDetailId` DESC LIMIT 1";
				   $result_last_orderDetailID = mysql_query($sql_last_orderDetailID);
				   while($row = mysql_fetch_assoc($result_last_orderDetailID))
					{
						$orderDetail = $row['OrderDetailId'];
					}
					//echo "$orderId";
				echo "Last OrderDetailID Is is :";
				echo "$orderDetail";
				$orderDetail = $orderDetail +1;
				echo "$orderDetail";
	  
	  


	   $sql_order = "INSERT INTO `Order`(`OrderId`, `VendorId`, `StoreId`, `DateTimeOfOrder`, `Status`, `DateTimeOfFulfillment`) VALUES ('$orderId','$vendorId','$storeId','$dateTimeOfOrder','$status', ' ');";
	   $resule_order = mysql_query($sql_order);
	   
	  echo '<center><font color="blue">Order '.$orderId.' inserted successfully.</font></center><br />'; 
	   
        
	   // echo"Silly3";  
	   	

	  insert_new_order_detail($orderDetail, $orderId);
	   
	 }  
	
	
	
	
	

	   function insert_new_order_detail($orderDetail, $orderId){
		   
		   
		   connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);
	
	   
	
	 $sql_count = "SELECT COUNT(*) as total FROM InventoryItem WHERE VendorId=1;";
	   $result_count = mysql_query($sql_count);
	   
	  $row = mysql_fetch_assoc($result_count);
					
					$total_row = $row['total'];
					echo "Total Item = ". $total_row. "<br />";
				    
					
				//echo "Total Item = ".$num_items."<br />";
	
	
  
  //echo"Silly!";
       //echo var_dump($_POST);
	   $item = array();
	   $qty_array = array();
	   $num_items = $_POST[$total_item];
	   echo "Num items = ".$num_items."<br/><br/>";
	   
	   
	   for($i = 1; $i <= $total_row; $i++)
	   {

		   
		   //echo "Item Count = ".$itemcount. ", ";
		  
		   //echo "ITEM ID = ".$itemId.", ";
		   //$item[$i] = "$itemId";
		   //echo "Insert Item = ".$item[$i]."<br />";
		   $itemcount = "item".$i;  
		   $itemId = $_POST[$itemcount];
		   $qty = "qtyId".$i;
		   $qty = $_POST[$qty];
		   
		   if($qty != ""){
			   
			    $item[$i] = "$itemId";
				echo "Insert Item = ".$item[$i]."<br />";
				$qty_array[$i] = "$qty";
				echo "Insert QTY = ".$qty_array[$i]."<br />";
			   
			   }
		   
		   
		   
		   
		   
		   //echo "Quantity = ".$qty."<br/>";
		   //$qty[$i] = "$qty";
		   //echo "Insert QTY = ".$qty[$i]."<br />";
		   
		  
		
	   }
	   
	   $array_size = sizeof($item);
	   echo "Size of Item Array = ".$array_size. "<br />";
	  $size_qty = sizeof($qty_array);
	   echo "Size of QTY Array = ".$size_qty."<br />";
	   
	   echo "OrderDetailId = ".$orderDetail."<br />";
	   echo "OrderId = ".$orderId."<br />";
	   
	   		
	   
			
			$j = 0;

	  			while($j<$size_qty){
			
				connect_and_select_db(DB_SERVER, DB_UN, DB_PWD, DB_NAME);
				$sql_insertOrder = "INSERT INTO `OrderDetail`(`OrderId`, `ItemId`, `QuantityOrdered`) VALUES ('$orderId','$item[$j]','$qty_array[$j]');";
				$insertOrder = mysql_query($sql_insertOrder);
				$j++;
				/*echo "ITEM = ".$item[$j]."<br />";
				echo "QTY = ".$qty_array[$j]."<br />";
				/*$sql_itemId = "SELECT ItemId FROM InventoryItem WHERE Description='$desc';";
				$itemId = mysql_query($sql_itemId);
				 while($row = mysql_fetch_assoc($itemId))
				{
					$itemId = $row['ItemId'];
				}
		 
				//echo "Item Id"." ".$desc. " ";
				echo "$itemId";
				$qty = $qty_array[$j];
				echo "$qty";
				
				*/
				
				}
		   
		   
		   
		  /* connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);
		   $total_item = $_POST['total_item'];
		   echo"Total Item is:";
		   echo"$total_item";
		   $item_array = array();
		   $qty_array = array();
		  */
		   
		   //for($i=1 ; $i <)
		   
		   
		   /* while($i<$total_item){
			  
			   $_desc_id = "Item".$i;
			   $_description = $_POST['$vendor_desc_id'];
			   echo "Description is :";
			   echo "$_description";

			   $_qty_id = "Qty".$i;
			   $_qty = $_POST['$_qty_id'];
			   echo "QTY is:";
			   echo "$_qty";
			   $item_array[$i] = $_description;
			   //$size_array[$i] = $_size;
			   $qty_array[$i] = $_qty;
			   
			   $i++;
			   }
            */
			
	        //based on the the item name($desc), find out the itemId
	
		   			  

	   
	
	   
	  
  echo "<HTML>";
  echo "<HEAD>";
  echo "</HEAD>";
  echo "<BODY>";
  
	echo '<center><font color="blue">Order '.$orderId.' inserted successfully.</font></center><br />';
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
