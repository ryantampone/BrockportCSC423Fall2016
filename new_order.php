<?php
require('db_cn.inc');
include 'header.php';


$vendorinfo = $_POST['VendorInfo'];
$vendorid = split(':',$vendorinfo);
$vendorid = $vendorid[0];
$id_for_next_qty;


search_item();
function return_array(array $item_array){
	
	$item_array = $item_array;
	return $item_array;
	}
function return_qty(array $quantity_array){
	
	 $quantity_array = $quantity_array;
	 return $quantity_array;
	}
function search_item(){
connect_and_select_db(DB_SERVER, DB_UN, DB_PWD, DB_NAME);
}


  echo"
		<br>
		<h2>Please fill out the new order form below.</h2>
		<form action='insert_order.php' method='post'>
			<table align='center'>
			
			<tr>
				<td ><span align='right'>Vendor ID:</span></td>
				
				<td>";
				echo "<label id='vendorid' name='vendorid'>".$vendorid."</label>";
					
			   echo"		
		
			</td>
				
			</tr>
			
			<tr>
					<td><span align='right'>Items:</span></td>
					 
					<td>
				   ";
						   $count = 0;
						   $item_array = array();
						   $quantity_array = array();
						   $_REQUEST = "SELECT Description, Size FROM InventoryItem WHERE VendorId='$vendorid';";
                           $items_result = mysql_query($_REQUEST);
						   if(!$items_result){
							   		echo "Item Informaiton retrieved unsuccessfully:" .mysql_error();
									exit;
							   }
						   while($row = mysql_fetch_assoc($items_result))
						   {
							   
							   $_description = $row['Description'];
							  	$_size = $row['Size'];
							   $id_for_next_item = $_description . ','. $_size;
								echo "<p>".$id_for_next_item."
								<input type='text' size='5' id='id_for_next_qty' name='id_for_next_qty'  value=''/></p>";
							
								$id_for_next_qty = $_POST['id_for_next_qty'];
								$item_array[$count] = $id_for_next_item;
								$quantity_array[$count] = $id_for_next_qty ;	  
								$count++;
							   }
							   
				           return_array($item_array);
						   return_qty($quantity_array);
					 
				echo "
					</td>
					
			
			</tr>
			<tr>
					<td><span align='right'>Count:</td>
					<td>";
					echo "<label id='test' name='test'>".$item_array[3]."</label>";
					
					echo"
					</td>
			
			</tr>
		
			<tr>
					<td><span align='right'>Store ID:</span></td>
					<td>
					<select id='StoreId' name='StoreId' required />";
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
				<td><input type='text' id='Status' name='Status' value='Pending' /></td>
			</tr>
			
			</table>
		<div class='button'>
						<input id='tiny_button' type='submit' id='submit' name='submit' >
						<input id='tiny_button' type='reset' id='reset' name='reset'>
					</div>
		</form>";



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
