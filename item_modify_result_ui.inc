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
	 echo '<center><font color="blue">'.$message.'</font></center><br />';
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
	 	 $contactpersonname = $row['ContactPersonName'];
		 $vendorID = $row['VendorId'];
		 $imageFileName = $row['ImageFileName'];


      //Put these in a table row. The htmlentities function converts any
      //special chars in the string to a html-displayable form.



		 echo"
		 <form action='update_item.php' method='post'>
				 <table align='center'>
                    <tr>
                        <td align='right'>Item ID:</td>
                        <td><input id='ItemId' name='ItemId' value='$itemId'TYPE='text' SIZE='50' required/></td>
                    </tr>
               	    <tr>
                        <td align='right'>Description:</td>
                        <td><input id='Description' name='Description' value='$description' type='textarea' required/></td>
                    </tr>
                    <tr>
                        <td align='right'>Size:</td>
                        <td><input id='Size' name='Size' value='$size' TYPE='text' SIZE='50' required/></td>
                    </tr>
                    <tr>
                        <td align='right'>Division:</td>
			<td><input id='Division' name='Division' value='$division' TYPE='text' SIZE='50' required/></td>



                    </tr>
			<tr>	  <td align='right'>Department:</td>

		  <td>
							<select  id='Department'  value='$department'  onpaste='return false'>
								<option value='Meat Department'>Meat Department</option>
								<option value='Beverages Department'>Beverages Department</option>
								<option value='Candy Department'>Candy Department</option>
								<option value='Cookies/Crackers Department'>Cookies/Crackers Department</option>
							</select>
						</td>
					</tr>
  				<tr>
              <td align='right'>Category:</td>
              <td>
								<select value='$category' name='Category'>
										<option id='Category_1' value='5'></option>
										<option id='Category_2' value='5'></option>
								</select>
							</td>
							
			</tr>
		<tr>
			<td align='right'>Item Cost:</td>
			 <td><input id='ItemCost' name='ItemCost' value='$itemCost' TYPE='text' SIZE='50' required/></td>
		</tr>

		<tr>
			<td align='right'>Item Retail:</td>
			 <td><input id='ItemRetail' name='ItemRetail' value='$itemRetail' TYPE='text' SIZE='50' required/></td>
		</tr>

		<tr>
			<td align='right'>Vendor Id:</td>
			<td>
				<select id='VendorId' name='VendorId' required/>
			";
				  $sql_vendors = "SELECT VendorId FROM Vendor WHERE Status='Active';";
					$vendors_result = mysql_query($sql_vendors);

					if (!$vendors_result)
					{
						echo "VendorId's retrieved unsuccessfully: ".mysql_error();
						exit;
					}
					while ($row = mysql_fetch_assoc($vendors_result))
					{
						$vendorid = $row['VendorId'];
						echo "<option>".$vendorid."</option>";
					}
  echo "<option value='myVendorId' selected>$vendorid</option>
				</select>
			</td>
		</tr>

		<tr>
			<td align='right'>Image Filename:</td>
			<td><input id='ImageFileName' name='ImageFileName' value='$imageFileName' TYPE='text' SIZE='50' required/></td>
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
