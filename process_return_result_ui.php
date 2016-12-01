<?php
	include 'header.php';
?>
<?php

function show_items($message, $result)
{

  $vendorname = $_POST['vendorname'];
  echo "<h2>Return Items to $vendorname</h2>";

  // If the message is non-null and not an empty string print it
  // message contains the lastname and firstname
  if ($message)
  {
    if ($message != "")
       {
				 echo "<SCRIPT LANGUAGE='JavaScript'>
						window.alert('$message')
						window.location.href='process_return_ui.php';
						</SCRIPT>";
				#echo '<center><font color="blue">'.$message.'</font></center><br />';
				#exit;
       }
  }


  echo"
    <form action='process_return_confirm_ui.php' method='post'>
  	 	<table align='center'>
  			<tr>
  				<td style=\"padding-right: 30px;\" align='center'>Item Description</td>
  				<td style=\"padding-right: 30px;\" align='center'>Size</td>
  				<td style=\"padding-right: 30px;\" align='center'>Stock<br/>Quantity</td>
          <td style=\"padding-right: 30px;\" align='center'>Return<br/>Quantity</td>
  			</tr>
  ";

  //While there are more rows in the $result, get the next row
  //as an associative array
  $count = 0;
  while ($row = mysql_fetch_assoc($result))
  {
  	$storeid = $row['StoreId'];
    $itemid = $row['ItemId'];
    $stockqty = $row['QuantityInStock'];
    $desc = $row['Description'];
    $size = $row['Size'];
    $vendorid = $row['VendorId'];

    $sql_store_code = "SELECT StoreCode FROM RetailStore WHERE StoreId='$storeid'";
    $store_code_result = mysql_query($sql_store_code);
    while($store_row = mysql_fetch_assoc($store_code_result))
    {
      $storecode = $store_row['StoreCode'];
    }

  	$count++;
    echo"
      <tr>
    	  <td><p style=\"padding-right: 30px;\">$desc</p></td>
    	  <td><p style=\"padding-right: 30px;\">$size</p></td>
    	  <td><input type='text' size='5' name='stock$count' id='stock$count' value='$stockqty' readonly disabled/></td>
        <td><input type='text' size='5' name='return$count' id='return$count' onkeypress='return hasToBeNumber(event)' onpaste='return false' onblur='checkQty($count)' />
      </tr>
    ";
    echo "<input type='hidden' name='desc$count' value='$desc' />";

  }

	echo "
			</table>
			<div class='button'>
				<input id='tiny_button' type='submit' id='submit' name='submit' >
				<input id='tiny_button' type='reset' id='reset' name='reset'>
			</div>
			<input type='hidden' name='numitems' value='$count' />
      <input type='hidden' name='storecode' value='$storecode' />
      <input type='hidden' name='vendorname' value=\"$vendorname\"/>
      <input type='hidden' name='vendorid' value='$vendorid' />
      <input type='hidden' name='storeid' value='$storeid' />
		</form>
	";

  //echo "</BODY>";
  //echo "</HTML>";


}

?>
