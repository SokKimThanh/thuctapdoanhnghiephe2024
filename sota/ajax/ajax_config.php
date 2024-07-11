<?php
// 1. Khởi tạo session:
// Lệnh này bắt đầu một phiên làm việc mới hoặc khôi phục phiên làm việc hiện tại 
// dựa trên ID phiên làm việc đã được truyền qua cookie.
session_start();

// 2. Định nghĩa các hằng số:
// Các hằng số này xác định đường dẫn tới các thư mục cần thiết trong ứng dụng.
define('LIBRARIES', '../../libraries/');
define('SOURCES', '../sources/');
define('THUMBS', 'thumbs');

// 3. Yêu cầu các file cấu hình và tự động tải:
// Đoạn code này yêu cầu file cấu hình và file autoload.php từ thư mục libraries.
require_once LIBRARIES . "config.php";
require_once LIBRARIES . 'autoload.php';

// 4. Khởi tạo đối tượng autoload:
// Dòng này khởi tạo một đối tượng AutoLoad, có thể chứa các phương thức tự động 
// tải các lớp trong ứng dụng.
new AutoLoad();

// 5. Khởi tạo đối tượng cơ sở dữ liệu:
// Tạo một đối tượng cơ sở dữ liệu mới từ lớp PDODb với các thiết lập từ mảng 
// cấu hình database trong file config.php.
$d = new PDODb($config['database']);

// 6. Khởi tạo đối tượng Functions:
// Tạo một đối tượng Functions, có thể chứa các phương thức hỗ trợ cho ứng dụng. 
// Đối tượng này được khởi tạo với đối tượng cơ sở dữ liệu $d.
$func = new Functions($d);

// 7. Khởi tạo đối tượng FileCache:
// Tạo một đối tượng FileCache, có thể chứa các phương thức để xử lý bộ nhớ đệm, 
// khởi tạo với đối tượng cơ sở dữ liệu $d.
$cache = new FileCache($d);

// 8. Kiểm tra trạng thái đăng nhập:
// Sử dụng phương thức check_login của đối tượng Functions để kiểm tra xem người
//  dùng đã đăng nhập hay chưa. Nếu chưa, kết thúc script bằng die().
if ($func->check_login() == false) {
    die();
}

/**
 * Tổng hợp
 * Đoạn code này thực hiện các bước sau:
 * Khởi tạo session.
 * Định nghĩa các hằng số chứa đường dẫn tới các thư mục cần thiết.
 * Bao gồm các file cấu hình và tự động tải.
 * Khởi tạo các đối tượng cần dùng như cơ sở dữ liệu, các hàm hỗ trợ, và bộ nhớ đệm.
 * Kiểm tra trạng thái đăng nhập của người dùng và dừng script nếu người dùng chưa đăng nhập.
 * Đoạn code này chủ yếu được sử dụng để thiết lập môi trường làm việc cho một ứng 
 * dụng web, đảm bảo rằng các thư viện và đối tượng cần thiết được khởi tạo đúng
 * cách và kiểm tra xem người dùng có quyền truy cập hay không.
 */