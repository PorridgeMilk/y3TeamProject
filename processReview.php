<?php
include 'functions.php';
startHTML('Travel Co.', 'Home of travel for a newcastle travel agent');
require 'header.php';
$userID = 1; //PLACEHOLDER UNTILL SESSIONS IMPLEMENTED
$overall = sanitise_input('overall');
$location = sanitise_input('location-radio');
$room = sanitise_input('room-radio');
$clean = sanitise_input('clean-radio');
$service = sanitise_input('service-radio');
$hotelID = sanitise_input('hotelID');
$date = date("Y-m-d");
$reviewTitle = sanitise_input('reviewTitle');
$reviewText = sanitise_input('reviewText');

$dbConn = getConnection();

//INSERT QUERY
$insertQry = "INSERT INTO tc_reviews (reviewDate, hotelID, userID, reviewTitle, reviewText, overallRating, locationRating, roomRating, cleanlinessRating, serviceRating)
VALUES ('$date','$hotelID','$userID','$reviewTitle','$reviewText', '$overall', '$location', '$room', '$clean', '$service')";

$queryResult = $dbConn->query($insertQry);
if ($queryResult === false) {
  echo "<p>Please try again! <a href='reviewForm.php?hotelID='$hotelID''>Try again.</a></p>\n";
  exit;
} else {
  header("Location: hotel.php?hotelID=$hotelID");
  die();
}



echo "</div>";
makeFooter();
endHTML();
