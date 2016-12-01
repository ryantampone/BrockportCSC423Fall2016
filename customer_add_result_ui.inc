<?php

function ui_show_customer_insert_result($message, $lastname, $firstname,
		$specialization, $highestdegree)
{
  //----------------------------------------------------------
  // Start the html page
  echo "<HTML>";
  echo "<HEAD>";
  echo "</HEAD>";
  echo "<BODY>";

  // If the message is non-null and not an empty string print it
  // message contains the lastname and firstname
  if ($message)
  {
    if ($message != "")
       {
				 echo "<SCRIPT LANGUAGE='JavaScript'>
						window.alert('$message')
						window.location.href='index.php';
						</SCRIPT>";
					#echo '<center><font color="blue">'.$message.'</font></center><br />';
       }
  }

echo "<form action='index.php'><button >Return to Main Menu</button></form>";

 echo "</BODY>";
 echo "</HTML>";
}
?>
