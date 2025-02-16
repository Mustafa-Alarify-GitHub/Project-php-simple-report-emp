
<?php include './layout/sideBar.php'; ?>
<?php 
include('../../config/connect.php'); 


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['jobName'])) {
    $jobName = $_POST['jobName'];
    try {
        $stmt = $con->prepare("INSERT INTO jobs (name) VALUES (:name)");
        $stmt->bindParam(':name', $jobName);
        $stmt->execute();
        $message = "تم إضافة الوظيفة بنجاح.";
    } catch (PDOException $e) {
        $message = "خطأ في الإضافة: " . $e->getMessage();
    }
}

if (isset($_POST['deleteId'])) {
    $id = $_POST['deleteId'];
    try {
        $stmt = $con->prepare("DELETE FROM jobs WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $message = "تم حذف الوظيفة بنجاح.";
    } catch (PDOException $e) {
        $message = "خطأ في الحذف: " . $e->getMessage();
    }
}

$searchTerm = '';
if (isset($_POST['searchTerm'])) {
    $searchTerm = trim($_POST['searchTerm']);
    $stmt = $con->prepare("SELECT * FROM jobs WHERE name LIKE :searchTerm");
    $stmt->bindValue(':searchTerm', '%' . $searchTerm . '%');
} else {
    $stmt = $con->query("SELECT * FROM jobs");
}

$stmt->execute();
$jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>



<link rel="stylesheet" href="../../style/indicators.css">

    <div class="container">
        <h2>إدخال بيانات الوظيفة</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="job-title">اسم الوظيفة</label>
            <input type="text" name="jobName" id="job-title" placeholder="ادخل اسم الوظيفة هنا" required>
        </div>

        <button type="submit">حفظ</button>
    </form>

    <?php if (isset($message)) echo "<p>$message</p>"; ?>
    <h2>بحث عن وظيفة</h2>
    <form method="POST" action="">
        <input type="text" name="searchTerm" placeholder="ابحث عن وظيفة..." value="<?php echo htmlspecialchars($searchTerm); ?>">
        <button type="submit">بحث</button>
    </form>


        <div class="table-container">
            <h2>بيانات الوظائف</h2>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم الوظيفة</th>
                          <th>إجراءات</th>
                    </tr>
                </thead>
            <tbody>
                <?php
                if ($jobs) {
                    $index = 1;
                    foreach ($jobs as $row) {
                        echo "<tr>
                                <td>{$index}</td>
                                <td>{$row['name']}</td>
                                <td>
                                    <form method='POST' action='' style='display:inline;'>
                                        <input type='hidden' name='deleteId' value='{$row['id']}'>
                                        <button class='delete-btn' type='submit' onclick='return confirm(\"هل أنت متأكد من حذف هذه الوظيفة؟\");'>حذف</button>
                                    </form>
                                    <form method='GET' action='edit-job.php?id={$row['id']}' style='display:inline;'>
                                        <button type='button' onclick='window.location=\"edit-job.php?id={$row['id']}\"'>تعديل</button>
                                    </form>
                                </td>
                              </tr>";
                        $index++;
                    }
                } else {
                    echo "<tr><td colspan='3'>لا توجد وظائف مضافة بعد.</td></tr>";
                }
                ?>
            </tbody>

            </table>
        </div>
    </div>

</body>

</html>

<?php
$con = null;
?>