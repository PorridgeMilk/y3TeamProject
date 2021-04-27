<?php
include 'functions.php';
require "header-small.php";
startHTML('Travel Co.', 'Home of travel for a newcastle travel agent');


echo '
    <br>
    <h1 class="cAlign"><b>Travel</b> Co.</h1>
    <section class="splitCol widthWrap">
        <form class="loginForm" method="post" action="login-script.php">
            <h1>Login</h1>'
?>
<?php
if (isset($_GET["loginerror"])) {
    if ($_GET["loginerror"] == "emptyfields") {
        echo '<p class="error">please fill in both fields</p>';
    } else if ($_GET["loginerror"] == "sqlerror") {
        echo '<p class="error">Something has gone wrong, please try again later </p>';
    } else if ($_GET["loginerror"] == "wrongpwd") {
        echo '<p class="error">You have entered an incorrect password</p>';
    } else if ($_GET["loginerror"] == "wronguidpwd") {
        echo '<p class="error">Your have entered an incorrect username or password</p>';
    }
}
echo '
            <input type="text" placeholder="Username" name="username"  value="' . $_GET["user"] . '"  />
            <input type="text" placeholder="Password" name="password" />
            <input type="submit" name= "login" value="login">
        </form>
        <form class="loginForm" method= "post" action="signup-script.php">
            <h1>Create Account</h1>'
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
    }
}
// Here we create a success message if the new user was created.
else if (isset($_GET["account"])) {
    if ($_GET["account"] == "success") {
        echo '<p class="success">Signup successfull , you can now log in</p>';
    }
}
echo '
            <input type="text" name ="user" placeholder="Username" value="' . $_GET["user"] . '" />
            <input type="text" name ="fname" placeholder="First Name" value="' . $_GET["fname"] . '" />
            <input type="text" name ="lname" placeholder="Last Name" value="' . $_GET["lname"] . '" />
            <input type="text" name ="email" placeholder="Email" value="' . $_GET["email"] . '" />
            <input  type="text" name="pass"  placeholder="Password"  />
            <input  type="text" name="pass-repeat" placeholder="Reapeat Password" />
            <input type= "submit" name= "sign-up" value= "Create Account">
        </form>
    </section>';

makeFooter();
endHTML();