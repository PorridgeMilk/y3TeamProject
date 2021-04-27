<?php
/*     Title: 2019SEM2_KV6002BNN01 : Team Project and Professionalism */
/*     Author: Michael Allen */
/*     Date: April 2020 */
include 'functions.php';
require "header-small.php";

if (isset($_SESSION['id']));
else {

    header("Location: login-form.php");
    exit();
}
startHTML('Travel Co.', 'Home of travel for a newcastle travel agent');


echo '
    <br>
    <h1 class="cAlign"><b>Welcome</b> ' .  $_SESSION['user'] . ' </h1>
    <section class="splitCol widthWrap">
    <section class="bookings">
    <h1>Account Details</h1>';
if (isset($_GET["error"])) {
    if ($_GET["error"] == "nobooking") {
        echo '<p class="error">You currently have no bookings!</p>';
    }
}
echo '
    <div class="account-details">
    <ul>';
if ($_SESSION['user_type'] == '1') {
    echo ' 
        <li> <a href="my-bookings-script.php">My Bookings</a></li>
        <li> <a href="change-pass.php">Change Password</a></li>';
} else {
    echo '
        <li> <a href="change-pass.php">Change Password</a></li>';
}
echo '
    </ul>
    </div>
    </section>
        <form class="loginForm" method= "post" action="update-account.php">
            <h1>Update Account</h1>';
if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyfields") {
        echo '<p class="error">Please complete all fields</p>';
    } else if ($_GET["error"] == "invalidmail") {
        echo '<p class="error">You have entered an invalid email</p>';
    } else if ($_GET["error"] == "invalidfir") {
        echo '<p class="error">You have entered an invalid first name, please use " a-z, A=Z " charactors only and no spaces </p>';
    } else if ($_GET["error"] == "invalidsur") {
        echo '<p class="error">You have entered an invalid Surname, please use " a-z, A=Z " charactors only and no spaces</p>';
    }
} else if (isset($_GET["account"])) {
    if ($_GET["account"] == "success") {
        echo '<p class="success">Your information has been updated</p>';
    }
}
echo '      <label>First Name</label>
            <input type="text" name ="fname" placeholder="First Name" value="' . $_SESSION['firstname'] . '" />
            <label>Surname</label>
            <input type="text" name ="lname" placeholder="Last Name" value="' . $_SESSION['surname'] . '" />
            <label>Email</label>
            <input type="text" name ="email" placeholder="Email" value="' . $_SESSION['email'] . '" />
            <label>Address</label>
            <input type="text" name ="address" placeholder="Address" value="' . $_SESSION['address'] . '" />
            <label>Post Code</label>
            <input type="text" name ="post" placeholder="Post Code" value="' . $_SESSION['post'] . '" />
            <input type= "submit" name= "update-submit" value= "Update Account">

        </form>
    </section>';


makeFooter();
endHTML();