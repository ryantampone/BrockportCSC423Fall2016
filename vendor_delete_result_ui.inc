<?php
	include 'header.php';
?>
<?php

function show_all_vendors($message, $result)
{
  //----------------------------------------------------------
  // Start the html page
  echo "<HTML>";
  echo "<HEAD>";
  echo "</HEAD>";
  echo "<BODY>";

	echo"
		<div id='callToAction'>
			<h4 align='center'>Are you sure you want to delete this vendor?</h4>
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
		 $status = $row['Status'];

		 //Takes the values from the database row and sets them as the default values of the form for the user to see
		 echo"
		 <form action='update_delete_vendor.php' method='post'>
				 <table align='center'>
						 <tr>
								 <td align='right'>Vendor ID:</td>
								 <td><input NAME='vendorid' TYPE='text' SIZE='50' value='$vendorid' readonly required/></td>
						 </tr>
						 <tr>
								 <td align='right'>Vendor Code:</td>
								 <td><input NAME='vendorcode' TYPE='text' SIZE='50' value='$vendorcode'readonly required/></td>
						 </tr>
						 <tr>
								 <td align='right'>Vendor Name:</td>
								 <td><input NAME='vendorname' TYPE='text' SIZE='50' value='$vendorname' readonly required/></td>
						 </tr>
						 <tr>
								 <td align='right'>Address:</td>
								 <td><input NAME='address' TYPE='text' SIZE='50' value='$address'readonly required/></td>
						 </tr>
						 <tr>
								 <td align='right'>City:</td>
								 <td><input NAME='city' TYPE='text' SIZE='50' value='$city' readonly required/></td>
						 </tr>
						 <tr>
							 <td align='right'>State:</td>
							 <td><input NAME='state' TYPE='text' SIZE='50' value='$state' readonly required/></td>
						 </tr>
						 <tr>
								 <td align='right'>Zip:</td>
								 <td><input NAME='zip' TYPE='text' SIZE='50' value='$zip' readonly required/></td>
						 </tr>
						 <tr>
								 <td align='right'>Phone:</td>
								 <td><input NAME='phone' TYPE='text' SIZE='50' value='$phone' readonly required/></td>
						 </tr>
						 <tr>
								 <td align='right'>Contact Person Name:</td>
								 <td><input NAME='contactpersonname' TYPE='text' SIZE='50' value='$contactpersonname' readonly required/></td>
						 </tr>
						 <tr>
								 <td align='right'>Password:</td>
								 <td><input NAME='password' TYPE='password' SIZE='50' value='$password' readonly required/></td>
						 </tr>
						 <tr>
								 <td align='right'>Status:</td>
								 <td><input NAME='status' TYPE='text' SIZE='50' value='$status' readonly required/></td>
						 </tr>
				 </table>
				 <div id='button'>
					 <input id='tiny_button' type='submit' id='submit' name='submit' value='Confirm Delete' />
				 </div>
		 </form> ";
	}


	//finishes html body
  echo "</BODY>";
  echo "</HTML>";


}

?>
