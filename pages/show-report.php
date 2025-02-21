<?php include './layout/header.php'; ?>
<?php
require_once "../config/connect.php";

$employees = [];
$evaluation = $_POST["evaluation"] ?? "no";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["evaluation"])) {
    $category_id = $_SESSION["category_id"] ?? null;
    $job_id = $_SESSION["job_id"] ?? null;

    if ($category_id && $job_id && $evaluation !== "no") {
        try {
            if ($evaluation === "max") {
                $stmt = $con->prepare("SELECT * FROM employees WHERE category_id = ? AND job_id = ?");
                $stmt->execute([$category_id, $job_id + 1]);
            } elseif ($evaluation === "min") {
                $stmt = $con->prepare("SELECT * FROM employees WHERE category_id = ? AND job_id = ?");
                $stmt->execute([$category_id, $job_id - 1]);
            }
            $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "خطأ: " . $e->getMessage();
        }
    }
}

// save
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["description"])) {
    $reviewer = $_SESSION["id"];
    $reviewed_emp = $_POST["employee"] ?? $_SESSION["id"];
    $description = trim($_POST["description"]);

    if ( !empty($description)) {
        try {
            $stmt = $con->prepare("INSERT INTO emp_evaluation (reviewer, reviewed_emp, description) VALUES (?, ?, ?)");
            $stmt->execute([$reviewer, $reviewed_emp, $description]);

            echo "<script>alert('✅ تم حفظ التقييم بنجاح!'); window.location.href = './report.php?reviewed_emp=" . $reviewed_emp . "';</script>";
        } catch (PDOException $e) {
            echo "❌ خطأ: " . $e->getMessage();
        }
    } else {
        echo "<script>alert('⚠️ يرجى اختيار الموظف وكتابة الوصف!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة وصف للموظف</title>
    <link rel="stylesheet" href="../style/showReport.css">
</head>

<body>

    <div class="form-container">
        <h2>إضافة وصف للموظف</h2>

        <label>اختر نوع التقييم:</label>
        <div class="radio-group">
            <form method="POST" action="">
                <label><input type="radio" <?php echo $evaluation === "no" ? "checked" : "" ?> class="inpRadio" name="evaluation" value="no"> تقييم شخصي</label>
                <label><input type="radio" <?php echo $evaluation === "max" ? "checked" : "" ?> class="inpRadio" name="evaluation" value="max"> تقييم الحد الأعلى</label>
                <label><input type="radio" <?php echo $evaluation === "min" ? "checked" : "" ?> class="inpRadio" name="evaluation" value="min"> تقييم الحد الأدنى</label>
                <button style="width: 100px; margin: auto 0;" type="submit">تأكيد</button>
            </form>
        </div>

        <form method="POST" action="">
            <label for="employee">اختر الموظف:</label>
            <select id="employee" name="employee" <?php echo empty($employees) ? 'disabled' : ''; ?>>
                <option value="">-- اختر الموظف --</option>
                <?php foreach ($employees as $employee) : ?>
                    <option value="<?php echo $employee['id']; ?>"><?php echo $employee['name']; ?></option>
                <?php endforeach; ?>
            </select>

            <label for="description">الوصف:</label>
            <textarea id="description" name="description" placeholder="اكتب الوصف هنا"></textarea>

            <button type="submit">حفظ</button>
        </form>
    </div>
    <a href="./report.php">عرض التقارير</a>

</body>
<script src="../js/toggleInputSelect.js"></script>

</html>