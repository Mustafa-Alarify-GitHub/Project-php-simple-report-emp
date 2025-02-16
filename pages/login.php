
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول</title>
    <link rel="stylesheet" href="../style/login.css">
</head>
<body>
    <div class="screen">
        <div class="screen-login">
            <h5 class="title-login">قم بتسجيل الدخول</h5>
            <form action="../controller/login.php" method="post" class="from-login">
                <label for="username">أسم المستخدم</label>
                <input type="text" name="username" id="username" required>

                <label for="password">كلمه المرور</label>
                <input type="password" name="password" id="password" required>

                <button class="btn-add" type="submit">الدخول</button>
            </form>
        </div>
    </div>
</body>
</html>
