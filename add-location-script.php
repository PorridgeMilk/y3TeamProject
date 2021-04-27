<?php
/*     Title: 2019SEM2_KV6002BNN01 : Team Project and Professionalism */
/*     Author: Michael Allen */
/*     Date: April 2020 */
if (isset($_POST['add-location'])) {


    require 'dbh.php';


    $country = $_POST['country'];
    $city = $_POST['city'];

    $country = preg_replace("/\s+/", " ", $country);
    $city = preg_replace("/\s+/", " ", $city);

    $country = ucwords($country);
    $city = ucwords($city);




    if (empty($city) || empty($country)) {
        header("Location: add-location.php?error=emptyfields&city=" . $city . "&country=" . $country);
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9 ]*$/i", $country)) {
        header("Location: add-location.php?error=invalid&city=" . $city);
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9 ]*$/i", $city)) {
        header("Location: add-location.php?error=invalid&country=" . $country);
        exit();
    } else {


        $sql = "SELECT locationCity FROM tc_locations WHERE locationCity=?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: add-location.php?error=sqlerror");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $city);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        $resultCount = mysqli_stmt_num_rows($stmt);
        mysqli_stmt_close($stmt);
        if ($resultCount > 0) {
            header("Location: add-location.php?error=citytaken&country=" . $country);
            exit();
        }




        $sql = "INSERT INTO tc_locations (locationCity, locationCountry) VALUES (?, ?)";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: add-location.php?error=sqlerror");
            exit();
        } else {

            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "ss", $city, $country);
            mysqli_stmt_execute($stmt);

            header("Location: add-location.php?account=success");
            exit();
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {

    header("Location: login-form.php");
    exit();
}
