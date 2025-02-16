
<?php include './layout/sideBar.php'; ?>
<?php
include('../../config/connect.php'); 


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sectionName'])) {
    $sectionName = $_POST['sectionName'];
    try {
        $stmt = $con->prepare("INSERT INTO categorys (name) VALUES (:name)");
        $stmt->bindParam(':name', $sectionName);
        $stmt->execute();
        $message = "تم إضافة القسم بنجاح.";
    } catch (PDOException $e) {
        $message = "خطأ في الإضافة: " . $e->getMessage();
    }
}

if (isset($_POST['deleteId'])) {
    $id = $_POST['deleteId'];
    try {
        $stmt = $con->prepare("DELETE FROM categorys WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $message = "تم حذف القسم بنجاح.";
    } catch (PDOException $e) {
        $message = "خطأ في الحذف: " . $e->getMessage();
    }
}

$searchTerm = '';
if (isset($_POST['searchTerm'])) {
    $searchTerm = trim($_POST['searchTerm']);
    $sql = "SELECT * FROM categorys WHERE name LIKE :searchTerm";
    $stmt = $con->prepare($sql);
    $stmt->bindValue(':searchTerm', '%' . $searchTerm . '%');
} else {
    $sql = "SELECT * FROM categorys";
    $stmt = $con->prepare($sql);
}

$stmt->execute();
$sections = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <h3>إضافة قسم جديد</h3>

    <form method="POST" action="">
        <div class="form-group">
            <label for="sectionName">اسم القسم:</label>
            <input type="text" name="sectionName" id="sectionName" placeholder="اكتب اسم القسم هنا" required>
        </div>
        <button type="submit">إضافة</button>
    </form>

    <?php if (isset($message)) echo "<p>$message</p>"; ?>


    <h3>بحث عن قسم</h3>
    <form method="POST" action="">
        <input type="text" name="searchTerm" placeholder="ابحث عن قسم..." value="<?php echo htmlspecialchars($searchTerm); ?>">
        <button type="submit">بحث</button>
    </form>

    <h3>جميع الأقسام</h3>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>اسم القسم</th>
                <th>إجراءات</th>
            </tr>
        </thead>
        <tbody id="criteriaTable">
            <?php
            if ($sections) {
                $index = 1;
                foreach ($sections as $row) {
                    echo "<tr>
                            <td>{$index}</td>
                            <td>{$row['name']}</td>
                            <td>
                                <form method='POST' action='' style='display:inline;'>
                                    <input type='hidden' name='deleteId' value='{$row['id']}'>
                                    <button class='delete-btn' type='submit' onclick='return confirm(\"هل أنت متأكد من حذف هذا القسم؟\");'>حذف</button>
                                </form>
                                <form method='GET' action='edit-category.php?id={$row['id']}' style='display:inline;'>
                                    <button type='button' onclick='window.location=\"edit-category.php?id={$row['id']}\"'>تعديل</button>
                                </form>
                            </td>
                          </tr>";
                    $index++;
                }
            } else {
                echo "<tr><td colspan='3'>لا توجد أقسام مضافة بعد.</td></tr>";
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