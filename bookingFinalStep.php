<?php
include 'functions.php';
startHTML('Travel Co.', 'Home of travel for a newcastle travel agent');
require 'header.php';

$arrivalDate = filter_has_var(INPUT_POST, 'arrivalDate') ? $_POST['arrivalDate'] : null;
$occupancy = filter_has_var(INPUT_POST, 'occupancy') ? $_POST['occupancy'] : null;
$stayDuration = filter_has_var(INPUT_POST, 'stayDuration') ? $_POST['stayDuration'] : null;
$numberOfGuests = filter_has_var(INPUT_POST, 'numberOfGuests') ? $_POST['numberOfGuests'] : null;
$roomNo = filter_has_var(INPUT_POST, 'roomNo') ? $_POST['roomNo'] : null;
$roomID = filter_has_var(INPUT_POST, 'roomID') ? $_POST['roomID'] : null;
$hotelID = filter_has_var(INPUT_POST, 'hotelID') ? $_POST['hotelID'] : null;
$nightRatePerPerson = filter_has_var(INPUT_POST, 'nightRatePerPerson') ? $_POST['nightRatePerPerson'] : null;
$serviceCharge = filter_has_var(INPUT_POST, 'serviceCharge') ? $_POST['serviceCharge'] : null;
$user = $_SESSION['id'];

$totalNightRate = (int)$numberOfGuests * (int)$nightRatePerPerson;
$pricePerNight = (int)$totalNightRate + (float)$serviceCharge;
$totalPrice = (int)$stayDuration * (float)$pricePerNight;





    echo "<div class='bookingContainer'>";

try {
   
            if(empty($user)){
                echo"<p><a href='login-form.php'>You must be logged in to book a room</a><p>";
            }

            if (empty($arrivalDate)) {
                echo "<p>You need to provide an Arrival Date</p>\n";
                $errors = true;
            }if (empty($stayDuration)) {
                echo "<p>You need to provide a Stay Duration</p>\n";
                $errors = true;
            }
            if (empty($roomNo)) {
                echo "<p>You need to select a Room Number</p>\n";
                $errors = true;
            }if($numberOfGuests > $occupancy){
                echo "You have gone over the guest limit, please reduce amount of guests or pick a larger room.";
                $errors = true;
            }if($stayDuration <= 0){
                echo "You have not entered a valid stay duration.";
            }

                
                
                
                
                

            if ($errors === true) {
                echo "<p><a href='holidays.php'>Please try again</a>.</p>\n";
            } else {
                
                
                $sqlQuery = "SELECT hotelName, serviceCharge FROM tc_hotels WHERE hotelID = $hotelID";
                $dbConn = getConnection();
                $queryResult = $dbConn->query($sqlQuery);
                $rowObj = $queryResult->fetchObject();
                
                
                
                echo"
                <h1>Confirm your booking details</h1>
                <a href='bookHoliday.php?hotelID=$hotelID'>Click here to restart your booking</a>
                <form action='bookingConfirmation.php' method='post'>
                <label>Choice of Stay</label>
                <input type='text' value='{$rowObj->hotelName}' readonly><br>";
                
                echo"
                <label>Room Number</label>
                <input type='text' value='$roomNo' readonly><br>
                <label>Room Size</label>
                <input type='text' value='$occupancy' readonly><br>
                <label>Arrival Date</label>
                <input type='text' value='$arrivalDate' readonly><br>
                <label>Number of Guests</label>
                <input type='text' value='$numberOfGuests' readonly><br>
                <label>Stay Duration</label>
                <input type='text' value='$stayDuration Day(s)' readonly><br>
                <label>Price Per Night</label>
                <input type='text' value='£$pricePerNight' readonly><br>
                <label>Final Price</label>
                <input type='text' value='£$totalPrice' readonly><br>
                
                <input type='submit' value='Confirm Booking'>
                </form>
                <form action='holidays.php>
                <input type='text' value='£$pricePerNight' readonly><br>
                <input type='submit' value='Cancel Your Booking'>
                </form>
                ";
                


            }
        } catch (Exception $e) {
            $errors = true;
            echo "<p>Unsuccessful: " . $e->getMessage() . "</p><a href='holidays.php'>Try again</a>\n";
            
        }






echo "</div>";









holidaysJs();



makeFooter();
endHTML();
?>
