<?php 

function ui_show_item_insert_result($message, $itemname, $result)
	
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
	 echo '<center><font color="blue">'.$message.'</font></center><br />';
       }
  }

echo "<form action='index.php'>
<div id='button'>
<button id='tiny_button'>Return to Main Menu</button>

</div>            



</form>";

 echo "</BODY>";
 echo "</HTML>";
}

?>
