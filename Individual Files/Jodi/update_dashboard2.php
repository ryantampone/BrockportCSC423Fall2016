-<!--
  php for updating information on the dashboard
-->
<?php

  require('db_cn.inc');
  // require('update_dashboard_insert_result_ui.inc');
  require('indexV2.php');

    connect_and_select_db(DB_SERVER, DB_UN,DB_PWD,DB_NAME);
    $testSN = $_POST['StoreName'];
    if ($testSN == "Select Store")
    {
      echo "<SCRIPT LANGUAGE='JavaScript'>
         window.alert('Please Select Your Store Location to View Your Customized Dashboard')
         window.location.href='update_dashboard.php';
         </SCRIPT>";
      #header("Location: http://www.itss.brockport.edu/~rtamp1/csc423/gp/update_dashboard.php");
    }

    $SN = mysql_real_escape_string($_POST['StoreName']);
    $Query = "SELECT StoreId FROM `RetailStore` WHERE StoreName =  '$SN';";
    $Result = mysql_query($Query); // Result of Processing the Query is shown
    if (!$Result)
    {
      echo "Unable to retrieve Store Id from Store Name Dropdown"; //be sure to change
      exit;
    }
    while($row = mysql_fetch_assoc($Result))
    {
      $StoreID = $row['StoreId'];
    }
    mysql_free_result($Result);

	//------------------------------------------------------------------------------

    $activeVendorsQuery = "SELECT count(*) FROM Vendor WHERE Status = 'Active';";
    $resultAV = mysql_query($activeVendorsQuery);
    if (!$resultAV)
    {
      echo "N/A"; //be sure to change
      exit;
    }
    while($row = mysql_fetch_assoc($resultAV))
    {
      $vendorsActive = $row['count(*)'];
    }
    mysql_free_result($resultAV);

	//----------------------------------------------------------------------------------
    $inactiveVendorsQuery = "SELECT count(*) FROM Vendor WHERE Status = 'Inactive';";
    $resultIAV = mysql_query($inactiveVendorsQuery);
    if (!$resultIAV)
    {
      echo "N/A"; //be sure to change
      exit;
    }
    while($row = mysql_fetch_assoc($resultIAV))
    {
      $vendorsInactive = $row['count(*)'];
    }
    mysql_free_result($resultIAV);
	//----------------------------------------------------------------------------------
    $totalVendorsQuery = "SELECT count(*) FROM Vendor;";
    $resultTV = mysql_query($totalVendorsQuery);
    if (!$resultTV)
    {
      echo "N/A"; //be sure to change
      exit;
    }
    while($row = mysql_fetch_assoc($resultTV))
    {
      $vendorsTotal = $row['count(*)'];
    }
    mysql_free_result($resultTV);

	//----------------------------------------------------------------------------------
    $storesQuery = "SELECT count(*) FROM RetailStore;";
    $resultStores = mysql_query($storesQuery);
    if (!$resultStores)
    {
      echo "N/A"; //be sure to change
      exit;
    }
    while($row = mysql_fetch_assoc($resultStores))
    {
      $stores = $row['count(*)'];
    }
    mysql_free_result($resultStores);

	//----------------------------------------------------------------------------------
    $pendingOrdersQuery = "SELECT count(*) FROM `Order` WHERE Status = 'Pending' and StoreId='$StoreID';";
    $resultPending = mysql_query($pendingOrdersQuery);
    if (!$resultPending)
    {
      echo "N/A"; //be sure to change
      exit;
    }
    while($row = mysql_fetch_assoc($resultPending))
    {
      $pendingOrders = $row['count(*)'];
    }
    mysql_free_result($resultPending);

	//----------------------------------------------------------------------------------
    $deliveredOrdersQuery = "SELECT count(*) FROM `Order` WHERE Status = 'Delivered' and StoreId='$StoreID';";
    $resultDelivered = mysql_query($deliveredOrdersQuery);
    if (!$resultDelivered)
    {
      echo "N/A"; //be sure to change
      exit;
    }
    while($row = mysql_fetch_assoc($resultDelivered))
    {
      $deliveredOrders = $row['count(*)'];
    }
    mysql_free_result($resultDelivered);

	//----------------------------------------------------------------------------------
   $cancelledOrdersQuery = "SELECT count(*) FROM `Order` WHERE Status = 'Canceled' and StoreId='$StoreID';";
    $resultCancelled = mysql_query($cancelledOrdersQuery);
    if (!$resultCancelled)
    {
      echo "N/A"; //be sure to change
      exit;
    }
    while($row = mysql_fetch_assoc($resultCancelled))
    {
      $cancelledOrders = $row['count(*)'];
    }
    mysql_free_result($resultCancelled);

	//----------------------------------------------------------------------------------
	$totalOrdersQuery = "SELECT count(*) FROM `Order` WHERE StoreId='$StoreID';";
	$resultTO = mysql_query($totalOrdersQuery);
	if(!$resultTO)
	{
		echo "N/A";
		exit;
	}
	while($row = mysql_fetch_assoc($resultTO))
	{
		$totalOrders = $row['count(*)'];
	}
	mysql_free_result($resultTO);
	//----------------------------------------------------------------------------------

    $activeCustomersQuery = "SELECT count(*) FROM Customer WHERE Status = 'Active';";
    $resultAC = mysql_query($activeCustomersQuery);
    if (!$resultAC)
    {
      echo "N/A"; //be sure to change
      exit;
    }
    while($row = mysql_fetch_assoc($resultAC))
    {
      $activeCustomers = $row['count(*)'];
    }
    mysql_free_result($resultAC);

	//----------------------------------------------------------------------------------
   $inactiveCustomersQuery = "SELECT count(*) FROM Customer WHERE Status = 'Inactive';";
    $resultIAC = mysql_query($inactiveCustomersQuery);
    if (!$resultIAC)
    {
      echo "N/A"; //be sure to change
      exit;
    }
    while($row = mysql_fetch_assoc($resultIAC))
    {
      $inactiveCustomers = $row['count(*)'];
    }
    mysql_free_result($resultIAC);

	//----------------------------------------------------------------------------------
    $totalCustomersQuery = "SELECT count(*) FROM Customer;";
    $resultT = mysql_query($totalCustomersQuery);
    if (!$resultT)
    {
      echo "N/A"; //be sure to change
      exit;
    }
    while($row = mysql_fetch_assoc($resultT))
    {
      $totalCustomers = $row['count(*)'];
    }
    mysql_free_result($resultT);
	//----------------------------------------------------------------------------------


	show_index($vendorsActive, $vendorsInactive, $vendorsTotal, $stores, $pendingOrders, $deliveredOrders, $cancelledOrders, $totalOrders, $activeCustomers, $inactiveCustomers, $totalCustomers );




  function connect_and_select_db($server, $username, $pwd, $dbname)
  {
    $conn = mysql_connect($server, $username, $pwd);

    if (!$conn)
    {
      echo "Unable to connect to DB:".mysql_error();
      exit;
    }

    $dbh = mysql_select_db($dbname);
    if(!$dbh)
    {
      echo "Unable to select".$dbname.":".mysql_error();
      exit;
    }
  }
 ?>
