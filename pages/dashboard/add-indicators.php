<?php
include "../../config/connect.php";
$stmt = $con->prepare("
SELECT
    pointers.id,
    pointers.name,
    criteria.name AS criteria
FROM
    `pointers`
INNER JOIN criteria ON pointers.criteria_id = criteria.id
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
    <link rel="stylesheet" href="../../style/indicators.css">
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
            <h2>إدارة المؤشرات</h2>

            <div class="form-group">
                <label for="criterion">اختر المعيار:</label>
                <select id="criterion">
                    <option value="">-- اختر المعيار --</option>
                    <option value="1">معيار 1</option>
                    <option value="2">معيار 2</option>
                </select>
            </div>

            <div class="form-group">
                <label for="indicator">اسم المؤشر:</label>
                <input type="text" id="indicator" placeholder="اكتب اسم المؤشر هنا">
            </div>

            <button id="addIndicator">إضافة</button>

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
                    foreach ($data as $key => $value) {
                        echo "<tr>
                                <td>" . $value['id'] . "</td>
                                <td>" . $value['name'] . "</td>
                                <td>" . $value['criteria'] . "</td>
                                <td>
                                    <a href='edit-emp.php?id=" . $value['id'] . "' class='edit'>تعديل</a>
                                    <a href='delete-emp.php?id=" . $value['id'] . "' class='delete'>حذف</a>
                                </td>";
                    }
                    ?>                </tbody>
            </table>
        </div>
        <style>

        
        </style>
</body>

</html>