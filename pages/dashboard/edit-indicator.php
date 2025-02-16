<?php include './layout/sideBar.php'; ?>
<?php 
include('../../config/connect.php'); 

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id == '') {
        die("لم يتم تحديد معرف المؤشر.");
    }
    $stmt = $con->prepare("SELECT * FROM pointers WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $indicator = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$indicator) {
        die("المؤشر غير موجود.");
    }
} else {
    die("لم يتم تحديد المؤشر.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['indicatorName'])) {
    $indicatorName = trim($_POST['indicatorName']);
    $criterionId = $_POST['criterionId'];

    if (!empty($indicatorName) && !empty($criterionId)) {
        try {
            $stmt = $con->prepare("UPDATE pointers SET criteria_id = :criteria_id, name = :name WHERE id = :id");
            $stmt->bindParam(':criteria_id', $criterionId);
            $stmt->bindParam(':name', $indicatorName);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $message = "تم تعديل المؤشر بنجاح.";
            header("Location: add-indicators.php"); 
            exit;
        } catch (PDOException $e) {
            $message = "خطأ في التعديل: " . $e->getMessage();
        }
    } else {
        $message = "يرجى ملء جميع الحقول.";
    }
}

$criteria = $con->query("SELECT * FROM criteria")->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <h2>تعديل المؤشر</h2>

    <?php if (isset($message)) echo "<p>$message</p>"; ?>

    <form method="POST" action="">
        <div class="form-group">
            <label for="criterion">اختر المعيار:</label>
            <select id="criterion" name="criterionId" required>
                <option value="">-- اختر المعيار --</option>
                <?php foreach ($criteria as $criterion): ?>
                    <option value="<?php echo $criterion['id']; ?>" <?php echo $indicator['criteria_id'] == $criterion['id'] ? 'selected' : ''; ?>>
                        <?php echo $criterion['name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="indicator">اسم المؤشر:</label>
            <input type="text" name="indicatorName" id="indicator" value="<?php echo $indicator['name']; ?>" required>
        </div>

        <button type="submit">تحديث</button>
    </form>
</div>

</body>
</html>

<?php
$con = null;
?>