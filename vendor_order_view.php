<?php
	include 'headerVendor.php';
?>


<?php
	if (isset($_SESSION['VendorCode']))
	{
		echo
			"
			 <div id='callToAction'>
            	<h3 align='center'>View Your Orders Below</h3>
        	 </div>

			";
	}
	else
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Please Login to View This Page')
    window.location.href='http://www.itss.brockport.edu/~rtamp1/csc423/gp/indexVendor.php';
    </SCRIPT>");
		//echo "<script type='text/javascript'>alert('Please login to view this page') window.location.href='./indexVendor.php'</script>";
	}
?>

</body>
</html>
