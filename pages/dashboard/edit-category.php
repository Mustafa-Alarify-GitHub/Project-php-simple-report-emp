<?php include './layout/sideBar.php'; ?>


<?php
include('../../config/connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sectionName']) && isset($_POST['sectionId'])) {
    $sectionName = $_POST['sectionName'];
    $id = $_POST['sectionId'];
    try {
        $stmt = $con->prepare("UPDATE categorys SET name = :name WHERE id = :id");
        $stmt->bindParam(':name', $sectionName);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $message = "تم تعديل القسم بنجاح.";
        header(header: "refresh:3;url=add-category.php");
    } catch (PDOException $e) {
        $message = "خطأ في التعديل: " . $e->getMessage();
    }
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $con->prepare("SELECT * FROM categorys WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $section = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    die("لم يتم تحديد القسم.");
}
?>



<div class="container">
    <h3>تعديل قسم</h3>

    <form method="POST" action="">
        <input type="hidden" name="sectionId" value="<?php echo $section['id']; ?>">
        <div class="form-group">
            <label for="sectionName">اسم القسم:</label>
            <input type="text" name="sectionName" id="sectionName" value="<?php echo $section['name']; ?>" required>
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