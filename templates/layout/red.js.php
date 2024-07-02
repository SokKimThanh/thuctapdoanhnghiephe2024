 <!-- 1. cấu hình chung -->
 <!-- NN_FRAMEWORK: Biến này được khai báo để chứa các cấu hình và hàm của framework. -->
 <!-- CONFIG_BASE: Lưu trữ đường dẫn cơ bản của trang web. -->
 <!-- WEBSITE_NAME: Lưu trữ tên của trang web, lấy từ biến $setting. -->
 <!-- TIMENOW: Lưu trữ thời gian hiện tại theo định dạng "d/m/Y". -->
 <!-- SHIP_CART: Biến boolean để xác định xem có chức năng vận chuyển trong giỏ hàng hay không. -->
 <!-- GOTOP: Đường dẫn đến hình ảnh "lên đầu trang". -->
 <!-- LANG: Một đối tượng chứa các chuỗi ngôn ngữ được sử dụng trên trang web. -->
 <script type="text/javascript">
     var NN_FRAMEWORK = NN_FRAMEWORK || {};
     var CONFIG_BASE = '<?= $config_base ?>';
     var WEBSITE_NAME = '<?= (isset($setting['ten' . $lang]) && $setting['ten' . $lang] != '') ? $setting['ten' . $lang] : '' ?>';
     var TIMENOW = '<?= date("d/m/Y", time()) ?>';
     var SHIP_CART = <?= (isset($config['order']['ship']) && $config['order']['ship'] == true) ? 'true' : 'false' ?>;
     var GOTOP = 'assets/images/top.png';
     var LANG = {
         'no_keywords': "<?= chuanhaptukhoatimkiem ?>",
         'delete_product_from_cart': "<?= banmuonxoasanphamnay ?>",
         'no_products_in_cart': "<?= khongtontaisanphamtronggiohang ?>",
         'wards': "<?= phuongxa ?>",
         'back_to_home': "<?= vetrangchu ?>",
     };
 </script>

 <!-- 2. Tập tin JavaScript cần thiết -->
 <!-- $js->setCache("cached"): Kích hoạt chế độ cache cho các tập tin JavaScript. -->
 <!-- $js->setJs(...): Thêm các tập tin JavaScript cần thiết cho trang web. -->
 <!-- echo $js->getJs(): In ra các thẻ <script> để nhúng các tập tin JavaScript vào trang web. -->
 <!-- LazyLoad: Thư viện lazy load được nhúng vào trang web. -->
 <?php
    $js->setCache("cached");
    $js->setJs("./assets/js/jquery.min.js");
    $js->setJs("./assets/bootstrap/bootstrap.js");
    $js->setJs("./assets/js/wow.min.js");
    $js->setJs("./assets/owlcarousel2/owl.carousel.js");
    $js->setJs("./assets/magiczoomplus/magiczoomplus.js");
    $js->setJs("./assets/simplyscroll/jquery.simplyscroll.js");
    $js->setJs("./assets/slick/slick.js");
    $js->setJs("./assets/fancybox3/jquery.fancybox.js");
    $js->setJs("./assets/toc/toc.js");
    $js->setJs("./assets/js/lazyload.min.js");
    $js->setJs("./assets/js/functions.js");
    $js->setJs("./assets/js/jquery.nivo.slider.js");
    $js->setJs("./assets/js/apps.js");
    echo $js->getJs();
    ?>
 <script src="./assets/js/lazyload.min.js"></script>

 <!-- 3. Lazy Load -->
 <!-- Khởi tạo thư viện LazyLoad để tối ưu việc tải các hình ảnh và tài nguyên khác khi người dùng cuộn trang. -->
 <script>
     var myLazyLoad = new LazyLoad({
         elements_selector: ".lazy"
     });
 </script>

 <!-- 4. Cấu hình cho các trang cụ thể -->
 <!-- Trang chủ (index/index) -->
 <!-- Sử dụng thư viện Slick để tạo thanh trượt (slider) cho trang chủ. -->
 <?php if ($template == 'index/index') { ?>
     <script type="text/javascript">
         $(document).ready(function() {
             $('.slider-for').slick({
                 slidesToShow: 1,
                 slidesToScroll: 1,
                 arrows: false,
                 fade: true,
                 asNavFor: '.slider-nav'
             });
             $('.slider-nav').slick({
                 slidesToShow: 3,
                 slidesToScroll: 1,
                 infinite: true,
                 autoplay: true,
                 autoplaySpeed: 3000,
                 centerPadding: '0px',
                 asNavFor: '.slider-for',
                 dots: false,
                 centerMode: true,
                 focusOnSelect: true
             });
         });
     </script>
 <?php } ?>

 <!-- 6. Google reCAPTCHA -->
 <!-- Sử dụng Google reCAPTCHA V3 để bảo vệ các form trên trang liên hệ và đăng ký đại lý. -->
 <?php if (isset($config['googleAPI']['recaptcha']['active']) && $config['googleAPI']['recaptcha']['active'] == true) { ?>
     <!-- Js Google Recaptcha V3 -->
     <?php if ($source == 'contact' || $source == 'dangkydaily') { ?>
         <script src="https://www.google.com/recaptcha/api.js?render=<?= $config['googleAPI']['recaptcha']['sitekey'] ?>"></script>
         <script type="text/javascript">
             grecaptcha.ready(function() {
                 grecaptcha.execute('<?= $config['googleAPI']['recaptcha']['sitekey'] ?>', {
                     action: 'contact'
                 }).then(function(token) {
                     document.getElementById('recaptchaResponseContact').value = token;
                 });
                 grecaptcha.execute('<?= $config['googleAPI']['recaptcha']['sitekey'] ?>', {
                     action: 'Newsletter'
                 }).then(function(token) {
                     document.getElementById('recaptchaResponseNewsletter').value = token;
                 });
             });
         </script>
     <?php } ?>
 <?php } ?>
 <!-- 7. OneSignal -->
 <!-- Sử dụng OneSignal để gửi thông báo đẩy cho người dùng. -->
 <?php if (isset($config['oneSignal']['active']) && $config['oneSignal']['active'] == true) { ?>
    <!-- Js OneSignal -->
    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
    <script type="text/javascript">
        var OneSignal = window.OneSignal || [];
        OneSignal.push(function() {
            OneSignal.init({
                appId: "<?= $config['oneSignal']['id'] ?>"
            });
        });
    </script>
<?php } ?>

 <!-- 8. Cấu trúc dữ liệu -->
 <!-- Bao gồm cấu trúc dữ liệu (structured data) để tối ưu SEO cho trang web. -->
 <?php include TEMPLATE . LAYOUT . "strucdata.php"; ?>

 <!-- 9. Các tiện ích bổ sung -->
 <!-- Nhúng các tập tin JavaScript bổ sung từ các tiện ích. -->
 <!-- Js Addons -->
 <?= $addons->setAddons('script-main', 'script-main', 0.5); ?>
 <?= $addons->getAddons(); ?>

 <!-- 10. JavaScript từ cấu hình trang web -->
 <!-- Nhúng mã JavaScript từ cấu hình trang web, được lưu trong biến $setting['bodyjs']. -->
 <?= htmlspecialchars_decode($setting['bodyjs']) ?>