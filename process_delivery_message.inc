<?php

function show_delivery_result($messageOrder, $messageInsert, $messageUpdateQTY)
{
  //----------------------------------------------------------
  // Start the html page
  echo "<HTML>";
  echo "<HEAD>";
  echo "</HEAD>";
  echo "<BODY>";

  $message = $messageOrder.$messageInsert;
  echo "<SCRIPT LANGUAGE='JavaScript'>
     window.alert('$message')
     window.location.href='index.php';
     </SCRIPT>";
  /*
  if ($messageOrder)
  {
    if ($messageOrder != "")
       {
	 echo '<center><font color="blue">'.$messageOrder.'</font></center><br />';
       }
  }


  if ($messageInsert)
  {
    if ($messageInsert != "")
       {
	 echo '<center><font color="blue">'.$messageInsert.'</font></center><br />';
       }
  }
*/
/*
  if ($messageUpdateQTY)
  {
    if ($messageUpdateQTY != "")
       {
   echo '<center><font color="blue">'.$messageUpdateQTY.'</font></center><br />';
       }
  }

  */



echo "<center><form action='index.php'><button >Return to Main Menu</button></form></center>";

 echo "</BODY>";
 echo "</HTML>";
}
?>
