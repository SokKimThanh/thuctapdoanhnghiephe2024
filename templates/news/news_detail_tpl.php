<!-- Tổng hợp:
Đoạn code này tạo ra một trang tin tức bao gồm tiêu đề, nội dung chính của bài viết, 
và danh sách các bài viết khác.
Nếu nội dung bài viết không tồn tại, sẽ hiển thị một thông báo cảnh báo.
Tích hợp các nút chia sẻ trên mạng xã hội để người dùng có thể chia sẻ bài viết.
Cung cấp chức năng phân trang cho danh sách các bài viết khác. -->
<section>
    <div class="container">
        <div class="mt-4 text-center">
            <!-- 1. Hiển thị tiêu đề: -->
            <!-- Phần này hiển thị tiêu đề của trang, lấy giá trị từ biến PHP $title_crumb. -->
            <h3 class="text-danger  text-uppercase"><?= $title_crumb ?></h3>
            <!-- 2. Hiển thị tên bài viết: -->
            <!-- Hiển thị tên của bài viết, lấy giá trị từ mảng $row_detail, với khóa 'ten' cộng với biến ngôn ngữ $lang. -->
            <h6><?= $row_detail['ten' . $lang] ?></h6>
            <!-- ba hình thoi và đường kẻ ngang -->
            <div class="square-area">
                <div class="rotated-square">
                    <div class="line"></div>
                </div>
            </div>
        </div>
        <!-- 3. Hiển thị nội dung bài viết: -->
        <!-- Nếu nội dung bài viết tồn tại, phần này sẽ hiển thị nội dung bài viết.
htmlspecialchars_decode được sử dụng để giải mã các ký tự đặc biệt trong nội dung.
Hiển thị các nút chia sẻ trên mạng xã hội như Zalo và ShareThis.
Nếu nội dung bài viết không tồn tại, sẽ hiển thị một thông báo cảnh báo. -->
        <div class="row">
            <?php /*<div class="time-main"><i class="fas fa-calendar-week"></i><span><?=ngaydang?>: <?=date("d/m/Y h:i A",$row_detail['ngaytao'])?></span></div>*/ ?>
            <?php if (isset($row_detail['noidung' . $lang]) && $row_detail['noidung' . $lang] != '') { ?>
                <div class="meta-toc">
                    <div class="box-readmore">
                        <ul class="toc-list" data-toc="article" data-toc-headings="h1, h2, h3"></ul>
                    </div>
                </div>
                <div class="content-main w-clear" id="toc-content"><?= htmlspecialchars_decode($row_detail['noidung' . $lang]) ?></div>
                <div>
                    <!-- <img src="<?= $qrFile ?>" alt="" srcset=""> -->
                </div>
                <div class="share">
                    <b><?= chiase ?>:</b>
                    <div class="social-plugin w-clear">
                        <div class="website_share d-flex align-items-center pr-2">
                            <div class="zalo-share-button" data-href="<?= $func->getCurrentPageURL() ?>" data-oaid="<?= ($optsetting['oaidzalo'] != '') ? $optsetting['oaidzalo'] : '579745863508352884' ?>" data-layout="1" data-color="blue" data-customize=true>
                                <img width="20" height="20" src="../../assets/images/zalo1.png">
                                <span style="color: #fff; font-size: 11px; font-weight: 500;letter-spacing: 0.5px">Share</span>
                            </div>
                        </div>
                        <div class="sharethis-inline-share-buttons"></div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="alert alert-warning" role="alert">
                    <strong><?= noidungdangcapnhat ?></strong>
                </div>
            <?php } ?>
            <!-- 4. Hiển thị các bài viết khác: -->
            <div class="share othernews">
                <!-- Hiển thị tiêu đề "Bài viết khác". -->
                <b><?= baivietkhac ?>:</b>
                <ul class="list-news-other">
                    <!-- Nếu mảng $news tồn tại và không rỗng, sẽ hiển thị danh sách các bài viết khác, 
mỗi bài viết là một mục trong danh sách <ul>. -->
                    <?php if (isset($news) && count($news) > 0) {
                        for ($i = 0; $i < count($news); $i++) { ?>
                            <li><a class="text-decoration-none" href="<?= $news[$i][$sluglang] ?>" title="<?= $news[$i]['ten' . $lang] ?>">
                                    <?= $news[$i]['ten' . $lang] ?> <?php /*- <?=date("d/m/Y",$news[$i]['ngaytao'])*/ ?>
                                </a></li>
                    <?php }
                    } ?>
                </ul>
                <!-- Hiển thị phân trang nếu biến $paging tồn tại và không rỗng. -->
                <div class="pagination-home"><?= (isset($paging) && $paging != '') ? $paging : '' ?></div>
            </div>
        </div>
    </div>
</section>