<?php
include "../../config/connect.php";
$stmt = $con->prepare("
        SELECT
            employees.id,
            employees.name,
            employees.year_of_employment,
            employees.qualifications,
            employees.experiences,
            employees.courses,
            employees.national_number,
            jobs.name as job,
            categorys.name as category
        FROM
            `employees`
        INNER JOIN jobs ON employees.job_id = jobs.id
        INNER JOIN categorys ON employees.category_id = categorys.id

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
        <h3>قائمة الموظفين</h3>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>اسم الموظف</th>
                    <th>الوظيفة</th>
                    <th>القسم</th>
                    <th>سنه التوظيف</th>
                    <th>رقم الوطني</th>
                    <th>المؤهلات</th>
                    <th>الخبرات</th>
                    <th>مواتمرات</th>
                    <th>إجراءات</th>
                </tr>
            </thead>
            <tbody id="employeeTable">
                <?php
                foreach ($data as $key => $value) {
                    echo "<tr>
                                <td>" . $value['id'] . "</td>
                                <td>" . $value['name'] . "</td>
                                <td>" . $value['job'] . "</td>
                                <td>" . $value['category'] . "</td>
                                <td>" . $value['year_of_employment'] . "</td>
                                <td>" . $value['national_number'] . "</td>
                                <td>" . $value['qualifications'] . "</td>
                                <td>" . $value['experiences'] . "</td>
                                <td>" . $value['courses'] . "</td>
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