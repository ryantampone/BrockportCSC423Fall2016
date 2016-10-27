<?php

include 'header.php';

?>

<?php

function show_all_stores($message, $result)
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
		 $storeid = $row['StoreId'];
		 $storecode = $row['StoreCode'];
	 	 $storename = $row['StoreName'];
  	 $address = $row['Address'];
 	 	 $city = $row['City'];
 	 	 $state = $row['State'];
	 	 $zip = $row['ZIP'];
	 	 $phone = $row['Phone'];
	 	 $mgrname = $row['ManagerName'];
     $status = $row['Status'];

      //Put these in a table row. The htmlentities function converts any
      //special chars in the string to a html-displayable form.

		 echo"
		 <form action='update_store_modify.php' method='post'>
				 <table align='center'>
						 <tr>
								 <td align='right'>Store ID:</td>
								 <td><input NAME='storeid' TYPE='text' SIZE='50' value='$storeid' readonly required/></td>
						 </tr>
						 <tr>
								 <td align='right'>Store Code:</td>
								 <td><input NAME='storecode' TYPE='text' SIZE='50' onKeyPress='return hasToBeNumberOrLetter(event)' onpaste='return false' value='$storecode'required/></td>
						 </tr>
						 <tr>
								 <td align='right'>Store Name:</td>
								 <td><input NAME='storename' TYPE='text' SIZE='50' onKeyPress='return isAddressKey(event)' onpaste='return false' value='$storename' required/></td>
						 </tr>
						 <tr>
								 <td align='right'>Address:</td>
								 <td><input NAME='address' TYPE='text' SIZE='50' onKeyPress='return isAddressKey(event)' onpaste='return false' value='$address'required/></td>
						 </tr>
						 <tr>
								 <td align='right'>City:</td>
								 <td><input NAME='city' TYPE='text' SIZE='50' onKeyPress='return isTextCityOrPersonKey(event)' onpaste='return false' value='$city' required/></td>
						 </tr>
						 <tr>
							 <td align='right'>State:</td>
							 <td>
                  <select id='state' required/>
                    <option value='Alabama'>Alabama</option>
                    <option value='Alaska'>Alaska</option>
                    <option value='Arizona'>Arizona</option>
                    <option value='Arkansas'>Arkansas</option>
                    <option value='California'>California</option>
                    <option value='Colorado'>Colorado</option>
                    <option value='Connecticut'>Connecticut</option>
                    <option value='Delaware'>Delaware</option>
                    <option value='District Of Columbia'>District Of Columbia</option>
                    <option value='Florida'>Florida</option>
                    <option value='Georgia'>Georgia</option>
                    <option value='Hawaii'>Hawaii</option>
                    <option value='Idaho'>Idaho</option>
                    <option value='Illinois'>Illinois</option>
                    <option value='Indiana'>Indiana</option>
                    <option value='Iowa'>Iowa</option>
                    <option value='Kansas'>Kansas</option>
                    <option value='Kentucky'>Kentucky</option>
                    <option value='Louisiana'>Louisiana</option>
                    <option value='Maine'>Maine</option>
                    <option value='Maryland'>Maryland</option>
                    <option value='Massachusetts'>Massachusetts</option>
                    <option value='Michigan'>Michigan</option>
                    <option value='Minnesota'>Minnesota</option>
                    <option value='Mississippi'>Mississippi</option>
                    <option value='Missouri'>Missouri</option>
                    <option value='Montana'>Montana</option>
                    <option value='Nebraska'>Nebraska</option>
                    <option value='Nevada'>Nevada</option>
                    <option value='New Hampshire'>New Hampshire</option>
                    <option value='New Jersey'>New Jersey</option>
                    <option value='New Mexico'>New Mexico</option>
                    <option value='New York'>New York</option>
                    <option value='North Carolina'>North Carolina</option>
                    <option value='North Dakota'>North Dakota</option>
                    <option value='Ohio'>Ohio</option>
                    <option value='Oklahoma'>Oklahoma</option>
                    <option value='Oregon'>Oregon</option>
                    <option value='Pennsylvania'>Pennsylvania</option>
                    <option value='Rhode Island'>Rhode Island</option>
                    <option value='South Carolina'>South Carolina</option>
                    <option value='South Dakota'>South Dakota</option>
                    <option value='Tennessee'>Tennessee</option>
                    <option value='Texas'>Texas</option>
                    <option value='Utah'>Utah</option>
                    <option value='Vermont'>Vermont</option>
                    <option value='Virginia'>Virginia</option>
                    <option value='Washington'>Washington</option>
                    <option value='West Virginia'>West Virginia</option>
                    <option value='Wisconsin'>Wisconsin</option>
                    <option value='Wyoming'>Wyoming</option>
                    <option value='myState' selected>$state</option>
                  </select>
               </td>
						 </tr>
						 <tr>
								 <td align='right'>Zip:</td>
								 <td><input NAME='zip' TYPE='text' SIZE='50' maxlength='5' onKeyPress='return hasToBeNumber(event)' onpaste='return false' value='$zip' required/></td>
						 </tr>
						 <tr>
								 <td align='right'>Phone:</td>
								 <td><input NAME='phone' id='phone' TYPE='text' SIZE='50' onblur='isPhoneNumber()' onpaste='return false' value='$phone' required/></td>
						 </tr>
						 <tr>
								 <td align='right'>Manager Name:</td>
								 <td><input NAME='mgrname' TYPE='text' SIZE='50' onKeyPress='return isTextCityOrPersonKey(event)' value='$mgrname' required/></td>
						 </tr>
             <tr>
                 <td align='right'>Status:</td>
                 <td><input name='status' type='text' size'50' value='$status' readonly/></td>
             </tr>
				 </table>
				  <div id='button'>
						<input id='tiny_button' type='submit' id='submit' name='submit' >
						<input id='tiny_button' type='reset' id='reset' name='reset'>
			</div>

		 </form> ";
	}

  echo "</BODY>";
  echo "</HTML>";


}
?>
