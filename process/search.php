<?php

include __DIR__ . "/../bootstrap/init.php";

usleep(500000);

if (!isAjaxRequest()) {
    dd("Invalid Request!");
}

$keyword = $_POST['keyword'];
if (!isset($keyword) or empty($keyword)) {
    dd("نتیجه ای یافت نشد ...");
}

$locations = getLocations(['keyword' => $keyword]);
if (sizeof($locations) == 0) {
    dd("نتیجه ای یافت نشد ...");
}

foreach ($locations as $loc) {
    echo "<a href='" . BASE_URL . "?location_id=$loc->id'><div class='result-item' data-lat='$loc->lat' data-lng='$loc->lng' data-loc='$loc->id'>
        <span class='loc-type'>" . locationTypes[$loc->type] . "</span>
        <span class='loc-title'>$loc->title</span>
    </div></a>";
}
