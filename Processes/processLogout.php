<?php
session_start();
unset($_SESSION['USERNAME']);
unset($_SESSION['MEMBER_ID']);
unset($_SESSION['MEMBER_IMAGE']);
session_unset();
session_destroy();

header("Location: http://localhost/todf");
exit();
