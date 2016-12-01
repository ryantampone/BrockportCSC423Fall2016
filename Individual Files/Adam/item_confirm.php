<?php

require 'db_cn.inc';

connect_and_select_db(DB_SERVER, DB_UN, DB_PWD, DB_NAME);

$item_name = $_POST['ItemTypeName'];
$barcode_prefix = $_POST['BarcodePrefix'];
$units = $_POST['Units'];
$measure = $_POST['Measure'];
$reorder = $_POST['ReorderPoint'];
$age = $_POST['AgeSensitive'];
$validity_days = $_POST['ValidityDays'];
$notes = $_POST['Notes'];

  $sql_insert = "INSERT INTO InventoryItemType (ItemTypeName, Units, UnitMeasure, ValidityDays, BarcodePrefix, ReorderPoint, AgeSensitive, Notes, Status) VALUES ('$item_name', '$units', '$measure', '$validity_days', '$barcode_prefix', '$reorder', '$age', '$notes', 'Active');";
  $sql_result = mysql_query($sql_insert);

  if(!$sql_result)
  {
    echo "Item insert was unsuccessful: ".mysql_error();
    exit;
  }

  echo"
    <h2 align='center'>$item_name was inserted successfully.</h2>
    <form action='enterItemType.php' >
      <table align='center'>
        <tr>
          <td>
            <input type='submit' id='submit' name='submit' value='Back' />
          </td>
        </tr>
      </table>
    </form>
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

?>
