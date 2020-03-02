<?php
class ControllerBase{
public $layout = app_path.'/View/layout.php'; // tạm gán mặc định đã.
protected $dataView = null;
protected $file_view_path = null;
public function RenderView($view_name, $data){
$this->dataView = $data;
//ví dụ view_name: admin.user.list, đường dẫn tương ứng: /View/admin/user/list.phtml
// $data: array
// tách chuỗi tìm file view
// tên file view sẽ đặt đuôi file là: .phtml để cho phép vừa viết html vừa viết php
	$this->file_view_path = app_path.'/View/'. str_replace('.', '/',
$view_name).'.php';
	
//nhúng file layout trước
if(file_exists($this->layout))
	require_once $this->layout;
	else
	die('Chua co file /View/layout.php');
}
public function showContent(){
	if(empty($this->file_view_path))
	die('Khong ton tai file view '. $this->file_view_path);
	require_once $this->file_view_path;
	}
}
