<?php
	include 'header.php';
?>


<?php
	function show_index($v_active ,$v_inactive, $v_total, $stores, $pending, $delivered, $cancelled, $total_o, $c_active, $c_inactive, $c_total)
	{
		echo "

		<div id='callToAction'>
		  <h2>Dashboard</h2>
		</div>
		<br>
		<!-- ===================Index Code Goes Under Here======================= -->

		<div id='vendor_store'>
			<div id='vendor'>
				<div id='vendorTitle'>
					<div class='title'><font color='white'><h3>VENDOR</h3></font></div>
				</div>
				<div id='vendorTable'>
					<table class='dashTables' align='center'>
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


			<div id='store'>
				<div id='storeTitle'>
					<div class='title'><font color='white'><h3>STORE</h3></font></div>
				</div>
				<div id='storeTable'>
					<table class='dashTables' align='center'>
					<tr>
						<td width='175px'><h4>Number of Stores: </h4></td><td id='number_stores'>$stores</td>
					</tr>
					</table>
				</div>
			</div>
		</div>


		<div id='orders_customers'>
			<div id='orders'>
				<div id='orderTitle'>
					<div class='title'><font color='white'><h3>ORDER</h3></font></div>
				</div>
				<div id='orderTable'>
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


			<div id='customers'>
				<div id='customerTitle'>
					<div class='title'> <font color='white'><h3>CUSTOMER</h3></font></div>
				</div>
				<div id='customerTable'>
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
