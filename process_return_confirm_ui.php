<?php
	include 'header.php';

show_confirm();

function show_confirm()
{
  $vendorname = $_POST['vendorname'];
  $storecode = $_POST['storecode'];
  $vendorid = $_POST['vendorid'];
  $storeid = $_POST['storeid'];

  $count = 1;
  $numitems = $_POST['numitems'];
  $items_with_values = 0;
  while($count <= $numitems)
  {
    $desc = $_POST['desc'.$count];
    $returnqty = $_POST['return'.$count];
    if($returnqty != "")
    {
      $items_with_values++;
    }
    $count++;
  }

  if($items_with_values == 0)
  {
    echo"
      <p align='center'>No items were selected to be returned.</p>
      <form action='index.php'>
        <center><input id='tiny_button' type='submit' id='submit' value='Return to Main Menu'/></center>
      </form>
    ";
  }
  else
  {
    echo "
			<center>
      	<h2>Confirm your Return</h2>
      	<h4>To Vendor: ".$vendorname."</h4>
				<h4>From Store: ".$storecode."</h4>
			</center>
    ";

    // If the message is non-null and not an empty string print it
    // message contains the lastname and firstname

    echo"
      <form action='process_return_confirm.php' method='post'>
    	 	<table align='center'>
    			<tr>
    				<td style=\"padding-right: 30px;\" align='center'>Item Description</td>
            <td style=\"padding-right: 30px;\" align='center'>Return<br/>Quantity</td>
    			</tr>
        ";
        $count = 1;
        while($count <= $numitems)
        {
          $desc = $_POST['desc'.$count];
          $returnqty = $_POST['return'.$count];
          if($returnqty != "")
          {
            echo"
              <tr>
                <td><p style=\"padding-right: 30px;\">$desc</p></td>
                <td><input type='text' size='5' name='return$count' value='$returnqty' style=\"background-color: #d6dbdf;\" readonly/>
                <input type='hidden' name='desc$count' value='$desc' />
            ";
          }
          $count++;
        }
          echo"
            </tr>
    			</table>
    			<div class='button'>
    				<input id='tiny_button' type='submit' id='submit' name='submit' />
    			</div>
    			<input type='hidden' name='numitems' value='$items_with_values' />
          <input type='hidden' name='vendorid' value='$vendorid' />
          <input type='hidden' name='storeid' value='$storeid' />
  		  </form>
  	  ";
    }


  echo "</BODY>";
  echo "</HTML>";


}

?>
