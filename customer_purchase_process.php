<?php
// File that contains login info for database
require('db_cn.inc');

process_purchase();

function process_purchase()
{
	// Connect to the database with the 'db_cn.ini' file required above
	connect_and_select_db(DB_SERVER, DB_UN, DB_PWD, DB_NAME);

	$customerid = $_POST['customerid'];
	$storeid = $_POST['storeid'];
  $storename = $_POST['storename'];
  $itemid = $_POST['itemid'];
	$itemqty = $_POST['itemqty'];
  $storeqty = $_POST['storeqty'];
  $newqty = $storeqty - $itemqty;
  $purchase_date = date("Y-m-d");
  $purchase_time = date("h:i:sa");
  $purchase_date_time = $purchase_date." ".$purchase_time;

	// Set the SQL command
	$insert_purchase = "INSERT INTO CustomerPurchase (CustomerId, ItemId, StoreId, QuantityPurchased, DateTimeOfPurchase) VALUES ('$customerid', '$itemid', '$storeid', '$itemqty', '$purchase_date_time');";
	$insert_result = mysql_query($insert_purchase);

  $update_inv = "UPDATE `Inventory` SET QuantityInStock='$newqty' WHERE (StoreId = '$storeid' AND ItemId = '$itemid');";
  $update_result = mysql_query($update_inv);

	if (!$insert_result)
  {
     echo "The purchase was unsuccessful: ".mysql_error();
     exit;
  }

  echo "
  <HTML>
    <HEAD>
      <link href=\"css/headerStyles.css\" type=\"text/css\" rel=\"stylesheet\" />
    </HEAD>
    <BODY>
      <br/><br/><br/><br/>
      <h2 align='center'>Purchase Successful</h2>
      <form action='customer_purchase_ui.php' method='post' >
        <table align='center'>
          <tr>
            <td><input id='tiny_button' name='submit' type='submit' value='Add Item' /></td>
            <td><input id='tiny_button' name='done' type='button' value='Done' onclick='window.alert(\"Thank you for your purchase!\");window.location.href=\"http://www.itss.brockport.edu/~asmit26/csc423/gp/customer_purchase_ui.php\";' /></td>
          </tr>
        </table>
        <input type='hidden' name='custid' value='$customerid' />
        <input type='hidden' name='stname' value=\"$storename\" />
      </form>
    </BODY>
  </HTML>
  ";

}

// Function to connect to the database
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
