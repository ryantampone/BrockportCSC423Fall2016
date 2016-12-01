<?php

header('Content-Type: application/x-excel');
header('Content-Disposition: attachment; filename="FrequentlyReturnedItemsReport.csv"');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
$headers=array('Item ID','Item Name', 'Item Size', 'Division', 'Department', 'Category', 'Item Cost', 'Item Retail', 'Image File Name', 'Vendor ID', 'Quantity');

echo(implode(',',$headers));

$count = 0;
$array = $_POST['array'];


while($count <= $array){

	$itemid_ex = 'itemid_ex'.$count;
	$description_ex = 'description_ex'.$count;
	$size_ex = 'size_ex'.$count;
	$division_ex = 'division_ex'.$count;
	$department_ex = 'department_ex'.$count;
	$category_ex = 'category_ex'.$count;
	$itemCost_ex = 'itemCost_ex'.$count;
	$itemRetail_ex = 'itemRetail_ex'.$count;
	$imageFileName_ex = 'imageFileName_ex'.$count;
	$vendorId_ex = 'vendorId_ex'.$count;
	$qty_ex = 'qty_ex'.$count;
	$count++;
 	$row=array($_POST[$itemid_ex],$_POST[$description_ex] ,$_POST[$size_ex] ,$_POST[$division_ex] ,$_POST[$department_ex] ,$_POST[$category_ex] ,$_POST[$itemCost_ex] ,$_POST[$itemRetail_ex],$_POST[$imageFileName_ex] ,$_POST[$vendorId_ex],$_POST[$qty_ex]);
	echo(implode(',',$row));
	echo("\n");
}
?>
