// Jodi L. Hess

<?php
	include 'header.php';
?>
<?php

function show_all_items($message, $result)  // correct function name?
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

  // If the message is non-null and not an empty string, print it
  // message contains the lastname and firstname
  if ($message)
  {
    if ($message != "")
       {
	 echo '<center><font color="blue">'.$message.'</font></center><br />';
       }
  }

	/**************************************************
	echo '<table border="1" align="center" width="98%">';
	echo '<th width="10%">ItemId</th>';
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
	*/////////////////////////////////////////////////////

	echo '<table border="1" align="center" width="98%">';
	echo '<th width="10%">ItemId</th>';
	echo '<th width="10%">Description</th>';
	echo '<th width="10%">Size</th>';
	echo '<th width="10%">Division</th>';
	echo '<th width="10%">Department</th>';
	echo '<th width="10%">Category</th>';
	echo '<th width="10%">ItemCost</th>';
	echo '<th width="10%">ItemRetail</th>';
	echo '<th width="10%">imageFileName</th>';
	echo '<th width="10%">VendorId</th>';
	echo '<thead>';
	echo '</thead>';
	echo '<tbody>';



  //----------------------------------------------------------
	 //While there are more rows in the $result, get the next row
   //as an associative array

	 while ($row = mysql_fetch_assoc($result))
   {
	   $itemid = $row['ItemId'];
		 $description = $row['Description'];
		 $size = $row['Size'];
		 $division  = $row['Division'];
		 $department  = $row['Department'];
		 $category  = $row['Category'];
		 $itemCost  = $row['ItemCost'];
		 $itemRetail = $row['ItemRetail'];
		 $imageFileName = $row['ImageFileName'];
		 $vendorID  = $row['VendorId'];

	/*
	$vendorid = $row['VendorId'];
	$vendorcode = $row['VendorCode'];
	$vendorname = $row['VendorName'];
	$address = $row['Address'];
	$city = $row['City'];
	$state = $row['State'];
	$zip = $row['ZIP'];
	$phone = $row['Phone'];
	$contactpersonname = $row['ContactPersonName'];
	$password = $row['Password'];
*/

//-----------------------------------------------------------------------
      //Put these in a table row. The htmlentities function converts any
      //special chars in the string to a html-displayable form.

      echo '<tr>';
			echo '<TD><SPAN ALIGN=CENTER>'.htmlentities($itemid).'</SPAN></TD>';
      echo '<TD><SPAN ALIGN=CENTER>'.htmlentities($description).'</SPAN></TD>';
			echo '<TD><SPAN ALIGN=CENTER>'.htmlentities($size).'</SPAN></TD>';
			echo '<TD><SPAN ALIGN=CENTER>'.htmlentities($division).'</SPAN></TD>';
		  echo '<TD><SPAN ALIGN=CENTER>'.htmlentities($department).'</SPAN></TD>';
			echo '<TD><SPAN ALIGN=CENTER>'.htmlentities($category).'</SPAN></TD>';
			echo '<TD><SPAN ALIGN=CENTER>'.htmlentities($itemCost).'</SPAN></TD>';
			echo '<TD><SPAN ALIGN=CENTER>'.htmlentities($itemRetail).'</SPAN></TD>';
			echo '<TD><SPAN ALIGN=CENTER>'.htmlentities($imageFileName).'</SPAN></TD>';
			echo '<TD><SPAN ALIGN=CENTER>'.htmlentities($vendorID).'</SPAN></TD>';
      echo '</tr>';
   //}

   echo '</TBODY>';
   echo '</table>';
	 */


		 echo"
		 <form action='update_item.php' method='post'>
				 <table align='center'>
						 <tr>
								 <td><span align='right'>Item Id:</span></td>
								 <td><input NAME='itemid' TYPE='text' SIZE='50' value='$itemId' required/></td>
						 </tr>
						 <tr>
								 <td><span align='right'>Description:</span></td>
								 <td><input NAME='description' TYPE='text' SIZE='50' value='$description'required/></td>
						 </tr>

						 tr>
						 		<td><span align='right'>Size:</span></td>
						 		<td><input NAME='size' TYPE='text' SIZE='50' value='$size' required/></td>
						 </tr>

						 <tr>
								 <td><span align='right'>Division:</span></td>
								 <td><input NAME='division' TYPE='text' SIZE='50' value='$division' required/></td>
						 </tr>

						 tr>
						 		<td><span align='right'>Department Name:</span></td>
						 		<td><input NAME='department' TYPE='text' SIZE='50' value='$department' required/></td>
						 </tr>

						 <tr>
							 <td><span align='right'>Category:</span></td>
							 <td><input NAME='category' TYPE='text' SIZE='50' value='$category' required/></td>
						 </tr>
						 <tr>
								 <td><span align='right'>ItemCost:</span></td>
								 <td><input NAME='itemCost' TYPE='text' SIZE='50' value='$itemCost' required/></td>
						 </tr>
						 <tr>
								 <td><span align='right'>ItemRetail:</span></td>
								 <td><input NAME='itemRetail' TYPE='text' SIZE='50' value='$itemRetail' required/></td>
						 </tr>
						 <tr>
								 <td><span align='right'>ImageFileName:</span></td>
								 <td><input NAME='imageFileName' TYPE='text' SIZE='50' value='$imageFileName' required/></td>
						 </tr>
						 <tr>
								 <td><span align='right'>VendorId</span></td>
								 <td><input NAME='vendorId TYPE='text' SIZE='50' value='$vendorId' required/></td>
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
