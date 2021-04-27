<?php
include 'functions.php';
startHTML('Travel Co.', 'Home of travel for a newcastle travel agent');
require 'header.php';




echo"<div class='bookingContainer'>
<h1>Delete a hotel</h1>
<p>Deleting a hotel will also erase rooms as well as bookings associated with this hotel.</p>
<h2>Select hotel to delete</h2>

<form action='deleteholiday-warning.php' method='post'>";

    $sqlQuery = "SELECT tc_hotels.hotelID, hotelName
FROM tc_hotels 
";



$dbConn = getConnection();

$queryResult = $dbConn->query($sqlQuery);



while ($rowObj = $queryResult->fetchObject()){
    echo "
    
          
          <input type='radio' value='{$rowObj->hotelID}' name='hotelID' required>
          <label for='{$rowObj->hotelID}'>{$rowObj->hotelName}</label><br><br>";

        }
        


echo "<input type='submit' value='Confirm'></div>";













holidaysJs();



makeFooter();
endHTML();
?>
