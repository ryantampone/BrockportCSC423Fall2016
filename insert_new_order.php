<?php
require('db_cn.inc');



insert_new_order();


function insert_new_order()
{


		connect_and_select_db(DB_SERVER, DB_UN, DB_PWD, DB_NAME);

	   $vendorId = $_POST['vendor_id'];
	   //echo "$vendorId";
	   $storeName = $_POST['Storename'];
		 $esc_storeName = mysql_real_escape_string($_POST['Storename']);



	$sql_storeId = "SELECT StoreId FROM RetailStore WHERE StoreName='$esc_storeName';";
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
	  //echo "$orderId";


	   $sql_last_orderDetailID = "SELECT `OrderDetailId` FROM `OrderDetail` ORDER BY `OrderDetailId` DESC LIMIT 1";
				   $result_last_orderDetailID = mysql_query($sql_last_orderDetailID);
				   while($row = mysql_fetch_assoc($result_last_orderDetailID))
					{
						$orderDetail = $row['OrderDetailId'];
					}
					//echo "$orderId";
				//echo "Last OrderDetailID Is is :";
				//echo "$orderDetail";
				$orderDetail = $orderDetail +1;
				//echo "$orderDetail";

	   connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);



	 $sql_count = "SELECT COUNT(*) as total FROM InventoryItem WHERE VendorId=$vendorId;";
	   $result_count = mysql_query($sql_count);

	  $row = mysql_fetch_assoc($result_count);

					$total_row = $row['total'];
					//echo "Total Item = ". $total_row. "<br />";


				//echo "Total Item = ".$num_items."<br />";



  //echo"Silly!";
       //echo var_dump($_POST);
	   $item = array();
	   $qty_array = array();
	   $num_items = $_POST[$total_item];
	   //echo "Num items = ".$num_items."<br/><br/>";


	   for($i = 1; $i <= $total_row; $i++)
	   {



		   $itemcount = "item".$i;
		   $itemId = $_POST[$itemcount];
		   $qty = "qtyId".$i;
		   $qty = $_POST[$qty];

       //echo "Next item: ".$itemId.", Quantity: ".$qty."<br/>";

		   if($qty != ""){

			    $item[] = "$itemId";
				  //echo "Insert Item = ".$item[$i].", ";
				  $qty_array[] = "$qty";
				  //echo "Insert QTY = ".$qty_array[$i]."<br />";

			   }





		   //echo "Quantity = ".$qty."<br/>";
		   //$qty[$i] = "$qty";
		   //echo "Insert QTY = ".$qty[$i]."<br />";



	   }

	   $array_size = sizeof($item);
	   //echo "Size of Item Array = ".$array_size. "<br />";
	  $size_qty = sizeof($qty_array);
	   //echo "Size of QTY Array = ".$size_qty."<br />";

	  // echo "OrderDetailId = ".$orderDetail."<br />";
	   //echo "OrderId = ".$orderId."<br />";

     //echo "<br/>";

        if($array_size >0){
				connect_and_select_db(DB_SERVER, DB_UN, DB_PWD, DB_NAME);
        //echo "Order Values: ".$orderId.", ".$vendorId.", ".$storeId.", ".$dateTimeOfOrder.", ".$status."<br/>";
				$sql_order = "INSERT INTO `Order`(`OrderId`, `VendorId`, `StoreId`, `DateTimeOfOrder`, `Status`, `DateTimeOfFulfillment`) VALUES ('$orderId','$vendorId','$storeId','$dateTimeOfOrder','$status', ' ');";
	      $resule_order = mysql_query($sql_order);

				$j = 0;

	  		while($j<$size_qty){

				connect_and_select_db(DB_SERVER, DB_UN, DB_PWD, DB_NAME);
        //echo "OrderDetail Values: ".$orderId.", ".$item[$j].", ".$qty_array[$j]."<br/>";
				$sql_insertOrder = "INSERT INTO `OrderDetail`(`OrderId`, `ItemId`, `QuantityOrdered`) VALUES ('$orderId','$item[$j]','$qty_array[$j]');";
				$insertOrder = mysql_query($sql_insertOrder);
				$j++;


				}

				$message = 'Order '.$orderId.' inserted successfully';
				echo "<SCRIPT LANGUAGE='JavaScript'>
					 window.alert('$message')
					 window.location.href='index.php';
					 </SCRIPT>";


	#echo '<center><font color="blue">Order '.$orderId.' inserted successfully.</font></center><br />';
	echo "<form action='index.php'><input id='tiny_button' type='submit' id='submit' value='Return to Main Menu'/></form>";


			}
	   else{

		     echo"No item selected";

			 		   }

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
