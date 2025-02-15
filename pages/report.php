<?php include './layout/header.php'; ?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نموذج التقييم</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="../style/report.css">

</head>

<body>

    <div class="container">
        <h3>نموذج التقييم</h3>

        <div class="filters">
            <label for="filter">المعيار:</label>
            <select id="filter">
                <option>الانتظام الزمني</option>
            </select>

            <button id="search">بحث عن المؤشرات</button>
        </div>

        <table>
            <thead>
                <tr>
                    <th>اختيار</th>
                    <th>المؤشر</th>
                    <th>الأهمية النسبية</th>
                    <th>التقييم</th>
                    <th>النتائج</th>
                </tr>
            </thead>
            <tbody id="table-body">
                <tr>
                    <td><input type="checkbox"></td>
                    <td>الإلتزام بمسيرات الدوام و الحضور و الانصراف</td>
                    <td>0.1</td>
                    <td>
                        <select class="evaluation">
                            <option value="5">5-</option>
                            <option value="4">4</option>
                            <option value="3">3</option>
                            <option value="2">2</option>
                            <option value="1">1</option>
                        </select>
                    </td>
                    <td class="result">0</td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>الإلتزام بمسيرات الدوام و الحضور و الانصراف</td>
                    <td>0.1</td>
                    <td>
                        <select class="evaluation">
                            <option value="5">5-</option>
                            <option value="4">4</option>
                            <option value="3">3</option>
                            <option value="2">2</option>
                            <option value="1">1</option>
                        </select>
                    </td>
                    <td class="result">0</td>
                </tr>
            </tbody>
        </table>

        <div class="total">
            <strong>المجموع الكلي:</strong> <span id="total-result">0</span>
        </div>

        <button id="save">حفظ التقييم</button>
    </div>

    <script src="script.js"></script>
</body>

</html>