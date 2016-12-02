<?php
// File that contains login info for database
require('db_cn.inc');
include 'header.php';



$storeName = $_POST['StoreName'];
//echo "Store Name: ".$storeName;
//echo "<br />";
$startDate = $_POST['startDate'];
//echo "Start Date: ".$startDate;
//echo "<br />";
$endDate = $_POST['endDate'];
//echo "End Date: ".$endDate;
//echo "<br />";


show_item_delivered($storeName, $startDate, $endDate);
function show_item_delivered($storeName, $startDate, $endDate){
			//echo "StoreName is ".$storeName."";
			connect_and_select_db(DB_SERVER, DB_UN, DB_PWD, DB_NAME);
			
			
	
			
			//find the orderID which is matching the storename and the date
			$sql_orderId = "SELECT OrderId, DateTimeOfOrder FROM `Order` WHERE ((`DateTimeOfOrder` > '$startDate') AND (`DateTimeOfOrder` < '$endDate')) AND StoreId in (SELECT StoreId FROM `RetailStore` WHERE StoreName ='Long Pond Road Greece');";


			$resule_orderId = mysql_query($sql_orderId);
			if (!$resule_orderId)
				  {
					 echo "The retrieval was unsuccessful: ".mysql_error();
					 exit;
				  }
			
			  
			  echo"
			  <h2>Item Delivered Report</h2>
			<form action='export_delivered.php' method='post'>
			<table align='center'>
					<tr>
						<th style=\"padding-right: 15px;\" align='center'><u>Order ID</u></th>
						<th style=\"padding-right: 15px;\" align='center'><u>Item ID</u></th>
						<th style=\"padding-right: 15px;\" align='center'><u>Item Name</u></th>
						<th style=\"padding-right: 15px;\" align='center'><u>DateTimeOfOrder</u></th>
					
					</tr>
		 		";
				$count = 0;
				$countO = 0;
				$array = 0;
				 while ($row = mysql_fetch_assoc($resule_orderId))
			  		{		
					 
						  $orderId = $row['OrderId'];
						 // $orderId_ex = 'orderId'.$count;
						  $dateTimeOfOrder = $row['DateTimeOfOrder'];
						// $dateTimeOfOrder_ex = 'dateTimeOfOrder'.$count;
						 $countO ++;
						  
						 $sql_itemInfo = "SELECT ItemId, Description FROM InventoryItem WHERE ItemId in (SELECT ItemId FROM OrderDetail WHERE OrderId = '$orderId');";
						 $item_result = mysql_query($sql_itemInfo);
						 while($qty_row = mysql_fetch_assoc($item_result)){
						 
						 	$itemId = $qty_row['ItemId'];
							$description = $qty_row['Description'];
							$count++;
							//echo"count is ".$count."\n";
							$array++;
							//echo"array count is ".$array."\n";
							$itemId_ex = '$itemId_ex'.$count;
							//echo"itemid is ".$itemid_ex."\n";
							$description_ex = 'description_ex'.$count;
							//echo"description is ".$description_ex."\n";
							$dateTimeOfOrder_ex = 'dateTimeOfOrder'.$count;
							$orderId_ex = 'orderId'.$count;
							//echo"qty is ".$qty_ex."\n";
							
							 echo"
								<tr>
								
								<td><p style=\"padding-right: 15px;\">".$orderId."</p></td>
								<input type='hidden' name='$orderId_ex' value='$orderId' />
								
								<td><p style=\"padding-right: 15px;\">".$itemId."</p></td>
								<input type='hidden' name='$itemId_ex' value='$itemId' />
								
								<td><p style=\"padding-right: 15px;\">".$description."</p></td>
								<input type='hidden' name='$description_ex' value='$description' />
								<td><p style=\"padding-right: 15px;\">".$dateTimeOfOrder."</p></td>
								<input type='hidden' name='$dateTimeOfOrder_ex' value='$dateTimeOfOrder' />
								
								</tr>
								
								";
						
						 }
						 
						 
				
				}
				$array = $count + $countO;
			echo"
						<input type='hidden' name='count' value='$count' />
						<input type='hidden' name='array' value='$array' />
						</table>

						
								<div class='button'>
								 <input type='submit' name='submit' value='Download CSV file' />
								
							</div>
				</form>
					
					";
					
					
			
	
			
		}

      


		//Function to connect to the database
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
