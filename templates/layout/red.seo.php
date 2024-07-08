<!-- cắt trang html thành từng khu vực -->
<!-- section header -->
<!-- |- header top chao mung + email info-->
<!-- |- header body -->
<!-- |-|-row logo cong ty - ô tìm kiếm  - số điện thoại-->
<!-- |-|- row danh mục - menu - slider-->
<!-- |-|- row sản phẩm nổi bật-->
<section id="red_seo">
    <div class="container">
        <div class="row mt-4 align-items-center">

            <div class="col-md-8">
                <p class="text-uppercase text-primary m-0 text-center">Công ty thiết bị công nghiệp Toàn Thịnh Phát xin kính chào quý khách</p>
            </div>
            <div class="col-md-4">
                <div class="row align-items-center text-center">
                    <div class="col-md-2">
                        <p class="text-primary m-0">Email:</p>
                    </div>
                    <div class="col-md-4">
                        <p class="text-primary m-0"><?= $optsetting['email'] ?></p>
                    </div>
                    <div class="col-md-6 border-left">
                        <!-- logo mang xa hoi -->
                        <?php foreach ($social1 as $v) { ?>
                            <a href="<?= $v['link'] ?>" class="ftmxh" target="_blank" title="<?= $v['ten' . $lang] ?>"><img onerror="this.src='<?= THUMBS ?>/30x30x2/assets/images/noimage.png';" src="<?= THUMBS ?>/0x30x2/<?= UPLOAD_PHOTO_L . $v['photo'] ?>" alt="<?= $v['ten' . $lang] ?>" title="<?= $v['ten' . $lang] ?>" /></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>