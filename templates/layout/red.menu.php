<!-- ------------------------------------- -->
<!-- red menu header -->
<!-- ------------------------------------- -->
<style>
    #navbarMobile {
        transform: translateX(-101%);
        position: fixed;
        inset: 0;
        height: 100vh;
        width: 75vw;
        z-index: 94035;
        /* z-index 94035 trên 1 lớp của social-logo (z-index: 94034) trong trang chi tiết sản phẩm */
        background-color: #fff;
    }

    .show-mobile {
        transform: translateX(0) !important;
        transition: transform 500ms ease-in-out;
    }

    .collapseMobile .navbarCloseButtonMobile {
        background-color: #ffffff09;
        border: 1px solid #ffffff03;
        font-size: 1rem;
        color: #fff;
        border-radius: 50%;
        width: 35px;
        height: 35px;
        text-align: center;
        margin-top: 4px;
        margin-right: 0;
        margin-left: -5px;
    }

    .collapseMobile .titleContainer {
        height: 3.4rem;
        display: flex;
        /* lập trình css bộ webkit flex */
        align-items: center;
        padding-left: 1.44rem;
    }

    .collapseMobile .titleMobile {
        margin-left: 0px;
    }

    /* mặc định ban đầu không hiển thị nút dropdown togglebutton và danh mục  */
    #dropdownToggleButton,
    #navbarOpenButtonMobile {
        display: none;
    }

    /* khi màn hình đạt tối đa là dưới 500px thì hiển thị dropdown button và gán cứng vị trí đầu cho navigation */
    @media screen and (max-width: 500px) {
        .navbar {
            position: fixed;
            z-index: 2;
            right: 0;
            left: 0;
        }

        #navbarOpenButtonMobile {
            display: block;
        }

        #dropdownToggleButton {
            display: block;
        }
    }

    /* khi màn hình đạt 500px trở lên thì sẽ ẩn đi nút toggle button dropdown menu và hiện thanh menu navigation */
    @media screen and (min-width: 500px) {
        #navbarNavDropdown ul.navbar-nav {
            flex-direction: row !important;
        }

        #dropdownToggleButton {
            display: none !important;
        }

        #navbarNavDropdown {
            display: block;
        }
    }
</style>
<div class="collapseMobile" id="navbarMobile">
    <div class="titleContainer bg-danger">
        <button class="navbarCloseButtonMobile"><span><i class="fa fa-bars"></i></span></button>
        <h6 class="text-white roboto-slab text-center text-uppercase titleMobile">Danh mục sản phẩm</h6>
    </div>
    <ul class="danhmuc-body">
        <?php foreach ($danhmuc_list as $key => $v) { ?>
            <li>
                <a href="<?= $v['tenkhongdauvi'] ?>">
                    <img class="img-fluid" onerror="this.src='<?= THUMBS ?>/30x30x2/assets/images/noimage.png';" src="<?= THUMBS ?>/30x30x2/<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" alt="<?= $v['ten' . $lang] ?>" />
                    <span><?= $v['ten' . $lang] ?></span>
                </a>
            </li>
        <?php } ?>
    </ul>
</div>
<nav class="navbar navbar-expand-lg navbar-dark bg-danger roboto-slab">
    <div id="navbar-toggle">
        <button id="dropdownToggleButton" class="btn btn-toggle d-flex align-items-center justify-content-between" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="text-white"><i class="fa fa-bars"></i></span>
        </button>
        <form method="get" class="col-md-7">
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="keyword2" name="keyword" placeholder="Tìm kiếm sản phẩm" onkeypress="doEnter(event,'keyword2');">
                <button type="submit" class="btn btn-danger" onclick="onSearch('keyword2');"><i class="far fa-search"></i></button>
            </div>
        </form>
        <!-- <img class="img-fluid logoTTP col-md-4" onerror="this.src='<?= THUMBS ?>/0x200x1/assets/images/noimage.png';" src="<?= THUMBS ?>/0x200x1/<?= UPLOAD_PHOTO_L . $logo['photo'] ?>" /> -->
        <button id="navbarOpenButtonMobile" class="btn btn-toggle mr-2" type="button">
            <span class="fa-1x text-white"><i class="fa fa-bars"></i></span>
        </button>
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


<script>
    // tìm nút mở navbar danh mục sản phẩm
    var navbarOpenButtonMobile = document.getElementById('navbarOpenButtonMobile');
    // tìm nút đóng navbar danh mục sản phẩm
    var navbarCloseButtonMobile = document.getElementsByClassName('navbarCloseButtonMobile')[0];
    // tìm navbar mobile
    var navbarMobile = document.getElementById('navbarMobile');

    /**
     * hiển thị/ẩn nút đóng navbar danh mục sản phẩm
     */

    // 1. mở navbar danh mục sản phẩm
    navbarOpenButtonMobile.addEventListener('click', function() {
        navbarMobile.classList.add('show-mobile');
    });

    // 2. đóng navbar danh mục sản phẩm
    navbarCloseButtonMobile.addEventListener('click', function() {
        navbarMobile.classList.remove('show-mobile');
    });
</script>