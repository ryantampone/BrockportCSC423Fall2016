<?php

function show_delivery_result($messageOrder, $messageInsert, $messageUpdateQTY, $storeID)
{
  //----------------------------------------------------------
  // Start the html page
  echo "<HTML>";
  echo "<HEAD>";
  echo "</HEAD>";
  echo "<BODY>";


  //email stuffs
  $messageStore = 'Delivered to store location: '.$storeID." ";
  $newline = "\n";

  $messageEmail = $messageStore.$newline.'Status: '.$messageOrder.$newline.$messageInsert;
  $messageTextMessage = $messageStore.$messageOrder.' '. $messageInsert;
  mail('rtamp1@brockport.edu','New Delivery',$messageEmail,'Nannos Foods Management System: New Delivery');
  mail('8457982351@vtext.com','New Delivery',$messageTextMessage);


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
