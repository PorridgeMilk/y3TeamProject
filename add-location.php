<?php


/*     Title: 2019SEM2_KV6002BNN01 : Team Project and Professionalism */
/*     Author: Michael Allen */
/*     Date: April 2020 */

include 'functions.php';
startHTML('Travel Co.', 'Home of travel for a newcastle travel agent');
require 'header-small.php';

?>

<?php


if ($_SESSION['user_type'] == '2') {


    echo " <h1 class='cAlign'><b>Add Holiday Destination</b></h1>";

    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyfields") {
            echo '<p class="error">please fill in both fields</p>';
        } else if ($_GET["error"] == "invalid") {
            echo '<p class="error">You have entered an invalid destination</p>';
        } else if ($_GET["error"] == "citytaken") {
            echo '<p class="error">That city is already a location</p>';
        }
    }
    if (isset($_GET["account"])) {
        if ($_GET["account"] == "success") {
            echo '<p class="success">Destination has been successfully added</p>';
        }
    }
    echo "

    <div class='admin'>

  <form class='addlocation' method='post' action='add-location-script.php'>

  <div class='input'>
  <label>City</label>
  <input type='text' name= 'city' class='input'>
 </div>
 <div class='input'>
 <label>Country</label>
 <input type='text' name= 'country' value = '  {$_GET["country"]}  ' class='input'>
 </div>
 <input type='submit' name= 'add-location' value='Add Destination'>
 </form>
 </div>";

    makeFooter();
    endHTML();
} else {
    header("Location: login-form.php?error=wronguser");
    exit();
}