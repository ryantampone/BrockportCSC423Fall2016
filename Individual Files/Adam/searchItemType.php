<html>
	<title>Inventory System</title>
	<head>
		<script type="text/javascript" src="item.js"></script>
	</head>
	<body style="background-color: #74b8db;">
		<form name="inventorySearch" action="" method="post"/>
			<h3 align="center"><font color="#91152c">SEARCH FOR AN INVENTORY ITEM TYPE</h3>
      <h3><font color="blue">Leave all the fields empty to list all item types.</h3>
			<table>
				<tr>
					<td style="padding: 10px;" align="left">Item Type Name:</td>
					<td style="padding: 10px;"><input type="text" name="ItemTypeName" id="ItemTypeName"
						onblur="validateItem()"/></td>
        </tr>
        <tr>
					<td style="padding: 10px;"align="left">Barcode Prefix:</td>
					<td style="padding: 10px;"><input type="text" name="BarcodePrefix" id="BarcodePrefix" /></td>
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
