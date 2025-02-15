<?php include './layout/header.php'; ?>

<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة وصف للموظف</title>
    <link rel="stylesheet" href="../style/showReport.css">
</head>

<body>

    <div class="form-container">
        <h2>إضافة وصف للموظف</h2>

        <label>اختر نوع التقييم:</label>
        <div class="radio-group">
            <label><input type="radio" checked class="inpRadio" name="evaluation" value="personal"> تقييم شخصي</label>
            <label><input type="radio" class="inpRadio" name="evaluation" value="max"> تقييم الحد الأعلى</label>
            <label><input type="radio" class="inpRadio" name="evaluation" value="min"> تقييم الحد الأدنى</label>
        </div>

        <label for="employee">اختر الموظف:</label>
        <select id="employee" disabled  >
            <option value="">-- اختر الموظف --</option>
            <option value="1">محمد</option>
            <option value="2">أحمد</option>
            <option value="3">فاطمة</option>
        </select>

        <label for="description">الوصف:</label>
        <textarea id="description" placeholder="اكتب الوصف هنا"></textarea>

        <button type="submit">حفظ</button>
    </div>
    <a href="./report.php">test</a>

</body>
<script src="../js/toggleInputSelect.js"></script>
</html>