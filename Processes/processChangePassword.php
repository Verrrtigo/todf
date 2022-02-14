<?php
session_start();
include("processConnectDb.php");

if (isset($_POST['CHANGE_PASSWORD'])) {

  $sqlConfirmPassword = "SELECT * "
    . "FROM MEMBER "
    . "WHERE MemberID = " . $_GET['UserID']
    . " AND Password = '" . md5($_POST['oldPassword']) . "'";

  $resultSet = mysqli_query($conn, $sqlConfirmPassword);

  if (mysqli_query($conn, $sqlConfirmPassword)) {
    if (mysqli_num_rows($resultSet) > 0) {
      $sqlChangePassword = "UPDATE MEMBER"
        . " SET Member.Password = '" . md5($_POST['newPassword2'])
        . "' WHERE Member.MemberID = " . $_GET['UserID'];
      if (mysqli_query($conn, $sqlChangePassword)) {
        header("Location: ../index.php?UserID=" . $_GET['UserID'] . "&changePasswordSuccess=true");
      };
    } else {
      header("Location: ../changePassword.php?UserID=" . $_GET['UserID'] . "&changePasswordSuccess=false");
      exit();
    }
  }
}
exit();
