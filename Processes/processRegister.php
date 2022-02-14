<?php
session_start();
include("processConnectDb.php");
include("functions.php");

if (isset($_POST['MEMBER_REGISTER'])) {
  $lastName = $_POST['lastName'];
  $firstName = $_POST['firstName'];
  $emailAddress = $_POST['emailAddress'];
  $userName = $_POST['userName'];
  $password = $_POST['password'];
  $tempImg = $_FILES["fileToUpload"]["tmp_name"];


  $memberImage = uploadImageFile();

  $sql = "INSERT INTO MEMBER(LastName, FirstName, EmailAddress, UserName, Password, MemberImageFileName) "
    . "VALUES('$lastName', '$firstName', '$emailAddress', '$userName', md5('$password'), '$memberImage')";

  if ($resultSet = mysqli_query($conn, $sql)) {
    $_SESSION['MEMBER_ID'] = mysqli_insert_id($conn);
    $_SESSION['MEMBER_REGISTERED'] = "TRUE";
    $_SESSION['USERNAME'] = $userName;
    $_SESSION['MEMBER_IMAGE'] = $memberImage;
  }
  header("Location: ../index.php");
  exit();
}
