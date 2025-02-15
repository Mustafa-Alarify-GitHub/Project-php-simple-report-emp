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
            <li><a href="/simple-report-emp/pages/dashboard/add-criteria.php"> إضافة معيار جديد</a></li>
            <li><a href="/simple-report-emp/pages/dashboard/add-indicators.php"> أداره الموشرات</a></li>

        </ul>
    </div>


    <div class="container">
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
                    <label for="phone">رقم الهاتف:</label>
                    <input type="tel" id="phone" placeholder="أدخل رقم الهاتف">
                </div>

                <div class="form-group">
                    <label for="salary">الراتب:</label>
                    <input type="number" id="salary" placeholder="أدخل الراتب">
                </div>

                <button type="submit">إضافة الموظف</button>
            </form>

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