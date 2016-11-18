<?php
	session_start();
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
    <title>Nanno's Vendor Order System</title>
    <link href="css/headerVendorStyles.css" type="text/css" rel="stylesheet" />
<!--
				<script type='text/javascript'>
						var VENDORCODE = "default_value";
						function storeVendorCode()
						{
							VENDORCODE = document.getElementById('vcode').value;
						}
						function retrieveVendorCode()
						{
							return VENDORCODE;
						}
				</script>
-->
</head>
<body bgcolor="#F5F5F5">

    <!--  <h1 align="center">Nanno's Foods Vendor Order System</h1><br><br> -->
		<p align='center'><img src='/~rtamp1/csc423/gp/src/logovendor.png'/></p>
            <div id="nav">
                <div id="nav_wrapper">
                    <ul>
                        <li><a href="/~rtamp1/csc423/gp/vendor_order_type_select.php">Main Menu</a></li>
                    </ul>
                </div>
            </div>



<?php
		if (isset($_SESSION['VendorCode'])){
						echo"
								<div id='signoutButton'>
										<form action='/~rtamp1/csc423/gp/loginfiles/logout.php'>
												<div class='button'>
													<input id='fixedButton' id='tiny_button' type='submit' id='submit' name='submit' value='Sign out'>
												</div>

												<!-- <button >Sign out</button>  -->
										</form>
								</div>";
		} else
		{

		}
?>
            <!-- ====================== End Page Header ====================== -->
