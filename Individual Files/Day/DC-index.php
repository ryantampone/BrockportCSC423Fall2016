<?php
	include 'header.php';
	include 'update_dashboard.php';
?>


<?php
	function show_index($v_active){

<link href="indexStyles.css" type="text/css" rel="stylesheet" />


<div id="callToAction">
  <h2>Dashboard</h2>
</div>
<br>
<!-- ===================Index Code Goes Under Here======================= -->

<div id="vendor_store">
	<div id="vendor">
		<table>
			<th>VENDOR</th>
			<tr>
				<td>Active: </td><td id="active_vendors"></td>
			</tr>
			<tr>
				<td>Inactive: </td><td id="inactive_vendors"></td>
			</tr>
			<tr>
				<td>Total: </td><td id="total_vendors"></td>
			</tr>
		</table>
	</div>


	<div id="store">
		<table>
			<th>STORE</th>
			<tr>
				<td>Number of Stores: </td><td id="number_stores"></td>
			</tr>
		</table>
	</div>
</div>


<div id="orders_customers">
	<div id="orders">
		<table>
			<th>ORDER</th>
			<tr>
				<td>Pending: </td><td id="pending_orders"></td>
			</tr>
			<tr>
				<td>Delivered: </td><td id="delivered_orders"></td>
			</tr>
			<tr>
				<td>Cancelled: </td><td id="cancelled_orders"></td>
			</tr>
		</table>
	</div>


	<div id="customers">
		<table>
			<th>CUSTOMER</th>
			<tr>
				<td>Active: </td><td id="active_customers"></td>
			</tr>
			<tr>
				<td>Inactive: </td><td id="inactive_customers"></td>
			</tr>
			<tr>
				<td>Total: </td><td id="total_customers"></td>
			</tr>
		</table>
	</div>
</div>

<div id="item_div">
	<div id="items">
		<table>
			<th>ITEM</th>
			<tr>
				<td>To be reordered: </td><td id="items"></td>
			</tr>
		</table>
	</div>
</div>



</body>
</html>

}
?>
