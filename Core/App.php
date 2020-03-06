
<?php 
	/**
	 * 
	 */
	class App
	{
		public function run()
		{
			//xử lý điều khiển ở đây
			// echo Bắt "<br> Bắt đầu chạy ứng dụng...";
			//VD: link vào web index.php?ct=user;act=list-all
			// index.php?ct=user&act=detail&id=123
			//======================== thu biến:
			$ct = isset($_GET['ct']) ? $_GET['ct'] : 'index';
			$act = isset($_GET['act']) ? $_GET['act'] : 'index';
			
			// echo "<br> Controller: $ct / $act";
			// nhúng controller

			$classCt = str_replace('-', ' ', $ct);
			$classCt = ucwords($classCt);
			$classCt = str_replace(' ', '', $classCt);
			$classCt = $classCt.'Controller';
				
			//Nhúng file controller
			$file_controller = app_path.'/Controller/'.$classCt.'.php';
			if (file_exists($file_controller)) {
				require_once $file_controller;
			} else {
				die('Không tồn tại file $file_controller');
			}

			// Tạo đối tượng
			$ObjCt = new $classCt();
			// ?ct=san-pham$act=list-all
			//============Xử lí lấy hàm
			$actName = str_replace('-', ' ', $act);
			$actName = ucwords($actName);
			$actName = str_replace(' ', '', $actName);

			$this->CheckACL($classCt, $actName);

			if (method_exists($ObjCt, $actName)) {
				$ObjCt->$actName();

			} else {
				header('Location: '.base_path);
			}
		}

		public function CheckACL($controllerClass, $action){

			// VD: Index.Logout, User.ListAll
			// đây là controller action người dùng đang truy cập vào link
			$ct = str_replace('Controller', '', $controllerClass);
			// $act = $action;
			//1. Ghép chuỗi để đối chiếu với Session
			$strCheck = $ct .'.'. $action;

			// khai báo sẵn mảng các chức năng public không chặn quyền.
			$arr_public_action = ['Index.Index',

			'Index.Details','Index.Login','Index.Products','Index.Regis','Index.Captcha','Index.Productbycat',

			'Index.Buy','Index.Cart'];


			if(in_array($strCheck, $arr_public_action)){
			return true;// các chức năng public thì luôn là true, ai cũng được phép vào không chặn quyền
			}

			// kiểm tra đối chiếu với session list_pms
			// các tình huống kiểm tra:
			// 1. Chưa đăng nhập == tự chuyển về trang đăng nhập
			if(empty($_SESSION['auth'])){
			// chưa đăng nhập ==  chuyển trang
			header('Location:'. base_path.'/?act=login');
			}
			// 2. Đã đăng nhập rồi == kiểm tra quyền, nếu có quyền thì return true, nếu không thì return false
			$userInfo = $_SESSION['auth'];
			if(in_array($strCheck, $userInfo['list_pms'])){
				return false;// Chức năng được cấp quyền trong db thì true
			} else {
				header('Location:'. base_path);
			}
		}

	}
