<?php

if (isset($_POST['login'])) {


    require 'dbh.php';

    $user = $_POST['username'];
    $password = $_POST['password'];

    if (empty($user) || empty($password)) {
        header("Location: login-form.php?loginerror=emptyfields&user=" . $user);
        exit();
    } else {


        $sql = "SELECT * FROM tc_users WHERE username=?;";

        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {

            header("Location: login-form?loginerror=sqlerror");
            exit();
        } else {



            mysqli_stmt_bind_param($stmt, "s", $user);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {

                $pwdCheck = password_verify($password, $row['password']);
                if ($pwdCheck == false) {

                    header("Location: login-form.php?loginerror=wrongpwd");
                    exit();
                } else if ($pwdCheck == true) {

                    session_start();

                    $_SESSION['id'] = $row['userID'];
                    $_SESSION['uid'] = $row['username'];
                    $_SESSION['mail'] = $row['email'];
                    $_SESSION['fir'] = $row['forename'];
                    $_SESSION['sur'] = $row['surname'];

                    header("Location: index.php?account=success");
                    exit();
                }
            } else {
                header("Location: login-form.php?loginerror=wronguidpwd");
                exit();
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: login-form.php");
    exit();
}