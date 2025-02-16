<?php include './layout/sideBar.php'; ?>


<?php
include('../../config/connect.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $con->prepare("SELECT * FROM employees WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $employee = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    die("لم يتم تحديد الموظف.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['employeeName'])) {
    $employeeName = $_POST['employeeName'];
    $job_id = $_POST['position']; 
    $category_id = $_POST['department']; 
    $year_of_employment = $_POST['year_of_employment'];
    $qualifications = $_POST['qualifications'];
    $experiences = $_POST['experiences'];
    $courses = $_POST['courses'];
    $national_number = $_POST['national_number'];
    $id = $_POST['employeeId'];

    try {
        $stmt = $con->prepare("UPDATE employees SET name = :name, job_id = :job_id, category_id = :category_id, year_of_employment = :year_of_employment, qualifications = :qualifications, experiences = :experiences, courses = :courses, national_number = :national_number WHERE id = :id");
        $stmt->bindParam(':name', $employeeName);
        $stmt->bindParam(':job_id', $job_id); 
        $stmt->bindParam(':category_id', $category_id); 
        $stmt->bindParam(':year_of_employment', $year_of_employment);
        $stmt->bindParam(':qualifications', $qualifications);
        $stmt->bindParam(':experiences', $experiences);
        $stmt->bindParam(':courses', $courses);
        $stmt->bindParam(':national_number', $national_number);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $message = "تم تعديل الموظف بنجاح.";
        header("refresh:3;url=show-emp.php"); 
    } catch (PDOException $e) {
        $message = "خطأ في التعديل: " . $e->getMessage();
    }
}

$positions = $con->query("SELECT * FROM jobs")->fetchAll(PDO::FETCH_ASSOC);
$departments = $con->query("SELECT * FROM categorys")->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <h3>تعديل الموظف</h3>

    <form method="POST" action="">
        <input type="hidden" name="employeeId" value="<?php echo $employee['id']; ?>">
        <div class="form-group">
            <label for="employeeName">اسم الموظف:</label>
            <input type="text" name="employeeName" id="employeeName" value="<?php echo $employee['name']; ?>" required>
        </div>

        <div class="form-group">
            <label for="position">الوظيفة:</label>
            <select name="position" id="position" required>
                <?php foreach ($positions as $pos): ?>
                    <option value="<?php echo $pos['id']; ?>" <?php echo $employee['job_id'] == $pos['id'] ? 'selected' : ''; ?>><?php echo $pos['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="department">القسم:</label>
            <select name="department" id="department" required>
                <?php foreach ($departments as $dept): ?>
                    <option value="<?php echo $dept['id']; ?>" <?php echo $employee['category_id'] == $dept['id'] ? 'selected' : ''; ?>><?php echo $dept['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="year_of_employment">سنة التوظيف:</label>
            <input type="number" name="year_of_employment" id="year_of_employment" value="<?php echo $employee['year_of_employment']; ?>" required>
        </div>

        <div class="form-group">
            <label for="qualifications">المؤهلات:</label>
            <input type="text" name="qualifications" id="qualifications" value="<?php echo $employee['qualifications']; ?>" required>
        </div>

        <div class="form-group">
            <label for="experiences">الخبرات:</label>
            <input type="text" name="experiences" id="experiences" value="<?php echo $employee['experiences']; ?>" required>
        </div>

        <div class="form-group">
            <label for="courses">الدورات:</label>
            <input type="text" name="courses" id="courses" value="<?php echo $employee['courses']; ?>" required>
        </div>

        <div class="form-group">
            <label for="national_number">رقم الوطني:</label>
            <input type="text" name="national_number" id="national_number" value="<?php echo $employee['national_number']; ?>" required>
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