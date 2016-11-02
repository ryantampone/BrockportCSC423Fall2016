<?php
session_start();

include '../dbh.php';

$vendorCode = $_POST['vcode'];
$pwd = $_POST['pwd'];

$sql = "SELECT * FROM Vendor WHERE VendorCode='$vendorCode' AND Password='$pwd'";
$result = $conn->query($sql);

if(!$row = mysqli_fetch_assoc($result)){
	echo "Your username or password is incorrect";
} else {
	$_SESSION['id'] = $row['id'];
}

header("location: ../vendor_order_view.php");

?>
