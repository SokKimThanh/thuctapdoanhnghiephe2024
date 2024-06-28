<?php
session_start(); // Quản lý người dùng trên nhiều trang
//quản lý truy cập thư mục và tập tin trong dự án
define('LIBRARIES', './libraries/');
define('SOURCES', './sources/');
define('LAYOUT', 'layout/');
define('THUMBS', 'thumbs');
define('WATERMARK', 'watermark');

/* Config */
//(nhúng các file từ thư mục library vào file index.php này)
require_once LIBRARIES . "config.php"; // nhúng tập tin config.php cấu hình dự án
require_once LIBRARIES . 'autoload.php'; // nhúng tập tin autoload.php // tự động tải các lớp và thư viện cần thiết
require_once LIBRARIES . "config-type.php"; // nhúng tập tin cấu hình khác
new AutoLoad(); // khởi tạo đối tượng autoload để tự động tải các lớp và thư viện khi cần thiết
$injection = new AntiSQLInjection(); // sercurity: sử dụng lớp antisqlinjection ngăn chặn tấn công database
$d = new PDODb($config['database']); // sử dụng PDO để tương tác với database
$seo = new Seo($d); // quản lý seo của trang web
$emailer = new Email($d); // quản lý gửi email
$router = new AltoRouter(); // quản lý định tuyến URL
$cache = new FileCache($d); // quản lý bộ nhớ đệm
$func = new Functions($d); // quản lý tiện ích chung
$breadcr = new BreadCrumbs($d); // quản lý và hiển thị breadcrumbs 
$statistic = new Statistic($d, $cache); // quản lý và hiển thị số liệu thống kê
$cart = new Cart($d); // quản lý giỏ hàng
$detect = new MobileDetect(); // quản lý phát hiện thiết bị di động
$addons = new AddonsOnline(); // quản lý add-óns trực tuyến
$css = new CssMinify($config['website']['debug-css'], $func); //quản lý tối ưu hóa các file nén css
$js = new JsMinify($config['website']['debug-js'], $func); // quản lý và tối ưu hóa các file nén js
/* Router */
require_once LIBRARIES . "router.php"; // nhúng file router quản lý các định tuyến URL

/* Template */
include TEMPLATE . "index.php"; // nhúng file index hiển thị giao diện trang web
