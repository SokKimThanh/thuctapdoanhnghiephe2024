
<?php
/**
 * 		Đoạn mã này chủ yếu thiết lập các thông số cấu hình cần thiết cho ứng dụng web,
 * từ cấu hình cơ sở dữ liệu, thông tin công ty, thông tin đăng nhập, cấu hình 
 * Google API, đến báo cáo lỗi và các tùy chỉnh khác.
 * 		Các hằng số được định nghĩa và sử dụng để đảm bảo tính nhất quán và dễ dàng 
 * thay đổi các giá trị cấu hình.
 * 		Việc thiết lập múi giờ và kiểm tra định nghĩa của LIBRARIES giúp đảm bảo rằng
 * ứng dụng hoạt động đúng theo yêu cầu.
 * 		Các thông tin cấu hình như email, thông tin công ty, cơ sở dữ liệu, và các 
 * cấu hình khác được tổ chức thành mảng $config để dễ dàng quản lý và truy cập.
 */
// Kiểm tra định nghĩa của LIBRARIES:
// Nếu hằng số LIBRARIES chưa được định nghĩa, sẽ hiển thị thông báo lỗi và dừng thực thi mã.
if (!defined('LIBRARIES')) die("Error");

//Định nghĩa ROOT: ROOT được định nghĩa là đường dẫn thư mục hiện tại của file.	
/* Root */
define('ROOT', __DIR__);

// Thiết lập múi giờ: Thiết lập múi giờ mặc định là Asia/Ho_Chi_Minh.
/* Timezone */
date_default_timezone_set('Asia/Ho_Chi_Minh');

// Định nghĩa các hằng số liên quan đến mã số hợp đồng (NN_MSHD) và tác giả (NN_AUTHOR).
/* Cấu hình coder */
define('NN_MSHD', 'xxxx');
define('NN_AUTHOR', '');

/* Cấu hình chung */
// Đoạn code thiết lập một mảng cấu hình $config chứa nhiều thông tin cần thiết cho ứng dụng.
$config = array(

	//Thông tin email:
	'customEmail' => 'co.khi.hoang.duong88@gmail.com', //email nhận mật khẩu

	// Thông tin công ty:
	'copright' => array( // thông tin công ty tts
		'name' => 'CÔNG TY TNHH CÔNG NGHỆ SOTA GROUP',
		'email' => 'info@sotagroup.vn',
		'dienthoai' => '0939.857.111',
		'diachi' => 'Tòa Nhà HD Building 154 Phạm Văn Chiêu, Phường 9, Gò Vấp, Thành phố Hồ Chí Minh',
		'website' => 'sotagroup.vn',
		'worktime' => '8h - 17h từ thứ 2 đến thứ sáu, 8h - 12h sáng thứ bảy'
	),

	// Thông tin tác giả:
	'author' => array(
		'name' => 'CÔNG TY TNHH CÔNG NGHỆ SOTA GROUP',
		'email' => 'info@sotagroup.vn',
		'timefinish' => 'Unknown'
	),

	// Thông tin SSL:
	'arrayDomainSSL' => array(),

	// Cấu hình cơ sở dữ liệu:
	'database' => array(
		'server-name' => $_SERVER["SERVER_NAME"],
		'url' => '/',
		'type' => 'mysql',
		'host' => 'localhost',
		'username' => 'root',
		'password' => '',
		'dbname' => '77-example',
		'port' => 3306,
		'prefix' => 'table_',
		'charset' => 'utf8'
	),

	// Cấu hình website:
	'website' => array(
		'sendmail' => false,
		'error-reporting' => false,
		'secret' => '$tts@',
		'salt' => 'swKJaajeS!t',
		'debug-developer' => true,
		'debug-css' => true,
		'debug-js' => true,
		'index' => false,
		'upload' => array(
			'max-width' => 1600,
			'max-height' => 1600
		),
		'lang' => array(
			'vi' => 'Tiếng Việt'
			//'en'=>'Tiếng Anh'
		),
		'lang-doc' => 'vi|en',
		'slug' => array(
			'vi' => 'Tiếng Việt'
			//'en'=>'Tiếng Anh'
		),
		'seo' => array(
			'vi' => 'Tiếng Việt'
			//'en'=>'Tiếng Anh'
		),
		'comlang' => array(
			"gioi-thieu" => array("vi" => "gioi-thieu"),
			"tin-tuc" => array("vi" => "tin-tuc"),
			"san-pham" => array("vi" => "san-pham"),
			"cong-trinh" => array("vi" => "cong-trinh"),
			"dich-vu" => array("vi" => "dich-vu"),
			"lien-he" => array("vi" => "lien-he"),
			"doi-tac" => array("vi" => "doi-tac")
		)
	),

	// Cấu hình đơn hàng:
	'order' => array(
		'ship' => true,
	),

	// Cấu hình đăng nhập:
	'login' => array(
		'admin' => 'LoginAdmin' . NN_MSHD,
		'member' => 'LoginMember' . NN_MSHD,
		'attempt' => 5,
		'delay' => 15
	),

	// Cấu hình Google API:
	'googleAPI' => array(
		'recaptcha' => array(
			'active' => true,
			'urlapi' => 'https://www.google.com/recaptcha/api/siteverify',
			'sitekey' => '6LfGof0hAAAAALA2D301jkz-MyM_PmVTdjMQSw2R',
			'secretkey' => '6LfGof0hAAAAAKEnW5YqUc9V2ChTHsTGL6Hg-Trt'
			//'sitekey' => '6Ld05qcZAAAAAJedNSmLEe1NOZdDtlYhwmltTIDC',
			//'secretkey' => '6Ld05qcZAAAAAABH8BWbSiLnPoXTRXFReFDM7b8t'
		)
	),

	// Cấu hình OneSignal:
	'oneSignal' => array(
		'active' => false,
		'id' => 'af12ae0e-cfb7-41d0-91d8-8997fca889f8',
		'restId' => 'MWFmZGVhMzYtY2U0Zi00MjA0LTg0ODEtZWFkZTZlNmM1MDg4'
	),

	// Cấu hình giấy phép:
	'license' => array(
		'version' => "7.0.0",
		'powered' => "tts@congnghetts.vn"
	)
);

//Báo cáo lỗi:
/* Error reporting */
error_reporting(($config['website']['error-reporting']) ? E_ALL : 0);

// Thiết lập các cấu hình cơ bản:
/* Cấu hình base */
$http = 'http://';
$config_url = $config['database']['server-name'] . $config['database']['url'];
$config_base = $http . $config_url;

// Cấu hình đăng nhập:
/* Cấu hình login */
$login_admin = $config['login']['admin'];
$login_member = $config['login']['member'];

// Yêu cầu file constant.php:
/* Cấu hình upload */
require_once LIBRARIES . "constant.php";
