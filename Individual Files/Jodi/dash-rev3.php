<?php
echo "
<!DOCTYPE html>
<html>
<head>

  <!-- Jodi L. Hess -->
  < charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Nanno's Food</title>
</head>
<body>

  <table>
    connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);
    <tr> <td> <b> Vendors: </b> </td> </tr>
    <tr> <td> Active Vendors: </td> </tr>
";

 $sql = "SELECT COUNT( STATUS ) FROM  `Vendor` WHERE STATUS =  'active'";
    //$strSQL= SELECT COUNT( STATUS ) FROM  `Vendor` WHERE STATUS =  'active';

  echo "<tr> <td>  Inactive Vendors:  </td> </tr>";

     $sql  = "SELECT COUNT( STATUS ) FROM  `Vendor` WHERE STATUS =  'Inactive'";
    //$strSQL= SELECT COUNT( STATUS ) FROM  `Vendor` WHERE STATUS =  'Inactive';

    $sql  =  "SELECT COUNT(*) FROM Vendor"

    echo "<tr> <td> <b> Stores: </b>
    <tr> <td> Number of Stores: </td> </tr>
    ";

     //$strSQL= SELECT COUNT(StoreName) FROM RetailStore;
     $sql   = "SELECT COUNT(StoreName) FROM RetailStore"

    //  <tr> <td> Store Name: </td> </tr>  $strSQL = Select StoreName FROM RetailStore order by StoreName ASC; -->
   //  <tr> <td> Total of Sales: </td> </tr>  $strSQL = SELECT COUNT(OrderID) FROM 'Order'; -->

    echo " <tr> <td> <b> Orders: </b> </td> </tr>
    <tr> <td> Pending Orders: </td> </tr>
   ";

     $sql = "SELECT COUNT( STATUS ) FROM `Order` WHERE STATUS  = 'Pending'"

    echo " <tr> <td> Delivered Orders: </td> </tr> "
    //$strSQL = Select Status AS Delivered Order FROM Order WHERE Order = 'Delivered';
    $sql =  "SELECT COUNT(STATUS) FROM `Order` WHERE STATUS = 'Delivered'"

    echo " <tr> <td> Canceled Orders: </td> </tr>
    ";

    $sql = "SELECT COUNT(STATUS) FROM `Order` WHERE STATUS = 'Canceled'"

    echo "  <tr> <td> <b> Customers: </b> </td> </tr>
    <tr> <td> Active Customers: </td> </tr>
    ";

    <$sql = SELECT COUNT( STATUS ) FROM  `Customer` WHERE STATUS =  'active';

    echo " <tr> <td> Inactive Customers: </td> </tr>
    ";

    $sql= SELECT COUNT( STATUS ) FROM  `Customer` WHERE STATUS =  'inactive';

///////////   Correct code to this point

    echo " <tr> <td> Total Customers: </td> </tr>
";
    $sql = SELECT COUNT(CustomerId) FROM Customer;

  echo "  <tr> <td> <b> Items to be Reordered: </b> </td> </tr>

  </table>


</body>
</html>
";

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
