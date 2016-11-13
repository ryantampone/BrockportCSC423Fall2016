<?php
	include 'header.php';
?>


<?php
	function show_index($v_active,$v_inactive, $v_total,$stores, $pending, $delivered, $cancelled, $c_active, $c_inactive, $c_total)
	{
		echo "

		<div id='callToAction'>
		  <h2>Dashboard</h2>
		</div>
		<br>
		<!-- ===================Index Code Goes Under Here======================= -->

		<div id='vendor_store'>
			<div id='vendor'>
				<table>
					<th>VENDOR</th>
					<tr>
						<td>Active: </td><td id='active_vendors'>$v_active</td>
					</tr>
					<tr>
						<td>Inactive: </td><td id='inactive_vendors'>$v_inactive</td>
					</tr>
					<tr>
						<td>Total: </td><td id='total_vendors'>$v_total</td>
					</tr>
				</table>
			</div>


			<div id='store'>
				<table>
					<th>STORE</th>
					<tr>
						<td>Number of Stores: </td><td id='number_stores'>$stores</td>
					</tr>
				</table>
			</div>
		</div>


		<div id='orders_customers'>
			<div id='orders'>
				<table>
					<th>ORDER</th>
					<tr>
						<td>Pending: </td><td id='pending_orders'>$pending</td>
					</tr>
					<tr>
						<td>Delivered: </td><td id='delivered_orders'>$delivered</td>
					</tr>
					<tr>
						<td>Cancelled: </td><td id='cancelled_orders'>$cancelled</td>
					</tr>
				</table>
			</div>


			<div id='customers'>
				<table>
					<th>CUSTOMER</th>
					<tr>
						<td>Active: </td><td id='active_customers'>$c_active</td>
					</tr>
					<tr>
						<td>Inactive: </td><td id='inactive_customers'>$c_inactive</td>
					</tr>
					<tr>
						<td>Total: </td><td id='total_customers'>$c_inactive</td>
					</tr>
				</table>
			</div>
		</div>

		<div id='item_div'>
			<div id='items'>
				<table>
					<th>ITEM</th>
					<tr>
						<td>To be reordered: </td><td id='item'></td>
					</tr>
				</table>
			</div>
		</div>



		</body>
		</html>";

}
?>
