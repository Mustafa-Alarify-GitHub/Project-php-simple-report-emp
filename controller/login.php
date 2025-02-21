<?php
session_start();
require_once "../config/connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if ($username == "admin" && $password == "admin") {
        header("Location: ../pages/dashboard/add-category.php");
        setcookie("name", "ِAdmin", time() + (7 * 24 * 60 * 60), "/");
        setcookie("isAdmin", true, time() + (7 * 24 * 60 * 60), "/");
        $_SESSION["name"] = "ِAdmin";
        $_SESSION["isAdmin"] = true;
    } else
    $stmt = $con->prepare("SELECT * FROM employees WHERE name = ? and password = ? ");
    $stmt->execute([$username, $password]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $count  = $stmt->rowCount();

    if ($count > 0) {

        setcookie("id", $user["id"], time() + (7 * 24 * 60 * 60), "/");
        setcookie("name", $user["name"], time() + (7 * 24 * 60 * 60), "/");
        setcookie("job_id", $user["job_id"], time() + (7 * 24 * 60 * 60), "/");
        setcookie("category_id", $user["category_id"], time() + (7 * 24 * 60 * 60), "/");
    
        $_SESSION["id"] = $user["id"];
        $_SESSION["name"] = $username;
        $_SESSION["job_id"] = $user["job_id"];
        $_SESSION["category_id"] = $user["category_id"];

        header("Location: ../pages/index.php");
        exit();
    } else {
        echo "<script>alert('كلمة المرور غير صحيحة!'); window.location.href='../pages/login.php';</script>";
    }
} else {
    echo "<script>alert('المستخدم غير موجود!'); window.location.href='../pages/login.php';</script>";
}
