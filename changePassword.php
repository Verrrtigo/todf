<?php
$pageContent = "contentPages/contentChangePassword.php";
include("template.php");
?>
<script type="text/javascript">
    const thisContainer = document.querySelector(".container");
    document.querySelector(".pageTitle").textContent = "Home";

    <?php
    if (!isset($_GET['passwordChangeSuccess'])) {
        echo "<div class='alert alert-info col-12 mx-auto fade' role='alert'>";
        echo "Password change failed. Your old password is incorrect.";
        echo "</div>";
        exit();
    }
    ?>
</script>