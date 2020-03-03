<?php
	require_once app_path.'/Model/UserModel.php'; // nhúng file model vào để làm việc
	require_once app_path.'/Model/ProductModel.php'; // nhúng file model vào để làm việc
	require_once app_path.'/Model/PmsModel.php'; // nhúng file model vào để làm việc

	class IndexController extends ControllerBase{

	public function Index(){
		$data =['fea'=>[], 'new'=>[], 'apple'=>[], 'samsung'=>[], 'dell'=>[], 'sony'=>[], 'slide'=>[] ];
		$objModel = new ProductModel();
		$data['fea'] = $objModel->getFeaPro();
		$data['new'] = $objModel->getNewPro();
		$data['apple'] = $objModel->getLastedApple();
		$data['samsung'] = $objModel->getLastedSamsung();
		$data['dell'] = $objModel->getLastedDell();
		$data['sony'] = $objModel->getLastedSony();
		$data['slide'] = $objModel->getSlider();
		$this->RenderView('view.index', $data);
	}


	public function Regis(){

		$data =['err'=>[], 'msg'=>[]];
		$objModel = new UserModel();
		if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){				
			$succes = $objModel->addUser($_POST);

		}	
		$this->RenderView('user.regis', $data);
	}

	public function Login(){
		$data =['err'=>[], 'msg'=>[], 'apple'=>[], 'samsung'=>[], 'dell'=>[], 'sony'=>[], 'slide'=>[] ];
		if (isset($_SESSION['auth']['id_role']) == 1) {
			$this->RenderView('admin.index', $data);
		}
		$objProModel = new ProductModel();
		$data['apple'] = $objProModel->getLastedApple();
		$data['samsung'] = $objProModel->getLastedSamsung();
		$data['dell'] = $objProModel->getLastedDell();
		$data['sony'] = $objProModel->getLastedSony();
		$data['slide'] = $objProModel->getSlider();
		if(isset($_POST['signin'])){
			$email = $_POST['email'];
			$password = $_POST['password'];
			$objUserModel = new UserModel();
			$userInfo = $objUserModel->loadLogin($email);
		if(!empty($userInfo)){
			if(password_verify($password, $userInfo['password'])) {
				unset($userInfo['password']);

				// Load danh sách các quyền được cấp
				$objPmsModel = new PmsModel(); 
				$pmsList = $objPmsModel->loadPmsByRole($userInfo['id_role']);
				// gán thêm vào mảng UserInfo để sử dụng ở hàm CHeckACL
				$userInfo['list_pms'] = $pmsList;

				$_SESSION['auth'] = $userInfo;
				$data['msg'] = 'Login thành công';
				if ($userInfo['id_role'] == 1) {
					$this->RenderView('admin.index', $data);
				} else {
					$this->RenderView('view.login', $data);
				}
				
				}else{
				$data['err'] = 'Sai password';
				$this->RenderView('view.login', $data);
				}

		}else{
			$data['err'] = 'Không tồn tại tài khoản';
			$this->RenderView('view.login', $data);
			}
		}else {
			$this->RenderView('view.login', $data);
		}		

	}

	public function Logout(){
		if(!empty($_SESSION['auth'])){
			session_unset();
		}
		header('Location:'.base_path);
		}

}