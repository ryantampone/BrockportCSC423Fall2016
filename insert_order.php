<?php
require('db_cn.inc');
require('new_order_result_ui.inc');
require('new_order.php');



insert_order();
check_order();
$item_array=return_array();
$quantity_array = return_qty();

function insert_order(){
connect_and_select_db(DB_SERVER, DB_UN, DB_PWD, DB_NAME);
   
 	$vendorId = $_POST['vendorid'];
   $storeId = $_POST['StoreId'];
   $dateTimeOfOrder = $_POST['DateTimeOfOrder'];
   $status = $_POST['Status'];
   /*if(!$storeId){
	    
		echo "ERROR";
	   
	   }
	else{
		
		echo "Correct!";
		}
   
}*/
   
   
   $len = sizeof($item_array);
   $key=0;
   $itemId=0;
   $newOrderArray=array();
   $newQtyArray=array();
   
   $last_orderId = "SELECT OrderId FROM Order ORDER BY DESC OrderId LIMIT 1";
   $orderId = mysql_query($last_orderId);
   $orderId++;
   $insertOrder = "INSERT INTO `Order`(`OrderId`, `VendorId`, `StoreId`, `DateTimeOfOrder`, `Status`, `DateTimeOfFulfillment`) VALUES ('$orderId','$vendorId', '$storeId','$dateTimeOfOrder','$status','')";
   $result_order = mysql_query($insertOrder);
   
   
   while($key < $len){
			$last_orderDetailId = "SELECT OrderDetailId FROM OrderDetail ORDER BY DESC OrderDetailId LIMIT 1";
			$orderDetailId = mysql_query($last_orderDetailId);
			$orderDetailId++;
		   	$item_info = $_POST[$item_array[$key]];
		   	$itemDescription = split(',',$item_info);
		   	$itemDescription = $itemDescription[0];
			$search_itemDescription = "SELECT `ItemId` FROM `InventoryItem` WHERE `Description`='$itemDescription';";
			$itemId = mysql_query($search_itemDescription);
		   	$qty = $_POST[$quantity_array[$key]];
			$insertorderDetail = "INSERT INTO `OrderDetail`(`OrderDetailId`, `OrderId`, `ItemId`, `QuantityOrdered`) VALUES ('$orderDetailId','OrderId','$itemId','$qty')";
			$result_orderDetail=mysql_query($insertorderDetail);
			$key++;
	   $nweOrderArray = array(
	   		$key => $itemid);
		$newQtyArray = array(
			$key => $qty);
	  
	}
}

 function check_order(){
	 
	  $search_order = "SELECT * FROM Order WHERE OrderId='$orderId'";
	  $display_order = mysql_query($search_order);
	  //echo"$display_order";
	  writeln($display_order);
	 
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

echo"LOL";

?>
