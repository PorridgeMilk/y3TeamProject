<?php
//First we start a session which allow for us to store information as SESSION variables.
session_start();
//"require" creates an error message and stops the script. "include" creates an error and continues the script.
require "dbh.php";
?>
<div class="header-links">
    <div id="floatingNav" class="widthWrap">
        <div class="logo">
            <h1><b>Travel</b> Co.</h1>
        </div>
        <nav>
            <a href="index.php">
                <h2>Homepage</h2>
            </a>
            <a href="holidays.php">
                <h2>Holidays</h2>
            </a>
            <a>
                <h2>nav element</h2>
            </a>
        </nav>
        <div id="login">
            <?php
            if (!isset($_SESSION['id'])) {
                echo '   <a href="login-form.php">
        <h2 class="active"<h2>Login</h2></a>';
            } else if (isset($_SESSION['id'])) {
                echo '<a href="account.php"><h2>My Account</h2></a>
              <a href="logout.php"><h2>Logout</h2></a>';
            }
            ?>
        </div>
    </div>
</div>