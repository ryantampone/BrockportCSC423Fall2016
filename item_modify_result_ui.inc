<?php
	include 'header.php';
?>
<?php

function show_all_items($message, $result)
{
  //----------------------------------------------------------
  // Start the html page
  echo "<HTML>";
  echo "<HEAD>";
  echo "</HEAD>";
  echo "<BODY>";

	echo"
		<div id='callToAction'>
			<h2>Please Modify the Desired Information Below</h2>
		</div>
		";

  // If the message is non-null and not an empty string print it
  // message contains the lastname and firstname
  if ($message)
  {
    if ($message != "")
       {
				 echo "<SCRIPT LANGUAGE='JavaScript'>
						window.alert('$message')
						window.location.href='modify_item_ui_form.php';
						</SCRIPT>";
					#echo '<center><font color="blue">'.$message.'</font></center><br />';
       }
  }



   //While there are more rows in the $result, get the next row
   //as an associative array
   while ($row = mysql_fetch_assoc($result))
   {
		 $itemId = $row['ItemId'];
		 $description = $row['Description'];
	 	 $size = $row['Size'];
  	 $division = $row['Division'];
 	 	 $department = $row['Department'];
 	 	 $category = $row['Category'];
	 	 $itemCost = $row['ItemCost'];
	 	 $itemRetail = $row['ItemRetail'];
		 $vendorId = $row['VendorId'];
		 $imageFileName = $row['ImageFileName'];

      //Put these in a table row. The htmlentities function converts any
      //special chars in the string to a html-displayable form.


		 $vName;
		 $sql_vendorNameFromID ="SELECT VendorName FROM Vendor WHERE VendorId=$vendorId;";
		 $vNresult = mysql_query($sql_vendorNameFromID);
		 if(!$vNresult)
		 {
			 echo "Vendor Name retrieved unsuccessfully: ".mysql_error();
			 exit;
		 }
		 while ($row = mysql_fetch_assoc($vNresult))
		 {
			 $vName = $row['VendorName'];
		 }


		 echo"
		 <form action='update_item.php' method='post'>
				 <table align='center'>
                    <tr>
                        <td align='right'>Item ID:</td>
                        <td><input id='ItemId' name='ItemId' value=\"$itemId\" TYPE='text' SIZE='50' readonly disabled required/></td>
                    </tr>
               	    <tr>
                        <td align='right'>Description:</td>
                        <td><input id='Description' name='Description' value=\"$description\" type='textarea' required/></td>
                    </tr>
                    <tr>
                        <td align='right'>Size:</td>
                        <td><input id='Size' name='Size' value=\"$size\" TYPE='text' SIZE='50' required/></td>
                    </tr>
                    <tr>
                        <td align='right'>Division:</td>

		<td>
					<select id='Division' name='Division' required />";


					 $sql_div ="SELECT DISTINCT Division FROM InventoryItem ORDER BY Division;";
					 $div_result = mysql_query($sql_div);
	    				$div = mysql_query($div_result);
					if(!$div_result)
					{

						echo "Division's retrieved unsuccessfully: ".mysql_error();
						exit;
					}
					while ($row = mysql_fetch_assoc($div_result))
					{
						$_division = $row['Division'];
						echo "<option value=$_division>".$_division."</option>";
					}
  					echo "<option value='$division' selected>$division</option>
				</select>
				</td>




                    </tr>
			<tr>	  <td align='right'>Department:</td>
				<td>
					<select id='Department' name='Department' required />";

			  		 $sql_dept ="SELECT DISTINCT Department FROM InventoryItem ORDER BY Department;";
					 $department_result = mysql_query($sql_dept);

					if(!$department_result)
					{

						echo "Depatment's retrieved unsuccessfully: ".mysql_error();
						exit;
					}
					while ($row = mysql_fetch_assoc($department_result))
					{
						$_department = $row['Department'];
						echo "<option value=$_department>".$_department."</option>";
					}
  					echo "<option value='$department' selected>$department</option>
				</select>
				</td>

			</tr>
  				<tr>
              <td align='right'>Category:</td>
          <td>
					<select id='Category' name='Category' required />";

			  		 $sql_category ="SELECT DISTINCT Category FROM InventoryItem ORDER BY Category;";
					 $category_result = mysql_query($sql_category);

					if(!$category_result)
					{

						echo "Category's retrieved unsuccessfully: ".mysql_error();
						exit;
					}
					while ($row = mysql_fetch_assoc($category_result))
					{
						$_category = $row['Category'];
						echo "<option>".$_category."</option>";
					}
  					echo "<option value='Category' selected>$category</option>
				</select>
				</td>
																								</td>

			</tr>
		<tr>
			<td align='right'>Item Cost:</td>
			 <td><input id='ItemCost' name='ItemCost' value='$itemCost' onblur='isItemCost()' onpaste='return false' TYPE='text' SIZE='50' required/></td>
		</tr>

		<tr>
			<td align='right'>Item Retail:</td>
			 <td><input id='ItemRetail' name='ItemRetail' value='$itemRetail' onBlur='isItemRetail()' opaste='return false' TYPE='text' SIZE='50' required/></td>
		</tr>

		<tr>
			<td align='right'>Vendor Name:</td>
			<td>
				<select id='VendorName' name='VendorName' required/>
			";
				  $sql_vendors = "SELECT VendorName FROM Vendor WHERE Status='Active';";
					$vendors_result = mysql_query($sql_vendors);

					if (!$vendors_result)
					{
						echo "VendorName's retrieved unsuccessfully: ".mysql_error();
						exit;
					}
					while ($row = mysql_fetch_assoc($vendors_result))
					{
						$vendorname = mysql_real_escape_string($row['VendorName']);
						echo "<option>".$vendorname."</option>";
					}
  echo "<option value='$vName' selected>$vName</option>
				</select>
			</td>
		</tr>

		<tr>
			<td align='right'>Image Filename:</td>
			<td><input id='ImageFileName' name='ImageFileName' value=\"$imageFileName\" onKeyPress='return isImageFileName(event)' onpaste='return false' TYPE='text' SIZE='50' required/></td>
		</tr>
                </table>
				  <div class='button'>
<input id='tiny_button' type='submit' id='submit' name='submit' >
<input id='tiny_button' type='reset' id='reset' name='reset'>
</div>

		 </form> ";
	}




		/*
		//finish up the html code, and put the return button to go back to main menu
		  echo <<<UPTOEND
		  <BR/><BR/>
		  <center>
		  <input type="button" value="Return to Main Menu"
			onClick="window.location='index.php'"/>
		  </center>
		UPTOEND; */

  echo "</BODY>";
  echo "</HTML>";


}

?>
