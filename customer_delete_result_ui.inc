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
	 echo '<center><font color="blue">'.$message.'</font></center><br />';
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
								 <td><span align='right'>Customer ID:</span></td>
								 <td><input NAME='customerid' TYPE='text' SIZE='50' value='$customerid' readonly required/></td>
						 </tr>
						 <tr>
								 <td><span align='right'>Customer Name:</span></td>
								 <td><input NAME='customername' TYPE='text' SIZE='50' value='$customername' readonly required/></td>
						 </tr>
						 <tr>
								 <td><span align='right'>Address:</span></td>
								 <td><input NAME='address' TYPE='text' SIZE='50' value='$address'readonly required/></td>
						 </tr>
						 <tr>
								 <td><span align='right'>City:</span></td>
								 <td><input NAME='city' TYPE='text' SIZE='50' value='$city' readonly required/></td>
						 </tr>
						 <tr>
							 <td><span align='right'>State:</span></td>
							 <td><input NAME='state' TYPE='text' SIZE='50' value='$state' readonly required/></td>
						 </tr>
						 <tr>
								 <td><span align='right'>Zip:</span></td>
								 <td><input NAME='zip' TYPE='text' SIZE='50' value='$zip' readonly required/></td>
						 </tr>
						 <tr>
								 <td><span align='right'>Phone:</span></td>
								 <td><input NAME='phone' TYPE='text' SIZE='50' value='$phone' readonly required/></td>
						 </tr>
						 <tr>
						 		 <td><span align='right'>Email:</span></td>
								 <td><input name='email' type='text' size='50' value='$email' readonly required/></td>
						 </tr>
						 <tr>
								 <td><span align='right'>Status:</span></td>
								 <td><input NAME='status' TYPE='text' SIZE='50' value='$status' readonly required/></td>
						 </tr>
				 </table>
				  <div id='button'>
						<input class='tiny_button' type='submit' id='confirm' name ='comfirm' value='Confirm Delete' />
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
