<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>7Map Panel</title>
    <link href="<?= siteUrl('assets/img/favicon.png') ?>" rel="shortcut icon" type="image/png">
    <link rel="stylesheet" href="<?= siteUrl('assets/css/styles.css') ?>"/>
    <link rel="stylesheet" href="<?= siteUrl('assets/css/admin.auth.css') ?>"/>
</head>
<body>
<div class="main-panel">
    <h1>ورود به پنل ادمین <span style="color:#007bec">سون مپ</span></h1>
    <div class="box">
        <form action="<?= siteUrl('admin.php') ?>" method="post">
            <input type="text" name="username" placeholder="Username" autocomplete="off"><br>
            <input type="password" name="password" placeholder="Password" autocomplete="off"><br>
            <input type="submit" value="Login" style="text-align: center">
        </form>
    </div>
</div>
</body>
</html>
