<?php

$conn = mysqli_connect("csdb.brockport.edu", "rtamp1", "mitra423", "fal16_csc423_rtamp1");

if (!$conn) {
  die("Connection failed: ".mysqli_connect_error());
}

?>
