<?php

include __DIR__ . "/bootstrap/init.php";

if (isPostRequest()) {
    if (!login($_POST['username'], $_POST['password'])) {
        message("نام کاربری یا پسورد اشتباه است");
    }
}

if (isLoggedIn()) {
    $params = $_GET ?? [];
//    dd($params);
    $locations = getLocations($params);
    require __DIR__ . "/tpl/tpl-admin.php";
} else {
    require __DIR__ . "/tpl/tpl-admin-auth.php";
}

// delete location
if (isset($_GET['delete_location']) && is_numeric($_GET['delete_location'])) {
    $deletedLocation = deleteLocation($_GET['delete_location']);
    if ($deletedLocation) {
        message('Location Deleted');
    }
}

// logout
if (isset($_GET['logout']) && is_numeric($_GET['logout']) && $_GET['logout'] == 1) {
    logout();
}
