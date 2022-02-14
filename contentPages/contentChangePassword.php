<?php
if (!isset($_SESSION['MEMBER_ID'])) {
    echo "<center><font face='Verdana' size='2' color=red>
  Sorry, Please login and use this page </font></center>";
    exit();
}
$userID = $_GET['UserID'];
?>

<h4 class="text-center my-3">Change Password</h4>

<?php
if (isset($_GET['changePasswordSuccess']) && $_GET['changePasswordSuccess'] == "false") {
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>";
    echo "Password change failed. Your old password is incorrect.";
    echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
    echo "</div>";
}
?>

<form class="col-12 col-md-6 mx-auto" action="Processes/ProcessChangePassword.php?UserID=<?php echo $userID ?>" onsubmit="return validatePassword()" method="post">
    <div class="form-group mb-3">
        <label for="oldPassword">Current Password</label>
        <input type="password" class="form-control" id="oldPassword" name="oldPassword">
    </div>

    <div class="form-group mb-3">
        <label for="newPassword1">Password:</label>
        <input type="password" class="form-control regPassword" id="newPassword1" name="newPassword1">
    </div>

    <div class="form-group mb-3">
        <label for="newPassword2">Confirm Password:</label>
        <input type="password" class="form-control regConfirmPassword" id="newPassword2" name="newPassword2">
    </div>

    <button type="submit" name="CHANGE_PASSWORD" class="col-12 btn btn-primary mb-3">
        <strong>Change Password</strong>
    </button>
    <hr>
</form>