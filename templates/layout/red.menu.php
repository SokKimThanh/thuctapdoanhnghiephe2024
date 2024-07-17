<!-- -------------------------------------------------------------------------- -->
<!-- red menu header style for navbar left menu navigation dropdown -->
<!-- -------------------------------------------------------------------------- -->
<style>
    #navbarNavDropdown .titleContainer {
        display: none;
    }

    @media screen and (max-width: 500px) {
        #navbarNavDropdown {
            transform: translateX(-101%);
            /* ẩn đi navigation bar dropdown */
            position: fixed !important;
            inset: 0;
            height: 100vh;
            width: 100vw;
            /* tăng chiều ngang của navigation */
            z-index: 94035;
            /* z-index 94035 trên 1 lớp của social-logo (z-index: 94034) trong trang chi tiết sản phẩm */
            background-color: #fff;
            color: black;
            display: block;
        }


        #navbarNavDropdown .titleContainer {
            display: flex;
            height: 3.4rem;
            align-items: center;
            justify-content: space-between;
            padding: 0 16px;
            gap: 8px;
        }

        /* đổi vị trí bắt đầu của item trong navbar-nav */
        #navbarNavDropdown ul.navbar-nav {
            height: 100vh;
            padding: 16px 20px;
            align-items: start;
            justify-content: start;
        }

        /* đổi kích thước mỗi nav-item */
        #navbarNavDropdown ul.navbar-nav li {
            height: auto;
        }

        /* đổi màu chữ của link navigation */
        #navbarNavDropdown .nav-link {
            color: black;
        }

        #navbarNavDropdown .nav-link:hover {
            color: var(--red);
        }
    }
</style>

<!-- -------------------------------------------------------------------------- -->
<!-- red menu header style for navbar left menu danh muc san pham-->
<!-- -------------------------------------------------------------------------- -->
<style>
    #navbarMobile {
        transform: translateX(-101%);
        position: fixed;
        inset: 0;
        height: 100vh;
        width: 100vw;
        z-index: 94035;
        /* z-index 94035 trên 1 lớp của social-logo (z-index: 94034) trong trang chi tiết sản phẩm */
        background-color: #fff;
    }

    .show-mobile {
        transform: translateX(0) !important;
        transition: transform 500ms ease-in-out;
    }

    .navbarCloseButtonMobile {
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
<!-- ------------------------------------- -->
<!-- red menu header html-->
<!-- ------------------------------------- -->
<!-- Đoạn code giao diện navbar (thanh điều hướng) trong một trang web. Hãy đi 
 qua từng phần:

collapse navbar-collapse: Đây là một lớp CSS của Bootstrap để chỉ định khi nào 
navbar sẽ được thu gọn (collapse) khi trang được xem trên các thiết bị nhỏ như 
điện thoại.

ul.navbar-nav: Đây là danh sách chứa các mục điều hướng của navbar.

li.nav-item: Mỗi mục trong danh sách có lớp nav-item, và một số có lớp active 
dựa trên điều kiện $com hoặc $source để chỉ ra mục đang được chọn hoặc trang 
hiện tại.

a.nav-link: Là các liên kết điều hướng.

Dropdown menus: Có một menu dropdown cho mục "SẢN PHẨM", trong đó menu con sẽ
được tạo ra dựa trên dữ liệu từ mảng $splistmenu và các vòng lặp foreach để tạo
các mục con.

Icon giỏ hàng: Có một liên kết đặc biệt cho giỏ hàng, hiển thị số lượng sản phẩm
 hiện có trong giỏ hàng bên cạnh biểu tượng giỏ hàng.

Thẻ span và thẻ ul: Được sử dụng để chỉnh sửa các lớp và thuộc tính aria để điều
 chỉnh menu dropdown.

Mã này sử dụng PHP để tạo ra các điều kiện và lặp để tạo giao diện dựa trên dữ
liệu động. Nó tích hợp Bootstrap để tạo ra giao diện phản hồi và các menu dropdown.
 -->
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
        <!-- nút mở navigation bar -->
        <button id="dropdownToggleButton" class="btn btn-toggle d-flex align-items-center justify-content-between" type="button">
            <span class="text-white"><i class="fa fa-bars"></i></span>
        </button>
        <!-- ô tìm kiếm -->
        <div class="col-md-7 input-group-search-container">
            <div class="input-group mb-3">
                <input type="text" class="form-control search-input" id="keywordMenuSearch" name="keywordMenuSearch" value="<?= (isset($_GET['keywordMenuSearch'])) ? $_GET['keywordMenuSearch'] : '' ?>" placeholder="Tìm kiếm sản phẩm" onkeypress="doEnter(event,'keywordMenuSearch','<?= $linkMan ?>')">
                <button type="submit" class="btn btn-danger" onclick="onSearch('keywordMenuSearch','<?= $linkMan ?>')">
                    <i class="far fa-search"></i>
                </button>
            </div>
        </div>
        <!-- <img class="img-fluid logoTTP col-md-4" onerror="this.src='<?= THUMBS ?>/0x200x1/assets/images/noimage.png';" src="<?= THUMBS ?>/0x200x1/<?= UPLOAD_PHOTO_L . $logo['photo'] ?>" /> -->
        <!-- nút mở menu danh mục sản phẩm -->
        <button id="navbarOpenButtonMobile" class="btn btn-toggle mr-2" type="button">
            <span class="fa-1x text-white"><i class="fa fa-bars"></i></span>
        </button>
    </div>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <div class="titleContainer bg-danger">
            <h6 class="text-white roboto-slab text-center text-uppercase titleMobile">Danh mục sản phẩm</h6>
            <button class="navbarCloseButtonMobile"><span><i class="fa fa-bars"></i></span></button>
        </div>
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


<!-- ----------------------------------------------------------------------- -->
<!-- Menu danh muc san pham -->
<!-- ----------------------------------------------------------------------- -->
<script>
    // tìm nút mở navbar danh mục sản phẩm
    var navbarOpenButtonMobile = document.getElementById('navbarOpenButtonMobile');
    // tìm nút đóng navbar danh mục sản phẩm
    var navbarCloseButtonMobile = document.getElementsByClassName('navbarCloseButtonMobile')[0];
    // tìm navbar mobile danh mục sản phẩm
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
<!-- ----------------------------------------------------------------------- -->
<!-- Menu Navigation dropdown -->
<!-- xử lý cho danh mục navigation nằm bên trái và sự kiện click vào 
button navigation để gọi menu xuất hiện dần từ trái qua phải-->
<!-- ----------------------------------------------------------------------- -->
<script>
    // tìm nút mở navigation button
    var dropdownOpenButton = document.getElementById('dropdownToggleButton');
    // tìm nút đóng navbar danh mục sản phẩm
    var dropdownCloseButton = document.getElementsByClassName('navbarCloseButtonMobile')[1];
    // tìm navigation bar dropdown
    var navbar = document.getElementById('navbarNavDropdown');

    // 1. mở navigation bar dropdown
    dropdownOpenButton.addEventListener('click', function() {
        navbar.classList.toggle('show-mobile');
    });
    // 2. đóng navigation bar dropdown
    dropdownCloseButton.addEventListener('click', function() {
        navbar.classList.remove('show-mobile');
    });
</script>