<?php
include 'functions.php';
startHTML('Travel Co.', 'Home of travel for a newcastle travel agent');
require 'header.php';




$hotelID = filter_has_var(INPUT_POST, 'hotelID') ? $_POST['hotelID'] : null;
$typeID = filter_has_var(INPUT_POST, 'typeID') ? $_POST['typeID'] : null;
$user = $_SESSION['id'];


echo '<div class="bookingContainer">';

$getRoomsQuery = "SELECT *, tc_roomtype.typeID from tc_rooms
JOIN tc_hotels on tc_hotels.hotelID = tc_rooms.hotelID
JOIN tc_roomtype on tc_rooms.typeID = tc_roomtype.typeID
WHERE tc_rooms.typeID = $typeID AND tc_hotels.hotelID = $hotelID AND bookingStatus = 1";

$dbConn = getConnection();
    $queryResult = $dbConn->query($getRoomsQuery);
$rowObj = $queryResult->fetchObject();
    echo "<h1>Displaying all available rooms currently unavailable for type {$rowObj->typeName}</h1>
          ";

$getRoomsQuery = "SELECT *, tc_hotels.hotelID, tc_roomtype.typeID from tc_rooms
JOIN tc_hotels on tc_hotels.hotelID = tc_rooms.hotelID
JOIN tc_roomtype on tc_rooms.typeID = tc_roomtype.typeID
WHERE tc_rooms.typeID = $typeID AND tc_hotels.hotelID = $hotelID AND bookingStatus = 1";


$dbConn = getConnection();
    $queryResult = $dbConn->query($getRoomsQuery);



echo"<form action='bookingFinalStep.php' method='post'>
<table class='bookingUnavailable'>
<tr>";
while ($rowObj = $queryResult->fetchObject())
{
    echo "<td><label><h2>Room Number</h2><hr>{$rowObj->roomNo}  <hr> <h2>Board Type</h2><p>{$rowObj->boardType}</p></label></td> ";
}
echo"</tr></table>";

$getRoomsQuery = "SELECT *, tc_roomtype.typeID, serviceCharge from tc_rooms
JOIN tc_hotels on tc_hotels.hotelID = tc_rooms.hotelID
JOIN tc_roomtype on tc_rooms.typeID = tc_roomtype.typeID
WHERE tc_rooms.typeID = $typeID AND tc_hotels.hotelID = $hotelID AND bookingStatus = 0";

$dbConn = getConnection();
    $queryResult = $dbConn->query($getRoomsQuery);
$rowObj = $queryResult->fetchObject();
    echo "<h1>Displaying all available rooms for type {$rowObj->typeName}</h1>
          <h2>Select the room you would like</h2>";
$getRoomsQuery = "SELECT *, tc_hotels.hotelID, tc_roomtype.typeID from tc_rooms
JOIN tc_hotels on tc_hotels.hotelID = tc_rooms.hotelID
JOIN tc_roomtype on tc_rooms.typeID = tc_roomtype.typeID
WHERE tc_rooms.typeID = $typeID AND tc_hotels.hotelID = $hotelID AND bookingStatus = 0";

$dbConn = getConnection();
    $queryResult = $dbConn->query($getRoomsQuery);
echo"<form action='bookingConfirmation.php' method='post'>
    <table class='bookingAvailable'><tr></tr><tr>";

while ($rowObj = $queryResult->fetchObject())
{
    echo "<td>
    <input type='hidden' value='{$rowObj->hotelID}' name='hotelID'>
    <input type='hidden' value='{$rowObj->roomID}' name='roomID'>
    <input type='radio' value='{$rowObj->roomNo}' name='roomNo'>
    <input type='hidden' value='{$rowObj->serviceCharge}' name='serviceCharge'>
    <label for'roomNo'><h2>Room Number</h2><hr>{$rowObj->roomNo}  <hr> <h2>Board Type</h2><p>{$rowObj->boardType}</p></label></td> ";
}
echo"</tr></table>";
$getRoomsQuery = "SELECT occupancy, nightRatePerPerson FROM tc_roomtype WHERE typeID = $typeID";
$dbConn = getConnection();
$queryResult = $dbConn->query($getRoomsQuery);
$rowObj = $queryResult->fetchObject();

echo"<h2>How long will you be staying?</h2>

  <input type='hidden' name='occupancy' value='{$rowObj->occupancy}'>
  <label for='arrivalDate'>Arrival Date:</label>
  <input type='date' id='arrivalDate' name='arrivalDate' required><br>
  <label>Stay Duration (Days)</label>
  <input type='number' placeholder='stayDuration (Days)' name='stayDuration' required>
  <p>How many will be staying? The maximum number of guests for this room is {$rowObj->occupancy}</p>
  <input type='number' name='numberOfGuests' placeholder='Number of Guests' min='1' max='{$rowObj->occupancy}' required><br>
  
  <input type='hidden' name='nightRatePerPerson' value='{$rowObj->nightRatePerPerson}'>
  <input type='submit'>
  </form>
  </div>";


holidaysJs();

makeFooter();
endHTML();
?>
