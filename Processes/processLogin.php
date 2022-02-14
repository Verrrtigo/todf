<?php
session_start();
include("processConnectDb.php");


if (isset($_POST['MEMBER_LOGIN'])) {

  $sql = "SELECT * "
    . "FROM MEMBER "
    . "WHERE UserName = '" . $_POST['userName'] . "'"
    . " AND Password = '" . md5($_POST['password']) . "'";
  // echo $sql;

  $resultSet = mysqli_query($conn, $sql);

  if (mysqli_num_rows($resultSet) > 0) {
    //echo "record found...";
    while ($record = mysqli_fetch_array($resultSet, MYSQLI_ASSOC)) {
      $_SESSION['MEMBER_ID'] = $record['MemberID'];
      $_SESSION['USERNAME'] = $record['UserName'];
      $_SESSION['MEMBER_IMAGE'] = $record['MemberImageFilename'];
      // $_SESSION['PASSWORD'] = md5($record['Password']);
    }

    if (isset($_SESSION['USERNAME'])) {
      //view student time table
      header("Location: ../index.php");
    }
  } //if($result = mysqli_query($conn, $sql))
  else {
    $_SESSION['INCORRECT_CREDENTIALS'] = 'TRUE';
    header("Location: " . $_SERVER['HTTP_REFERER']);
  }
  exit();
}//if(isset($_POST['EMP_LOGIN']))
