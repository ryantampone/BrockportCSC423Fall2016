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

      <h1 align="center">Nanno's Foods Vendor Order System</h1><br><br>
            <div id="nav">
                <div id="nav_wrapper">
                    <ul>
                        <li><a href="/~rtamp1/csc423/gp/vendor_order_type_select.php">Main Menu</a></li>
    					<li>	<?php
                                if (isset($_SESSION['VendorCode'])){
                                        echo"<form action='/~rtamp1/csc423/gp/loginfiles/logout.php'>
                                                <button >Logout</button>
                                            </form>";
                                } else{
                                    echo"<form action='/~rtamp1/csc423/gp/loginfiles/login.php' method='POST'>
                                            <input type='text' name='vcode' id='vcode' placeholder='Vendor Code'>
                                            <input type='password' name='pwd' placeholder='Password'>
                                            <button type='submit'>Login</button>
                                        </form>";
                                }
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- ====================== End Page Header ====================== -->
