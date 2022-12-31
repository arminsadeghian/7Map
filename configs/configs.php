<?php

$database_config = (object)[
    'host' => $_ENV['DB_HOST'],
    'user' => $_ENV['DB_USER'],
    'pass' => $_ENV['DB_PASS'],
    'db' => $_ENV['DB_NAME']
];

$admins = [
    // user: admin => pass: admin
    $_ENV['LOGIN_USERNAME'] => $_ENV['LOGIN_PASSWORD'],
];
