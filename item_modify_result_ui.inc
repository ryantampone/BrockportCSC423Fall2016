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
		 <form action='update_item.php' method='post'>
				 <table align='center'>
                    <tr>
                        <td><span align='right'>Item ID:</span></td>
                        <td><input id='ItemId' name='ItemId' value='$itemId'TYPE='text' SIZE='50' required/></td>
                    </tr>
               	    <tr>
                        <td><span align='right'>Description:</span></td>
                        <td><input id='Description' name='Description' value='$description' type='textarea' required/></td>
                    </tr>
                    <tr>
                        <td><span align='right'>Size:</span></td>
                        <td><input id='Size' name='Size' value='$size' TYPE='text' SIZE='50' required/></td>
                    </tr>
                    <tr>
                        <td><span align='right'>Division:</span></td>
			<td><input id='Division' name='Division' value='$division' TYPE='text' SIZE='50' required/></td>
			
						
                       
                    </tr>
		    
		    
		    <tr>
                        <td><span align='right'>Department:</span></td>
			<td><input id='Department' name='Department' value='$department' TYPE='text' SIZE='50' required/></td>
			
						
                       
                    </tr>
		    
					
		    <tr>
                        <td><span align='right'>Category:</span></td>
                  	<td><input id='Category' name='Category' value='$category' TYPE='text' SIZE='50' required/></td>
	
                    </tr>
					
		<tr>
			<td><span align='right'>Item Cost</span></td>
			 <td><input id='ItemCost' name='ItemCost' value='$itemCost' TYPE='text' SIZE='50' required/></td>			
		</tr>
									
		<tr>
			<td><span align='right'>Item Retail</span></td>
			 <td><input id='ItemRetail' name='ItemRetail' value='$itemRetail' TYPE='text' SIZE='50' required/></td>			
		</tr>
									
		<tr>
			<td><span align='right'>Vendor Id</span></td>
			<td><input id='VendorId' name='VendorId' value='$vendorID' TYPE='text' SIZE='50' required/></td>			
		</tr>
					
		<tr>
			<td><span align='right'>Image FileName</span></td>
			<td><input id='ImageFileName' name='ImageFileName' value='$imageFileName' TYPE='text' SIZE='50' required/></td>			
		</tr>							
                </table>
				  <div id='button'>
<input id='tiny_button' type='submit' id='submit' name='submit' >
<input id='tiny_button' type='reset' id='reset' name='reset'>
</div>            

		 </form> ";
	}




		/*
		//finish up the html code, and put the return button to go back to main menu
		  echo <<<UPTOEND
		  <BR/><BR/>
		  <center>
		  <input type="button" value="Return to Main Menu"
			onClick="window.location='index.php'"/>
		  </center>
		UPTOEND; */

  echo "</BODY>";
  echo "</HTML>";


}

?>
