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
                        <td><input id='ItemId' name='ItemId' value=\"$itemId\" TYPE='text' SIZE='50' style=\"background-color: #d6dbdf;\" readonly required/></td>
                    </tr>
               	    <tr>
                        <td align='right'>Description:</td>
                        <td><input id='Description' name='Description' value=\"$description\" type='text' size='50' required/></td>
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
														$division_result = mysql_query($sql_div);

														if(!$division_result)
														{
															echo "Divisions retrieved unsuccessfully: ".mysql_error();
															exit;
														}
														while ($row = mysql_fetch_assoc($division_result))
														{
															$_division = $row['Division'];
															if ($_division == $division)
																echo "<option value='$_division' selected>".$_division."</option>";
															else echo "<option value='$_division'>".$_division."</option>";
														}
													echo "
													</select>
												</td>
        						</tr>
										<tr>
										<td align='right'>Department:</td>
										<td>
											<select id='Department' name='Department' onchange='check_dept(this)' required />";
												// this = [object HTMLSelectElement]
								  			$sql_dept ="SELECT DISTINCT Department FROM InventoryItem ORDER BY Department;";
										 		$department_result = mysql_query($sql_dept);

												if(!$department_result)
												{
													echo "Departments retrieved unsuccessfully: ".mysql_error();
													exit;
												}
												while ($row = mysql_fetch_assoc($department_result))
												{
													$_department = $row['Department'];
													if ($_department == $department)
														echo "<option value='$_department' selected>".$_department."</option>";
													else echo "<option value='$_department'>".$_department."</option>";
												}
					  						echo "
											</select>
										</td>
									</tr>
  								<tr>
              			<td align='right'>Category:</td>
          					<td>
											<select id='Category' name='Category' required />
												<option value='$category'>".$category."</option>
											</select>
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
											  $sql_vendors = "SELECT VendorId, VendorName FROM Vendor WHERE Status='Active';";
												$vendors_result = mysql_query($sql_vendors);

												if (!$vendors_result)
												{
													echo "Vendors retrieved unsuccessfully: ".mysql_error();
													exit;
												}
												while ($row = mysql_fetch_assoc($vendors_result))
												{
													$vendorid = $row['VendorId'];
													$vendorname = $row['VendorName'];
													if ($vName == $vendorname)
														echo "<option selected>".$vendorname."</option>";
													else echo "<option>".$vendorname."</option>";
												}
  										echo "</select>
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
