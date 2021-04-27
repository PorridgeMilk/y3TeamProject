<?php
/*     Title: 2019SEM2_KV6002BNN01 : Team Project and Professionalism */
/*     Author: Michael Allen */
/*     Date: April 2020 */
if (isset($_POST["cancel-booking"])) {

    require 'dbh.php';
    $cancel = $_POST["cancel-booking"];


    $sql = "DELETE FROM `tc_bookings` WHERE `tc_bookings`.`bookingID`=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error!";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $cancel);
        mysqli_stmt_execute($stmt);
        header("Location: my-bookings-script.php");
        exit();
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    exit();
} else {
    header("Location: my-bookings.php");
    exit();
}