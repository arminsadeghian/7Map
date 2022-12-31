<?php

session_set_cookie_params(time() + 86400, "/"); // 24 Hour

session_start();

include __DIR__ . "/../vendor/autoload.php";

include __DIR__ . "/../vendor/larapack/dd/src/helper.php";

try {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->load();
} catch (\Dotenv\Exception\InvalidPathException $e) {
    dd('Create .env file');
}

include __DIR__ . "/../helpers/helpers.php";

include __DIR__ . "/../configs/configs.php";

include __DIR__ . "/constants.php";

try {
    $pdo = new PDO("mysql:dbname=$database_config->db;host={$database_config->host}", $database_config->user, $database_config->pass);
    $pdo->exec("set names utf8;");
} catch (PDOException $e) {
    dd('Connection failed: ' . $e->getMessage());
}

include __DIR__ . "/../libs/lib-users.php";

include __DIR__ . "/../libs/lib-locations.php";
