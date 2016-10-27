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
								 <td><span align='right'>Vendor ID:</span></td>
								 <td><input NAME='vendorid' TYPE='text' SIZE='50' value='$vendorid' readonly required/></td>
						 </tr>
						 <tr>
								 <td><span align='right'>Vendor Code:</span></td>
								 <td><input NAME='vendorcode' TYPE='text' SIZE='50' value='$vendorcode'readonly required/></td>
						 </tr>
						 <tr>
								 <td><span align='right'>Vendor Name:</span></td>
								 <td><input NAME='vendorname' TYPE='text' SIZE='50' value='$vendorname' readonly required/></td>
						 </tr>
						 <tr>
								 <td><span align='right'>Address:</span></td>
								 <td><input NAME='address' TYPE='text' SIZE='50' value='$address'readonly required/></td>
						 </tr>
						 <tr>
								 <td><span align='right'>City:</span></td>
								 <td><input NAME='city' TYPE='text' SIZE='50' value='$city' readonly required/></td>
						 </tr>
						 <tr>
							 <td><span align='right'>State:</span></td>
							 <td><input NAME='state' TYPE='text' SIZE='50' value='$state' readonly required/></td>
						 </tr>
						 <tr>
								 <td><span align='right'>Zip:</span></td>
								 <td><input NAME='zip' TYPE='text' SIZE='50' value='$zip' readonly required/></td>
						 </tr>
						 <tr>
								 <td><span align='right'>Phone:</span></td>
								 <td><input NAME='phone' TYPE='text' SIZE='50' value='$phone' readonly required/></td>
						 </tr>
						 <tr>
								 <td><span align='right'>Contact Person Name:</span></td>
								 <td><input NAME='contactpersonname' TYPE='text' SIZE='50' value='$contactpersonname' readonly required/></td>
						 </tr>
						 <tr>
								 <td><span align='right'>Password:</span></td>
								 <td><input NAME='password' TYPE='password' SIZE='50' value='$password' readonly required/></td>
						 </tr>
						 <tr>
								 <td><span align='right'>Status:</span></td>
								 <td><input NAME='status' TYPE='text' SIZE='50' value='$status' readonly required/></td>
						 </tr>
				 </table>
				 <p align='center'>
						 <input type='submit' value='Confirm Delete'/>
				 </p>
		 </form> ";
	}


	//finishes html body
  echo "</BODY>";
  echo "</HTML>";


}

?>
