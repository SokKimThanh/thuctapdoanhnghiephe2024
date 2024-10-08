<?php

/** //Kiểm tra HTTP:
 * Đoạn mã này gọi hàm checkHTTP để kiểm tra và xử lý các yêu cầu HTTP, 
 * đảm bảo các yêu cầu được chuyển hướng tới đúng URL và sử dụng HTTPS nếu cần.
 */
/* Check HTTP */
$func->checkHTTP($http, $config['arrayDomainSSL'], $config_base, $config_url);

/**
 * Đảm bảo URL hợp lệ, ngăn chặn các URL không hợp lệ hoặc độc hại.
 */
/* Validate URL */
$func->checkUrl($config['website']['index']);

/* Check login */
/**
 * Kiểm tra xem người dùng đã đăng nhập hay chưa.
 */
$func->checkLogin();

/* Mobile detect */
/**
 * Đoạn mã này phát hiện loại thiết bị (di động hoặc máy tính) và định nghĩa thư mục chứa template tương ứng.
 */
$deviceType = ($detect->isMobile() || $detect->isTablet()) ? 'mobile' : 'computer';
if ($deviceType == 'computer') define('TEMPLATE', './templates/');
else define('TEMPLATE', './templates/');

/* Watermark */
$wtmPro = $d->rawQueryOne("select hienthi, photo, options from #_photo where type = ? and act = ? limit 0,1", array('watermark', 'photo_static'));
$wtmNews = $d->rawQueryOne("select hienthi, photo, options from #_photo where type = ? and act = ? limit 0,1", array('watermark-news', 'photo_static'));

/* Router */
/**
 * Đoạn mã này định tuyến các URL tới các chức năng tương ứng. 
 * Ví dụ, URL dangnhap/ sẽ được chuyển hướng tới dangnhap/index.php.
 */
$router->setBasePath($config['database']['url']);
$router->map('GET', array('dangnhap/', 'dangnhap'), function () {
	global $func, $config;
	$func->redirect($config['database']['url'] . "dangnhap/index.php");
	exit;
});
$router->map('GET', array('dangnhap', 'dangnhap'), function () {
	global $func, $config;
	$func->redirect($config['database']['url'] . "dangnhap/index.php");
	exit;
});
$router->map('GET|POST', '', 'index', 'home');
$router->map('GET|POST', 'index.php', 'index', 'index');
$router->map('GET|POST', 'sitemap.xml', 'sitemap', 'sitemap');
$router->map('GET|POST', '[a:com]', 'allpage', 'show');
$router->map('GET|POST', '[a:com]/[a:lang]/', 'allpagelang', 'lang');
$router->map('GET|POST', '[a:com]/[a:action]', 'account', 'account');
$router->map('GET', THUMBS . '/[i:w]x[i:h]x[i:z]/[**:src]', function ($w, $h, $z, $src) {
	global $func;
	$func->createThumb($w, $h, $z, $src, null, THUMBS);
}, 'thumb');
$router->map('GET', WATERMARK . '/product/[i:w]x[i:h]x[i:z]/[**:src]', function ($w, $h, $z, $src) {
	global $func, $wtmPro;
	$func->createThumb($w, $h, $z, $src, $wtmPro, "product");
}, 'watermark');
$router->map('GET', WATERMARK . '/news/[i:w]x[i:h]x[i:z]/[**:src]', function ($w, $h, $z, $src) {
	global $func, $wtmNews;
	$func->createThumb($w, $h, $z, $src, $wtmNews, "news");
}, 'watermarkNews');

// 7. Xử lý yêu cầu:
// Đoạn mã này xử lý các yêu cầu URL đã được định tuyến, gọi các chức năng tương 
// ứng hoặc hiển thị trang 404 nếu không tìm thấy.
$match = $router->match();
if (is_array($match)) {
	if (is_callable($match['target'])) {
		call_user_func_array($match['target'], $match['params']);
	} else {
		$com = (isset($match['params']['com'])) ? htmlspecialchars($match['params']['com']) : htmlspecialchars($match['target']);
		$get_page = isset($_GET['p']) ? htmlspecialchars($_GET['p']) : 1;
	}
} else {
	header('HTTP/1.0 404 Not Found', true, 404);
	include("404.php");
	exit;
}

// 8. Thiết lập và tải các thiết lập:
/* Setting */
$sqlCache = "select * from #_setting";
$setting = $cache->getCache($sqlCache, 'fetch', 7200);
$optsetting = (isset($setting['options']) && $setting['options'] != '') ? json_decode($setting['options'], true) : null;

// 9. Thiết lập ngôn ngữ:
/* Lang */
if (isset($match['params']['lang']) && $match['params']['lang'] != '') $_SESSION['lang'] = $match['params']['lang'];
else if (!isset($_SESSION['lang']) && !isset($match['params']['lang'])) $_SESSION['lang'] = $optsetting['lang_default'];
$lang = $_SESSION['lang'];

