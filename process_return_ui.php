<?php
	include 'header.php';
	require('db_cn.inc');

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

<?php
  echo"
		<br>
		</div>
			<div id='userdataform'>
					<h2>Process a Return</h2>
						<form name='myform' action='process_return.php' method='post'>
								<table align='center'>
										<tr>
												<td><span align='right'>Enter Your Store Location Code:</span></td>
												<td><input NAME='storecode' id='storecode' TYPE='text' SIZE='50' onKeyPress='return hasToBeNumberOrLetter(event)' onpaste='return false' required/></td>
										</tr>
                    <tr>
                        <td><span align='right'>Select Vendor to Return Items to:</span></td>
                        <td>
                          <select NAME='vendorname' id='vendorname'><br/>";
													  connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);
                            $sql_vendors = "SELECT VendorName FROM Vendor WHERE Status='Active' ORDER BY VendorName;";
                            $sql_result = mysql_query($sql_vendors);
														if(!$sql_result)
															echo "Failed to retrieve vendors: ".mysql_error();
														else
														{
	                            while($row = mysql_fetch_assoc($sql_result))
	                            {
																$vendorname = $row['VendorName'];
	                              echo "<option>$vendorname</option>";
	                            }
														}
                          echo"<br/></select>
                        </td>
                    </tr>
								</table>
								<div class='button'>
									<input id='tiny_button' type='submit' id='submit' name='submit' >
									<input id='tiny_button' type='reset' id='reset' name='reset'>
								</div>
						</form>
				</div>
	";
?>
