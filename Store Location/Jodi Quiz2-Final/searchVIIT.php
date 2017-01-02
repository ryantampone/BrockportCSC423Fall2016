
<?php
	require('dblogin.inc');

	function connect_and_select_db($server, $username, $pwd, $dbname)
{
	// Connect to db server
	$connect = mysql_connect($server, $username, $pwd);
	if (!$connect) {
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


<!DOCTYPE html>
<!--   Jodi L. Hess  CSC423 Quiz 1 Q2  -->

<html>
<head>
<title>McArdle's Inventory Management Sytsem</title>
 <script type="text/javascript" src="verify.js"></script>

<style>

  h2  {text-align: center;}

  h3  {text-align: center;}

body {
    background-color: lightblue;
}

  </style>
</head>
<body>

<img src="McArdleLogo.PNG" alt="McArdlelogo.PNG" width="120" height="90" align="left">

      <h2>  SELECT FOR VENDOR PRICING INFORMATION </h2>

<img src="McArdleLogo.PNG" alt="McArdlelogo.PNG" width="120" height="90" align="right">



  <br>   <br>
  <h3>  <font color="B22222">  Select a vendor name and item type name </font> </h3>


  <!------------------------------------------------------------------>

<form name="myForm" onsubmit="return validateForm()" method="post">

<table>

  <col width="45%">
  <col width="55%">

  <tr>

    <td height="35 px"> Vendor Name: </td>
        <td> <input type="text" name="Vendor" id="Vendor"  size="30"> </td>


  </tr>


  <tr>
    <td height="35 px"> Item Type Name: </td>
         <td> <input type="text" name="Item" id="Item" size="30"> </td>


  </tr>

           <td> </td>

<td style="height:40px">  <input align="center" type="submit" value="Submit">

    <input type="reset" value="Reset">   </td>


 </table>

  </form>

</body>
</html>
