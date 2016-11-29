<?php

require('db_cn.inc');
include 'header.php';

$storeName = $_POST['StoreName'];
show_item();

function show_item(){
	connect_and_select_db(DB_SERVER, DB_UN, DB_PWD, DB_NAME);
	$sql_showItem = "SELECT Deacription FROM Inventory WHERE ItemId in (SELECT ItemId FROM Inventory WHERE StoreId in (SELECT StoreId FROM RetailStore WHERE storeName='$storeName'))";
	$result = mysql_query($sql_showItem);
	if(!result){
			echo "The retrieval was unsuccessful: ".mysql_error();
			exit;
			"

	}
	$numrows = mysql_num_rows($result);
	$message = "";
	if ($numrows == 0){
		 $message = "No Store ID found in database with the provided Store name";
		 notFound($message);
	 }


}
	/*session_start();
	$VENDORCODE = (string)$_SESSION['VendorCode'];
?>

<?php
	require('db_cn.inc');
	require('vendor_order_view.php');

	$selectedOrderStatus = $_POST['orderStatus'];

	$VENDORID;
	$message;

	if (isset($_SESSION['VendorCode']))
	{
		//Step 1 Get Vendor ID from VENDORCODE
		connect_and_select_db(DB_SERVER, DB_UN, DB_PWD, DB_NAME);
		$sql_stmt = "SELECT VendorId FROM `Vendor` WHERE (VendorCode='$VENDORCODE');";
		$result = mysql_query($sql_stmt);
		if (!$result)
		{
			 echo "The retrieval was unsuccessful: ".mysql_error();
			 exit;
		}
		$numrows = mysql_num_rows($result);
		$message = "";
		if ($numrows == 0){
			 $message = "No vendor ID found in database with the provided Vendor Code";
			 notFound($message);
		 }

	 while ($row = mysql_fetch_assoc($result))
	 {
	  		 $VENDORID = $row['VendorId'];
	 }

	 mysql_free_result($result);


			 //Step 2 Get Order ID Where VendorID is our VendorID and Status is What the Vendor Selects
			 connect_and_select_db(DB_SERVER, DB_UN, DB_PWD, DB_NAME);
			 $sql_stmt = "SELECT OrderId FROM `Order` WHERE ((VendorId='$VENDORID')and(Status='$selectedOrderStatus')) ORDER BY  `Order`.`DateTimeOfOrder` DESC;";
			 $result = mysql_query($sql_stmt);
			 if (!$result)
			 {
					echo "The retrieval was unsuccessful: ".mysql_error();
					exit;
			 }
			 $numrows = mysql_num_rows($result);
			 $message = "";
			 if ($numrows == 0){
					$message = "No Order ID found in database with the provided Vendor ID and status: ".$selectedOrderStatus;
					notFound($message);
				}

			while ($row = mysql_fetch_assoc($result))
			{
						$ORDERID = $row['OrderId'];
						showItemsInOrder($ORDERID, $selectedOrderStatus);
			}
			mysql_free_result($result);
		//}



	}
	else
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Invalid Login Credentials: Please Login to View This Page')
    window.location.href='http://www.itss.brockport.edu/~rtamp1/csc423/gp/indexVendor.php';
    </SCRIPT>");
		//echo "<script type='text/javascript'>alert('Please login to view this page') window.location.href='./indexVendor.php'</script>";
	}



	function showItemsInOrder($ORDERID, $selectedOrderStatus)
	{
		// Connect to the database with the 'db_cn.ini' file required above
		connect_and_select_db(DB_SERVER, DB_UN, DB_PWD, DB_NAME);

	$orderid= $ORDERID;
	$SELECTEDORDERSTATUS = $selectedOrderStatus;


	//Orders
	$sql_stmt = "SELECT * FROM `Order` WHERE (OrderId='$orderid');";
	$result = mysql_query($sql_stmt);
	if (!$result)
	{
		 echo "The retrieval was unsuccessful: ".mysql_error();
		 exit;
	}
	$numrows = mysql_num_rows($result);
	$message = "";
	if ($numrows == 0){
		 $message = "No orders found in database with the provided Vendor Code";
		 notFound($message);
	 }

		 show_order($result, $SELECTEDORDERSTATUS);
		 mysql_free_result($result);

	}


	function notFound($messageNF)
	{
		$errormessage=$messageNF;
		show_order_not_found($errormessage);
	}


*/
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

</body>
</html>
