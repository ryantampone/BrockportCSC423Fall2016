<?php
	include 'header.php';
?>
<?php

function show_all_customers($message, $result)
{
  //----------------------------------------------------------
  // Start the html page
  echo "<HTML>";
  echo "<HEAD>";
  echo "</HEAD>";
  echo "<BODY>";

	echo"
		<div id='callToAction'>
			<h2>Are you sure you want to delete this customer?</h2>
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
						window.location.href='delete_customer_ui_form.php';
						</SCRIPT>";
					#echo '<center><font color="blue">'.$message.'</font></center><br />';
       }
  }

   //While there are more rows in the $result, get the next row
   //as an associative array
   while ($row = mysql_fetch_assoc($result))
   {
		 $customerid = $row['CustomerId'];
		 $customername = $row['Name'];
  	 $address = $row['Address'];
 	 	 $city = $row['City'];
 	 	 $state = $row['State'];
	 	 $zip = $row['ZIP'];
	 	 $phone = $row['Phone'];
		 $email = $row['Email'];
	 	 $status = $row['Status'];


		 echo"
		 <form action='update_delete_customer.php' method='post'>
				 <table align='center'>
						 <tr>
								 <td align='right'>Customer ID:</td>
								 <td><input NAME='customerid' TYPE='text' SIZE='50' value='$customerid' readonly required/></td>
						 </tr>
						 <tr>
								 <td align='right'>Customer Name:</td>
								 <td><input NAME='customername' TYPE='text' SIZE='50' value=\"$customername\" readonly required/></td>
						 </tr>
						 <tr>
								 <td align='right'>Address:</td>
								 <td><input NAME='address' TYPE='text' SIZE='50' value=\"$address\" readonly required/></td>
						 </tr>
						 <tr>
								 <td align='right'>City:</td>
								 <td><input NAME='city' TYPE='text' SIZE='50' value=\"$city\" readonly required/></td>
						 </tr>
						 <tr>
							 <td align='right'>State:</td>
							 <td><input NAME='state' TYPE='text' SIZE='50' value='$state' readonly required/></td>
						 </tr>
						 <tr>
								 <td align='right'>Zip:</td>
								 <td><input NAME='zip' TYPE='text' SIZE='50' value='$zip' readonly required/></td>
						 </tr>
						 <tr>
								 <td align='right'>Phone:</td>
								 <td><input NAME='phone' TYPE='text' SIZE='50' value='$phone' readonly required/></td>
						 </tr>
						 <tr>
						 		 <td align='right'>Email:</td>
								 <td><input name='email' type='text' size='50' value=\"$email\" readonly required/></td>
						 </tr>
						 <tr>
								 <td align='right'>Status:</td>
								 <td><input NAME='status' TYPE='text' SIZE='50' value='$status' readonly required/></td>
						 </tr>
				 </table>
				  <div class='button'>
						 <input id='tiny_button' type='submit' value='Confirm Delete'/>
				</div>



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
