<?php
	include 'headerVendor.php';
?>

<div id="callToAction">
  <h2>Please Login Below with Your Vendor ID and Password</h2>
</div>

<br>

if (isset($_SESSION['id'])){
				echo"<form action='loginfiles/logout.inc.php'>
								<button >Logout</button>
						</form>";
} else{
		echo"<form action='loginfiles/login.inc.php' method='POST'>
						<input type='text' name='uid' placeholder='Username'><br>
						<input type='password' name='pwd' placeholder='Password'>
						<button type='submit'>Login</button>
				</form>";
}



</body>
</html>
