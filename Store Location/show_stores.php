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
			<h4 align='center'>Please Modify the Desired Information Below</h4>
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

      //Put these in a table row. The htmlentities function converts any
      //special chars in the string to a html-displayable form.

		 echo"
		 <form action='update_store.php' method='post'>
				 <table align='center'>
						 <tr>
								 <td><span align='right'>Store ID:</span></td>
								 <td><input NAME='storeid' TYPE='text' SIZE='50' value='$storeid' readonly required/></td>
						 </tr>
						 <tr>
								 <td><span align='right'>Store Code:</span></td>
								 <td><input NAME='storecode' TYPE='text' SIZE='50' value='$storecode'required/></td>
						 </tr>
						 <tr>
								 <td><span align='right'>Store Name:</span></td>
								 <td><input NAME='storename' TYPE='text' SIZE='50' value='$storename' required/></td>
						 </tr>
						 <tr>
								 <td><span align='right'>Address:</span></td>
								 <td><input NAME='address' TYPE='text' SIZE='50' value='$address'required/></td>
						 </tr>
						 <tr>
								 <td><span align='right'>City:</span></td>
								 <td><input NAME='city' TYPE='text' SIZE='50' value='$city' required/></td>
						 </tr>
						 <tr>
							 <td><span align='right'>State:</span></td>
							 <td><input NAME='state' TYPE='text' SIZE='50' value='$state' required/></td>
						 </tr>
						 <tr>
								 <td><span align='right'>Zip:</span></td>
								 <td><input NAME='zip' TYPE='text' SIZE='50' value='$zip' required/></td>
						 </tr>
						 <tr>
								 <td><span align='right'>Phone:</span></td>
								 <td><input NAME='phone' TYPE='text' SIZE='50' value='$phone' required/></td>
						 </tr>
						 <tr>
								 <td><span align='right'>Manager Name:</span></td>
								 <td><input NAME='mgrname' TYPE='text' SIZE='50' value='$mgrname' required/></td>
						 </tr>
				 </table>
				 <p align='center'>
						 <input type='submit' value='Submit'/>
						 <input type='reset' value='Reset'/>
				 </p>
		 </form> ";
	}

  echo "</BODY>";
  echo "</HTML>";


}
?>
