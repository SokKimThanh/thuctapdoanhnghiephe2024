<!-- 
 Đoạn code PHP này được sử dụng để xử lý yêu cầu AJAX từ phía người dùng. 
 Nó lấy dữ liệu từ cơ sở dữ liệu dựa trên các tham số được gửi qua POST và trả 
 về các tùy chọn dưới dạng HTML <option> để sử dụng trong một thẻ <select>.
 -->
<?php
// 1. Kết nối và cài đặt ban đầu:
// Đoạn này bao gồm file ajax_config.php, có thể chứa các thiết lập kết nối 
// cơ sở dữ liệu và các cấu hình khác.
include "ajax_config.php";
// 2. Kiểm tra sự tồn tại của tham số POST:
// Đoạn code chỉ chạy khi tham số POST id được gửi lên.
if (isset($_POST["id"])) {
	// 3. Lấy và xử lý các tham số POST:
	// Sử dụng hàm htmlspecialchars để bảo vệ chống lại các cuộc tấn công XSS.
	// Các biến được gán giá trị mặc định nếu không có giá trị được gửi lên.
	$level = (isset($_POST["level"])) ? htmlspecialchars($_POST["level"]) : 0;
	$table = (isset($_POST["table"])) ? htmlspecialchars($_POST["table"]) : '';
	$id = (isset($_POST["id"])) ? htmlspecialchars($_POST["id"]) : 0;
	$type = (isset($_POST["type"])) ? htmlspecialchars($_POST["type"]) : '';
	$row = null;
	// 4. Xác định cột cần truy vấn dựa trên cấp độ:
	// Sử dụng switch để xác định tên cột cần truy vấn dựa trên giá trị của 
	// biến $level. Nếu $level không hợp lệ, trả về lỗi và dừng script.
	switch ($level) {
		case '0':
			$id_temp = "id_list";
			break;

		case '1':
			$id_temp = "id_cat";
			break;

		case '2':
			$id_temp = "id_item";
			break;

		default:
			echo 'error ajax';
			exit();
	}

	// 5. Truy vấn cơ sở dữ liệu:
	// Nếu có id, thực hiện truy vấn cơ sở dữ liệu để lấy dữ liệu. Câu truy vấn
	//  sử dụng các biến $table, $id_temp, $id, và $type.
	if ($id) {
		$row = $d->rawQuery("select tenvi, id from $table where $id_temp = ? and type = ? order by stt,id desc", array($id, $type));
	}
	// 6. Tạo chuỗi HTML cho các tùy chọn:
	// Khởi tạo chuỗi HTML với tùy chọn mặc định. Nếu có kết quả từ truy vấn 
	// cơ sở dữ liệu, thêm các tùy chọn vào chuỗi HTML.
	$str = '<option value="0">Chọn danh mục</option>';
	if ($row) {
		foreach ($row as $v) {
			$str .= '<option value=' . $v["id"] . '>' . $v["tenvi"] . '</option>';
		}
	}
	echo $str;
}
?>
<!-- Tổng hợp
Đoạn code này thực hiện các bước sau:

1. Bao gồm file cấu hình.
2. Kiểm tra và xử lý các tham số từ POST.
3. Xác định cột cơ sở dữ liệu cần truy vấn dựa trên cấp độ.
4. Thực hiện truy vấn cơ sở dữ liệu với các tham số.
5. Tạo chuỗi HTML từ kết quả truy vấn và trả về cho client.
Đoạn code này chủ yếu để tạo danh sách các tùy chọn cho thẻ <select> dựa trên 
	dữ liệu từ cơ sở dữ liệu, giúp trang web có thể thay đổi các tùy chọn một 
	cách động mà không cần phải tải lại trang. 
	-->