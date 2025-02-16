<?php
session_start();
require_once "../config/connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if ($username == "admin" && $password == "admin") {
        header("Location: ../pages/dashboard/add-category.php");
    } else
        $stmt = $con->prepare("SELECT * FROM employees WHERE name = ? and password = ? ");
    $stmt->execute([$username, $password]);
    $count  = $stmt->rowCount();

    if ($count > 0) {

        setcookie("name", $username, time() + (7 * 24 * 60 * 60), "/");
        $_SESSION["username"] = $username;

        header("Location: ../pages/index.php");
        exit();
    } else {
        echo "<script>alert('كلمة المرور غير صحيحة!'); window.location.href='../pages/login.php';</script>";
    }
} else {
    echo "<script>alert('المستخدم غير موجود!'); window.location.href='../pages/login.php';</script>";
}
