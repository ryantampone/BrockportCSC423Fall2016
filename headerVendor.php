<?php
	session_start();
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
    <title>Nonno's Vendor Order System</title>
    <link href="css/headerVendorStyles.css" type="text/css" rel="stylesheet" />
</head>

    <body bgcolor="#F5F5F5">

            <div id="nav">
                <div id="nav_wrapper">
                    <ul>
                        <li><a href="/~rtamp1/csc423/gp/indexVendor.php">Main Menu</a></li>
    					<li>	<?php
                                if (isset($_SESSION['VendorId'])){
                                        echo"<form action='loginfiles/logout.inc.php'>
                                                <button >Logout</button>
                                            </form>";
                                } else{
                                    echo"<form action='loginfiles/login.inc.php' method='POST'>
                                            <input type='text' name='vcode' placeholder='Vendor Code'>
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
