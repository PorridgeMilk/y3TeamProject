<?php

if (isset($_POST['sign-up'])) {


    require 'dbh.php';


    $username = $_POST['user'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $passwordRepeat = $_POST['pass-repeat'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];

    $fname = ucwords($fname);
    $sname = ucwords($sname);

    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat) || empty($fname) || empty($lname)) {
        header("Location: login-form.php?error=emptyfields&user=" . $username . "&email=" . $email . "&fname=" . $fname . "&lname=" . $lname);
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: login-form?error=invaliduid&email="  . $email . "&fname=" . $fname . "&lname=" . $lname);
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: login-form.php?error=invalidmail&user="  . $username . "&fname=" . $fname . "&lname=" . $lname);
        exit();
    } else if ($password !== $passwordRepeat) {
        header("Location: login-form.php?error=passwordcheck&user=" . $username . "&email=" . $email . "&fname=" . $fname . "&lname=" . $lname);
        exit();
    } else if (!preg_match("/^[a-zA-Z]*$/", $fname)) {
        header("Location: login-form.php?error=invalidfir&user=" . $username . "&email=" . $email . "&lname=" . $lname);
        exit();
    } else if (!preg_match("/^[a-zA-Z]*$/", $lname)) {
        header("Location: login-form.php?error=invalidsur&user=" . $username . "&email=" . $email . "&fname=" . $lname);
        exit();
    } else {

        $sql = "SELECT username FROM tc_users WHERE username=?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: login-form.php?error=sqlerror");
            exit();
        } else {

            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            $resultCount = mysqli_stmt_num_rows($stmt);
            mysqli_stmt_close($stmt);
            if ($resultCount > 0) {
                header("Location: login-form.php?error=usertaken&email=" . $email . "&fname=" . $fname . "&lname=" . $lname);
                exit();
            }

            $sql = "SELECT email FROM tc_users WHERE email=?;";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: login-form.php?error=sqlerror");
                exit();
            }

            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCount = mysqli_stmt_num_rows($stmt);

            mysqli_stmt_close($stmt);
            if ($resultCount > 0) {
                header("Location: login-form.php?error=emailtaken&uid=" . $username . "&fir=" . $fname . "&sur=" . $sname);
                exit();
            } else {

                $sql = "INSERT INTO tc_users (username, forename, surname, email, password) VALUES (?, ?, ?, ?, ?);";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: login-form.php?error=sqlerror");
                    exit();
                } else {

                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sssss", $username, $fname, $lname, $email, $hashedPwd);
                    mysqli_stmt_execute($stmt);

                    header("Location: login-form.php?account=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {

    header("Location: login-form.php?error=test");
    exit();
}