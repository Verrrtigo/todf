<?php
session_start();
include("processConnectDb.php");
include("functions.php");

if (isset($_POST['EDIT_PROFILE'])) {

  $sql = "UPDATE MEMBER"
    . " SET Member.LastName = '" . $_POST['lastName']
    . "', Member.FirstName = '" . $_POST['firstName']
    . "', Member.EmailAddress = '" . $_POST['emailAddress']
    . "', Member.MemberImageFilename = '" . $_GET["memberImage"]
    . "' WHERE Member.MemberID = " . $_GET['UserID'];

  echo $sql;
  if ($resultSet = mysqli_query($conn, $sql)) {
    header("Location: ../index.php?editProfileSuccess=true");
  } else {
    exit();
  }
}
exit();
