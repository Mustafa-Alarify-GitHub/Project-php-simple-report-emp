<?php
session_start();
if (!isset($_SESSION["name"]) && !isset($_COOKIE["name"])) {
    header("Location: ../pages/login.php");
    exit();
}

$username = $_SESSION["name"] ?? $_COOKIE["name"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/header.css">
    <link rel="stylesheet" href="../style/global.css">
    <link rel="stylesheet" href="../style/index.css">
    <title>Document</title>
</head>

<body>
    <nav class="nav">
        <div class="btn-home">
            <a href="../pages/index.php" class="link">
                <img src="../assets/images/logo.png" alt="" width="120 ">
            </a>
            <a href="../pages/index.php" class="link">الرئيسيه</a>
        </div>
        <h5  class="link"><?php echo $username  ?></h5>
        <a href="../controller/logout.php" class="link link-logout">تسجيل الخروج</a>
        <a href="http://localhost/Project-php-simple-report-emp/pages/dashboard/add-criteria.php" class="link link-logout">لوحه التحكم</a>
    </nav>
</body>

</html>