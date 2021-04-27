<?php
include 'functions.php';
startHTML('Travel Co.', 'Home of travel for a newcastle travel agent');
require 'header.php';
$hotelID = filter_has_var(INPUT_POST, 'hotelID') ? $_POST['hotelID'] : null;
echo"<div class='bookingContainer'>
<h1>Delete a hotel</h1>
        <p>Warning: The following rooms will also be deleted.</p>";
            $sqlQuery = "SELECT * FROM tc_rooms WHERE hotelID = $hotelID";
            $dbConn = getConnection();
            $queryResult = $dbConn->query($sqlQuery);
echo"<table>
        <tr>";
while ($rowObj = $queryResult->fetchObject()){
    echo "<td>{$rowObj->roomNo}<br>
              {$rowObj->boardType}</td>";
        }
echo "</tr>
    </table>
<form action='deleteholiday-process.php' method='post'>
    <h2>To finalise this process, please confirm your admin password</h2>
        <input type='hidden' name='hotelID' value='$hotelID'>
        <input type='password' placeholder='password' name='password' required>
        <input type='submit' value='Confirm'>
</form></div>";
holidaysJs();
makeFooter();
endHTML();
?>
