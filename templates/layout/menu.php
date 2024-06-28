<div class="header-height">
    <div id="menu_top">
        <div class="fixwidth clearfix">
            <div class="menu">
                <ul class="menu_cap_cha d-flex">
                    <li class="menulicha <?= $source == 'index' ? 'trangchu active' : '' ?>"><a href="" title="TRANG CHỦ">TRANG CHỦ</a></li>
                    <li class="menulicha <?= $com == 'gioi-thieu' ? 'trangchu active' : '' ?>"><a href="gioi-thieu" title="GIỚI THIỆU">GIỚI THIỆU</a></li>

                    <li class="menulicha <?= $com == 'san-pham' ? 'trangchu active' : '' ?>"><a href="san-pham" title="SẢN PHẨM">SẢN PHẨM</a>
                        <?php if ($splistmenu) { ?>
                            <ul class="menu_cap_con">
                                <?php foreach ($splistmenu as $c => $cat) { ?>
                                    <li><a title="<?= $cat['ten' . $lang] ?>" href="<?= $cat[$sluglang] ?>"><?= $cat['ten' . $lang] ?></a>
                                        <?php
                                        $spcatmenu = $d->rawQuery("select ten$lang, tenkhongdauvi, id, photo from #_product_cat where type = ? and id_list = ? and hienthi > 0 order by stt,id desc", array('san-pham', $cat['id']));
                                        if (count($spcatmenu) > 0) { ?>
                                            <ul class="menu_cap_2">
                                                <?php foreach ($spcatmenu as $c1 => $cat1) {
                                                    $spitemmenu = $d->rawQuery("select ten$lang, tenkhongdauvi, id,photo from #_product_item where type = ? and id_cat = ? and hienthi > 0 order by stt,id desc", array('san-pham', $cat1['id']));
                                                ?>
                                                    <li><a title="<?= $cat1['ten' . $lang] ?>" href="<?= $cat1[$sluglang] ?>"><?= $cat1['ten' . $lang] ?></a>
                                                        <?php if (count($spitemmenu) > 0) { ?>
                                                            <ul class="menu_cap_3">
                                                                <?php foreach ($spitemmenu as $c1 => $cat2) { ?>
                                                                    <li><a title="<?= $cat2['ten' . $lang] ?>" href="<?= $cat2[$sluglang] ?>"><?= $cat2['ten' . $lang] ?></a></li>
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

                    <!-- <li class="menulicha <?= $com == 'khuyen-mai' ? 'trangchu active' : '' ?>"><a href="khuyen-mai" title="KHUYẾN MÃI">KHUYẾN MÃI</a></li> -->
                    <li class="menulicha <?= $com == 'dich-vu' ? 'trangchu active' : '' ?>"><a href="dich-vu" title="DỊCH VỤ">DỊCH VỤ</a>

                    </li>
                    <!-- <li class="menulicha <?= $com == 'bang-gia' ? 'trangchu active' : '' ?>"><a href="bang-gia" title="BẢNG GIÁ">BẢNG GIÁ</a> -->

                    </li>
                    <li class="menulicha <?= $com == 'tin-tuc' ? 'trangchu active' : '' ?>"><a href="tin-tuc" title="TIN TỨC">TIN TỨC</a>

                    </li>
                    <li class="menulicha <?= $com == 'lien-he' ? 'trangchu active' : '' ?>"><a href="lien-he" title="LIÊN HỆ">LIÊN HỆ</a></li>
                    <li class="menulicha <?= $com == 'gio-hang' ? 'trangchu active' : '' ?>"><a href="gio-hang" title="GIỎ HÀNG" class="fa-2x"><span class="fa fa-shopping-cart"></span></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>