/* Slug lang */
$sluglang = 'tenkhongdauvi';

/* SEO Lang */
$seolang = "vi";

/* Require datas */
require_once LIBRARIES . "lang/lang$lang.php";
require_once SOURCES . "allpage.php";

// 10. Định nghĩa các route nhanh (requick):
/* Tối ưu link */
$requick = array(
	// Các route nhanh cho sản phẩm, tin tức, bài viết, trang tĩnh, liên hệ
	/* Sản phẩm */
	array("tbl" => "product_list", "field" => "idl", "source" => "product", "com" => "san-pham", "type" => "san-pham", 'menu' => true),
	array("tbl" => "product_cat", "field" => "idc", "source" => "product", "com" => "san-pham", "type" => "san-pham", 'menu' => true),
	array("tbl" => "product_item", "field" => "idi", "source" => "product", "com" => "san-pham", "type" => "san-pham", 'menu' => true),
	array("tbl" => "product", "field" => "id", "source" => "product", "com" => "san-pham", "type" => "san-pham", 'menu' => true),

	/* Sản phẩm */
	array("tbl" => "news_list", "field" => "idl", "source" => "news", "com" => "cong-trinh", "type" => "cong-trinh", 'menu' => true),
	array("tbl" => "news", "field" => "id", "source" => "news", "com" => "cong-trinh", "type" => "cong-trinh", 'menu' => true),


	/* Bài viết */
	array("tbl" => "video", "field" => "id", "source" => "news", "com" => "video", "type" => "video", 'menu' => false),
	array("tbl" => "news_list", "field" => "idl", "source" => "news", "com" => "tin-tuc", "type" => "tin-tuc", 'menu' => true),
	array("tbl" => "news_list", "field" => "idl", "source" => "news", "com" => "dich-vu", "type" => "dich-vu", 'menu' => true),
	array("tbl" => "news_list", "field" => "idl", "source" => "news", "com" => "phu-kien", "type" => "phu-kien", 'menu' => true),
	array("tbl" => "news", "field" => "id", "source" => "news", "com" => "kien-thuc", "type" => "kien-thuc", 'menu' => true),
	array("tbl" => "news", "field" => "id", "source" => "news", "com" => "tin-tuc", "type" => "tin-tuc", 'menu' => true),
	array("tbl" => "news", "field" => "id", "source" => "news", "com" => "dich-vu", "type" => "dich-vu", 'menu' => true),
	array("tbl" => "news", "field" => "id", "source" => "news", "com" => "bang-gia", "type" => "bang-gia", 'menu' => true),
	array("tbl" => "news", "field" => "id", "source" => "news", "com" => "khuyen-mai", "type" => "khuyen-mai", 'menu' => true),
	array("tbl" => "news", "field" => "id", "source" => "news", "com" => "phu-kien", "type" => "phu-kien", 'menu' => true),
	array("tbl" => "news", "field" => "id", "source" => "news", "com" => "feedback", "type" => "feedback", 'menu' => true),
	/* Trang tĩnh */
	array("tbl" => "static", "field" => "id", "source" => "static", "com" => "gioi-thieu", "type" => "gioi-thieu", 'menu' => true),
	/* đối tác là trang tĩnh */
	array("tbl" => "static", "field" => "id", "source" => "static", "com" => "doi-tac", "type" => "doi-tac", 'menu' => true /* sitemap on*/),

	/* Liên hệ */
	array("tbl" => "", "field" => "id", "source" => "", "com" => "lien-he", "type" => "", 'menu' => true),
	array("tbl" => "", "field" => "id", "source" => "", "com" => "baogia", "type" => "", 'menu' => true),

);

// 11. Tìm dữ liệu dựa trên route nhanh:
/* Find data */
if ($com != 'tim-kiem' && $com != 'account' && $com != 'sitemap') {
	foreach ($requick as $k => $v) {
		// Logic tìm kiếm dữ liệu tương ứng với route
		$url_tbl = (isset($v['tbl']) && $v['tbl'] != '') ? $v['tbl'] : '';
		$url_tbltag = (isset($v['tbltag']) && $v['tbltag'] != '') ? $v['tbltag'] : '';
		$url_type = (isset($v['type']) && $v['type'] != '') ? $v['type'] : '';
		$url_field = (isset($v['field']) && $v['field'] != '') ? $v['field'] : '';
		$url_com = (isset($v['com']) && $v['com'] != '') ? $v['com'] : '';

		if ($url_tbl != '' && $url_tbl != 'static' && $url_tbl != 'photo') {
			$row = $d->rawQueryOne("select id from #_$url_tbl where $sluglang = ? and type = ? and hienthi > 0 limit 0,1", array($com, $url_type));

			if ($row['id']) {
				$_GET[$url_field] = $row['id'];
				$com = $url_com;
				break;
			}
		}
	}
}
// 12. Chuyển đổi các route:

