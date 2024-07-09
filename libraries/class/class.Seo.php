<?php

/**
 * Lớp Seo cung cấp các phương thức để thiết lập, lấy và quản lý dữ liệu SEO từ cơ sở dữ liệu.
 * Các phương thức chính:
 * setSeo: Thiết lập giá trị SEO cho một khóa cụ thể.
 * getSeo: Lấy giá trị SEO cho một khóa cụ thể.
 * getSeoDB: Truy vấn cơ sở dữ liệu để lấy dữ liệu SEO.
 * updateSeoDB: Cập nhật dữ liệu SEO trong cơ sở dữ liệu.
 * Cách sử dụng: Đối tượng Seo được khởi tạo với một đối tượng cơ sở dữ liệu,
 * sau đó có thể thiết lập và quản lý các giá trị SEO thông qua các phương thức đã định nghĩa.
 */
class Seo
{
	private $d;
	private $data;

	function __construct($d)
	{
		$this->d = $d;
	}

	public function setSeo($key = '', $value = '')
	{
		if ($key != '' && $value != '') $this->data[$key] = $value;
	}

	public function getSeo($key)
	{
		return (isset($this->data[$key]) && $this->data[$key] != '') ? $this->data[$key] : '';
	}
	/**
	 * Chức năng: Lấy dữ liệu SEO từ cơ sở dữ liệu.
	 * @param mixed $id  ID của mục SEO.
	 * @param mixed $com Thành phần liên quan
	 * @param mixed $act: Hành động liên quan.
	 * @param mixed $type Loại SEO
	 * @return mixed
	 */
	public function getSeoDB($id = 0, $com = '', $act = '', $type = '')
	{
		// Hoạt động:
		// Nếu có ID hoặc hành động là 'capnhat', phương thức sẽ truy
		// vấn cơ sở dữ liệu và trả về hàng dữ liệu tương ứng.
		if ($id || $act == 'capnhat') {
			if ($id) $row = $this->d->rawQueryOne("select * from #_seo where idmuc = ? and com = ? and act = ? and type = ? limit 0,1", array($id, $com, $act, $type));
			else $row = $this->d->rawQueryOne("select * from #_seo where com = ? and act = ? and type = ? limit 0,1", array($com, $act, $type));

			return $row;
		}
	}

	public function updateSeoDB($json = '', $table = '', $id = 0)
	{
		if ($table && $id) $this->d->rawQuery("update #_$table set options = ? where id = ?", array($json, $id));
	}
}
