
<?php include './layout/sideBar.php'; ?>
<?php 
include('../../config/connect.php'); 


if (isset($_POST['deleteId'])) {
    $id = $_POST['deleteId'];
    try {
        $stmt = $con->prepare("DELETE FROM employees WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $message = "تم حذف الموظف بنجاح.";
    } catch (PDOException $e) {
        $message = "خطأ في الحذف: " . $e->getMessage();
    }
}

$searchTerm = '';
if (isset($_POST['searchTerm'])) {
    $searchTerm = trim($_POST['searchTerm']);
    $sql = "SELECT e.*, j.name AS position_name, d.name AS category_name FROM employees e 
            JOIN jobs j ON e.job_id = j.id 
            JOIN categorys d ON e.category_id = d.id 
            WHERE e.name LIKE :searchTerm";
    
    $stmt = $con->prepare($sql);
    $stmt->bindValue(':searchTerm', '%' . $searchTerm . '%');
} else {
    $sql = "SELECT e.*, j.name AS position_name, d.name AS category_name FROM employees e 
            JOIN jobs j ON e.job_id = j.id 
            JOIN categorys d ON e.category_id = d.id";
    
    $stmt = $con->prepare($sql);
}


$stmt->execute();
$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>



<link rel="stylesheet" href="../../style/indicators.css">
    <div class="container">

            <h3>قائمة الموظفين</h3>
    <?php if (isset($message)) echo "<p>$message</p>"; ?>
    <h4>بحث عن موظف</h4>
    <form method="POST" action="">
        <input type="text" name="searchTerm" placeholder="ابحث عن موظف..." value="<?php echo htmlspecialchars($searchTerm); ?>">
        <button type="submit">بحث</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>اسم الموظف</th>
                <th>الوظيفة</th>
                <th>القسم</th>
                <th> سنة التوظيف</th>
                <th>المؤهلات</th>
                <th>الخبرات</th>
                <th>الدورات</th>
                <th>رقم الوطني</th>
                <th>إجراءات</th>
            </tr>
        </thead>
        <tbody id="employeeTable">
            <?php
            if ($employees) {
                $index = 1;
                foreach ($employees as $employee) {
                    echo "<tr>
                            <td>{$index}</td>
                            <td>{$employee['name']}</td>
                            <td>{$employee['position_name']}</td>
                            <td>{$employee['category_name']}</td>
                            <td>{$employee['year_of_employment']}</td>
                            <td>{$employee['qualifications']}</td>
                            <td>{$employee['experiences']}</td>
                            <td>{$employee['courses']}</td>
                            <td>{$employee['national_number']}</td>
                            <td>
                                <form method='POST' action='' style='display:inline;'>
                                    <input type='hidden' name='deleteId' value='{$employee['id']}'>
                                    <button class='delete-btn' type='submit' onclick='return confirm(\"هل أنت متأكد من حذف هذا الموظف؟\");'>حذف</button>
                                </form>
                                <form method='GET' action='edit-emp.php?id={$employee['id']}' style='display:inline;'>
                                    <button type='button' onclick='window.location=\"edit-emp.php?id={$employee['id']}\"'>تعديل</button>
                                </form>
                            </td>
                          </tr>";
                    $index++;
                }
            } else {
                echo "<tr><td colspan='8'>لا توجد بيانات للموظفين.</td></tr>";
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