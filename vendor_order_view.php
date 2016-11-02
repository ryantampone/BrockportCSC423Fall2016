<?php
	include 'header.php';
?>


<?php
	if (isset($_SESSION['VendorId']))
	{
		echo
			"
			 <div id='callToAction'>
            	<h3 align='center'>View Your Orders Below</h3>
        	 </div>

    		<center>
        		<form action='/brockportforecasting/new_user_ui_form.php'><button >Register User</button></form>
    		</center>

			";
	}
	else
	{
		echo "<script type='text/javascript'>alert('Please login to view this page')</script>";
	}
?>

</body>
</html>
