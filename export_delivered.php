<?php

header('Content-Type: application/x-excel');
header('Content-Disposition: attachment; filename="DeliveredItemsReport.csv"');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
$headers=array('Order ID','Item ID', 'Item Name', 'Order Time');

echo(implode(',',$headers));

$count = 0;
$array = $_POST['array'];
while($count < $array){

	$orderId_ex = 'orderId'.$count;
	$dateTimeOfOrder_ex = 'dateTimeOfOrder'.$count;
	$itemId_ex = '$itemId_ex'.$count;
	$description_ex = 'description_ex'.$count;

	$count++;
 	$row=array($_POST[$orderId_ex],$_POST[$itemId_ex],$_POST[$description_ex], $_POST[$dateTimeOfOrder_ex] );
	echo(implode(',',$row));
	echo("\n");
}
?>
