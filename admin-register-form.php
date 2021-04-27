<?php
/*     Title: 2019SEM2_KV6002BNN01 : Team Project and Professionalism */
/*     Author: Michael Allen */
/*     Date: April 2020 */
include 'functions.php';
require "header-small.php";
startHTML('Travel Co.', 'Home of travel for a newcastle travel agent');


echo '
    <br>
    <h1 class="cAlign"><b>Travel</b> Co.</h1>
        <form class="loginForm" method= "post" action="signup-script.php">
            <h1>Create Admin Account</h1>';

?>
<?php
if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyfields") {
        echo '<p class="error">Please complete all fields</p>';
    } else if ($_GET["error"] == "invaliduid") {
        echo '<p class="error">You have entered an invalid username , please use " 0-9, a-z, A=Z " charactors only and no spaces </p>';
    } else if ($_GET["error"] == "invalidmail") {
        echo '<p class="error">You have entered an invalid email</p>';
    } else if ($_GET["error"] == "passwordcheck") {
        echo '<p class="error">Your passwords do not match</p>';
    } else if ($_GET["error"] == "usertaken") {
        echo '<p class="error">That username is already taken</p>';
    } else if ($_GET["error"] == "emailtaken") {
        echo '<p class="error">That email is already registered</p>';
    } else if ($_GET["error"] == "invalidfir") {
        echo '<p class="error">You have entered an invalid first name, please use " a-z, A=Z " charactors only and no spaces </p>';
    } else if ($_GET["error"] == "invalidsur") {
        echo '<p class="error">You have entered an invalid Surname, please use " a-z, A=Z " charactors only and no spaces</p>';
    } else if ($_GET["error"] == "invalidaddr") {
        echo '<p class="error">You have entered an invalid address , please use " 0-9, a-z, A=Z " charactors only </p>';
    } else if ($_GET["error"] == "invalidpost") {
        echo '<p class="error">You have entered an invalid Post Code , please use " 0-9, a-z, A=Z " charactors only </p>';
    }
}
echo '      <div class="split-left">
            <h4> Account details</h4>
            <input type="text" name ="user" maxlength="15" placeholder="Username" value="' . $_GET["user"] . '" />
            <input type="text" name="pass" maxlength="20"  placeholder="Password"  />
            <input type="text" name="pass-repeat" maxlength="20" placeholder="Reapeat Password" />
            </div>
            <div class="split-right">
            <h4> User details</h4>
            <input type="text" name ="fname" maxlength="20" placeholder="First Name" value="' . $_GET["fname"] . '" />
            <input type="text" name ="lname" maxlength="20" placeholder="Last Name" value="' . $_GET["lname"] . '" />
            <input type="text" name ="email" maxlength="20" placeholder="Email" value="' . $_GET["email"] . '" />
            <input type="text" name ="address" maxlength="20" placeholder="Address" value="' . $_GET["address"] . '" />
            <input type="text" name ="post" maxlength="10" placeholder="Post Code" value="' . $_GET["post"] . '" />
            <input type="hidden" name ="user_type"  value= "2" />
            </div>
            <input type= "submit" name= "sign-up" value= "Create Account">
        </form>
    </section>';


makeFooter();
endHTML();