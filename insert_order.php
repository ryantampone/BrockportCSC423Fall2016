<?php
require('db_cn.inc');

?>

<?php
function show_item($message, $result_showItem,$vendorId)
{


 echo "$vendorId";
 connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);


 
  echo "<HTML>";
  echo "<HEAD>";
  echo "</HEAD>";
  echo "<BODY>";
	
		echo" 
				<div id='callToAction'>
				<h2>Please fill out the new order form below.</h2>
				</div>
		"; 
		
		

		if($message){
			
			if($message!= ""){
				
						echo '<center><font color="blue">'.$message.'</font></center><br />';
				exit;
				}
			
			
			}
			
			
		echo"
		
			<form action='insert_new_order.php' method='post'>
			<table align='center'>
			
			<tr>
				<td ><span align='right'>Vendor ID:</span></td>
				
				<td>
			
			
				<input type='text' id='vendor_id' name='vendor_id' value='$vendorId' readonly='readonly' />	
			 		
		
				</td>
				
			</tr>
			<tr>
				<td><span align='right'>Items:</span></td>
					 
			</tr>
			<tr>	
			
					<td></td>
					<td>Item Name</td>
					<td>Size</td>
					<td>Quantity</td>
			</tr>	 
		
				   ";
		
				$count = 0;
				$item_array = array();
				$item_size = array();
				$quantity_array = array();
				
				/*$sql_count = "SELECT COUNT(*) as total FROM InventoryItem WHERE VendorId=1;";
	   $result_count = mysql_query($sql_count);
	   
	  $row = mysql_fetch_assoc($result_count);
					
					echo "Total Item = ". $row['total']. "<br />";*/
				
				
				
				
				while($row = mysql_fetch_assoc($result_showItem)){
			
			
					$count++;
			
					$_description = $row['Description'];
					$_size = $row['Size'];
					$_itemId = $row['ItemId'];
					$_qtyId = $row['QuantityOrdered'];
					echo "ItemId is:";
					echo  "$_itemId"."<br />";
					//$_qty_id = "Qty". $count;
					//$id_for_next_item = $_description . ','. $_size;
					echo "
						<tr>
							<td></td>
							<td><p>".$_description."</p></td>
						  	<td><p>".$_size."</p></td>
							<td><input type='text' size='5' name='qtyId$count'  /></td>
							
						</tr>
						
						";
						$qty = "qty".$count;
						$item = "item".$count;
						echo "<input type='hidden' name='item$count' value='$_itemId' /><br/>";
					//$desc1 = $_POST['$_desc_id'];
					//echo "$desc1";
					//echo "$_itemId";					
					
						
					//$id_for_next_qty = $_POST['id_for_next_qty'];
					//$item_array[$count] = $_description;
					//$item_size[$count] = $_size;
					//$quantity_array[$count] = $id_for_next_qty ;	
					
			
			}
			
         	
			$total = $count;
		    echo "$total";
	
			
			
			echo "<input type='hidden' name='total_item' value='$total' />";
					
			echo "

			<tr>
					<td><span align='right'>Store Name:</span></td>
					<td>
					<select id='StoreId' name='StoreId' required >";
					$sql_store = "SELECT StoreName FROM RetailStore WHERE Status='Active';";
					$store_result = mysql_query($sql_store);
					if (!$store_result)
					{
						echo "Store's retrieved unsuccessful: ".mysql_error();
						exit;
						
						}	
					while($row = mysql_fetch_assoc($store_result)){
						
						$storeid = $row['StoreId'];
						$storename = mysql_real_escape_string($row['StoreName']);
						echo "<option> ".$storename."</option>";
						}
						
					echo "
					</select>
				</td>
			</tr>
			<tr>
				<td ><span align='right'>Date:</span></td>
				<td><input type='date'  id='DateTimeOfOrder' name='DateTimeOfOrder' required /></td>
			</tr>
			<tr>
				<td><span align='right'>Status:</span></td>
				<td><input type='text' id='Status' name='Status' value='Pending' readonly/></td>
			</tr>
			</table>
			<div class='button'>
				<input id='tiny_button' type='submit' id='submit' name='submit' >
				<input id='tiny_button' type='reset' id='reset' name='reset'>
			</div>
			<input type='hidden' name='vendor_numitems' value='$num_items' />
		</form>
	";
		
		
		
		

		
	
  echo "</BODY>";
  echo "</HTML>";
	
	}


/*
  
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

*/

?>
