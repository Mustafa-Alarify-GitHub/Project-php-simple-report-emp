<?php include './layout/sideBar.php'; ?>
<?php
include('../../config/connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['employeeName'])) {
    $employeeName = $_POST['employeeName'];
    $position = $_POST['position'];
    $department = $_POST['department'];
    $yearOfEmployment = $_POST['yearOfEmployment'];
    // $phone = $_POST['phone'];
    $qualifications = $_POST['qualifications'];
    $experiences = $_POST['experiences'];
    $courses = $_POST['courses'];
    // $conferences = $_POST['conferences'];
    $nationalId = $_POST['nationalId'];
    $pass = $_POST['pass'];

    try {
        $stmt = $con->prepare("INSERT INTO employees (name, job_id, category_id, year_of_employment, qualifications, experiences, courses, national_number,`password`) VALUES (:name, :job_id, :category_id, :year_of_employment,:qualifications, :experiences, :courses, :national_number ,:password)");
        $stmt->bindParam(':name', $employeeName);
        $stmt->bindParam(':job_id', $position);
        $stmt->bindParam(':category_id', $department);
        $stmt->bindParam(':year_of_employment', $yearOfEmployment);
        // $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':qualifications', $qualifications);
        $stmt->bindParam(':experiences', $experiences);
        $stmt->bindParam(':courses', $courses);
        // $stmt->bindParam(':conferences', $conferences);
        $stmt->bindParam(':national_number', $nationalId);
        $stmt->bindParam(':password', $pass);
        $stmt->execute();
        $message = "تم إضافة الموظف بنجاح.";
    } catch (PDOException $e) {
        $message = "خطأ في الإضافة: " . $e->getMessage();
    }
}

$positions = $con->query("SELECT * FROM jobs")->fetchAll(PDO::FETCH_ASSOC);

$departments = $con->query("SELECT * FROM categorys")->fetchAll(PDO::FETCH_ASSOC);
?>


<link rel="stylesheet" href="../../style/indicators.css">


<div class="container">
    <h2>إدخال بيانات الموظفين</h2>

    <form method="POST" action="">
        <div class="form-group">
            <label for="employeeName">اسم الموظف:</label>
            <input type="text" name="employeeName" id="employeeName" placeholder="أدخل اسم الموظف" required>
        </div>
        <div class="form-group">
            <label for="employeeName">كلمه المرور:</label>
            <input type="password" name="pass" id="employeeName" placeholder="أدخل كلمه المرور" required>
        </div>

        <div class="form-group">
            <label for="position">الوظيفة:</label>
            <select name="position" id="position" required>
                <option value="">اختر الوظيفة</option>
                <?php foreach ($positions as $pos): ?>
                    <option value="<?php echo $pos['id']; ?>"><?php echo $pos['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="department">القسم:</label>
            <select name="department" id="department" required>
                <option value="">اختر القسم</option>
                <?php foreach ($departments as $dept): ?>
                    <option value="<?php echo $dept['id']; ?>"><?php echo $dept['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="yearOfEmployment">سنة التوظيف:</label>
            <input type="number" name="yearOfEmployment" id="yearOfEmployment" placeholder="2000" required>
        </div>



        <div class="form-group">
            <label for="qualifications">المؤهلات:</label>
            <input type="text" name="qualifications" id="qualifications" placeholder="أدخل المؤهلات">
        </div>

        <div class="form-group">
            <label for="experiences">الخبرات:</label>
            <input type="text" name="experiences" id="experiences" placeholder="أدخل الخبرات">
        </div>

        <div class="form-group">
            <label for="courses">الدورات:</label>
            <input type="text" name="courses" id="courses" placeholder="أدخل الدورات">
        </div>

        <div class="form-group">
            <label for="conferences">ورش وموتمرات:</label>
            <input type="text" name="conferences" id="conferences" placeholder="أدخل ورش وموتمرات">
        </div>

        <div class="form-group">
            <label for="nationalId">رقم الوطني:</label>
            <input type="text" name="nationalId" id="nationalId" placeholder="أدخل الرقم الوطني">
        </div>

        <button type="submit">إضافة الموظف</button>
    </form>

    <?php if (isset($message)) echo "<p>$message</p>"; ?>
</div>

</body>

</html>

<?php
$con = null;
?>