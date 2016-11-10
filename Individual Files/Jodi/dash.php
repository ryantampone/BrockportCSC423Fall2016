<?php
echo "
<!DOCTYPE html>
<html>
<head>

  <!-- Adim Odumefune/Jodi L. Hess -->
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

    <tr> <td> Total Number of Vendors: </td> </tr>
    $strSQL= SELECT COUNT (VendorID) FROM 'Vendor';

    <tr> <td> <b> Stores: </b>
    <tr> <td> Number of Stores: </td> </tr> $strSQL= SELECT COUNT(StoreName) FROM RetailStore;
    <!--   <tr> <td> Store Name: </td> </tr>  $strSQL = Select StoreName FROM RetailStore order by StoreName ASC; -->
      <!-- <tr> <td> Total of Sales: </td> </tr>  $strSQL = SELECT COUNT(OrderID) FROM 'Order'; -->

    <tr> <td> <b> Orders: </b> </td> </tr>
    <tr> <td> Pending Orders: </td> </tr>  $strSQL = SELECT COUNT( STATUS ) FROM 'Order' WHERE STATUS  = 'Pending'; <!-- doesn't work -->

    <tr> <td> Delivered Orders: </td> </tr>  $strSQL = Select Status AS Delivered Order FROM Order WHERE Order = 'Delivered';
    <tr> <td> Canceled Orders: </td> </tr>  $strSQL = Select Status AS Canceled Order FROM Order WHERE Order = 'Canceled';

    <tr> <td> <b> Customers: </b> </td> </tr>
    <tr> <td> Active Customers: </td> </tr> <$strSQL= SELECT COUNT( STATUS ) FROM  `Customer` WHERE STATUS =  'active';
    <tr> <td> Inactive Customers: </td> </tr>$strSQL= SELECT COUNT( STATUS ) FROM  `Customer` WHERE STATUS =  'inactive';
    <tr> <td> Total Customers: </td> </tr>  <$strSQL= SELECT COUNT(CustomerId) FROM 'Customer';

    <tr> <td> <b> Items to be Reordered: </b> </td> </tr>
    <!-- Add sql code -->


  </table>


</body>
</html>

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
