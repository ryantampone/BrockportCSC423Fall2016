<?php
// File that contains login info for database
require('db_cn.inc');
include 'header.php';



$vendorName = mysqli_real_escape_string($_POST['VendorName']);
//echo "Vendor Name: ".$vendorName;
//echo "<br />";



show_frequently_items($vendorName);
function show_frequently_items($vendorName){
			//echo "StoreName is ".$storeName."";
			connect_and_select_db(DB_SERVER, DB_UN, DB_PWD, DB_NAME);
			
			
	
			
			//find the orderID which is matching the storename and the date
			$sql_returnToVendorId = "SELECT `ReturnToVendorId` FROM `ReturnToVendor` WHERE `VendorId` in (SELECT `VendorId` FROM `Vendor` WHERE `VendorName`='$vendorName');";
			$resule_returnToVendorId = mysql_query($sql_returnToVendorId);
			if (!$resule_returnToVendorId)
				  {
					 echo "The retrieval was unsuccessful: ".mysql_error();
					 exit;
				  }
			
			  
			  echo"
			  <h2>Frequently Return Items Report</h2>
			<form action='export_frequently_items.php' method='post'>
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

					
					</tr>
		 		";
				$count = 0;
				
				$array = 0;
				 while ($row = mysql_fetch_assoc($resule_returnToVendorId))
			  		{		
					 
						  $returnToVendorId = $row['ReturnToVendorId'];
						
						// $dateTimeOfOrder_ex = 'dateTimeOfOrder'.$count;
						
						  
						 $sql_itemId = "SELECT ItemId FROM  ReturnToVendorDetail WHERE  ReturnToVendorId = '$returnToVendorId' ORDER BY  QuantityReturned DESC LIMIT 10;";
						 $item_result = mysql_query($sql_itemId);
						 while($qty_row = mysql_fetch_assoc($item_result)){
						 
						 	$itemid = $qty_row['ItemId'];
							$sql_itemInfo = "SELECT * FROM `InventoryItem` WHERE ItemId = '$itemid'";
							$itemInfo_result = mysql_query($sql_itemInfo);
							while($info_row = mysql_fetch_assoc($itemInfo_result)){						
							
							 $description = $info_row['Description'];
							 $size = $info_row['Size'];
							 $division = $info_row['Division'];
							 $department = $info_row['Department'];
							 $category = $info_row['Category'];
							 $itemCost = $info_row['ItemCost'];
							 $itemRetail = $info_row['ItemRetail'];
							 $imageFileName = $info_row['ImageFileName'];
							 $vendorId = $info_row['VendorId'];

								$count++;
								//echo"count is ".$count."\n";
								$array++;
								//echo"array count is ".$array."\n";
								$itemid_ex = 'itemid_ex'.$count;
								//echo"itemid is ".$itemid_ex."\n";
								$description_ex = 'description_ex'.$count;
							//echo"description is ".$description_ex."\n";
							
								$size_ex = 'size_ex'.$count;
								$division_ex = 'division_ex'.$count;
								$department_ex = 'department_ex'.$count;
								$category_ex = 'category_ex'.$count;
								$itemCost_ex = 'itemCost_ex'.$count;
								$itemRetail_ex = 'itemRetail_ex'.$count;
								$imageFileName_ex = 'imageFileName_ex'.$count;
								$vendorId_ex = 'vendorId_ex'.$count;

							}
							
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
