<?php
// File that contains login info for database
require('db_cn.inc');
include 'header.php';



$storeName = $_POST['StoreName'];


show_item($storeName);
function show_item($storeName){
			//echo "StoreName is ".$storeName."";
			connect_and_select_db(DB_SERVER, DB_UN, DB_PWD, DB_NAME);
			$sql_showItem = "SELECT ItemId, QuantityInStock FROM Inventory WHERE QuantityInStock >'10' AND StoreId in (SELECT StoreId FROM RetailStore WHERE StoreName = '$storeName');";
			$result = mysql_query($sql_showItem);
			if (!$result)
				  {
					 echo "The retrieval was unsuccessful: ".mysql_error();
					 exit;
				  }
		      
			  
			  echo"
			  <h2>Item Inventory Report</h2>
			<form action='export_item.php' method='post'>
			<table align='center'>
					<tr>
						<th style=\"padding-right: 15px;\" align='center'><u>Item ID</u></th>
						<th style=\"padding-right: 15px;\" align='center'><u>Item Name</u></th>
						<th style=\"padding-right: 15px;\" align='center'><u>Item Size</u></th>
						<th style=\"padding-right: 15px;\" align='center'><u>Division</u></th>
						<th style=\"padding-right: 15px;\" align='center'><u>Department</u></th>
						<th style=\"padding-right: 15px;\" align='center'><u>Category</u></th>
						<th style=\"padding-right: 15px;\" align='center'><u>Item Cost</u></th>
						<th style=\"padding-right: 15px;\" align='center'><u>Item Retail</u></th>
						<th style=\"padding-right: 15px;\" align='center'><u>Image File Name</u></th>
						<th style=\"padding-right: 15px;\" align='center'><u>Vendor ID</u></th>
						<th style=\"padding-right: 15px;\" align='center'><u>Quantity</u></th>
					</tr>
		 		";
				$count = 0;
				$array = 0;
				 while ($row = mysql_fetch_assoc($result))
			  		{		
					 
						 $itemid = $row['ItemId'];
						 $qty = $row['QuantityInStock'];
						 $qty_sql = "SELECT * FROM `InventoryItem` WHERE ItemId='$itemid';";
						 $item_result = mysql_query($qty_sql);
						 while($qty_row = mysql_fetch_assoc($item_result)){
							 $description =$qty_row['Description'];
							 $size = $qty_row['Size'];
							 $division = $qty_row['Division'];
							 $department = $qty_row['Department'];
							 $category = $qty_row['Category'];
							 $itemCost = $qty_row['ItemCost'];
							 $itemRetail = $qty_row['ItemRetail'];
							 $imageFileName =$qty_row['ImageFileName'];
							 $vendorId = $qty_row['VendorId'];
						    //$description = $qty_row['Description'];
						 	
							$count++;
							//echo"count is ".$count."\n";
							$array++;
							//echo"array count is ".$array."\n";
							$itemid_ex = 'item_ex'.$count;
						
							$description_ex = 'description_ex'.$count;
							
							$size_ex = 'size_ex'.$count;
							$division_ex = 'division_ex'.$count;
							$department_ex = 'department_ex'.$count;
							$category_ex = 'category_ex'.$count;
							$itemCost_ex = 'itemCost_ex'.$count;
							$itemRetail_ex = 'itemRetail_ex'.$count;
							$imageFileName_ex = 'imageFileName_ex'.$count;
							$vendorId_ex = 'vendorId_ex'.$count;
							
							$qty_ex = 'qty_ex'.$count;
						
							
							 echo"
								<tr>
								<td><p style=\"padding-right: 15px;\">".$itemid."</p></td>
								<input type='hidden' name='$itemid_ex' value='$itemid' />
								
								<td><p style=\"padding-right: 15px;\">".$description."</p></td>
								<input type='hidden' name='$description_ex' value='$description' />
								
								<td><p style=\"padding-right: 15px;\">".$size."</p></td>
								<input type='hidden' name='$size_ex' value='$size' />
								
								<td><p style=\"padding-right: 15px;\">".$division."</p></td>
								<input type='hidden' name='$division_ex' value='$division' />
								
								<td><p style=\"padding-right: 15px;\">".$department."</p></td>
								<input type='hidden' name='$department_ex' value='$department' />
								
								<td><p style=\"padding-right: 15px;\">".$category."</p></td>
								<input type='hidden' name='$category_ex' value='$category' />
								
								<td><p style=\"padding-right: 15px;\">".$itemCost."</p></td>
								<input type='hidden' name='$itemCost_ex' value='$itemCost' />
								
								<td><p style=\"padding-right: 15px;\">".$itemRetail."</p></td>
								<input type='hidden' name='$itemRetail_ex' value='$itemRetail' />
								
								<td><p style=\"padding-right: 15px;\">".$imageFileName."</p></td>
								<input type='hidden' name='$imageFileName_ex' value='$imageFileName' />
								
								<td><p style=\"padding-right: 15px;\">".$vendorId."</p></td>
								<input type='hidden' name='$vendorId_ex' value='$vendorId' />
								
								<td><p style=\"padding-right: 15px;\">".$qty."</p></td>
								
								<input type='hidden' name='$qty_ex' value='$qty' />
								</tr>
								
								";
						
						 }
						 
				
				}
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
