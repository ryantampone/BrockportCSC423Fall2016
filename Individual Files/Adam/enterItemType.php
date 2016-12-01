<html>
	<title>Inventory System</title>
	<head>
		<script type="text/javascript" src="item.js"></script>
	</head>
	<body style="background-color: #74b8db;">
		<form name="inventory" action="item_confirm.php" method="post"/>
			<h3 align="center"><font color="#91152c">ADD AN INVENTORY ITEM TYPE</h3>
			<table align="center">
				<tr>
					<td style="padding: 10px;" align="right">Item Type Name:</td>
					<td style="padding: 10px;"><input type="text" name="ItemTypeName" id="ItemTypeName"
						onblur="validateItem()"/></td>
					<td style="padding: 10px;"align="right">Barcode Prefix:</td>
					<td style="padding: 10px;"><input type="text" name="BarcodePrefix" id="BarcodePrefix" /></td>
				</tr>
				<tr>
					<td style="padding: 10px;" align="right">Units:</td>
					<td style="padding: 10px;"><input type="text" name="Units" id="Units"
						onblur="validateUnits()"/></td>
					<td style="padding: 10px;" align="right">Units Measure:</td>
					<td style="padding: 10px;"><input type="text" name="Measure" id="Measure" /></td>
				</tr>
				<tr>
					<td style="padding: 10px;" align="right">Reorder Point:</td>
					<td style="padding: 10px;"><input type="text" name="ReorderPoint" id="ReorderPoint" /></td>
				</tr>
				<tr>
					<td style="padding: 10px;" align="right">Age Sensitive:</td>
					<td style="padding: 10px;"><input type="radio" name="AgeSensitive" id="AgeSensitiveYes"
						name="AgeSensitive" value="Yes">Yes
						<input type="radio" id="AgeSensitiveNo" name="AgeSensitive"
						value="No" checked="checked">No
					</td>
				</tr>
				<tr>
					<td style="padding: 10px;" align="right">Validity Days:</td>
					<td style="padding: 10px;"><input type="text" name="ValidityDays" id="ValidityDays" /></td>
				</tr>
				<tr>
					<td style="padding: 10px;" align="right">Notes:</td>
					<td style="padding: 10px;"><textarea name='Notes' id="Notes" rows="5"
						cols="22"></textarea></td>
				</tr>
			</table>
			<table align="center">
				<tr>
					<td style="padding: 10px;"><input type="submit" id="SubmitButton" /></td>
					<td style="padding: 10px;"><input type="reset" id="ResetButton" /></td>
				</tr>
			</table>
		</form>
	</body>
</html>
