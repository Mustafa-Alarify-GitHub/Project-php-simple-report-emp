
<?php include './layout/sideBar.php'; ?>
<?php 
include('../../config/connect.php'); 


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['indicatorName'])) {
    $indicatorName = $_POST['indicatorName'];
    $criterionId = $_POST['criterionId'];

    try {
        $stmt = $con->prepare("INSERT INTO pointers (criteria_id, name) VALUES (:criteria_id, :name)");
        $stmt->bindParam(':criteria_id', $criterionId);
        $stmt->bindParam(':name', $indicatorName);
        $stmt->execute();
        $message = "تم إضافة المؤشر بنجاح.";
    } catch (PDOException $e) {
        $message = "خطأ في الإضافة: " . $e->getMessage();
    }
}
if (isset($_POST['deleteIndicatorId'])) {

$indicatorId = $_POST['deleteIndicatorId'];

try {

$stmt = $con->prepare("DELETE FROM pointers WHERE id = :id");

$stmt->bindParam(':id', $indicatorId);

$stmt->execute();

$message = "تم حذف المؤشر بنجاح.";

} catch (PDOException $e) {

$message = "خطأ في الحذف: " . $e->getMessage();

}

}
$searchTerm = '';
if (isset($_POST['searchTerm'])) {
    $searchTerm = trim($_POST['searchTerm']);
    $stmt = $con->prepare("SELECT i.*, c.name AS criteria_name FROM pointers i JOIN criteria c ON i.criteria_id = c.id WHERE i.name LIKE :searchTerm");
    $stmt->bindValue(':searchTerm', '%' . $searchTerm . '%');
} else {
    $stmt = $con->query("SELECT i.*, c.name AS criteria_name FROM pointers i JOIN criteria c ON i.criteria_id = c.id");
}

$stmt->execute();
$indicators = $stmt->fetchAll(PDO::FETCH_ASSOC);

$criteria = $con->query("SELECT * FROM criteria")->fetchAll(PDO::FETCH_ASSOC);
?>
<link rel="stylesheet" href="../../style/indicators.css">

<div class="container">
    <h2>إدارة المؤشرات</h2>
    <?php if (isset($message)) echo "<p>$message</p>"; ?>


    <form method="POST" action="">
        <div class="form-group">
            <label for="criterion">اختر المعيار:</label>
            <select id="criterion" name="criterionId" required>
                <option value="">-- اختر المعيار --</option>
                <?php foreach ($criteria as $criterion): ?>
                    <option value="<?php echo $criterion['id']; ?>"><?php echo $criterion['name']; ?></option>
                <?php endforeach; ?>
            </select>

        </div>



        <div class="form-group">
            <label for="indicator">اسم المؤشر:</label>
            <input type="text" name="indicatorName" id="indicator" placeholder="اكتب اسم المؤشر هنا" required>
        </div>


        <button type="submit">إضافة</button>
    </form>
    <h3>بحث عن مؤشر</h3>
    <form method="POST" action="">
        <input type="text" name="searchTerm" placeholder="ابحث عن مؤشر..." value="<?php echo htmlspecialchars($searchTerm); ?>">
        <button type="submit">بحث</button>
    </form>
    <h3>قائمة المؤشرات:</h3>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>اسم المعيار</th>
                <th>اسم المؤشر</th>
                <th>إجراءات</th>
            </tr>
        </thead>
        <tbody id="indicatorsTable">
            <?php
            if ($indicators) {
                $index = 1;
                foreach ($indicators as $indicator) {
                    echo "<tr>
                            <td>{$index}</td>
                            <td>{$indicator['criteria_name']}</td>
                            <td>{$indicator['name']}</td>
                            <td>
                                <form method='POST' action='' style='display:inline;'>
                                    <input type='hidden' name='deleteIndicatorId' value='{$indicator['id']}'>
                                    <button type='submit' onclick='return confirm(\"هل أنت متأكد من حذف هذا المؤشر؟\");'>حذف</button>
                                </form>
                                <form method='GET' action='edit-indicator.php' style='display:inline;'>
                                    <input type='hidden' name='id' value='{$indicator['id']}'>
                                    <button type='submit'>تعديل</button>
                                </form>
                            </td>
                          </tr>";
                    $index++;
                }
            } else {
                echo "<tr><td colspan='4'>لا توجد مؤشرات.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>

<?php
$con = null;
?>