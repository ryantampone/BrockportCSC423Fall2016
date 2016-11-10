<?php
	session_start();
	$VENDORCODE = (string)$_SESSION['VendorCode'];
?>
<?php
	include 'headerVendor.php';
?>

<?php

if (isset($_SESSION['VendorCode']))
{
	echo"
	 <div id='callToAction'><br>
		 <h2>Select Which Type of Order you Would Like to View</h2>
	 </div>
	 ";

	 echo"
	 <div id='userdataform'>
	 	<table align='center'>
			<th>
					<form action='vendor_order.php' method='post'>
						<select name='orderStatus'>
							<option value='Pending'>Pending</option>
							<option value='Delivered'>Delivered</option>
							<option value='Canceled'>Canceled</option>
						</select>
			</th>
			<tr>
				<td>
						<div class='button'>
							<input id='tiny_button' type='submit' id='submit' name='Search For Orders' >
						</div>
					</form>
				</td>
			</tr>
		</table>

		";

  echo "</BODY>";
  echo "</HTML>";
}
else
{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
	window.alert('Please Login to View This Page')
	window.location.href='http://www.itss.brockport.edu/~rtamp1/csc423/gp/indexVendor.php';
	</SCRIPT>");
	//echo "<script type='text/javascript'>alert('Please login to view this page') window.location.href='./indexVendor.php'</script>";
}


?>
