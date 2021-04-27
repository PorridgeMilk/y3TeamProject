<?php
include 'functions.php';
startHTML('Travel Co.', 'Home of travel for a newcastle travel agent');
require 'header.php';

?>

<?php 




$user = $_SESSION['id'];

echo '<h1>Admin Dashboard</h1><hr>';

$getHolidaysQuery = "SELECT * FROM tc_hotels";

$dbConn = getConnection();

$queryResult = $dbConn->query($getHolidaysQuery);


echo '<h1>Select a hotel to edit</h1>';


while ($rowObj = $queryResult->fetchObject()){
    echo "
          
          <a class='selectHotel' href='editHolidays.php?hotelID={$rowObj->hotelID}'> • {$rowObj->hotelName}</a><br>
            ";
    
}

echo "<hr>";

echo "<h1>Create a new Hotel/Room</h1> <a class='selectHotel' href='addholiday-form.php'> • Select here to create a new Hotel/Room</a>";



?>

<?php
holidaysJs();


echo "</div>";
makeFooter();
endHTML();
?>
