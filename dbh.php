<?php

$dBServername = "localhost";
$dBUsername = "root";
$dBPassword = "Newcastle251182";
$dBName = "tc_holidays";


$conn = mysqli_connect($dBServername, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
