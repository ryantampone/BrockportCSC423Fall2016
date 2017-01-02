// Jodi L. Hess Quiz2 CSC423

<?php
	require('dblogin.inc');

	function connect_and_select_db($server, $username, $pwd, $dbname)
{
	// Connect to db server
	$connect = mysql_connect($server, $username, $pwd);
	if (!$connect) {
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

	echo"
		<br>
		<div id='callToAction'>
	  <h3> <font color='B22222' ADD A VENDOR INVENTORY ITEM TYPE </font> </h3>
	  </div>

    <div id='userdataform'>
    	<form action='insert_item.php' method='post'>
      	<table align='center'>

				<style>
				h3 {text-align: center;}
				body { background-color: lightblue; }
				<?----- #barcode {margin-left: 20 px; }
				</style>
				<body>

				<table>
				<colgroup>
				<col span='1' style='width: 15%;'>
				<col span='1' style='width: 30%;'>
				<col span='1' style='width: 10%;'>
				<col span='1' style='width: 20%;'>
				<col span='1' style='width: 25%;'>
				</colgroup>
				<col width='15%'>
				<col width='30%'>
				<col width='10%'>
				<col width='20%'>
				<col width='25%'>

				<?-------------------------------------------------------------->
				<tr width='100%'>

				<td height='35 px'> Item Type Name: </td>
				<td> <input type='text'name='name' id='name'size='0'> </td>


				<td height='35 px' width='100 px'> Barcode Prefix: </td>
				<?----- <label for='barcode'> </label>
				<td> <input type='text' name='barcode' id='barcode' size='30' maxlength='4'> </td>
				</tr>


				<tr>

				<td height='35 px' > Units: </td>
				<td> <input type='text' name='units' id='units' size='30'> </td>



				<td height='35 px' width='100 px'> Units Measure: </td>
				<?----- <label for='barcode'> </label>
				<td> <input type='text' name='measure' id='measure' size='30'> </td>
				</tr>


				<tr>

				<td height='35 px' > Reorder Point: </td>
				<td> <input type='text' name='reorder' id='reorder' size='30'> </td>
				</tr>

				<tr>

				<td height='35 px'> Age Sensitive: </td>
				<td> Yes <input type='radio' name='Yes' id='yes' size='3'>
				No <input type='radio' name='no' id=no' size='3' checked> </td>
				</tr>

				<tr>

				<td height='35 px' > Validity Days: </td>
				<td> <input type='text' name='valid' id='valid' size='30'> </td>
				</tr>

				<tr>

				<tr>

				<td height='35 px' > Notes: </td>
				<td> <textarea rows='10' cols='30' name='notes' id='notes'> </textarea>
				</td>
				</tr>


				<tr>
				<td> </td>
				<td style='height:60px'> <input align='right' type='submit'
				id='submit' name='submit' value='Submit' onclick='validateForm()'>
				<input type='reset' id='reset' name='reset' value='Reset' onclick='reset()'>

				</td>
				</tr>

</table>
</form>
<script>

	";


//------------ Code works until this point ------------------

 connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);

$sqlEnterItem = "INSERT INTO `fal16_csc423_jhess3`.`InventoryItemType` (`ItemTypeName`,
	`Units`, `UnitMeasure`, `ValidityDays`,	`BarcodePrefix`, `ReorderPoint`,
	`AgeSensitive`, `Notes`, `Status`)";

//------------ Code works until this point ------------------

	 $enterResult = mysql_query($sqlEnterItem)

	 	 // works correctly independently when run the php checker
		 // does not work correctly when parsed with all code

	if (!$enterResult)
	{
		echo "Item not entered successfully: ".mysql_error();
		exit;
	}
		while ($row =  mysql_fetch_assoc($enterResult))
			{
					$itemTypeName = $row['ItemTypeName'];
					$barCodePrefix = $row['BarcodePrefix'];
					$ageSensitive =  $row['AgeSensitive'];
					$validityDays = $row['ValidityDays'];
					$notes  = $row['Notes'];
					$status = $row['Status'];

					// parse error - cannot find mistake
					echo "<option>".$itemTypeName.":".$barCodePrefix.":".$ageSensitive.":"
					.$validityDays.":".$notes.":".$status.": </option>
			}

					<div class='button'>
						<input id='tiny_button' type='submit' id='submit' name='submit' >
						<input id='tiny_button' type='reset' id='reset' name='reset'>
					</div>
				</form>
				</div>
	";
?>
