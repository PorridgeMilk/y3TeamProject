<?php
include 'functions.php';
startHTML('Travel Co.', 'Home of travel for a newcastle travel agent');
require 'header.php';

   

$password = $_POST['password'];
$username = $_SESSION['user'];

$hotelID = filter_has_var(INPUT_POST, 'hotelID') ? $_POST['hotelID'] : null;



echo "<div class='bookingContainer'>";



      $sqlQuery = "SELECT password FROM tc_users WHERE username = :username AND accountType = 2";

            $dbConn = getConnection();
            $statement = $dbConn->prepare($sqlQuery);

            $statement->execute(array(':username' => $username));

   

            $user = $statement->fetchObject();
            if ($user) {
                $passwordMatch = $user->password;
               
                if (password_verify($password, $passwordMatch)) {
                    
                echo "<p>Successfully Deleted Hotel</p>";
                    
                $deleteQuery = "DELETE FROM tc_reviews WHERE hotelID = :hotelID";
                    
                
                $statement = $dbConn->prepare($deleteQuery);   
                $statement->execute(array(':hotelID' => $hotelID));
                    
                $deleteQuery = "DELETE FROM tc_rooms WHERE hotelID = :hotelID";
                    
                  
                $statement = $dbConn->prepare($deleteQuery);   
                $statement->execute(array(':hotelID' => $hotelID)); 
                
                $deleteQuery = "DELETE FROM tc_hotels WHERE hotelID = :hotelID";
                
                   
                $statement = $dbConn->prepare($deleteQuery);   
                $statement->execute(array(':hotelID' => $hotelID));
                
                    
                
                   
                }else{
                    echo "<p>Process failed, you have entered an incorrect password, or your account does not have sufficient admin permissions</p>";
                }
                

            } else {
                echo "<p>Process failed, you have entered an incorrect password, or your account does not have sufficient admin permissions</p>";
            }
    

echo "</div>";

holidaysJs();

echo "</div>";

makeFooter();
endHTML();







?>
