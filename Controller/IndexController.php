<?php
	require_once app_path.'/Model/UserModel.php'; // nhúng file model vào để làm việc
	require_once app_path.'/Model/ProductModel.php'; // nhúng file model vào để làm việc
	require_once app_path.'/Model/PmsModel.php'; // nhúng file model vào để làm việc
	require_once app_path.'/Model/BrandModel.php'; // nhúng file model vào để làm việc
	require_once app_path.'/Model/CatModel.php';

	class IndexController extends ControllerBase{

	public function Index(){
		$data =['fea'=>[], 'new'=>[], 'apple'=>[], 'samsung'=>[], 'dell'=>[], 'sony'=>[], 'slide'=>[] ,'details'=>[]];
		$objModel = new ProductModel();
		$data['fea'] = $objModel->getFeaPro();
		$data['new'] = $objModel->getNewPro();
		$data['apple'] = $objModel->getLastedApple();
		$data['samsung'] = $objModel->getLastedSamsung();
		$data['dell'] = $objModel->getLastedDell();
		$data['sony'] = $objModel->getLastedSony();
		$data['slide'] = $objModel->getSlider();
		$data['details']=$objModel->getAllPro();
		$this->RenderView('view.index', $data);
	}


	public function Regis(){

		$data =['err'=>[], 'msgre'=>[], 'apple'=>[], 'samsung'=>[], 'dell'=>[], 'sony'=>[], 'slide'=>[] ];
		$objModel = new UserModel();
		$objProModel = new ProductModel();
		$data['apple'] = $objProModel->getLastedApple();
		$data['samsung'] = $objProModel->getLastedSamsung();
		$data['dell'] = $objProModel->getLastedDell();
		$data['sony'] = $objProModel->getLastedSony();
		$data['slide'] = $objProModel->getSlider();
		if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){	
			if ($_POST['captcha'] == $_SESSION['captcha']){
       			$succes = $objModel->addUser($_POST);
	       		if(!empty($succes)){

				$data['msg'] = $succes;

					$data['msgre'] = $succes;

				}
   			 }else {
   			 	$data['err'] = 'Mã captcha ko đúng!';
   		 	}			
		}	
		$this->RenderView('view.login', $data);
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
		$data['details']=$objProModel->getAllPro();
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

	public function Products()
	{
		$data =['brand'=>[], 'pro'=>[], 'apple'=>[], 'samsung'=>[], 'dell'=>[], 'sony'=>[], 'slide'=>[] ];
		$objProModel = new ProductModel();
		$objBrandModel = new BrandModel();
		$data['brand'] = $objBrandModel->getAllBrand();
		$data['pro'] = $objProModel->getAllPro();
		$data['apple'] = $objProModel->getLastedApple();
		$data['samsung'] = $objProModel->getLastedSamsung();
		$data['dell'] = $objProModel->getLastedDell();
		$data['sony'] = $objProModel->getLastedSony();
		$data['slide'] = $objProModel->getSlider();
		$this->RenderView('view.products', $data);
	}

	

	public function Logout(){
		if(!empty($_SESSION['auth'])){
			session_unset();
		}
		header('Location:'.base_path);
		}


	public function Details(){
		$data =[ 'pro'=>[], 'cat'=>[] ];
			if(isset($_GET['product_id'])){
			$objProModel = new ProductModel();
			$objCatModel = new CatModel();
			$data['pro'] = $objProModel->getProduct($_GET['product_id']);
			$data['cat'] = $objCatModel->getAllCat();
			$this->RenderView('view.details', $data);
			}else {
				$this->RenderView('view.404', $data);	
			}
		}

	public function Buy()
		{
			$data =[ 'msg'=>[] ];
			$objProModel = new ProductModel();
			$objCatModel = new CatModel();
			$data['pro'] = $objProModel->getProduct($_GET['product_id']);
			$data['cat'] = $objCatModel->getAllCat();
			if (isset($_POST['buy'])) {
				$res = $objProModel->cartAdd($_GET['product_id'], $_POST['quantity']);
				if ($res) {
					$data['msg'] = $res;
				}else {
					$this->RenderView('view.404', $data);
				}
			}
		$this->RenderView('view.details', $data);
		}	
		

		
	public function Productbycat(){
		$data=['prod'=>[],'cat'=>[]];
		if(isset($_GET['cat_id'])){
			$objProModel= new ProductModel();
			$objCatModel= new CatModel();
			$data['prod'] = $objProModel->getProductbycat();
			
		}
		$this->RenderView('view.productbycat', $data);
		}	


	public function Cart()
		{
			$data =[ 'msg'=>[], 'cart'=>[] ];
			$objProModel = new ProductModel();
			$data['cart'] = $objProModel->getCart();
			if (isset($_POST['cart_id']) && isset($_POST['quantity'])) {
				$res = $objProModel->cartUpdate($_POST['cart_id'], $_POST['quantity']);
				if ($res) {
					$_SESSION['success'] = $res;
					
					header('Location: ?act=cart');
				}else {
					$this->RenderView('view.404', $data);
				}
			} else if (isset($_GET['cart_id'])) {
				$res = $objProModel->cartDel($_GET['cart_id']);
				if ($res) {
					$_SESSION['success'] = $res;
					header('Location: ?act=cart');
				}
			}
			$this->RenderView('view.cart', $data);
		}	
}		

