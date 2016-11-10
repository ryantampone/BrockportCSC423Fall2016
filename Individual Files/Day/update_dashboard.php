<!--
  php for updating information on the dashboard
-->
<?php

  require('db_cn.inc');

  update_dash();

  function update_dash()
  {
    connect_and_select_db(DB_SERVER, DB_UN,DB_PWD,DB_NAME);
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
