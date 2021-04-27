<?php
/*     Title: 2019SEM2_KV6002BNN01 : Team Project and Professionalism */
/*     Author: Michael Allen */
/*     Date: April 2020 */
require "dbh.php";

session_start();

$id = $_SESSION['id'];

$sql = "SELECT bookingID, ID, roomNo, boardType, username, forename, surname, typeName,  hotelName, locationCity, locationCountry
FROM tc_users u 
INNER JOIN tc_bookings b ON u.ID = b.userID 
INNER JOIN tc_rooms r ON r.roomID = b.roomID 
INNER JOIN tc_roomtype t ON t.typeID = r.typeID
INNER JOIN tc_hotels h ON h.hotelID = r.hotelID  
INNER JOIN tc_locations l ON l.locationID = h.hotelLocation WHERE ID=?;";

$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "SQL statement failed";
} else {

    mysqli_stmt_bind_param($stmt, "s", $id);

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {


        unset($_SESSION['bookingID']);
        unset($_SESSION['roomNo']);
        unset($_SESSION['typeName']);
        unset($_SESSION['boardtype']);
        unset($_SESSION['hotelName']);
        unset($_SESSION['roomNo']);
        unset($_SESSION['locationCity']);
        unset($_SESSION['locationCountry']);


        foreach ($result as $row) {
            $_SESSION['bookingID'][$i] = $row['bookingID'];
            $_SESSION['roomNo'][$i] = $row['roomNo'];
            $_SESSION['typeName'][$i] = $row['typeName'];
            $_SESSION['boardtype'][$i] = $row['boardType'];
            $_SESSION['hotelName'][$i] = $row['hotelName'];
            $_SESSION['locationCity'][$i] = $row['locationCity'];
            $_SESSION['locationCountry'][$i] = $row['locationCountry'];
            $i++;
        }

        header("Location: my-bookings.php?account=success");
        exit();
    } else {
        header("Location: account.php?error=nobooking");
        exit();
    }
}
mysqli_stmt_close($stmt);
mysqli_close($conn);
exit();