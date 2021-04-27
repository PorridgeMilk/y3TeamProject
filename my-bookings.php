<?php
/*     Title: 2019SEM2_KV6002BNN01 : Team Project and Professionalism */
/*     Author: Michael Allen */
/*     Date: April 2020 */
include 'functions.php';
require "header-small.php";


startHTML('Travel Co.', 'Home of travel for a newcastle travel agent');


echo "
    <br>
    <h1 class='cAlign'><b>Welcome</b>    {$_SESSION['user']}  </h1>
    <section class='my-bookings'>
        <h1>Your Bookings</h1>";
foreach ($_SESSION['bookingID'] as $key => $value) {
    echo "
    <section class= 'booking-a'>
    <div class=' booking-b'>
    <label>Booking ID:</label>  <label>{$_SESSION['bookingID'][$key]}</label>
    </div>
    <div class=' booking-b'>
    <label>Hotel:</label>  <label>{$_SESSION['hotelName'][$key]}</label>
    </div>
    <div class=' booking-b'>
    <label>City:</label>  <label>{$_SESSION['locationCity'][$key]}</label>
    </div>
    <div class=' booking-b'>
    <label>Country:</label>  <label>{$_SESSION['locationCountry'][$key]}</label>
    </div>
    <div class=' booking-b'>
    <label>Room Number:</label>  <label>{$_SESSION['roomNo'][$key]}</label>
    </div>
    <div class=' booking-b'>
    <label>Room Type:</label>  <label>{$_SESSION['typeName'][$key]}</label>
    </div>
    <div class=' booking-b'>
    <label>Board Type:</label>  <label>{$_SESSION['boardtype'][$key]}</label>
    </div>
    <form action='cancel-booking.php' method= 'post'>
    <button type='submit' class='bookBtn' name='cancel-booking' value = {$_SESSION['bookingID'][$key]}>Cancel Booking</button>
</form>
    </section>";
}
echo " </section>
</section>";





makeFooter();
endHTML();