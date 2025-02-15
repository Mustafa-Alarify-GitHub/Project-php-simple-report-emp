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
                        <th>البريد الإلكتروني</th>
                        <th>الهاتف</th>
                        <th>الراتب</th>
                        <th>إجراءات</th>
                    </tr>
                </thead>
                <tbody id="employeeTable">
                    <!-- سيتم إضافة البيانات هنا -->
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>