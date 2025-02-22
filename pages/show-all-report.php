<?php
include './layout/header.php';
require_once "../config/connect.php";

// الحصول على الـ id من الـ cookies
$reviewerId = isset($_COOKIE['id']) ? $_COOKIE['id'] : null;

if ($reviewerId) {
    $query = "
       SELECT
        ee.id AS evaluation_id,
        reviewed_emp.name AS reviewed_name,  
        reviewer_emp.name AS reviewer_name,  
        crit.name AS criteria_name,
        ptr.name AS pointer_name,
        er.rating,
        er.relative_importance,
        ee.description,
        DATE(ee.id) AS review_date
    FROM
        employee_reviews er
    INNER JOIN emp_evaluation ee ON
        er.id_emp_evaluation = ee.id
    INNER JOIN employees reviewer_emp ON
        ee.reviewer = reviewer_emp.id
    INNER JOIN pointers ptr ON
        er.pointer = ptr.id
    INNER JOIN criteria crit ON
        ptr.criteria_id = crit.id
    INNER JOIN employees reviewed_emp ON
        ee.reviewed_emp = reviewed_emp.id
    WHERE
        reviewer_emp.id = :reviewerId
    ORDER BY
        ee.id DESC;
    ";

    // تحضير الاستعلام
    $stmt = $con->prepare($query);
    $stmt->bindParam(':reviewerId', $reviewerId, PDO::PARAM_INT);
    $stmt->execute();

    // جلب النتائج
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $message = "لا يوجد معرف للمراجع في الـ cookies.";
}
?>

<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>جدول التقييم</title>
    <link rel="stylesheet" href="../style/showAllRe.css">
</head>

<body>

    <div class="container">
        <div class="header">
            <div class="search-box">
                <input type="text" class="search-input" placeholder="اسم الموظف">
                <button class="search-btn">بحث</button>
            </div>
        </div>

        <table class="data-table">
            <thead class="table-head">
                <tr>
                    <th class="table-header">#</th>
                    <th class="table-header">اسم الموظف الذي تم تقييمه</th>
                    <th class="table-header">المعيار</th>
                    <th class="table-header">المؤشرات</th>
                    <th class="table-header">التقييم</th>
                    <th class="table-header">النسبة</th>
                    <th class="table-header">التقيم</th>
                </tr>
            </thead>
            <tbody class="table-body">
                <?php
                if (isset($result) && count($result) > 0) {
                    foreach ($result as $row) {
                        echo "<tr class='table-row'>";
                        echo "<td class='table-cell'>{$row['evaluation_id']}</td>";
                        echo "<td class='table-cell'>{$row['reviewed_name']}</td>";
                        echo "<td class='table-cell'>{$row['criteria_name']}</td>";
                        echo "<td class='table-cell'>{$row['pointer_name']}</td>";
                        echo "<td class='table-cell'>{$row['rating']}/5</td>";
                        echo "<td class='table-cell'>{$row['relative_importance']}</td>";
                        echo "<td class='table-cell'>";
                        switch ($row['rating']) {
                            case 5:
                                echo "A";
                                break;
                            case 4:
                                echo "B";
                                break;
                            case 3:
                                echo "C";
                                break;
                            case 2:
                                echo "D";
                                break;
                            case 1:
                            case 0:
                                echo "F";
                                break;
                            default:
                                echo "غير محدد";
                        }
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7' class='table-cell'>لا توجد بيانات</td></tr>";
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
