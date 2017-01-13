
<!DOCTYPE html>
<!--   Jodi L. Hess  CSC423 Final December 2016  -->

<html>
<head>
<title>McArdle's Inventory Management Sytsem</title>
 <script type="text/javascript" src="verify.js"></script>

 <div>
	<?php include "processEnterVIIT.php"; ?>
 </div>

<style>

  h2  {text-align: center;}

  h3  {text-align: center;}

body {
    background-color: lightblue;
}

  </style>
</head>
<body>

<img src="McArdleLogo.PNG" alt="McArdlelogo.PNG" width="120" height="90" align="left">

      <h2>  INVENTORY MANAGEMENT SYSTEM  </h2>

<img src="McArdleLogo.PNG" alt="McArdlelogo.PNG" width="120" height="90" align="right">

  <!--------------------------PHP CODE------------------------------->




<?php

// Jodi L. Hess CSC423 Final December   2016

require('dblogin.inc');
require('item_insert_result_ui.inc');


insert_item();

function insert_item(){

connect_and_select_db(DB_SERVER, DB_UN, DB_PWD, DB_NAME);

   $id = $_POST['Id'];
   $vendorName = $_POST['VendorName'];
   $inventoryItemName =  $_POST['InventoryItemName'];
   $vendorDescript = $_POST['vendorDescript'];
   $currPrice  = $_POST['CurrPrice'];
   $priceUnit = $_POST['PriceUnit'];
   $dateLastPurchase = $_POST['DateLastPrice']
   $vendorItemNum = $_POST['VendorItemNum'];


   $esc_id = mysql_real_escape_string($_POST['Id']);
   $esc_vendorName = mysql_real_escape_string($_POST['VendorName']);
   $esc_inventoryItemName= mysql_real_escape_string($_POST['InventoryItemName']);
   $esc_vendorDescript = mysql_real_escape_string($_POST['VendorDescript']);
   $esc_currPrice = mysql_real_escape_string($_POST['CurrPrice']);
   $esc_priceUnit = mysql_real_escape_string($_POST['PriceUnit']);
   $esc_dateLastPurchase = mysql_real_escape_string($_POST['DateLastPurchase']);
   $esc_VendorItemNum = mysql_real_escape_string($_POST['VendorItemNum']);

   $insertitem  = "INSERT INTO VendorInventoryItemType
   (Id, VendorName, InventoryItemType, VendorDescript, currPrice, PriceUnit,
   DateLastPurchase, VendorItemNum) values ('$esc_id', '$esc_vendorName',
  '$esc_inventoryItemName', '$esc_vendorDescript', '$esc_currPrice', '$esc_priceUnit',
  '$esc_dateLastPurchase', '$esc_VendorItemNum');";

   $result = mysql_query($insertitem);
   echo $result;
   $message = "";

   if(!$result){

   $message = "Error in inserting item: $itemTypeName .". mysql_error();

   }
   else{

   $message = "Item: $itemTypeName inserted successfully.";

   }

   ui_show_item_insert_result($message, $itemTypeName, $result);
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



  <!---------------------------END PHP------------------------------->

  <br>   <br>
  <h3>  <font color="B22222">  ADD A VENDOR INVENTORY ITEM TYPE </font> </h3>


  <!------------------------------------------------------------------>

<form name="myForm" onsubmit="return validateForm()" method="post">

<table>

  <col width="45%">
  <col width="55%">

  <tr>

    <td height="35 px"> Vendor Name: </td>
        <td> <input type="text" name="Vendor" id="Vendor"  size="30"> </td>


  </tr>


  <tr>
    <td height="35 px"> Vendor Item Name: </td>
         <td> <input type="text" name="Item" id="Item" size="30"> </td>


  </tr>

  <tr>
         <td height="35 px"> Vendor Current Price: &nbsp &nbsp &nbsp $  </td>
         <td> <input type="text" name="Price" id="Price" size="30"> </td>


  </tr>

  <tr>
    <td height="35 px"> Price Unit Indicator:  </td>
         <td> <form action=""> <select name="Unit" id="Unit">
           <option>Per Unit</option>
           <option>Gross</option>

  </tr>

  <tr>
    <td height="35 px"> Vendor Description: </td>
         <td> <input type="text" name="VendorDesc" id="VendorDesc"  size="30"> </td>

  </tr>


  <tr>
         <td height="35 px"> Vendor Item Number:  </td>
         <td> <input type="text" name="ItemNum" id="ItemNum"  size="30"> </td>

  </tr>


<tr>
        <td height="35 px">Preferred Vendor:  </td>
        <td> Yes
        <input type="radio" name="PrefVendor" id="PrefVendor" size="10">
          No <input type="radio" name="PrefVendor" id="PrefVendor" size="10" checked> </td>

  </tr>

           <td> </td>

<td style="height:40px">  <input align="center" type="submit" value="Submit">

    <input type="reset" value="Reset">   </td>





 </table>

  </form>

</body>
</html>
