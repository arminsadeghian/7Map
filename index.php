<?php

require __DIR__ . "/bootstrap/init.php";

$location = false;
if (isset($_GET['location_id']) && is_numeric($_GET['location_id'])) {
    $location = getLocationById($_GET['location_id']);
}

$verifiedLocations = getVerifiedLocations();

include __DIR__ . "/tpl/tpl-index.php";
