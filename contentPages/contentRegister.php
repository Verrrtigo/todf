<h4 class="text-center my-3">Member Registration</h4>

<form enctype="multipart/form-data" class="col-12 col-md-6 mx-auto" action="Processes/processRegister.php" onsubmit="return validatePassword()" method="post">
  <?php
  // if (isset($_SESSION['MEMBER_REGISTERED'])) {
  //   echo "<div class='alert alert-info col-12 mx-auto' role='alert'>";
  //   echo "Registration successful. Your username is: " . $_SESSION['USERNAME'] . ".";
  //   echo "</div>";
  //   unset($_SESSION['MEMBER_REGISTERED']);
  // }
  ?>
  <div class="form-group mb-3">
    <input type="text" class="form-control" name="lastName" placeholder="Enter Last Name" required>
  </div>

  <div class="form-group mb-3">
    <input type="text" class="form-control" name="firstName" placeholder="Enter First Name">
  </div>

  <div class="form-group mb-3">
    <input type="email" class="form-control" name="emailAddress" placeholder="Enter Email" required>
  </div>

  <div class="form-group mb-3">
    <input type="text" class="form-control" name="userName" placeholder="Enter User Name" required>
  </div>

  <div class="form-group mb-3">
    <input type="password" class="form-control regPassword" name="password" placeholder="Enter Password" required>
  </div>

  <div class="form-group mb-3">
    <input type="password" class="form-control regConfirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
  </div>

  <div class="form-group mb-3 file-upload-wrapper ">
    <label for="fileUpload" class="form-label">Upload Avatar Image</label>
    <input type="file" name="fileToUpload" id="fileUpload" />
  </div>


  <button type="submit" name="MEMBER_REGISTER" class="col-12 btn btn-primary mb-3">
    <strong>REGISTER</strong>
  </button>
</form>