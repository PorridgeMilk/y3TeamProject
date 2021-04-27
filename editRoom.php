<?php
include 'functions.php';
startHTML('Travel Co.', 'Home of travel for a newcastle travel agent');
require 'header.php';



$roomID = filter_has_var(INPUT_GET, 'roomID') ? $_GET['roomID'] : null;


echo "<div class='bookingContainer'>";
$dbConn = getConnection();
//$getUsersQuery = "SELECT *, tc_roomtype.typeID FROM tc_rooms  JOIN tc_roomtype on tc_rooms.typeID = tc_roomtype.typeID WHERE roomID = $roomID";

$getUsersQuery = "SELECT * FROM tc_rooms WHERE roomID = $roomID";

$queryResult = $dbConn->query($getUsersQuery);


echo '<h1>Edit Room Information</h1>
<form action="updateRoom.php" method="get">
';


while ($rowObj = $queryResult->fetchObject()){
    echo "
          <h2>Room ID</h2>
          <input type='text' name='roomID' value='{$rowObj->roomID}' readonly>
          <h2>Room Number</h2>
          <input type='text' name='roomNo' value='{$rowObj->roomNo}' required>
          
         
          <br>
            ";
    
}
    
$getRoomQuery = "SELECT * FROM tc_roomtype";

$queryResult = $dbConn->query($getRoomQuery);

echo "<h2>Room Type</h2>";


while ($rowObj = $queryResult->fetchObject()){
    echo "<input type='radio' value='{$rowObj->typeID}' name='roomtype' required>
         <label for='roomtype'>{$rowObj->typeName}</label><br>";
    
    
}
echo"<h3>Board Type</h3>
         <input type='radio' value='All inclusive, drinks included.' name='boardType' required>
         <label for='>All inclusive, drinks included.'>All inclusive, drinks included.</label><br>
         <input type='radio' value='All inclusive.' name='boardType'>
         <label for='All inclusive.'>All inclusive.</label><br>
         <input type='radio' value='Inclusive.' name='boardType'>
         <label for='Inclusive.'>Inclusive.</label><br>
         
         


<input type='submit' value='Submit Changes'>
          </form>";

echo "</div>";


holidaysJs();



makeFooter();
endHTML();
?>
