<?php

$connect = mysqli_connect("csdb.brockport.edu", "jhess3", "_fal16_0", "fal16_csc423_jhess3");

if (!$connect) {
  die("Connection failed: ".mysqli_connect_error());
}

?>
