<?php
  include 'header.php';
  //day coles
?>

<?php
  echo"
  <br>
    <h2>Please fill out the Store form below.</h2>
    <form name='create_order' action='CreateOrder.php' method='post'>
      <table align='center'>
        <tr>
          <td align='right'>Order ID:</td>
          <td><input type='text' name='OrderId' id='OrderId' size='50' required</td>
        </tr>
        <tr>
          <td align='right'>Vendor ID:</td>
          <td><input type='text' name='vendorId' id='vendorId' size='50' onKeyPress='return hasToBeNumberOrLetter(event)' onpaste='return false' required/></td>
        </tr>
        <tr>
          <td align='right'>Store ID:</td>
          //this should be selected as part of a drop down with store names
          <td>
            <select name='StoreId' id='StoreId' required/>
              <option></option>
          </td>
        </tr>
          <td align='right'>Date Of Order:</td>
          <td><input type='text' name='DateTimeOfOrder' id='DateTimeofOrder' size='50' onKeyPress='return isAddressKey(event)' onpaste='return false' required/></td>
        </tr>
        <tr>
          <td align='right'>Status:</td>
          <td><input type='text' name='Status' id='Status' size='50' onKeyPress='return isTextCityOrPersonKey(event)' onpaste='return false' required/></td>
        </tr>
        <tr>
          <td align='right'>Date Of Fulfilment:</td>
          <td><input type='text' name='DateTimeOfFulfilment' id='DateTimeOfFulfilment' size='10' maxlength='5' onKeyPress='return hasToBeNumber(event)' onpaste='return false' required/></td>
        </tr>
      </table>
      <div class='button'>
<input id='tiny_button' type='submit' id='submit' name='submit' >
<input id='tiny_button' type='reset' id='reset' name='reset'>
</div>

    </form>
  ";
?>
