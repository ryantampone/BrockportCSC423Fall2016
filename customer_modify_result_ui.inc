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
		 $email = $row['Email'];
	 	 $status = $row['Status'];

		 echo"
		 <form action='update_customer.php' method='post'>
				 <table align='center'>
						 <tr>
								 <td><span align='right'>Customer ID:</span></td>
								 <td><input NAME='customerid' TYPE='text' SIZE='50' value='$customerid' onKeyPress='return hasToBeNumberOrLetter(event)' onpaste='return false' readonly required/></td>
						 </tr>
						 <tr>
								 <td><span align='right'>Customer Name:</span></td>
								 <td><input NAME='customername' TYPE='text' SIZE='50' value='$customername' onKeyPress='return isTextCityOrPersonKey(event)' onpaste='return false' required/></td>
						 </tr>
						 <tr>
								 <td><span align='right'>Address:</span></td>
								 <td><input NAME='address' TYPE='text' SIZE='50' value='$address' onKeyPress='return isAddressKey(event)' onpaste='return false' required/></td>
						 </tr>
						 <tr>
								 <td><span align='right'>City:</span></td>
								 <td><input NAME='city' TYPE='text' SIZE='50' value='$city' onKeyPress='return isTextCityOrPersonKey(event)' onpaste='return false'required/></td>
						 </tr>
						 <tr>
							 <td><span align='right'>State:</span></td>
							 <td>
							 		<select name='state' id='state' value='$state'/>
											<option value='AL'>Alabama</option>
											<option value='AK'>Alaska</option>
											<option value='AZ'>Arizona</option>
											<option value='AR'>Arkansas</option>
											<option value='CA'>California</option>
											<option value='CO'>Colorado</option>
											<option value='CT'>Connecticut</option>
											<option value='DE'>Delaware</option>
											<option value='DC'>District Of Columbia</option>
											<option value='FL'>Florida</option>
											<option value='GA'>Georgia</option>
											<option value='HI'>Hawaii</option>
											<option value='ID'>Idaho</option>
											<option value='IL'>Illinois</option>
											<option value='IN'>Indiana</option>
											<option value='IA'>Iowa</option>
											<option value='KS'>Kansas</option>
											<option value='KY'>Kentucky</option>
											<option value='LA'>Louisiana</option>
											<option value='ME'>Maine</option>
											<option value='MD'>Maryland</option>
											<option value='MA'>Massachusetts</option>
											<option value='MI'>Michigan</option>
											<option value='MN'>Minnesota</option>
											<option value='MS'>Mississippi</option>
											<option value='MO'>Missouri</option>
											<option value='MT'>Montana</option>
											<option value='NE'>Nebraska</option>
											<option value='NV'>Nevada</option>
											<option value='NH'>New Hampshire</option>
											<option value='NJ'>New Jersey</option>
											<option value='NM'>New Mexico</option>
											<option value='NY' selected='selected'>New York</option>
											<option value='NC'>North Carolina</option>
											<option value='ND'>North Dakota</option>
											<option value='OH'>Ohio</option>
											<option value='OK'>Oklahoma</option>
											<option value='OR'>Oregon</option>
											<option value='PA'>Pennsylvania</option>
											<option value='RI'>Rhode Island</option>
											<option value='SC'>South Carolina</option>
											<option value='SD'>South Dakota</option>
											<option value='TN'>Tennessee</option>
											<option value='TX'>Texas</option>
											<option value='UT'>Utah</option>
											<option value='VT'>Vermont</option>
											<option value='VA'>Virginia</option>
											<option value='WA'>Washington</option>
											<option value='WV'>West Virginia</option>
											<option value='WI'>Wisconsin</option>
											<option value='WY'>Wyoming</option>
									</select>
							 </td>
						 </tr>
						 <tr>
								 <td><span align='right'>Zip:</span></td>
								 <td><input NAME='zip' TYPE='text' SIZE='50' value='$zip' maxlength='5' onKeyPress='return hasToBeNumber(event)' onpaste='return false' required/></td>
						 </tr>
						 <tr>
								 <td><span align='right'>Phone:</span></td>
								 <td><input NAME='phone' id='phone' TYPE='text' SIZE='50' value='$phone' onblur='isPhoneNumber()' onpaste='return false' required/></td>
						 </tr>
						 <tr>
						 		 <td><span align='right'>Email:</span></td>
								 <td><input name='email' type='text' size='50' value='$email' onKeyPress='return anythingButQuotesOrSlash(event)' onpaste='return false' required/></td>
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



  echo "</BODY>";
  echo "</HTML>";


}

?>
