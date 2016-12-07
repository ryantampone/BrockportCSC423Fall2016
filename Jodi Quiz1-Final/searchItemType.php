<?---- Jodi L. Hess	CSC423 Quiz 2

<?php
	echo"
		<br>

		<!DOCTYPE html>
		<html>
		<head>
		<title>Jodi L. Hess CSC423 Quiz 2 </title>
		<form action='' method='post'>
		<style>
		h3 {text-align: center;}
		  h2 {text-align: left; font color: blue;}
		body { background-color: lightblue; }

		</style>
		<body>
		<h3> <font color='B22222> SEARCH FOR AN INVENTORY ITEM TYPE </font> </h3>

		  <h4> Leave all the fields empty to list all item types. </h4>

		<form action=''  method='post' >

		<table>
		<colgroup>
		<col span='1' style='width: 15%'
		<col span='1' style='width: 30%;''>

		</colgroup>
		<col width='15%''>
		<col width='30%''>


		<?-------------------------------------------------------------->
		<tr width='100%'>


		<td height='35 px' > Item Type Name: </td>
		<td> <input type='text' name='name' id='name' size='30'> </td> </tr>

		<td height='35 px' width='100 px'> Barcode Prefix: </td>
		<?----- <label for='barcode'> </label>
		<td> <input type='text' name='barcode' id='barcode' size='30' maxlength='4'> </td>
		</tr>

		<tr>
		<td> </td>

		</table>
		</html>


          <div class='button'>
<input id='tiny_button' type='submit' id='submit' name='submit' >
<input id='tiny_button' type='reset' id='reset' name='reset'>
</div>

            </form>
        </div>
				</body>
				</html>
	";
?>
