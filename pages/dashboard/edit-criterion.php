<?php include './layout/sideBar.php'; ?>

<?php
include('../../config/connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateCriterionName']) && isset($_POST['criterionId'])) {
    $criterionName = $_POST['updateCriterionName'];
    $id = $_POST['criterionId'];
    
    try {
        $stmt = $con->prepare("UPDATE criteria SET name = :name WHERE id = :id");
        $stmt->bindParam(':name', $criterionName);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $message = "تم تعديل المعيار بنجاح.";
        $redirect = true; 

    } catch (PDOException $e) {
        $message = "خطأ في التعديل: " . $e->getMessage();
        $redirect = false; 

    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $con->prepare("SELECT * FROM criteria WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $criterion = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    die("لم يتم تحديد المعيار.");
}
?>

    <script>
        function redirectToAddCriteria() {
            setTimeout(function() {
                window.location.href = 'add-criteria.php';
            }, 3000); 
        }
    </script>
<div class="container">
    <h3>تعديل معيار</h3>

    <form method="POST" action="">
        <input type="hidden" name="criterionId" value="<?php echo $criterion['id']; ?>">
        <div class="form-group">
            <label for="updateCriterionName">اسم المعيار:</label>
            <input type="text" name="updateCriterionName" id="updateCriterionName" value="<?php echo $criterion['name']; ?>" required>
        </div>

        <button type="submit">تحديث</button>
    </form>

    <?php if (isset($message)) { echo "<p>$message</p>"; if ($redirect) { echo "<script>redirectToAddCriteria();</script>"; } } ?></div>

</body>
</html>

<?php
$con = null;
?>