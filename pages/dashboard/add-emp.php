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
            <h2>إدخال بيانات الموظفين</h2>

            <form id="employeeForm">
                <div class="form-group">
                    <label for="employeeName">اسم الموظف:</label>
                    <input type="text" id="employeeName" placeholder="أدخل اسم الموظف">
                </div>

                <div class="form-group">
                    <label for="position">الوظيفة:</label>
                    <select id="position">
                        <option value="">اختر الوظيفة</option>
                        <option value="مدير">مدير</option>
                        <option value="موظف">موظف</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="department">القسم:</label>
                    <select id="department">
                        <option value="">اختر القسم</option>
                        <option value="المبيعات">المبيعات</option>
                        <option value="الموارد البشرية">الموارد البشرية</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="email">سنه التوظيف:</label>
                    <input type="number" id="email" placeholder="2000">
                </div>

                <div class="form-group">
                    <label for="phone">الموهلات:</label>
                    <input type="text" id="phone" placeholder="أدخل رقم الهاتف">
                </div>
                <div class="form-group">
                    <label for="">الخبرات:</label>
                    <input type="text" id="" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">الدورات:</label>
                    <input type="text" id="" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">ورش وموتمرات:</label>
                    <input type="text" id="" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">رقم الوطني:</label>
                    <input type="text" id="" placeholder="">
                </div>
          

             

                <button type="submit">إضافة الموظف</button>
            </form>

         
        </div>
    </div>

</body>

</html>