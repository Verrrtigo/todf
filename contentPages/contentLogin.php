<h4 class="text-center my-3">Member Login</h4>

<form class="col-12 col-md-6 mx-auto" action="Processes/processLogin.php" method="post">
    <?php
    if (isset($_SESSION['INCORRECT_CREDENTIALS'])) {
        echo "<div class='alert alert-danger col-12 mx-auto' role='alert'>";
        echo "Incorrect Credentials. Please try again.";
        echo "</div>";
        unset($_SESSION['INCORRECT_CREDENTIALS']);
    }
    ?>
    <div class="form-group mb-3">
        <label for="userName">User Name</label>
        <input type="text" class="form-control" id="userName" name="userName">
    </div>

    <div class="form-group mb-3">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>

    <button type="submit" name="MEMBER_LOGIN" class="col-12 btn btn-primary mb-3">
        <strong>Login</strong>
    </button>
    <hr>
    <p class="text-center">New user? <span><a href="register.php">Register</a></span></p>
</form>