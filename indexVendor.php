<?php
	include 'headerVendor.php';
?>

<div id="callToAction">
  <h2>Please Login Below with Your Vendor Code and Password</h2>
</div>

<br>
<div id="login">
	<div id="login_wrapper">
			if (isset($_SESSION['id'])){
							echo"<form action='loginfiles/logout.inc.php'>
											<button >Logout</button>
									</form>";
			} else{
					echo"<form action='loginfiles/login.inc.php' method='POST'>
									<input type='text' name='uid' placeholder='VendorCode'><br>
									<input type='password' name='pwd' placeholder='Password'>
									<button type='submit'>Login</button>
							</form>";
			}
		</div>
	</div>



</body>
</html>
