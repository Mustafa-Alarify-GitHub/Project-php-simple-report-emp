
<?php include './layout/sideBar.php'; ?>

<?php
include '../../config/connect.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['criterionName'])) {
    $criterionName = $_POST['criterionName'];
    
    try {
        $stmt = $con->prepare("INSERT INTO criteria (name) VALUES (:name)");
        $stmt->bindParam(':name', $criterionName);
        $stmt->execute();
        $message = "معيار جديد تم إضافته بنجاح.";
    } catch (PDOException $e) {
        $message = "خطأ في الإضافة: " . $e->getMessage();
    }
}

if (isset($_POST['deleteId'])) {
    $id = $_POST['deleteId'];
    try {
        $stmt = $con->prepare("DELETE FROM criteria WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $message = "تم حذف المعيار بنجاح.";
    } catch (PDOException $e) {
        $message = "خطأ في الحذف: " . $e->getMessage();
    }
}








$searchTerm = '';
if (isset($_POST['searchTerm'])) {
    $searchTerm = trim($_POST['searchTerm']);
    $sql = "SELECT * FROM criteria WHERE name LIKE :searchTerm";
    $stmt = $con->prepare($sql);
    $stmt->bindValue(':searchTerm', '%' . $searchTerm . '%');
} else {
    $sql = "SELECT * FROM criteria";
    $stmt = $con->prepare($sql);
}

$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
       
<div class="container">
    <h3>إضافة معيار جديد</h3>


    <form method="POST" action="">
        <div class="form-group">
            <label for="criterionName">اسم المعيار:</label>
            <input type="text" name="criterionName" id="criterionName" placeholder="اكتب اسم المعيار هنا" required>
        </div>

        <button type="submit">إضافة</button>
    </form>

    <?php if (isset($message)) echo "<p>$message</p>"; ?>

        <h3>بحث عن معيار</h3>
    <form method="POST" action="">
        <input type="text" name="searchTerm" placeholder="ابحث عن معيار..." value="<?php echo htmlspecialchars($searchTerm); ?>">
        <button type="submit">بحث</button>
    </form>

    <h3>المعايير المضافة</h3>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>اسم المعيار</th>
                <th>إجراءات</th>
            </tr>
        </thead>
<tbody id="criteriaTable">
    <?php
    if ($results) {
        $index = 1;
        foreach ($results as $row) {
            echo "<tr>
                    <td>{$index}</td>
                    <td>{$row['name']}</td>
                    <td>
                        <div style='display: flex; justify-content: center; gap: 10px;'>
                            <form method='POST' action='' style='display:inline;'>
                                <input type='hidden' name='deleteId' value='{$row['id']}'>
                                <button class='btna' type='submit' onclick='return confirm(\"هل أنت متأكد من حذف هذا المعيار؟\");'>حذف</button>
                            </form>
                            <form method='GET' action='edit-criterion.php' style='display:inline;'>
                                <input type='hidden' name='id' value='{$row['id']}'>
                                <button class='btna' type='submit'>تعديل</button>
                            </form>
                        </div>
                    </td>
                  </tr>";
            $index++;
        }
    } else {
        echo "<tr><td colspan='3'>لا توجد معايير مضافة بعد.</td></tr>";
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

