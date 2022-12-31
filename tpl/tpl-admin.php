<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>7Map Panel</title>
    <link href="<?= siteUrl('assets/img/favicon.png') ?>" rel="shortcut icon" type="image/png">
    <link rel="stylesheet" href="<?= siteUrl('assets/css/styles.css') ?>"/>
    <link rel="stylesheet" href="<?= siteUrl('assets/css/admin.css') ?>"/>
</head>
<body>
<div class="main-panel">
    <h1>پنل ادمین <span style="color:#007bec">سون مپ</span></h1>
    <div class="box">
        <a class="statusToggle" href="<?= BASE_URL ?>" target="_blank">🏠</a>
        <a class="statusToggle all" href="<?= BASE_URL ?>admin.php">همه</a>
        <a class="statusToggle active" href="?is_verified=1">فعال</a>
        <a class="statusToggle" href="?is_verified=0">غیرفعال</a>
        <a class="statusToggle" href="?logout=1" style="float:left;">خروج</a>
    </div>
    <div class="box">
        <table class="tabe-locations">
            <thead>
            <tr>
                <th style="width:10%"></th>
                <th style="width:20%">عنوان مکان</th>
                <th style="width:25%" class="text-center">تاریخ ثبت</th>
                <th style="width:10%" class="text-center">lat</th>
                <th style="width:10%" class="text-center">lng</th>
                <th style="width:25%;">وضعیت</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($locations as $location): ?>
                <tr>
                    <td>
                        <a href="?delete_location=<?= $location->id ?>">
                            <img style="width: 20px;height: 20px" src="<?= siteUrl('assets/img/delete-icon.svg') ?>"
                                 alt="">
                        </a>
                    </td>
                    <td><?= $location->title ?></td>
                    <td class="text-center"><?= verta($location->created_at) ?></td>
                    <td class="text-center"><?= $location->lat ?></td>
                    <td class="text-center"><?= $location->lng ?></td>
                    <td>
                        <a href="?location=<?= $location->id ?>">
                            <button class="statusToggle <?= $location->is_verified ? 'active' : '' ?>"
                                    data-loc='<?= $location->id ?>'>
                                <?= $location->is_verified ? 'فعال' : 'غیرفعال' ?>
                            </button>
                        </a>
                        <button class="preview" data-loc='<?= $location->id ?>'>👁️‍🗨️</button>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

<div class="modal-overlay" style="display: none;">
    <div class="modal" style="width: 70%; height: 400px;">
        <span class="close">x</span>
        <div class="modal-content">
            <iframe id='mapWindow' src="#" frameborder="0"></iframe>
        </div>
    </div>
</div>

<script src="<?= siteUrl('assets/js/jquery-3.6.3.min.js') ?>"></script>
<script>
    $(document).ready(function () {
        $('.preview').click(function () {
            $('.modal-overlay').fadeIn();
            $('#mapWindow').attr('src', '<?= BASE_URL ?>?location_id=' + $(this).attr('data-loc'));
        });
        $('.statusToggle').click(function () {
            const btn = $(this);
            $.ajax({
                url: '<?= BASE_URL . 'process/statusToggle.php' ?>',
                method: 'POST',
                data: {
                    loc: btn.attr('data-loc')
                },
                success: function (response) {
                    if (response == 1) {
                        btn.toggleClass('active');
                    }
                }
            });

        });
        $('.modal-overlay .close').click(function () {
            $('.modal-overlay').fadeOut();
        });
    });
</script>

</body>
</html>
