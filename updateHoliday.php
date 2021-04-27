<?php
include 'functions.php';
setSessionPath();
startHTML('Travel Co.','Home of travel for a newcastle travel agent');
makeHeader();


$hotelID = filter_has_var(INPUT_GET, 'hotelID') ? $_GET['hotelID'] : null;
$hotelName = filter_has_var(INPUT_GET, 'hotelName') ? $_GET['hotelName'] : null;
$hotelDescription = filter_has_var(INPUT_GET, 'hotelDescription') ? $_GET['hotelDescription'] : null;
$imageRef = filter_has_var(INPUT_POST, 'imageRef') ? $_POST['imageRef'] : null;
$pool = filter_has_var(INPUT_POST, 'pool') ? $_POST['pool'] : null;
$spa = filter_has_var(INPUT_POST, 'spa') ? $_POST['spa'] : null;
$balcony = filter_has_var(INPUT_POST, 'balcony') ? $_POST['balcony'] : null;
$bar = filter_has_var(INPUT_POST, 'bar') ? $_POST['bar'] : null;
$restaurant = filter_has_var(INPUT_POST, 'restaurant') ? $_POST['restaurant'] : null;
$hotelLocation  = filter_has_var(INPUT_POST, 'locationID') ? $_POST['locationID'] : null;
    
$hotelID = filter_has_var(INPUT_POST, 'hotelID') ? $_POST['hotelID'] : null;
$hotelName = filter_has_var(INPUT_POST, 'hotelName') ? $_POST['hotelName'] : null;
$nightRatePerPerson = filter_has_var(INPUT_POST, 'nightRatePerPerson') ? $_POST['nightRatePerPerson'] : null;
$hotelDescription = filter_has_var(INPUT_POST, 'hotelDescription') ? $_POST['hotelDescription'] : null;



$errors = false;



echo "<div class='bookingContainer'>";




try {
   


            if (empty($hotelName)) {
                echo "<p>You need to provide a hotel name</p>\n";
                $errors = true;
            }
            if (empty($hotelDescription)) {
                echo "<p>You need to provide a hotel description</p>\n";
                $errors = true;
            }
            if (empty($hotelLocation)) {
                echo "<p>You need to select a location.</p>\n";
                $errors = true;
            }
            if (empty($imageRef)) {
                echo "<p>You need to provide an image link</p>\n";
                $errors = true;
            }
            if  ($pool == ""){
                echo "<p>You need to select an option for the pool</p>\n";
                $errors = true;
            }
            if  ($spa == "") {
                echo "<p>You need to select an option for the spa</p>\n";
                $errors = true;
            }
            if  ($balcony == "") {
                echo "<p>You need to select an option for the balcony</p>\n";
                $errors = true;
            }
            if  ($bar == "") {
                echo "<p>You need to select an option for the bar</p>\n";
                $errors = true;
            }
            if  ($restaurant == "") {
                echo "<p>You need to select an option for the restaurant</p>\n";
                $errors = true;
            }

            if ($errors === true) {
                echo "<p><a href='addholiday-form.php'>Please try again</a>.</p>\n";
            } else {
                $dbConn = getConnection();
               


                $updateSQL = "UPDATE tc_hotels 
                              SET hotelName = :hotelName, 
                              hotelDescription = :hotelDescription,
                              hotelLocation = :hotelLocation,
                              imageRef = :imageRef,
                              pool = :pool,
                              spa = :spa,
                              balcony = :balcony,
                              bar = :bar,
                              resturant = :restaurant
                              WHERE hotelID = :hotelID";
                
                $updateResult = $dbConn->prepare($updateSQL);
                
                $updateResult->execute(array(':hotelID' => $hotelID,
                                             ':hotelName' => $hotelName,
                                             ':hotelDescription' => $hotelDescription,
                                             ':hotelLocation' => $hotelLocation,
                                             ':pool' => $pool,
                                             ':spa' => $spa,
                                             ':balcony' => $balcony,
                                             ':bar' => $bar,
                                             ':restaurant' => $restaurant,
                                             ':imageRef' => $imageRef
                                            ));
            
            
                                  
                                  
                
                echo "<p>You Have Successfully Updated Hotel Details</p>";
                echo "<form action='holidays.php'>
               <input type='submit' value='Back to Holidays'>
               </form><br>";


            }
        } catch (Exception $e) {
            $errors = true;
            echo "<p>Record not updated: " . $e->getMessage() . "</p>\n";
            
        }
    












echo "</div>";




holidaysJs();



makeFooter();
endHTML();
?>
