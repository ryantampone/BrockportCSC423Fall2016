<?php

function ui_show_item_insert_result($message, $itemname, $result)

  {
  //----------------------------------------------------------
  // Start the html page
  echo "<HTML>";
    echo "<BODY>";

  // If the message is non-null and not an empty string print it

  if ($message)
  {
    if ($message != "")
       {
         echo "<SCRIPT LANGUAGE='JavaScript'>
						window.alert(\"$message\")
						window.location.href='enterItemType.php';
						</SCRIPT>";
           #echo '<center><font color="blue">'.$message.'</font></center><br />';
       }
  }

echo "<form action='enterItemType.php'>
<div class='button'>
<button id='tiny_button'>Return to Main Menu</button>

</div>



</form>";

 echo "</BODY>";
 echo "</HTML>";
}

?>
