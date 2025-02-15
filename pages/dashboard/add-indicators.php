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
                    <!-- سيتم إضافة البيانات هنا -->
                </tbody>
            </table>
        </div>

</body>

</html>