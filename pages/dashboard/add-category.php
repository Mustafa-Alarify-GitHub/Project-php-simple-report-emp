<?php
include "../../config/connect.php";
$stmt = $con->prepare("
      SELECT * FROM categorys 

");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة معيار جديد</title>
    <link rel="stylesheet" href="../../style/addCriteria.css">
    <link rel="stylesheet" href="../../style/sidbar.css">

</head>

<body>

    <div class="sidebar">
        <h2>لوحة التحكم</h2>
        <ul>
            <li><a href="../"> الرئيسية</a></li>
            <li><a href="/Project-php-simple-report-emp/pages/dashboard/add-criteria.php"> إضافة معيار جديد</a></li>
            <li><a href="/Project-php-simple-report-emp/pages/dashboard/add-indicators.php"> أداره الموشرات</a></li>
            <li><a href="/Project-php-simple-report-emp/pages/dashboard/show-emp.php"> قائمة الموظفين</a></li>
            <li><a href="/Project-php-simple-report-emp/pages/dashboard/add-emp.php"> أضافه الموظفين</a></li>
            <li><a href="/Project-php-simple-report-emp/pages/dashboard/add-jop.php"> أضافه الوظيفة</a></li>
            <li><a href="/Project-php-simple-report-emp/pages/dashboard/add-category.php"> أضافه قسم </a></li>
        </ul>
    </div>


    <div class="container">
        <h3>إضافة قسم جديد</h3>

        <div class="form-group">
            <label for="criterionName">اسم القسم:</label>
            <input type="text" id="criterionName" placeholder="اكتب اسم المعيار هنا">
        </div>

        <button id="addCriterion">إضافة</button>

        <h3>جميع الاقسام</h3>
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
                foreach ($data as $key => $value) {
                    echo "<tr>
                                <td>" . $value['id'] . "</td>
                                <td>" . $value['name'] . "</td>
                                <td>
                                    <a href='edit-emp.php?id=" . $value['id'] . "' class='edit'>تعديل</a>
                                    <a href='delete-emp.php?id=" . $value['id'] . "' class='delete'>حذف</a>
                                </td>";
                }
                ?>
            </tbody>
        </table>
    </div>
    </div>

</body>

</html>