
<?php
session_start();
if (!isset($_SESSION["name"]) && !isset($_COOKIE["name"])) {
    header("Location: ../../pages/login.php");
    exit();
}

$username = $_SESSION["name"] ?? $_COOKIE["name"];
?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة معيار جديد</title>
    <link rel="stylesheet" href="../../style/addCriteria.css">
    <link rel="stylesheet" href="../../style/sidbar.css">
    <!-- <link rel="stylesheet" href="../../style/indicators.css"> -->

</head>

<body>

    <div class="sidebar">
        <h2>لوحة التحكم</h2>
        <ul>
            <li><a href="/Project-php-simple-report-emp/pages/dashboard/add-criteria.php"> إضافة معيار جديد</a></li>
            <li><a href="/Project-php-simple-report-emp/pages/dashboard/add-indicators.php"> أداره الموشرات</a></li>
            <li><a href="/Project-php-simple-report-emp/pages/dashboard/show-emp.php"> قائمة الموظفين</a></li>
            <li><a href="/Project-php-simple-report-emp/pages/dashboard/add-emp.php"> أضافه الموظفين</a></li>
            <li><a href="/Project-php-simple-report-emp/pages/dashboard/add-jop.php"> أضافه الوظيفة</a></li>
            <li><a href="/Project-php-simple-report-emp/pages/dashboard/add-category.php"> أضافه قسم </a></li>
            <a style="color: aliceblue;" href="../../controller/logout.php" class="link link-logout">تسجيل الخروج</a>
       
        </ul>
    </div>