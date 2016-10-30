<?php
  require('db_cn.inc');
  escape_my_sql();

  function escape_my_sql()
  {
    connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);

    $storename = "Adams Apples";
    $esc_storename = mysql_real_escape_string($storename);

    $sql_query = "INSERT INTO RetailStore (StoreCode, StoreName, Address, City, State, ZIP, Phone, ManagerName) values ('0123', '$esc_storename', '1234 Aspen Drive', 'Chicago', 'Illinois', '65512', '865-555-8800', 'Adam Adams');";

    $result = mysql_query($sql_query);
  	echo $result;
  	$message = "";

  	if (!$result)
  		$message = "Error in inserting Store: $storeCode, $storeName: ". mysql_error();
  	else
  		$message = "$storecode, $storename: inserted successfully.";


  }

  function connect_and_select_db($server, $username, $pwd, $dbname)
  {
  	// Connect to db server
  	$conn = mysql_connect($server, $username, $pwd);

  	if (!$conn) {
  	    echo "Unable to connect to DB: " . mysql_error();
      	    exit;
  	}

  	// Select the database
  	$dbh = mysql_select_db($dbname);
  	if (!$dbh){
      		echo "Unable to select ".$dbname.": " . mysql_error();
  		exit;
  	}
  }
?>
