<?php
	session_start();
	//echo $_SESSION['VendorCode'];
	$VENDORCODE = (string)$_SESSION['VendorCode'];
	//echo "VENDORCODE is: ".$VENDORCODE;
  //include 'headerVendor.php';
?>

<?php
	require('db_cn.inc');
	require('vendor_order_view.php');
	$VENDORID;
	$ORDERID;

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
		if ($numrows == 0)
			 $message = "No vendor ID found in database with the provided Vendor Code";

	 while ($row = mysql_fetch_assoc($result))
	 {
	  		 $VENDORID = $row['VendorId'];
	 }

	 mysql_free_result($result);


	 //Step 2 Get Order ID Where VendorID is our VendorID and Status is Pending
	 connect_and_select_db(DB_SERVER, DB_UN, DB_PWD, DB_NAME);
	 $sql_stmt = "SELECT OrderId FROM `Order` WHERE ((VendorId='$VENDORID')and(Status='Pending'));";
	 $result = mysql_query($sql_stmt);
	 if (!$result)
	 {
			echo "The retrieval was unsuccessful: ".mysql_error();
			exit;
	 }
	 $numrows = mysql_num_rows($result);
	 $message = "";
	 if ($numrows == 0)
			$message = "No Order ID found in database with the provided Vendor ID";

	while ($row = mysql_fetch_assoc($result))
	{
				$ORDERID = $row['OrderId'];
	}
	mysql_free_result($result);

  //echo "ORDERID is: ".$ORDERID;
	//Step 3 Implement Adam's Code to Show Orders
	showItemsInOrder($ORDERID);

	 //-----------------------------Document Form Goes Here--------------------------------------------------
	 /*
	 	echo "Vendor ID is: ".$VENDORID;
		echo "Order ID is: ".$ORDERID;
		echo
			"
				<div id='callToAction'><h3 align='center'>Displaying Your Pending Orders Below</h3></div>

			";
			*/
	}
	else
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Please Login to View This Page')
    window.location.href='http://www.itss.brockport.edu/~rtamp1/csc423/gp/indexVendor.php';
    </SCRIPT>");
		//echo "<script type='text/javascript'>alert('Please login to view this page') window.location.href='./indexVendor.php'</script>";
	}



	function showItemsInOrder($ORDERID)
	{
		// Connect to the database with the 'db_cn.ini' file required above
		connect_and_select_db(DB_SERVER, DB_UN, DB_PWD, DB_NAME);

		// Get the info the user enters on the webpage
		$orderid = $ORDERID;

		// Set the SQL command
		$sql_stmt = "SELECT * FROM `Order` WHERE (OrderId='$orderid');";

		//Execute the query. The result will just be true or false
		$result = mysql_query($sql_stmt);

		if (!$result)
	  {
	     echo "The retrieval was unsuccessful: ".mysql_error();
	     exit;
	  }

	  //$result is non-empty. So count the rows
	  $numrows = mysql_num_rows($result);
	  $message = "";
	  if ($numrows == 0)
	     $message = "No pending orders found in database with the provided Vendor Code";

	  //Display the results
	  show_order($message, $result);

	  //Free the result set
	  mysql_free_result($result);
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

</body>
</html>
