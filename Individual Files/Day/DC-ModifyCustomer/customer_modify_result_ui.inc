<?php
	include 'header.php';
?>
<?php


function show_all_customers($message, $result)
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
		 $customerid = $row['CustomerId'];
		 $customername = $row['Name'];
  	 $address = $row['Address'];
 	 	 $city = $row['City'];
 	 	 $state = $row['State'];
	 	 $zip = $row['ZIP'];
	 	 $phone = $row['Phone'];
		 $email = $row['E-mail'];
	 	 $status = $row['Status'];


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
		 <form action='update_customer.php' method='post'>
				 <table align='center'>
						 <tr>
								 <td><span align='right'>Customer ID:</span></td>
								 <td><input NAME='customerid' TYPE='text' SIZE='50' value='$customerid' readonly required/></td>
						 </tr>
						 <tr>
								 <td><span align='right'>Customer Name:</span></td>
								 <td><input NAME='customername' TYPE='text' SIZE='50' value='$customername' required/></td>
						 </tr>
						 <tr>
								 <td><span align='right'>Address:</span></td>
								 <td><input NAME='address' TYPE='text' SIZE='50' value='$address' required/></td>
						 </tr>
						 <tr>
								 <td><span align='right'>City:</span></td>
								 <td><input NAME='city' TYPE='text' SIZE='50' value='$city' required/></td>
						 </tr>
						 <tr>
							 <td><span align='right'>State:</span></td>
							 <td><input NAME='state' TYPE='text' SIZE='50' value='$state' required/></td>
						 </tr>
						 <tr>
								 <td><span align='right'>Zip:</span></td>
								 <td><input NAME='zip' TYPE='text' SIZE='50' value='$zip' required/></td>
						 </tr>
						 <tr>
								 <td><span align='right'>Phone:</span></td>
								 <td><input NAME='phone' TYPE='text' SIZE='50' value='$phone' required/></td>
						 </tr>
						 <tr>
								 <td><span align='right'>Status:</span></td>
								 <td><input NAME='status' TYPE='text' SIZE='50' value='$status' readonly required/></td>
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
