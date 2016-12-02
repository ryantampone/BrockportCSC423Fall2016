<?php
require('db_cn.inc');

?>

<?php


function show_item($message, $result_showItem,$vendorId)
{


 //echo "$vendorId";
 connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);


		if($message){

			if($message!= ""){

						echo '<center><font color="blue">'.$message.'</font></center>';
				exit;
				}


			}

		echo"
				<div id='callToAction'>
				<h2>Please fill out the new order form below.</h2>
				</div>
		";


		echo"
			    <div id='userdataform'>
			<form action='insert_new_order.php' method='post'>



				<input type='hidden' id='vendor_id' name='vendor_id' value='$vendorId' style=\"background-color: #d6dbdf;\" readonly='readonly' />

		  <table align='center' cellspacing='10' >
			<tr>

					<td align='center'></td>
					<td align='center'>Item Name</td>
					<td align='center'>Size</td>
					<td align='center'>Quantity</td>
			</tr>

				   ";

				$count = 0;
				$item_array = array();
				$item_size = array();
				$quantity_array = array();





				while($row = mysql_fetch_assoc($result_showItem)){


					$count++;

					$_description = $row['Description'];
					$_size = $row['Size'];
					$_itemId = $row['ItemId'];
					$_qtyId = $row['QuantityOrdered'];

					echo "
						<tr>
							<td align='left'></td>
							<td align='left'><p>".$_description."</p></td>
						  	<td align='left'><p>".$_size."</p></td>
							<td align='left'><input type='text' size='5' name='qtyId$count'  /></td>

						</tr>

						";
						$qty = "qty".$count;
						$item = "item".$count;
						echo "<input type='hidden' name='item$count' value='$_itemId' />";



			}


			$total = $count;
		   // echo "$total";



			echo "<input type='hidden' name='total_item' value='$total' />";

			echo "
            </table>
			<table align='center' cellpadding='7' cellspacing='30' border='0'>
			<tr>
					<td align='right'>Store Name:</td>
					<td align='left'>
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
						$storename = $row['StoreName'];
						echo "<option> ".$storename."</option>";
						}

					echo "
					</select>
				</td>
			</tr>
			<tr>
				<td align='right'>Date:</td>
				<td align='left'><input type='date'  id='DateTimeOfOrder' name='DateTimeOfOrder' required /></td>
			</tr>
			<tr>
				<td align='right'>Status:</td>
				<td align='left'><input type='text' id='Status' name='Status' value='Pending' style=\"background-color: #d6dbdf;\" readonly/></td>
			</tr>
			</table>
			<div class='button'>
				<input id='tiny_button' type='submit' id='submit' name='submit' >
				<input id='tiny_button' type='reset' id='reset' name='reset'>
			</div>
			<input type='hidden' name='vendor_numitems' value='$num_items' />
		</form>
		</div>
	";






	}



?>
