<?php

include __DIR__ . "/../bootstrap/init.php";

if (!isAjaxRequest()) {
    dd("Invalid Request!");
}

// request is Ajax and OK
if (createLocation($_POST)) {
    echo "لوکیشن با موفقیت در دیتابیس ثبت شد و منتظر تایید ادمین است.";
} else {
    echo "مشکلی در ثبت لوکیشن پیش آمده است";
}
