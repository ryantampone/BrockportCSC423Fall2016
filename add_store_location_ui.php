<?php
  include 'header.php';
?>

<?php
  echo"
    <h2>Please fill out the Store form below.</h2>
    <form name='add_store_loc' action='add_store_location.php' method='post'>
      <table align='center'>
        <tr>
          <td align='right'>Store Code:</td>
          <td><input type='text' name='storecode' id='storecode' size='50' onKeyPress='return hasToBeNumberOrLetter(event)' onpaste='return false' required/></td>
        </tr>
        <tr>
          <td align='right'>Store Name:</td>
          <td><input type='text' name='storename' id='storename' size='50' onKeyPress='return isAddressKey(event)' onpaste='return false' required/></td>
        </tr>
          <td align='right'>Address:</td>
          <td><input type='text' name='address' size='50' onKeyPress='return isAddressKey(event)' onpaste='return false' required/></td>
        </tr>
        <tr>
          <td align='right'>City:</td>
          <td><input type='text' name='city' size='50' onKeyPress='return isTextCityOrPersonKey(event)' onpaste='return false' required/></td>
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
                <option value='New York' selected>New York</option>
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
          <td align='right'>Zip Code:</td>
          <td><input type='text' name='zip' size='10' maxlength='5' onKeyPress='return hasToBeNumber(event)' onpaste='return false' required/></td>
        </tr>
        <tr>
          <td align='right'>Phone Number:</td>
          <td><input type='text' name='phone' id='phone' size='50' onblur='isPhoneNumber()' onpaste='return false' required/></td>
        </tr>
        <tr>
          <td align='right'>Manager Name:</td>
          <td><input type='text' name='mgrname' size='50' onKeyPress='return isTextCityOrPersonKey(event)' onpaste='return false' required/></td>
        </tr>
      </table>
      <div class='button'>
<input id='tiny_button' type='submit' id='submit' name='submit' >
<input id='tiny_button' type='reset' id='reset' name='reset'>
</div>

    </form>
  ";
?>
