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
        <h2>إدخال بيانات الوظيفة</h2>
        <div class="form-group">
            <label for="job-title">اسم الوظيفة</label>
            <input type="text" id="job-title" placeholder="ادخل اسم الوظيفة">
        </div>
        <div class="form-group">
         
        </div>
        <button>حفظ</button>
        <!-- جدول البيانات -->
        <div class="table-container">
            <h2>بيانات الوظائف</h2>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم الوظيفة</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>مهندس برمجيات</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>مصمم واجهات</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>مسؤول دعم فني</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>