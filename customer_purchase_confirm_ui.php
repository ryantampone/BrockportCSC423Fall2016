<?php
	include 'header.php';
  require 'db_cn.inc';
?>
<?php

purchase();
function purchase()
{
  // Connect to the database with the 'db_cn.ini' file required above
  connect_and_select_db(DB_SERVER, DB_UN, DB_PWD, DB_NAME);

  // Get the info the user enters on the webpage
  $customerid = $_POST['customerid'];
  $storename = $_POST['storename'];
  $itemid = $_POST['itemid'];
  $itemqty = $_POST['itemqty'];
  $esc_storename = mysql_real_escape_string($storename);

  // Set the SQL command
	$sql_customer = "SELECT * FROM Customer WHERE (CustomerId = '$customerid');";
	$customer_result = mysql_query($sql_customer);

	if (!$customer_result)
	{
		echo "Customer retrieval was unsuccessful: ".mysql_error();
		exit;
	}

	$numrows = mysql_num_rows($customer_result);
	if ($numrows == 0)
		$message1 = "Customer ID : ".$customerid." does not exist.\n\n";

  $sql_store = "SELECT StoreId FROM RetailStore WHERE (StoreName='$esc_storename' AND Status='Active');";
  $store_result = mysql_query($sql_store);

  if (!$store_result)
  {
     echo "The store retrieval was unsuccessful: ".mysql_error();
     exit;
  }
  while($store_row = mysql_fetch_assoc($store_result))
  {
    $storeid = $store_row['StoreId'];
  }

  $sql_item = "SELECT QuantityInStock FROM Inventory WHERE (ItemId='$itemid' AND StoreId='$storeid');";
  $item_result = mysql_query($sql_item);

  if(!$item_result)
  {
    echo "The item retrieval was unsuccessful: ".mysql_error();
    exit;
  }
  while($item_row = mysql_fetch_assoc($item_result))
  {
    $storeqty = $item_row['QuantityInStock'];
  }
	if($item_result)
	{
	  if($itemqty > $storeqty)
	  {
	    $message3 = "Purchase quantity cannot exceed store quantity.\nThis item quantity must be less than $storeqty.\n\n";
	  }
	}

	$numrows = mysql_num_rows($item_result);
	if ($numrows == 0)
		$message2 = "No item found with the provided store name.\nItem: $itemid\nStore: ".$storename."\n";

  $sql_item_price = "SELECT ItemRetail, Description FROM InventoryItem WHERE (ItemId='$itemid');";
  $price_result = mysql_query($sql_item_price);

  while($price_row = mysql_fetch_assoc($price_result))
  {
    $itemprice = $price_row['ItemRetail'];
    $desc = $price_row['Description'];
  }

  $item_total = number_format($itemprice * $itemqty,2);

	if($message2 != "")
		$message3 = "";

	$final_message = $message1.$message2.$message3;

	echo"
		<input type='hidden' id='message' value=\"$final_message\" />
	";

	if ($final_message)
	{
		if ($final_message != "")
			 {
				 /*
				 echo '<center><font color="blue">'.$message.'</font></center><br />';
				 echo "<center><form action='index.php'><button >Return to Main Menu</button></form></center>";
				 echo "</BODY>";
			 	 echo "</HTML>";
				 */
				 echo "
				 		<script language=\"javascript\">
							var msg = document.getElementById(\"message\").value;
			 				window.alert(msg);
			 				window.location.href=\"http://www.itss.brockport.edu/~rtamp1/csc423/gp/customer_purchase_ui.php\";
			 			</script>
				 ";
			 }
	}

   //While there are more rows in the $result, get the next row
   //as an associative array

   echo"
   <h2 align='center'>Review Your Purchase</h2>
   <form action='customer_purchase_process.php' method='post'>
      <table align='center'>
        <tr>
          <td><p style=\"padding-right: 30px; margin: 5px;\" align='right'>Customer ID:</p></td>
  				<td><p style=\"padding-right: 30px; margin: 5px;\" align='left'>$customerid</p></td>
  			</tr>
  		  <tr>
  	 		  <td><p style=\"padding-right: 30px; margin: 5px;\" align='right'>Store Name:</p></td>
  	 			<td><p style=\"padding-right: 30px; margin: 5px;\" align='left'>$storename</p></td>
  	 		</tr>
  			<tr>
  			  <td><p style=\"padding-right: 30px; margin: 5px;\" align='right'>Item:</p></td>
  				<td><p style=\"padding-right: 30px; margin: 5px;\" align='left'>$desc</p></td>
  			</tr>
        <tr>
  			  <td><p style=\"padding-right: 30px; margin: 5px;\" align='right'>Quantity:</p></td>
  				<td><p style=\"padding-right: 30px; margin: 5px;\" align='left'>$itemqty</p></td>
  			</tr>
			</table>
			<input type='hidden' name='customerid' value='$customerid' />
			<input type='hidden' name='storeid' value='$storeid' />
			<input type='hidden' name='storename' value=\"$storename\" />
			<input type='hidden' name='itemid' value='$itemid' />
			<input type='hidden' name='itemqty' value='$itemqty' />
			<input type='hidden' name='storeqty' value='$storeqty' />
      <br/>
      <table align='center'>
        <tr>
          <td><p style=\"padding-right: 30px; margin: 5px;\" align='right'>Total:</p></td>
          <td><p style=\"padding-right: 30px; margin: 5px;\" align='left'>\$$item_total</p></td>
        </tr>
      </table>
	<div class='button'>
		<input id='tiny_button' type='submit' id='submit' name='submit' value='Purchase' />
  	<!-- button goes here -->
	</div>
	";
	echo "</form>";
	echo "<br><br>";

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
