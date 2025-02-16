<?php include './layout/header.php'; ?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>جدول التقييم</title>

</head>
<body>

    <div class="container">
        <!-- شريط البحث -->
        <div class="header">
            <div class="search-box">
                <input type="text" class="search-input" placeholder="اسم الموظف">
                <button class="search-btn">بحث</button>
            </div>
            <div class="user-details">
                <span class="user-info">الاسم</span>
                <span class="user-info">القسم</span>
                <span class="user-info">الوظيفة</span>
            </div>
        </div>

        <!-- جدول البيانات -->
        <table class="data-table">
            <thead class="table-head">
                <tr>
                    <th class="table-header">#</th>
                    <th class="table-header">اسم الشخص الذي قيم</th>
                    <th class="table-header">المعيار</th>
                    <th class="table-header">المؤشرات</th>
                    <th class="table-header">التقييم</th>
                    <th class="table-header">المجموع</th>
                    <th class="table-header">ABC</th>
                    <th class="table-header">التاريخ</th>
                </tr>
            </thead>
            <tbody class="table-body">
                <tr class="table-row">
                    <td class="table-cell">1</td>
                    <td class="table-cell">أحمد علي</td>
                    <td class="table-cell">الجودة</td>
                    <td class="table-cell">الدقة</td>
                    <td class="table-cell">5/5</td>
                    <td class="table-cell">90%</td>
                    <td class="table-cell">A</td>
                    <td class="table-cell">2025-02-16</td>
                </tr>
                <tr class="table-row">
                    <td class="table-cell">2</td>
                    <td class="table-cell">محمد سالم</td>
                    <td class="table-cell">الالتزام</td>
                    <td class="table-cell">الحضور</td>
                    <td class="table-cell">4/5</td>
                    <td class="table-cell">85%</td>
                    <td class="table-cell">B</td>
                    <td class="table-cell">2025-02-15</td>
                </tr>
            </tbody>
        </table>
    </div>

</body>
<style>


.container {
    margin-top: 10px !important;
    width: 90%;
    margin: auto;
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 4px 10px #555;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.search-box {
    display: flex;
    align-items: center;
}

.search-input {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.search-btn {
    background: green;
    color: white;
    border: none;
    padding: 8px 15px;
    margin-right: 5px;
    cursor: pointer;
    border-radius: 4px;
}

.search-btn:hover {
    background: darkgreen;
}

.user-details {
    display: flex;
    gap: 15px;
}

.user-info {
    font-weight: bold;
}

.data-table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    border-radius: 8px;
    overflow: hidden;
}

.table-head {
    background: #116677;
    color: white;
}

.table-header {
    padding: 12px;
    border: 1px solid #ddd;
    text-align: center;
}

.table-body .table-row:nth-child(even) {
    background: #f9f9f9;
}

.table-body .table-row:hover {
    background: #ddd;
}

.table-cell {
    padding: 12px;
    border: 1px solid #ddd;
    text-align: center;
}

</style>
</html>
