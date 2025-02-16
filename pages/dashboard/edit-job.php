<?php include './layout/sideBar.php'; ?>

<?php
include('../../config/connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['jobName']) && isset($_POST['jobId'])) {
    $jobName = $_POST['jobName'];
    $id = $_POST['jobId'];
    try {
        $stmt = $con->prepare("UPDATE jobs SET name = :name WHERE id = :id");
        $stmt->bindParam(':name', $jobName);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $message = "تم تعديل الوظيفة بنجاح.";
        header("refresh:3;url=add-jop.php"); 
    } catch (PDOException $e) {
        $message = "خطأ في التعديل: " . $e->getMessage();
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $con->prepare("SELECT * FROM jobs WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $job = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    die("لم يتم تحديد الوظيفة.");
}
?>


<div class="container">
    <h2>تعديل وظيفة</h2>

    <form method="POST" action="">
        <input type="hidden" name="jobId" value="<?php echo $job['id']; ?>">
        <div class="form-group">
            <label for="job-title">اسم الوظيفة</label>
            <input type="text" name="jobName" id="job-title" value="<?php echo $job['name']; ?>" required>
        </div>
        <button type="submit">تحديث</button>
    </form>

    <?php if (isset($message)) echo "<p>$message</p>"; ?>
</div>

</body>
</html>

<?php
$con = null;
?>