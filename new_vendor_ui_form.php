<?php
	include 'header.php';
?>

<?php
	echo"
		<br>
		<div id='callToAction'>
	    <h2>Please Fill out the Vendor Form Below</h2>
	  </div>
    	<div id='userdataform'>
            <form action='insert_vendor.php' method='post'>
                <table align='center'>
                    <tr>
                        <td align='right'>Vendor Code:</td>
                        <td><input NAME='vendorcode' id='vendorcode' TYPE='text' SIZE='50' onKeyPress='return hasToBeNumber(event)' onpaste='return false' required/></td>
                    </tr>
                    <tr>
                        <td align='right'>Vendor Name:</td>
                        <td><input NAME='vendorname' id='vendorname' TYPE='text' SIZE='50' onKeyPress='return anythingButQuotesOrSlash(event)' onpaste='return false' required/></td>
                    </tr>
                    <tr>
                        <td align='right'>Address:</td>
                        <td><input NAME='address' id='address' TYPE='text' SIZE='50' onKeyPress='return isAddressKey(event)' onpaste='return false' required/></td>
                    </tr>
                    <tr>
                        <td align='right'>City:</td>
                        <td><input NAME='city' id='city' TYPE='text' SIZE='50' onKeyPress='return isTextCityOrPersonKey(event)' onpaste='return false' required/></td>
                    </tr>
										<tr>
											<td align='right'>State:</td>
											<td>
														<select name='state'>
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
																<option value='New York' selected='selected'>New York</option>
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
													</select>
											</td>
										</tr>
										<tr>
                        <td align='right'>Zip:</td>
                        <td><input NAME='zip' id='zip'TYPE='text' SIZE='50' maxlength='5' onKeyPress='return hasToBeNumber(event)' onpaste='return false' required/></td>
                    </tr>
										<tr>
                        <td align='right'>Phone:</td>
                        <td><input NAME='phone' id='phone' TYPE='text' SIZE='50' onblur='isPhoneNumber()' onpaste='return false' required/></td>
                    </tr>
										<tr>
                        <td align='right'>Contact Person Name:</td>
                        <td><input NAME='contactpersonname' id='contactpersonname' TYPE='text' SIZE='50' onKeyPress='return isTextCityOrPersonKey(event)' onpaste='return false' required/></td>
                    </tr>
										<tr>
                        <td align='right'>Password:</td>
                        <td><input NAME='password' id='password' TYPE='password' SIZE='50' onKeyPress='return isPasswordKey(event)' onpaste='return false' required/></td>
                    </tr>
                </table>
         	<div id='button'>
						<input id='tiny_button' type='submit' id='submit' name='submit' >
						<input id='tiny_button' type='reset' id='reset' name='reset'>
					</div>

            </form>
        </div>
	";
?>
</body>
</html>
