<?php
include 'functions.php';
require 'header.php';
startHTML('Travel Co.', 'Home of travel for a newcastle travel agent');


$hotelID = filter_has_var(INPUT_POST, 'hotelID') ? $_POST['hotelID'] : null;
$typeID = filter_has_var(INPUT_POST, 'typeID') ? $_POST['typeID'] : null;
$boardType = filter_has_var(INPUT_POST, 'boardType') ? $_POST['boardType'] : null;
$roomNumber = filter_has_var(INPUT_POST, 'roomNumber') ? $_POST['roomNumber'] : null;
$errors = false;
try {
        if (empty($hotelID))
            {
                echo "<p>You need to select a hotel.</p>\n";
                $errors = true;
            }
        if (empty($typeID))
            {
                echo "<p>You need to select a roomtype</p>\n";
                $errors = true;
            }
        if (empty($boardType))
            {
                echo "<p>You need to select a board type</p>\n";
                $errors = true;
            }
        if (empty($roomNumber))
            {
                echo "<p>You need to provide a room number</p>\n";
                $errors = true;
            }
        if ($errors === true)
            {
                echo "<p><a href='addholiday-form.php'>Please try again</a>.</p>\n";
            }
        else
            {
                $dbConn = getConnection();
                $updateSQL = "INSERT INTO tc_rooms(roomNo, typeID, hotelID, boardType)
                VALUES (:roomNumber, :typeID, :hotelID, :boardType)";
                $updateResult = $dbConn->prepare($updateSQL);
                $updateResult->execute(array(':roomNumber' => $roomNumber,
                                             ':typeID' => $typeID,
                                             ':hotelID' => $hotelID,
                                             ':boardType' => $boardType
                                            ));
                echo "<p>New room has been added.</p>
                <form action='holidays.php'>
                    <input type='submit' value='Back to Holidays'>
                </form>
                <form action='addholiday-form.php'>
                    <input type='submit' value='Add another new room/hotel'>
                </form>
                <br>";
            }
        } catch (Exception $e) {
            $errors = true;
            echo "<p>Record not updated: " . $e->getMessage() . "</p>\n";
            
        }
holidaysJs();
makeFooter();
endHTML();
?>
