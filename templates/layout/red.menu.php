<!-- ------------------------------------- -->
<!-- red menu header -->
<!-- ------------------------------------- -->
<nav class="navbar navbar-expand-lg navbar-dark bg-danger roboto-slab">
    <!-- <a class="navbar-brand" href="#">Navbar</a> -->

    <div id="navbar-toggle">
        <button class="btn btn-toggle d-flex align-items-center justify-content-between col-md-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa-1x text-white"><i class="fa fa-bars"></i></span>
        </button>
        <form method="get" class="col-md-7">
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="keyword2" name="keyword" placeholder="Tìm kiếm sản phẩm" onkeypress="doEnter(event,'keyword2');">
                <button type="submit" class="btn btn-danger" onclick="onSearch('keyword2');"><i class="far fa-search"></i></button>
            </div>
        </form>
        <img class="img-fluid logoTTP col-md-4" onerror="this.src='<?= THUMBS ?>/0x200x1/assets/images/noimage.png';" src="<?= THUMBS ?>/0x200x1/<?= UPLOAD_PHOTO_L . $logo['photo'] ?>" />
    </div>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item <?= $source == 'index' ? 'active' : '' ?>">
                <a class="nav-link" href="" title="TRANG CHỦ">TRANG CHỦ <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?= $com == 'gioi-thieu' ? 'active' : '' ?>">
                <a class="nav-link" href="gioi-thieu" title="GIỚI THIỆU">GIỚI THIỆU</a>
            </li>
            <li class="nav-item dropdown <?= $com == 'san-pham' ? 'active' : '' ?>">
                <a class="nav-link dropdown-toggle" href="san-pham" title="SẢN PHẨM" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    SẢN PHẨM
                </a>
                <?php if ($splistmenu) { ?>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <?php foreach ($splistmenu as $c => $cat) { ?>
                            <li class="dropdown-item"><a title="<?= $cat['ten' . $lang] ?>" href="<?= $cat[$sluglang] ?>"><?= $cat['ten' . $lang] ?></a>
                                <?php
                                $spcatmenu = $d->rawQuery("select ten$lang, tenkhongdauvi, id, photo from #_product_cat where type = ? and id_list = ? and hienthi > 0 order by stt,id desc", array('san-pham', $cat['id']));
                                if (count($spcatmenu) > 0) { ?>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <?php foreach ($spcatmenu as $c1 => $cat1) {
                                            $spitemmenu = $d->rawQuery("select ten$lang, tenkhongdauvi, id,photo from #_product_item where type = ? and id_cat = ? and hienthi > 0 order by stt,id desc", array('san-pham', $cat1['id']));
                                        ?>
                                            <li class="dropdown-item"><a title="<?= $cat1['ten' . $lang] ?>" href="<?= $cat1[$sluglang] ?>"><?= $cat1['ten' . $lang] ?></a>
                                                <?php if (count($spitemmenu) > 0) { ?>
                                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                        <?php foreach ($spitemmenu as $c1 => $cat2) { ?>
                                                            <li class="dropdown-item"><a title="<?= $cat2['ten' . $lang] ?>" href="<?= $cat2[$sluglang] ?>"><?= $cat2['ten' . $lang] ?></a></li>
                                                        <?php } ?>
                                                    </ul>
                                                <?php } ?>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } ?>
            </li>
            <!-- dich vu -->
            <li class="nav-item <?= $com == 'dich-vu' ? 'active' : '' ?>">
                <a class="nav-link" href="dich-vu" title="DỊCH VỤ">DỊCH VỤ</a>
            </li>
            <!-- doi tac -->
            <li class="nav-item <?= $com == 'doi-tac' ? 'active' : '' ?>">
                <a class="nav-link" href="doi-tac" title="ĐỐI TÁC">ĐỐI TÁC</a>
            </li>
            <!-- tin tuc -->
            <li class="nav-item <?= $com == 'tin-tuc' ? 'active' : '' ?>">
                <a class="nav-link" href="tin-tuc" title="TIN TỨC">TIN TỨC</a>
            </li>
            <!-- lien he -->
            <li class="nav-item <?= $com == 'lien-he' ? 'active' : '' ?>">
                <a class="nav-link" href="lien-he" title="LIÊN HỆ">LIÊN HỆ</a>
            </li>
            <!-- gio hang -->
            <li class="nav-item <?= $com == 'gio-hang' ? 'active' : '' ?>">
                <a class="nav-link giohang" href="gio-hang" title="GIỎ HÀNG">
                    <img class="img-fluid" src="../assets/images/navbar-menu/shopping-cart32_32.svg" alt="">
                    <span class="badge badge-danger .count-cart">0</span>
                </a>
            </li>
        </ul>
    </div>
</nav>