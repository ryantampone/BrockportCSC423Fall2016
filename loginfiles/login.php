
<?php
session_start();
/*
$cookie_name = "vendorcode";
$cookie_value = ($codeofthevendor = $_POST['vcode']);
setcookie($cookie_name, $cookie_value);
*/
include '../dbh.php';


$vcode = $_POST['vcode'];
$pwd = $_POST['pwd'];

$sql = "SELECT * FROM Vendor WHERE VendorCode='$vcode' AND Password='$pwd'";
$result = $conn->query($sql);


if(!$row = mysqli_fetch_assoc($result)){
	echo "Your username or password is incorrect";
} else {
	$_SESSION['VendorCode'] = $row['VendorCode'];
}

//header("location: ../vendor_order.php");
header("location: ../vendor_order_type_select.php");

?>
