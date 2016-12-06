<?php
	include 'headerPurchase.php';
	require('db_cn.inc');

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

<?php

	if(isset($_POST['custid']))
		$cust_id = $_POST['custid'];
	else $cust_id = "";

	if(isset($_POST['stname']))
		$st_name = $_POST['stname'];
	else $st_name = "";

  echo"
  <br>
    <h2>Please fill out the form below.</h2>
    <form action='customer_purchase_confirm_ui.php' method='post'>
      <table align='center'>
        <tr>
          <td align='right'>Customer ID:</td>
          <td><input type='text' name='customerid' id='customerid' value='$cust_id' size='50' onKeyPress='return hasToBeNumberOrLetter(event)' onpaste='return false' required/></td>
        </tr>
        <tr>
          <td align='right'>Store Name:</td>
          <td>
            <select name='storename' id='storename' />
            ";
              connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);
              $sql_store = "SELECT StoreName FROM RetailStore WHERE Status='Active';";
              $store_result = mysql_query($sql_store);
              if (!$store_result)
              {
                echo "Store's retrieved unsuccessful: ".mysql_error();
                exit;
              }
              while($row = mysql_fetch_assoc($store_result))
              {
                $storename = $row['StoreName'];
								if ($storename == $st_name)
								{
									echo "<option selected='selected'>".$st_name."</option>";
								}
                else echo "<option>".$storename."</option>";
              }
            echo "
            </select>
          </td>
        </tr>
          <td align='right'>Item ID:</td>
          <td><input type='text' name='itemid' size='20' onKeyPress='return hasToBeNumber(event)' onpaste='return false' required/></td>
        </tr>
        <tr>
          <td align='right'>Item Qty:</td>
          <td><input type='text' name='itemqty' id='itemqty' size='5' onKeyPress='return hasToBeNumber(event)' onpaste='return false'' required/></td>
        </tr>
      </table>
      <div class='button'>
<input id='tiny_button' type='submit' id='submit' name='submit' >
<input id='tiny_button' type='reset' id='reset' name='reset'>
</div>

    </form>
  ";
?>
