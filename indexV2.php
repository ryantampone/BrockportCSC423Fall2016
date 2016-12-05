<?php
	include 'header.php';
	echo"<link href='css/indexstyles.css' type='text/css' rel='stylesheet' />";
?>


<?php
	function show_index($v_active ,$v_inactive, $v_total, $stores, $monthlySales, $weeklySales, $pending, $delivered, $cancelled, $total_o, $c_active, $c_inactive, $c_total)
	{
		echo "
<br>
		<div id='callToAction'>
		  <h2>Dashboard</h2>
			<center><h4>Select Your Store to View Your Customized Dashbaord</h4><center>
			<div id='dropdown'>
				<form action='update_dashboard2.php' method='post'>
				<table align='center'>
					<tr>
						<td><select id='StoreName' name='StoreName'><option value='Select Store'>Select Store</option>";
								$sql_storeNames="SELECT StoreName FROM RetailStore WHERE Status ='Active';";
								$storeName_result = mysql_query($sql_storeNames);
								if(!$storeName_result)
								{
									echo "Store names retrieved unsuccessfully: ".mysql_error();
									exit;
								}
								while($row = mysql_fetch_assoc($storeName_result))
								{
									$storeName = $row['StoreName'];
									echo "<option value='".$storeName."'>".$storeName."</option>";
								}
								echo "</select></td>
								<td><input type='submit' value='Go' ></input>
					</tr>
					</table>
			</form>
			</div>
		</div>
		<br>
		<!-- ===================Index Code Goes Under Here======================= -->

<div id='createSpace'>
		<div id='vendor_store'>
			<div id='vendor'>
				<div id='vendorTitle'>
					<div class='title'><font color='white'><h3>VENDOR</h3></font></div>
				</div>
				<div class='outerTable'>
					<div class='innerTable'>
						<table class='dashTables' align='center' align='center'>
						<tr>
							<td height='30px' width='100px'><h4>Active: </h4></td><td id='active_vendors'>$v_active</td>
						</tr>
						<tr>
							<td height='30px' ><h4>Inactive: </h4></td><td id='inactive_vendors'>$v_inactive</td>
						</tr>
						<tr>
							<td height='30px'><h4>Total: </h4></td><td id='total_vendors'>$v_total</td>
						</tr>
						</table>
					</div>
				</div>
			</div>


			<div id='store'>
				<div id='storeTitle'>
					<div class='title'><font color='white'><h3>STORE</h3></font></div>
				</div>
				<div class='outerTable'>
					<div class='innerTable'>
						<table class='dashTables' align='center'>
						<tr>
							<td width='175px' height='30px'><h4>Number of Stores: </h4></td><td id='number_stores'>$stores</td>
						</tr>
						<tr>
							<td height='30px'><h4>Monthly Sales: </h4></td><td id='monthly_sales'>$monthlySales</td>
						</tr>
						<tr>
							<td height='30px'><h4>Weekly Sales: </h4></td><td id='weekly_sales'>$weeklySales</td>
						</tr>
						</table>
					</div>
				</div>
			</div>
		</div>

</div>

		<div id='orders_customers'>
			<div id='orders'>
				<div id='orderTitle'>
					<div class='title'><font color='white'><h3>ORDER</h3></font></div>
				</div>
				<div class='outerTable'>
					<div class='innerTable'>
						<table class='dashTables' align='center'>
						<tr>
							<td height='30px' width='120px'><h4>Pending: </h4></td><td id='pending_orders'>$pending</td>
						</tr>
						<tr>
							<td height='30px'><h4>Delivered: </h4></td><td id='delivered_orders'>$delivered</td>
						</tr>
						<tr>
							<td height='30px'><h4>Cancelled: </h4></td><td id='cancelled_orders'>$cancelled</td>
						</tr>
						<tr>
							<td height='30px'><h4>Total: </h4></td><td id='total_orders'>$total_o</td>
						</tr>
						</table>
					</div>
				</div>
			</div>


			<div id='customers'>
				<div id='customerTitle'>
					<div class='title'> <font color='white'><h3>CUSTOMER</h3></font></div>
				</div>
				<div class='outerTable'>
					<div class='innerTable'>
						<table class='dashTables' align='center'>
						<tr>
							<td height='30px' width='100px'><h4>Active: </h4></td><td id='active_customers'>$c_active</td>
						</tr>
						<tr>
							<td height='30px'><h4>Inactive: </h4></td><td id='inactive_customers'>$c_inactive</td>
						</tr>
						<tr>
							<td height='30px'><h4>Total: </h4></td><td id='total_customers'>$c_total</td>
						</tr>
						</table>
					</div>
				</div>
			</div>
		</div>

<!--		<div id='item_div'>
			<div id='items'>
				<table>
					<th>ITEM</th>
					<tr>
						<td>To be reordered: </td><td id='item'></td>
					</tr>
				</table>
			</div>
		</div> -->
		</body>
		</html>";

}
?>
