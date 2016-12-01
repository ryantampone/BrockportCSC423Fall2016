<?php
	include 'header.php';
?>
<?php

function show_all_items($message, $result)
{
  //----------------------------------------------------------
  // Start the html page
  echo "<HTML>";
  echo "<HEAD>";
  echo "</HEAD>";
  echo "<BODY>";

	echo"
		<div id='callToAction'>
			<h2>Are you sure you want to delete this item?</h2>
		</div>
		";

  // If the message is non-null and not an empty string print it
  // message contains the lastname and firstname
  if ($message)
  {
    if ($message != "")
       {
				 echo "<SCRIPT LANGUAGE='JavaScript'>
					 window.alert('$message')
					 window.location.href='delete_item_ui_form.php';
					 </SCRIPT>";
					#echo '<center><font color="blue">'.$message.'</font></center><br />';
       }
  }



   //While there are more rows in the $result, get the next row
   //as an associative array
   while ($row = mysql_fetch_assoc($result))
   {
		 $itemId = $row['ItemId'];
		 $description = $row['Description'];
	 	 $size = $row['Size'];
  	 $division = $row['Division'];
 	 	 $department = $row['Department'];
 	 	 $category = $row['Category'];
	 	 $itemCost = $row['ItemCost'];
	 	 $itemRetail = $row['ItemRetail'];
	 	 $contactpersonname = $row['ContactPersonName'];

		 $vendorID = $row['VendorId'];
		 $imageFileName = $row['ImageFileName'];


      //Put these in a table row. The htmlentities function converts any
      //special chars in the string to a html-displayable form.



		 echo"
		 <form action='update_delete_item.php' method='post'>
				 <table align='center'>
                    <tr>
                        <td><span align='right'>Item ID:</span></td>
                        <td><input id='ItemId' name='ItemId' value=\"$itemId\" TYPE='text' SIZE='50' readonly disabled required/></td>
                    </tr>
               	    <tr>
                        <td><span align='right'>Description:</span></td>
                        <td><input id='Description' name='Description' value=\"$description\" type='text' readonly disabled required/></td>
                    </tr>
                    <tr>
                        <td><span align='right'>Size:</span></td>
                        <td><input id='Size' name='Size' value=\"$size\" TYPE='text' SIZE='50'readonly disabled required/></td>
                    </tr>
                    <tr>
                        <td><span align='right'>Division:</span></td>
			<td><input id='Division' name='Division' value='$division' TYPE='text' SIZE='50' readonly disabled required/></td>



                    </tr>


		    <tr>
                        <td><span align='right'>Department:</span></td>
			<td><input id='Department' name='Department' value='$department' TYPE='text' SIZE='50' readonly disabled   required/></td>



                    </tr>


		    <tr>
                        <td><span align='right'>Category:</span></td>
                  	<td><input id='Category' name='Category' value='$category' TYPE='text' SIZE='50' readonly disabled  required/></td>

                    </tr>

		<tr>
			<td><span align='right'>Item Cost</span></td>
			 <td><input id='ItemCost' name='ItemCost' value='$itemCost' TYPE='text' SIZE='50' readonly disabled  required/></td>
		</tr>

		<tr>
			<td><span align='right'>Item Retail</span></td>
			 <td><input id='ItemRetail' name='ItemRetail' value='$itemRetail' TYPE='text' SIZE='50'  readonly disabled required/></td>
		</tr>

		<tr>
			<td><span align='right'>Vendor Id</span></td>
			<td><input id='VendorId' name='VendorId' value='$vendorID' TYPE='text' SIZE='50' readonly disabled  required/></td>
		</tr>

		<tr>
			<td><span align='right'>Image FileName</span></td>
			<td><input id='ImageFileName' name='ImageFileName' value=\"$imageFileName\" TYPE='text' SIZE='50'  readonly disabled required/></td>
		</tr>
                </table>
			 <div class='button'>
			<input id='tiny_button' type='submit' name = 'comfirm' value='Confirm Delete' />
			</div>

		 </form> ";
	}





  echo "</BODY>";
  echo "</HTML>";


}

?>
