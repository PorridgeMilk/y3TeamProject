<?php
/*     Title: 2019SEM2_KV6002BNN01 : Team Project and Professionalism */
/*     Author: Michael Allen */
/*     Date: April 2020 */

if (isset($_POST['update-submit'])) {
  session_start();
  require 'dbh.php';


  $id = $_SESSION['id'];
  $username = $_POST['user'];
  $email = $_POST['email'];
  $password = $_POST['pass'];
  $passwordRepeat = $_POST['pass-repeat'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $address = $_POST["address"];
  $postcode =  $_POST["post"];

  $fname = ucwords($fname);
  $sname = ucwords($sname);
  $address = ucwords($address);
  $postcode = ucwords($postcode);



  if (empty($email) || empty($fname) || empty($lname) || empty($address) || empty($postcode)) {
    header("Location: account.php?error=emptyfields&&email=" . $email . "&fname=" . $fname . "&lname=" . $lname . "&address=" . $address . "&postcode=" . $postcode);
    exit();
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: account.php?error=invalidmail&fname=" . $fname . "&lname=" . $lname . "&address=" . $address . "&postcode=" . $postcode);
    exit();
  } else if (!preg_match("/^[a-zA-Z]*$/", $fname)) {
    header("Location: account.php?error=invalidfir&email=" . $email . "&lname=" . $lname . "&address=" . $address . "&postcode=" . $postcode);
    exit();
  } else if (!preg_match("/^[a-zA-Z]*$/", $lname)) {
    header("Location: account.php?error=invalidsur&email=" . $email . "&fname=" . $fname . "&address=" . $address . "&postcode=" . $postcode);
    exit();
  } else if (!preg_match("/^[a-zA-Z0-9 ]*$/i", $address)) {
    header("Location: ../signup.php?error=invalidaddr&user=" . $username . "&email=" . $email . "&fname=" . $fname . "&lname=" . $lname .  "&post=" . $postcode);
    exit();
  } else if (!preg_match("/^[a-zA-Z0-9 ]*$/i", $postcode)) {
    header("Location: ../signup.php?error=invalidpost&user=" . $username . "&email=" . $email . "&fname=" . $fname . "&lname=" . $lname . "&address=" . $address);
    exit();
  } else {


    $sql =  "UPDATE tc_users SET forename = ?, surname = ?, email = ?, postcode =?, address=? WHERE ID = ?";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {

      header("Location: account.php?error=sqlerror");
      exit();
    } else {

      mysqli_stmt_bind_param($stmt, 'ssssss', $fname, $lname, $email, $postcode, $address, $id);
      mysqli_stmt_execute($stmt);

      session_start();
      $_SESSION['user'] = $username;
      $_SESSION['user'] = $fname;
      $_SESSION['email'] = $email;
      $_SESSION['firstname'] = $fname;
      $_SESSION['surname'] = $lname;
      $_SESSION['address'] = $address;
      $_SESSION['post'] = $postcode;

      header("Location: account.php?account=success");
    }
  }

  mysqli_stmt_close($stmt);
  mysqli_close($conn);
} else {

  header("Location: login-form.php");
  exit();
}