<?php
session_start();
setcookie("name", "", time() - 3600, "/");
session_unset();
session_destroy();
header("Location: ../pages/login.php");
exit();
?>
