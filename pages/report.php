<?php include './layout/header.php'; ?>
<?php
require_once "../config/connect.php";

$criteria = $con->query("SELECT * FROM criteria")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["criteria_id"])) {
    $criteria_id = $_POST["criteria_id"];

    $stmt = $con->prepare("SELECT * FROM pointers WHERE criteria_id = :criteria_id");
    $stmt->bindParam(':criteria_id', $criteria_id, PDO::PARAM_INT);
    $stmt->execute();
    $pointers = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $pointers = [];
}

?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نموذج التقييم</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="../style/report.css">
</head>

<body>

    <div class="container">
        <h3>نموذج التقييم</h3>

        <form method="POST" class="filters">
            <label for="filter">المعيار:</label>
            <select id="filter" name="criteria_id">
                <?php foreach ($criteria as $pos): ?>
                    <option value="<?php echo $pos["id"]; ?>"><?php echo $pos['name']; ?></option>
                <?php endforeach; ?>
            </select>

            <button type="submit" id="search">بحث عن المؤشرات</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>اختيار</th>
                    <th>المؤشر</th>
                    <th>الأهمية النسبية</th>
                    <th>التقييم</th>
                    <th>النتائج</th>
                </tr>
            </thead>
            <tbody id="table-body">
                <?php if (!empty($pointers)): ?>
                    <?php foreach ($pointers as $pointer): ?>
                        <tr>
                            <td><input type="checkbox"  class="pointer-checkbox"></td>
                            <td><?php echo htmlspecialchars($pointer['name']); ?></td>
                            <td>
                                <select class="evaluation_1" disabled>
                                    <option value="0">0</option>
                                    <option value="0.1">.1</option>
                                    <option value="0.2">.2</option>
                                    <option value="0.3">.3</option>
                                    <option value="0.4">.4</option>
                                    <option value="0.5">.5</option>
                                    <option value="0.6">.6</option>
                                    <option value="0.7">.7</option>
                                    <option value="0.8">.8</option>
                                    <option value="0.9">.9</option>
                                    <option value="1">1</option>
                                </select>
                            </td>

                            <td>
                                <select class="evaluation" disabled>
                                    <option value="5">5</option>
                                    <option value="4">4</option>
                                    <option value="3">3</option>
                                    <option value="2">2</option>
                                    <option value="1">1</option>
                                    <option value="0">0</option>
                                    <option value="-1">-1</option>
                                    <option value="-2">-2</option>
                                    <option value="-3">-3</option>
                                    <option value="-4">-4</option>
                                    <option value="-5">-5</option>
                                </select>
                            </td>
                            <td class="result">0</td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">لا توجد بيانات لعرضها.</td>
                    </tr>
                <?php endif; ?>
            </tbody>

        </table>

        <div class="total">
            <strong>المجموع الكلي:</strong> <span id="total-result">0</span>
        </div>

        <button id="save">حفظ التقييم</button>
    </div>

    <script src="script.js"></script>
</body>

<script src="../js/openSelectPointers.js"></script>
<script src="../js/totalPointers.js"></script>


</html>