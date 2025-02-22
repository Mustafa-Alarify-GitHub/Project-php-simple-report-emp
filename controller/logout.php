<?php
session_start();
setcookie("name", "", time() - 3600, "/");
setcookie("id", "", time() - 3600, "/");
setcookie("job_id", "", time() - 3600, "/");
setcookie("category_id", "", time() - 3600, "/");
session_unset();
session_destroy();
header("Location: ../pages/login.php");
exit();
