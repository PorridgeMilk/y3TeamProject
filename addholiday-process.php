<?php
include 'functions.php';
setSessionPath();
startHTML('Travel Co.','Home of travel for a newcastle travel agent');
makeHeader();

$hotelName = filter_has_var(INPUT_POST, 'hotelName') ? $_POST['hotelName'] : null;
$hotelDescription = filter_has_var(INPUT_POST, 'hotelDescription') ? $_POST['hotelDescription'] : null;
$hotelLocation  = filter_has_var(INPUT_POST, 'locationID') ? $_POST['locationID'] : null;
$imageRef = filter_has_var(INPUT_POST, 'imageRef') ? $_POST['imageRef'] : null;
$pool = filter_has_var(INPUT_POST, 'pool') ? $_POST['pool'] : null;
$spa = filter_has_var(INPUT_POST, 'spa') ? $_POST['spa'] : null;
$balcony = filter_has_var(INPUT_POST, 'balcony') ? $_POST['balcony'] : null;
$bar = filter_has_var(INPUT_POST, 'bar') ? $_POST['bar'] : null;
$restaurant = filter_has_var(INPUT_POST, 'restaurant') ? $_POST['restaurant'] : null;
    
$errors = false;



echo "<div class='bookingContainer'</div>";




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
               


                $updateSQL = "INSERT INTO tc_hotels(hotelName, hotelDescription, hotelLocation, pool, spa, balcony, bar, resturant, imageRef)
                              VALUES (:hotelName, :hotelDescription, :hotelLocation, :pool, :spa, :balcony, :bar, :restaurant, :imageRef)";
                
                $updateResult = $dbConn->prepare($updateSQL);
                
                $updateResult->execute(array(':hotelName' => $hotelName,
                                             ':hotelDescription' => $hotelDescription,
                                             ':hotelLocation' => $hotelLocation,
                                             ':pool' => $pool,
                                             ':spa' => $spa,
                                             ':balcony' => $balcony,
                                             ':bar' => $bar,
                                             ':restaurant' => $restaurant,
                                             ':imageRef' => $imageRef
                                            ));
            
           
                                  
                                  
                                  
                
                echo "<p>New hotel has been added to the list.</p>";
                echo "<form action='holidays.php'>
               <input type='submit' value='Back to Holidays'>
               </form><br>
               <form action='addholiday-form.php'>
               <input type='submit' value='Add another hotel'>
               </form><br>
               <form action='addroom-form.php'>
               <input type='submit' value='Add rooms to hotels'>
               </form>";


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
