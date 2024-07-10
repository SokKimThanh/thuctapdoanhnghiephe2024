<section>
    <div class="container">
        <div class="mt-4 text-center">
            <!-- 2. Chi tiết từng phần: -->
            <!-- a. Hiển thị tiêu đề:-->
            <h3 class="text-danger  text-uppercase"><?= (@$title_cat != '') ? $title_cat : @$title_crumb ?></h3>
            <!-- ba hình thoi và đường kẻ ngang -->
            <div class="square-area">
                <div class="rotated-square">
                    <div class="line"></div>
                </div>
            </div>
        </div>
        <div class="doitac">
            <!-- đối tác -->
            <?php if (isset($dsDoiTac) && count($dsDoiTac) > 0) { ?>
                <?php foreach ($dsDoiTac as $v) { ?>
                    <img class="img-fluid" onerror="this.src='<?= THUMBS ?>/240x200x1/assets/images/noimage.png';" 
                    src="<?= UPLOAD_PHOTO_L . $v['photo'] ?>" alt="<?= $v['ten' . $lang] ?>" title="<?= $v['ten' . $lang] ?>" />
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</section>