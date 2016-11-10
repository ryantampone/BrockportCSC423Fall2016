<!--
  php for updating information on the dashboard
-->
<?php

  require('db_cn.inc');
  // require('update_dashboard_insert_result_ui.inc');

  update_dash();

  function update_dash()
  {
    connect_and_select_db(DB_SERVER, DB_UN,DB_PWD,DB_NAME);
    $activeVendors = mysql_query("select count(*) from Vendor where Status = "Active";");
    //$inactiveVendors = mysql_query("select count(*) from Vendor where Status = "Inctive";");
    //$totalVendors = mysql_query("select count(*) from Vendor");

    $resultAV = mysql_query($activeVendors);
    if (!$resultAV){
      echo "N/A"; //be sure to change
      exit;
    }
    while($row = mysql_fetch_assoc($resultAV)){
      $vendorsActive = $row['count(*)'];
    }
    mysql_free_result($resultAV);

    show_index($vendorsActive);

  }


  function connect_and_select_db($server, $username, $pwd, $dbname)
  {
    $conn = mysql_connect($server, $username, $pwd);

    if (!$conn)
    {
      echo "Unable to connect to DB:".mysql_error();
      exit;
    }

    $dbh = mysql_select_db($dbname);
    if(!$dbh)
    {
      echo "Unable to select".$dbname.":".mysql_error();
      exit;
    }
  }
 ?>
