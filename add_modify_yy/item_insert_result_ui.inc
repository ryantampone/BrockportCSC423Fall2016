<?php

function ui_show_item_insert_result($message, $item_id)
  //----------------------------------------------------------
  // Start the html page
  echo "<HTML>";
  echo "<HEAD>";
  echo "</HEAD>";
  echo "<BODY>";

  // If the message is non-null and not an empty string print it
  // message contains the item_id
  if ($message)
  {
    if ($message != "")
       {
	 echo '<center><font color="blue">'.$message.'</font></center><br />';
       }
  }

echo "<form action='index.php'><button >Return to Main Menu</button></form>";

 echo "</BODY>";
 echo "</HTML>";
}
?>
