<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME ?></title>
    <link href="<?= siteUrl('favicon.png') ?>" rel="shortcut icon" type="image/png">
    <link rel="stylesheet" href="<?= siteUrl('assets/css/styles.css') ?>"/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"/>
</head>
<body>
<div class="main">
    <div class="head">
        <div class="search-box">
            <input type="text" id="search" placeholder="دنبال کجا می گردی؟" autocomplete="off">
            <div class="clear"></div>
            <div class="search-results" style="display:none"></div>
        </div>
    </div>
    <div class="mapContainer">
        <div id="map"></div>
    </div>
    <img src="<?= siteUrl('assets/img/current.png') ?>" class="currentLoc">
</div>

<div class="modal-overlay" style="display: none;">
    <div class="modal">
        <span class="close">x</span>
        <h3 class="modal-title">ثبت لوکیشن</h3>
        <div class="modal-content">
            <form id='addLocationForm' action="<?= siteUrl('process/addLocation.php') ?>" method="post">
                <div class="field-row">
                    <div class="field-title">مختصات</div>
                    <div class="field-content">
                        <input type="text" name='lat' id="lat-display" readonly>
                        <input type="text" name='lng' id="lng-display" readonly>
                    </div>
                </div>
                <div class="field-row">
                    <div class="field-title">نام مکان</div>
                    <div class="field-content">
                        <input type="text" name="title" id='l-title' placeholder="مثلا: آکادمی سون لرن">
                    </div>
                </div>
                <div class="field-row">
                    <div class="field-title">نوع</div>
                    <div class="field-content">
                        <select name="type" id='l-type'>
                            <?php foreach (locationTypes as $key => $value): ?>
                                <option value="<?= $key ?>"><?= $value ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="field-row">
                    <div class="field-title">ذخیره نهایی</div>
                    <div class="field-content">
                        <input type="submit" value=" ثبت ">
                    </div>
                </div>
                <div class="ajax-result"></div>
            </form>
        </div>
    </div>
</div>

<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
<script src="<?= siteUrl('assets/js/jquery-3.6.3.min.js') ?>"></script>
<script src="<?= siteUrl('assets/js/scripts.js') ?>"></script>
<script>
    $(document).ready(function () {

        <?php if($location): ?>
        L.marker([<?= $location->lat ?>, <?= $location->lng ?>]).addTo(MAP).bindPopup("<?= $location->title ?>").openPopup();
        <?php endif; ?>

        <?php if (!isset($_GET['location_id'])): ?>
            <?php foreach ($verifiedLocations as $location): ?>
                L.marker([<?= $location->lat ?>, <?= $location->lng ?>]).addTo(MAP).bindPopup("<?= $location->title ?>").openPopup();
            <?php endforeach; ?>
        <?php endif; ?>

    });
</script>

</body>
</html>
