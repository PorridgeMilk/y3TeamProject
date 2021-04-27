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
$user = $_SESSION['id'];


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
                $dbConn = getConnection();
               


                $insertBookingQuery = "INSERT INTO tc_bookings(userID, roomID, arrivalDate, stayDuration, numberGuests)
                                       SELECT ID, :roomID, :arrivalDate, :stayDuration, :numberGuests
                                       FROM tc_users
                                      
                                       WHERE tc_users.ID = '$user'";
                
        
                
                
        
                
                
                
                                       
                $dbConn = getConnection();
                $statement = $dbConn->prepare($insertBookingQuery);
                $statement->execute(array(':arrivalDate' => $arrivalDate, ':stayDuration' => $stayDuration, ':roomID' => $roomID, 'numberGuests' => $numberOfGuests));
              
            
                                  
                                  
                                  
                
                echo "<h1>Your invoice</h1>";
                
                $bookingInvoiceQuery = "SELECT *, tc_users.username, tc_rooms.roomNo, hotelName 
                                        FROM tc_bookings
                                        JOIN tc_users on tc_bookings.userID = tc_users.ID
                                        JOIN tc_rooms on tc_bookings.roomID = tc_rooms.roomID
                                        JOIN tc_hotels on tc_rooms.hotelID = tc_hotels.hotelID
                                        WHERE tc_users.ID = '$user' AND tc_bookings.roomID = $roomID AND tc_hotels.hotelID = '$hotelID'";
                
                
                $dbConn = getConnection();
                $queryResult = $dbConn->query($bookingInvoiceQuery);
                
                echo "<table>
                        <tr><th>Place of Stay</th>
                            <th>username</th>
                            <th>room Number</th>
                            <th>Arrival Date</th>
                            <th>Stay Duration</th>
                            <th>Number of Guests</th>
                        </tr>
                        
                                ";

                while ($rowObj = $queryResult->fetchObject()){
                echo "<tr>
                      <td>{$rowObj->hotelName}</td>
                      <td>{$rowObj->username}</td>
                      <td>{$rowObj->roomNo}</td>
                      <td>{$rowObj->arrivalDate}</td>
                      <td>{$rowObj->stayDuration}</td>
                      <td>{$rowObj->numberGuests}</td>
                      </tr>";


                    }
                
               
                
                
                
                echo "</table>
                <form action='holidays.php'>
               <input type='submit' value='Back to Holidays'>
               </form><br>";
                
                
                
                
                $updateSQL = "UPDATE tc_rooms
                              SET bookingStatus = 1
                                  WHERE roomID = :roomID";
                
                $updateResult = $dbConn->prepare($updateSQL);
                
                $updateResult->execute(array(':roomID' => $roomID
                                            ));
            
                


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
