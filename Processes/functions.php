<?php
//session_start();


//----------------PREVIOUS CODE--------------------
function enrolStudentToClass($studNo, $classNo, $startDate)
{
  include("processConnectDb.php");
  $endDate = runSQLFunction("SELECT DATE_ADD(CURDATE(), INTERVAL 1 YEAR) AS endDate");
  $sql = "INSERT INTO ENROLMENTLINE(StudNo, ClassNo, StartDate, EndDate) "
    . "VALUES($studNo, $classNo, '$startDate', '$endDate')";
  if ($resultSet = mysqli_query($conn, $sql)) {
    return true;
  } //if($resultSet=mysqli_query($conn, $sql))
  else {
    return false;
  }
} //function enrolStudentToClass($studNo, $classNo, $startDate)

function console_log($output, $with_script_tags = true)
{
  $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
    ');';
  if ($with_script_tags) {
    $js_code = '<script>' . $js_code . '</script>';
  }
  echo $js_code;
}

function uploadImageFile()
{
  $target_dir = "../images/userAvatar/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $memberImage = htmlspecialchars(basename($_FILES["fileToUpload"]["name"]));
    echo "<div class='alert alert-primary col-12 mx-auto' role='alert'>";
    echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
    echo "</div>";
    $uploadOk = 1;
  } else {
    $memberImage = "defaultUser.png";
    $uploadOk = 0;
  }
  return $memberImage;
}