/* Switch coms */
switch ($com) {
	case 'lien-he':
		$source = "contact";
		$template = "contact/contact";
		$seo->setSeo('type', 'object');
		$title_crumb = 'Liên hệ';
		break;
	case 'kien-thuc':
		$source = "news";
		$template = "news/news";
		$seo->setSeo('type', 'object');
		$title_crumb = 'Kiến thức';
		break;
	case 'doi-tac':
		$source = "doitac";
		$template = "doitac/doitac";
		$seo->setSeo('type', 'object');
		$title_crumb = 'Đối tác';
		break;

		// case 'baogia':
		// 	$source = "baogia";
		// 	$template = "kigui/kigui";
		// 	$seo->setSeo('type','object');
		// 	$title_crumb = 'Báo Giá';
		// 	break;

	case 'gioi-thieu':
		$source = "static";
		$template = "static/static";
		$type = $com;
		$seo->setSeo('type', 'article');
		$title_crumb = 'Giới thiệu';
		break;

	case 'tin-tuc':
		$source = "news";
		$template = isset($_GET['id']) ? "news/news_detail" : "news/news";
		$seo->setSeo('type', isset($_GET['id']) ? "article" : "object");
		$type = $com;
		$title_crumb = "Tin tức";
		break;

	case 'khuyen-mai':
		$source = "news";
		$template = isset($_GET['id']) ? "news/news_detail" : "news/news";
		$seo->setSeo('type', isset($_GET['id']) ? "article" : "object");
		$type = $com;
		$title_crumb = "Khuyến mãi";
		break;

	case 'bang-gia':
		$source = "news";
		$template = isset($_GET['id']) ? "news/news_detail" : "news/news";
		$seo->setSeo('type', isset($_GET['id']) ? "article" : "object");
		$type = $com;
		$title_crumb = "Bảng giá";
		break;

	case 'feedback':
		$source = "news";
		$template = isset($_GET['id']) ? "news/news_detail" : "news/news";
		$seo->setSeo('type', isset($_GET['id']) ? "article" : "object");
		$type = $com;
		$title_crumb = "Khách Hàng";
		break;

	case 'dich-vu':
		$source = "news";
		$template = isset($_GET['id']) ? "news/news_detail" : "news/news";
		$seo->setSeo('type', isset($_GET['id']) ? "article" : "object");
		$type = $com;
		$title_crumb = "Dịch vụ";
		break;

	case 'video':
		$source = "video";
		$template =  "video/video";
		$seo->setSeo('type', isset($_GET['id']) ? "article" : "object");
		$type = $com;
		$title_crumb = "Video";
		break;

	case 'san-pham':
		$source = "product";
		$template = isset($_GET['id']) ? "product/product_detail" : "product/product";
		$seo->setSeo('type', 'article');
		$type = 'san-pham';
		$title_crumb = 'Sản phẩm';
		break;

	case 'tim-kiem':
		$source = "search";
		$template = "product/product";
		$seo->setSeo('type', 'object');
		$title_crumb = timkiem;
		break;

		/*case 'tags-san-pham':
			$source = "tags";
			$template = "product/product";
			$type = $url_type;
			$table = $url_tbltag;
			$seo->setSeo('type','object');
			$title_crumb = null;
			break;

		case 'tags-tin-tuc':
			$source = "tags";
			$template = "news/news";
			$type = $url_type;
			$table = $url_tbltag;
			$seo->setSeo('type','object');
			$title_crumb = null;
			break;*/

	case 'gio-hang':
		$source = "order";
		$template = 'order/order';
		$title_crumb = giohang;
		$seo->setSeo('type', 'object');
		break;

		/*case 'account':
			$source = "user";
			break;
		*/
	case 'ngon-ngu':
		if (isset($lang)) {
			switch ($lang) {
				case 'vi':
					$_SESSION['lang'] = 'vi';
					break;
				case 'en':
					$_SESSION['lang'] = 'en';
					break;
				default:
					$_SESSION['lang'] = 'vi';
					break;
			}
		}
		$func->redirect($_SERVER['HTTP_REFERER']);
		break;

	case 'sitemap':
		include_once LIBRARIES . "sitemap.php";
		exit();

	case '':
	case 'index':
		$source = "index";
		$template = "index/index";
		$seo->setSeo('type', 'website');
		break;

	default:
		header('HTTP/1.0 404 Not Found', true, 404);
		include("404.php");
		exit();
}

// 13. Bao gồm các nguồn và template tương ứng:
/* Include sources */
if ($source != '') include SOURCES . $source . ".php";
if ($template == '') {
	header('HTTP/1.0 404 Not Found', true, 404);
	include("404.php");
	exit();
}
