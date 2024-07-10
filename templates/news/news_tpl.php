<!-- 1. Tổng quan:
Đoạn code này sử dụng PHP để xây dựng giao diện một trang tin tức trên web. 
Nó bao gồm các thành phần sau:

Hiển thị tiêu đề.
Hiển thị danh sách các bài viết tin tức.
Hiển thị nội dung chi tiết của trang nếu có. -->

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
        <!-- b. Hiển thị danh sách tin tức: -->
        <div class="row">
            <!-- Nếu mảng $news không rỗng, sẽ hiển thị danh sách các bài viết.-->
            <?php if (count($news) > 0) { ?>
                <div class="content-main w-clear">
                    <!-- Sử dụng vòng lặp foreach để duyệt qua từng bài viết trong mảng $news. -->
                    <?php foreach ($news as $k => $v) { ?>
                        <!-- Với mỗi bài viết, hiển thị hình ảnh, tiêu đề, thời gian đăng, và mô tả. -->
                        <div class="news w-clear">
                            <p class="pic-news scale-img">
                                <a class="text-decoration-none" href="<?= $v[$sluglang] ?>" title="<?= $v['ten' . $lang] ?>">
                                    <img onerror="this.src='<?= THUMBS ?>/320x240x1/assets/images/noimage.png';" src="<?= THUMBS ?>/320x240x1/<?= UPLOAD_NEWS_L . $v['photo'] ?>" alt="<?= $v['ten' . $lang] ?>">
                                </a>
                            </p>
                            <div class="info-news">
                                <h3 class="name-news"><a class="text-decoration-none" href="<?= $v[$sluglang] ?>" title="<?= $v['ten' . $lang] ?>"><?= $v['ten' . $lang] ?></a></h3>
                                <p class="time-news"><?= ngaydang ?>: <?= date("d/m/Y h:i A", $v['ngaytao']) ?></p>
                                <div class="desc-news text-split"><?= $v['mota' . $lang] ?></div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="clear"></div>
                <div class="pagination-home"><?= (isset($paging) && $paging != '') ? $paging : '' ?></div>
            <?php } else { ?>
                <!-- Nếu không có bài viết nào, hiển thị thông báo cảnh báo. -->
                <div class="alert alert-warning" role="alert">
                    <strong><?= khongtimthayketqua ?></strong>
                </div>
            <?php } ?>
        </div>
        <div class="row">
            <!-- c. Hiển thị nội dung chi tiết của trang nếu có: -->
            <!-- Nếu biến $noidung_page không rỗng, hiển thị nội dung chi tiết của trang. -->
            <?php if ($noidung_page != '') { ?>
                <div class="noidung_page">
                    <div class="meta-toc">
                        <div class="box-readmore">
                            <ul class="toc-list" data-toc="article" data-toc-headings="h1, h2, h3"></ul>
                        </div>
                    </div>
                    <!-- Sử dụng htmlspecialchars_decode để giải mã nội dung HTML. -->
                    <div id="toc-content"><?= htmlspecialchars_decode($noidung_page) ?></div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
 
<!-- 
Tổng hợp:
Đoạn code này xây dựng giao diện hiển thị danh sách tin tức với các bài viết được lấy từ mảng $news.
Nó bao gồm tiêu đề trang, danh sách bài viết với hình ảnh, tiêu đề, thời gian đăng và mô tả.
Nếu không có bài viết nào, hiển thị thông báo cảnh báo.
Nếu có nội dung chi tiết cho trang, nó sẽ được hiển thị ở cuối cùng.
Lời khuyên:
Nên sử dụng các biện pháp bảo mật như escape đầu vào và kiểm tra lỗi để tránh các lỗ hổng bảo mật.
Cải thiện cách hiển thị thông báo và phân trang để tối ưu trải nghiệm người dùng.
 -->