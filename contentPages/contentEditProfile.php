<?php
if (!isset($_SESSION['MEMBER_ID'])) {
  echo "<center><font face='Verdana' size='2' color=red>
  Sorry, Please login and use this page </font></center>";
  exit;
}

include("Processes/processConnectDb.php");

$sql = "SELECT * "
  . "FROM MEMBER "
  . "WHERE MemberID = " . $_GET['UserID'];

$resultSet = mysqli_query($conn, $sql);

if (mysqli_num_rows($resultSet) > 0) {
  while ($record = mysqli_fetch_array($resultSet, MYSQLI_ASSOC)) {
    $lastName = $record['LastName'];
    $firstName = $record['FirstName'];
    $emailAddress = $record['EmailAddress'];
    $memberImage = $record['MemberImageFilename'];
  }
} ?>

<h4 class="text-center my-3">Edit profile</h4>


<form enctype="multipart/form-data" class="col-12 col-md-6 mx-auto" action="Processes/processEditProfile.php?UserID=<?php echo $_GET['UserID']; ?>&memberImage=<?php echo $memberImage; ?>" method="post">
  <div class="form-group mb-3">
    <input type="text" class="form-control" name="lastName" placeholder="Enter Last Name" value="<?php echo $lastName ?>">
  </div>
  <div class="form-group mb-3">
    <input type="text" class="form-control" name="firstName" placeholder="Enter First Name" value="<?php echo $firstName ?>">
  </div>
  <div class="form-group mb-3">
    <input type="email" class="form-control" name="emailAddress" placeholder="Enter Email" value="<?php echo $emailAddress ?>">
  </div>
  <div class="form-group mb-3 file-upload-wrapper ">
    <label for="fileUpload" class="form-label">Upload Avatar Image</label>
    <input type="file" name="fileToUpload" id="fileUpload" />
  </div>
  <button type="submit" name="EDIT_PROFILE" class="col-12 btn btn-primary mb-3">
    <strong>EDIT PROFILE</strong>
  </button>
</form>