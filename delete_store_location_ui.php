<?php
  include 'header.php';
?>

<?php
  echo"
  <br>
    <h2>Please Enter the Store ID of the Store to Delete</h2>
    <form action='delete_store_location.php' method='post'>
      <table align='center'>
        <tr>
          <td>Retail Store ID:</td>
          <td><input type='text' name='storeid' size='50' onKeyPress='return hasToBeNumber(event)' onpaste='return false' required/></td>
        </tr>
      </table>
        <div class='button'>
<input id='tiny_button' type='submit' id='submit' name='submit' >
<input id='tiny_button' type='reset' id='reset' name='reset'>
</div>

    </form>
  ";
?>
