<?php
	include 'headerVendor.php';
?>

<?php
		if (isset($_SESSION['VendorCode']))
		{
				header('Location: http://www.itss.brockport.edu/~rtamp1/csc423/gp/vendor_order_type_select.php');
		} else
		{
				echo"
						<center>
						<br><br>
						<div id='callToAction'>
						  <h2>Login with your Vendor Code and Password</h2>
						</div>
						<div id='login'>
							<div class='innerTable'>
							<p align='center'><img src='/~rtamp1/csc423/gp/src/bluetruck.png' height='110' width='110'/></p><br>
							<form action='/~rtamp1/csc423/gp/loginfiles/login.php' method='POST'>
									<input type='text' name='vcode' id='vcode' placeholder='Vendor Code'><br><br>
									<input type='password' name='pwd' placeholder='Password'><br><br>
									<button type='submit'>Login</button>
							</form>
							</div>
						</div>
						</center>
						";
		}
?>




</body>
</html>
