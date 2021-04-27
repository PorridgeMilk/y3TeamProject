<?php
include 'functions.php';
startHTML('Travel Co.', 'Home of travel for a newcastle travel agent');
require 'header.php';

?>

<?php

echo "<div class='bookingContainer'>";
    
if ($_SESSION['user_type'] == '2') {

    $user = $_SESSION['id'];

    $getHolidaysQuery = "SELECT * FROM tc_hotels";

    $dbConn = getConnection();

    $queryResult = $dbConn->query($getHolidaysQuery);

    echo"<h1>Select a hotel to edit</h1>";

    while ($rowObj = $queryResult->fetchObject()) {
        echo "
          
          <a class='selectHotel' href='editHolidays.php?hotelID={$rowObj->hotelID}'> • {$rowObj->hotelName}</a><br>
            ";
    }
echo "</div>";

    holidaysJs();


    
    makeFooter();
    endHTML();
} else {
    header("Location: login-form.php?error=wronguser");
    exit();
}