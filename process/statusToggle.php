<?php

include __DIR__ . "/../bootstrap/init.php";

if (!isAjaxRequest()) {
    dd("Invalid Request!");
}

if (is_null($_POST['loc']) or !is_numeric($_POST['loc'])) {
    dd("Invalid Location!");
}

// request is Ajax and OK
echo toggleStatus($_POST['loc']);
