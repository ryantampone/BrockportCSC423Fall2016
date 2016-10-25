<?php
	include 'header.php';
?>

<?php
	echo"
		<br>
		<div id='callToAction'>
	    <h4 align='center'>Please Fill out the Vendor Form Below</h4>
	  </div>
    	<div id='userdataform'>
            <form action='insert_vendor.php' method='post'>
                <table align='center'>
                    <tr>
                        <td><span align='right'>Vendor Code:</span></td>
                        <td><input NAME='vendorcode' id='vendorcode' TYPE='text' SIZE='50' onKeyPress='return hasToBeNumber(event)' onpaste='return false' required/></td>
                    </tr>
                    <tr>
                        <td><span align='right'>Vendor Name:</span></td>
                        <td><input NAME='vendorname' id='vendorname' TYPE='text' SIZE='50' onKeyPress='return anythingButQuotes(event)' onpaste='return false' required/></td>
                    </tr>
                    <tr>
                        <td><span align='right'>Address:</span></td>
                        <td><input NAME='address' id='address' TYPE='text' SIZE='50' onKeyPress='return validateAddress(event)' onpaste='return false' required/></td>
                    </tr>
                    <tr>
                        <td><span align='right'>City:</span></td>
                        <td><input NAME='city' id='city' TYPE='text' SIZE='50' onKeyPress='return isTextNameKey(event)' onpaste='return false' required/></td>
                    </tr>
										<tr>
											<td><span align='right'>State:</span></td>
											<td>
															<select name='state'>
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
                        <td><input NAME='zip' id='zip'TYPE='text' SIZE='50' onKeyPress='return isZipCode(event)' onpaste='return false' required/></td>
                    </tr>
										<tr>
                        <td><span align='right'>Phone:</span></td>
                        <td><input NAME='phone' id='phone' TYPE='text' SIZE='50' onblur='isPhoneNumber()' onpaste='return false' required/></td>
                    </tr>
										<tr>
                        <td><span align='right'>Contact Person Name:</span></td>
                        <td><input NAME='contactpersonname' id='contactpersonname' TYPE='text' SIZE='50' onKeyPress='return isTextCityOrPersonKey(event)' onpaste='return false' required/></td>
                    </tr>
										<tr>
                        <td><span align='right'>Password:</span></td>
                        <td><input NAME='password' id='password' TYPE='password' SIZE='50' onKeyPress='return isPasswordKey(event)' onpaste='return false' required/></td>
                    </tr>
                </table>
                <p align='center'>
                    <input type='submit' value='Submit'/>
                    <input type='reset' value='Reset'/>
                </p>
            </form>
        </div>
	";
?>
</body>
</html>
