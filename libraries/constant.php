<?php

/**
 * Đoạn mã này kiểm tra và tạo các thư mục cần thiết cho việc upload file trong ứng dụng web.
 * Nó đảm bảo rằng các thư mục cần thiết luôn tồn tại và có quyền truy cập phù hợp (0777).
 * File .htaccess được tạo trong thư mục gốc để chặn truy cập vào các file nhạy cảm, bảo vệ bảo mật cho ứng dụng.
 * Các hằng số được định nghĩa động dựa trên tên thư mục, giúp việc truy cập các đường dẫn này trong mã nguồn dễ dàng hơn.
 * Cách tổ chức mã và sử dụng các hàm kiểm tra, tạo thư mục và định nghĩa hằng số giúp mã rõ ràng, dễ bảo trì và mở rộng.
 */
// Kiểm tra định nghĩa của LIBRARIES: Nếu hằng số LIBRARIES chưa được định nghĩa,
// sẽ hiển thị thông báo lỗi và dừng thực thi mã.
if (!defined('LIBRARIES')) die("Error");

// Thiết lập mảng thư mục và tên thư mục gốc cho upload:
// $upload_const: tên thư mục gốc cho các thư mục upload.
// $array_const: mảng chứa tên các thư mục con cần tạo bên trong thư mục gốc.
/* Array folders */
$upload_const = 'upload';
$array_const = array('file', 'elfinder', 'sync', 'excel', 'seopage', 'photo', 'temp', 'user', 'product', 'color', 'news', 'tags', 'static');

// Kiểm tra và tạo thư mục gốc nếu chưa tồn tại:
// 	Kiểm tra xem thư mục gốc (upload_const) đã tồn tại chưa. 
// Nếu chưa, tạo thư mục với quyền truy cập 0777.
/* Define - Create folders upload */
if (!file_exists(ROOT . '/../' . $upload_const)) {
	mkdir(ROOT . '/../' . $upload_const, 0777, true);
	chmod(ROOT . '/../' . $upload_const, 0777);
}

// Kiểm tra và tạo các thư mục con:

// 	- Định nghĩa hằng số động cho các thư mục con:
// Kiểm tra xem thư mục gốc đã tồn tại và mảng $array_const không rỗng.
// Tạo file .htaccess bên trong thư mục gốc nếu chưa tồn tại:

/* Define - Create folders childs */
if (file_exists(ROOT . '/../' . $upload_const) && $array_const) {
	$path_htaccess = ROOT . '/../' . $upload_const . '/.htaccess';
	// Tạo file .htaccess bên trong thư mục gốc nếu chưa tồn tại:
	if (!file_exists($path_htaccess)) {
		$content_htaccess = '';
		// Nội dung .htaccess: chặn truy cập vào các file nhạy cảm.
		$content_htaccess .= '<Files ~ "\.(inc|sql|php|cgi|pl|php4|php5|asp|aspx|jsp|txt|kid|cbg|nok|shtml)$">' . PHP_EOL;
		$content_htaccess .= 'order allow,deny' . PHP_EOL;
		$content_htaccess .= 'deny from all' . PHP_EOL;
		$content_htaccess .= '</Files>';

		$file_htaccess = fopen($path_htaccess, "w") or die("Unable to open file");
		fwrite($file_htaccess, $content_htaccess);
		fclose($file_htaccess);
	}
	// Duyệt qua mảng $array_const để tạo các hằng số định nghĩa đường dẫn và tạo thư mục con nếu chưa tồn tại:
	foreach ($array_const as $vconst) {
		$define_upper_upload = strtoupper($upload_const);
		$define_upper_const = strtoupper($vconst);
		$define_lower_const = $vconst;
		$define_in = '../' . $upload_const . '/' . $define_lower_const . '/';
		$define_out = $upload_const . '/' . $define_lower_const . '/';

		// tạo hằng số định nghĩa UPLOAD_PHOTO_L nếu không có
		if (!defined($define_upper_upload . '_' . $define_upper_const) && !defined($define_upper_upload . '_' . $define_upper_const . '_L')) {

			// Định nghĩa các hằng số cho đường dẫn thư mục (UPLOAD_<TÊN THƯ MỤC>_L và UPLOAD_<TÊN THƯ MỤC>).
			define($define_upper_upload . '_' . $define_upper_const, $define_in);
			define($define_upper_upload . '_' . $define_upper_const . '_L', $define_out);

			// Kiểm tra và tạo thư mục con với quyền truy cập 0777 nếu chưa tồn tại.
			if (!file_exists(ROOT . '/../' . $upload_const . '/' . $define_lower_const)) {
				mkdir(ROOT . '/../' . $upload_const . '/' . $define_lower_const, 0777, true);
				chmod(ROOT . '/../' . $upload_const . '/' . $define_lower_const, 0777);
			}
		}
	}
}
