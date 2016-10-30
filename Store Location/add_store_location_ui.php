<?php
  include 'header.php';
?>

<?php
  echo"
    <center><h4>Please fill out the Store form below.</h4><center>
    <form name='add_store_loc' action='add_store_location.php' method='post'>
      <table align='center'>
        <tr>
          <td align='right'>Store Code:</td>
          <td><input type='text' name='storecode' size='50' required/></td>
        </tr>
        <tr>
          <td align='right'>Store Name:</td>
          <td><input type='text' name='storename' size='50' required/></td>
        </tr>
          <td align='right'>Address:</td>
          <td><input type='text' name='address' size='50' required/></td>
        </tr>
        <tr>
          <td align='right'>City:</td>
          <td><input type='text' name='city' size='50' required/></td>
        </tr>
        <tr>
          <td align='right'>State:</td>
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
              <option value='NY' selected='selected'>NY</option>
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
          <td align='right'>Zip Code:</td>
          <td><input type='text' name='zip' size='10' required/></td>
        </tr>
        <tr>
          <td align='right'>Phone Number:</td>
          <td><input type='text' name='phone' size='50' required/></td>
        </tr>
        <tr>
          <td align='right'>Manager Name:</td>
          <td><input type='text' name='mgrname' size='50' required/></td>
        </tr>
      </table>
      <p align='center'>
        <input type='submit' value='Submit' />
        <input type='reset' value='Reset' />
      </p>
    </form>
  ";
?>

