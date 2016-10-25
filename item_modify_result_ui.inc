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
			<h4 align='center'>Please Modify the Desired Information Below</h4>
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

	/*
	echo '<table border="1" align="center" width="98%">';
	echo '<th width="10%">Vendor ID</th>';
  echo '<th width="10%">Vendor Code</th>';
  echo '<th width="10%">Vendor Name</th>';
  echo '<th width="10%">Address</th>';
  echo '<th width="10%">City</th>';
	echo '<th width="10%">State</th>';
	echo '<th width="10%">Zip</th>';
	echo '<th width="10%">Phone</th>';
	echo '<th width="10%">Contact Person Name</th>';
	echo '<th width="10%">Password</th>';
  echo '<thead>';
  echo '</thead>';
  echo '<tbody>';
	*/

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

	 	 $imageFileName = $row['ImageFileName'];
		 $vendorID = $row['VendorId'];


      //Put these in a table row. The htmlentities function converts any
      //special chars in the string to a html-displayable form.
			/*
      echo '<tr>';
			echo '<TD><SPAN ALIGN=CENTER>'.htmlentities($vendorid).'</SPAN></TD>';
      echo '<TD><SPAN ALIGN=CENTER>'.htmlentities($vendorcode).'</SPAN></TD>';
			echo '<TD><SPAN ALIGN=CENTER>'.htmlentities($vendorname).'</SPAN></TD>';
			echo '<TD><SPAN ALIGN=CENTER>'.htmlentities($address).'</SPAN></TD>';
			echo '<TD><SPAN ALIGN=CENTER>'.htmlentities($city).'</SPAN></TD>';
			echo '<TD><SPAN ALIGN=CENTER>'.htmlentities($state).'</SPAN></TD>';
			echo '<TD><SPAN ALIGN=CENTER>'.htmlentities($zip).'</SPAN></TD>';
			echo '<TD><SPAN ALIGN=CENTER>'.htmlentities($phone).'</SPAN></TD>';
			echo '<TD><SPAN ALIGN=CENTER>'.htmlentities($contactpersonname).'</SPAN></TD>';
			echo '<TD><SPAN ALIGN=CENTER>'.htmlentities($password).'</SPAN></TD>';
      echo '</tr>';
   //}

   echo '</TBODY>';
   echo '</table>';
	 */


		 echo"
		 <form action='update_item.php' method='post'>
				 <table align='center'>
                    <tr>
                        <td><span align='right'>Item ID:</span></td>
                        <td><input id='ItemId' name='ItemId' value='itemId' TYPE='text' SIZE='50' value='$itemID' readonly/></td>
                    </tr>
               	    <tr>
                        <td><span align='right'>Description:</span></td>
                        <td><input id='Description' name='Description' value='$description' type='textarea' required/></td>
                    </tr>
                    <tr>
                        <td><span align='right'>Size:</span></td>
                        <td><input id='Size' name='Size' TYPE='text' value='$size' SIZE='50' required/></td>
                    </tr>
                    <tr>
                        <td><span align='right'>Division:</span></td>
												<td><input id='Division' name='Division' value='$division' SIZE='50' required /></td>
										</tr>
										<tr>
                        <td><span align='right'>Department:</span></td>
												<td><input id='Department' name='Department' value='$department' SIZE='50' required /> </td>
										</tr>
										<tr>
                        <td><span align='right'>Category:</span></td>
                        <td><input id='Category' name='Category' value='$category' SIZE='50' required /> </td>
                    </tr>

										<tr>
											<td><span align='right'>Item Cost</span></td>
											 <td><input id='ItemCost' name='ItemCost' value='$itemCost' TYPE='text' SIZE='50' required/></td>
										</tr>

										<tr>
											<td><span align='right'>Item Retail</span></td>
											 <td><input id='ItemRetail' name='ItemRetail' value='$itemRetail' TYPE='text' SIZE='50' required/></td>
										</tr>

										<tr>
											<td><span align='right'>Vendor Id</span></td>
											<td><input id='VendorId' name='VendorId' value='$vendorID' TYPE='text' SIZE='50' required/></td>
										</tr>

										<tr>
											<td><span align='right'>Image FileName</td>
											<td><input id='ImageFileName' name='ImageFileName' value='$imageFileName' TYPE='text' SIZE='50' required/></td>
										</tr>
            </table>
				 <p align='center'>
						 <input type='submit' value='Submit'/>
						 <input type='reset' value='Reset'/>
				 </p>
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
