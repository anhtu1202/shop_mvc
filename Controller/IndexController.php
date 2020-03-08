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
		$objProModel = new ProductModel();
		if(!empty($_SESSION['auth'])){
			$id = $_SESSION['auth']['id'];
			$objProModel->delCart();
			$objProModel->delCompare($id);
			$objProModel->delWishlist($id);
			session_destroy();
		}
		header('Location:'.base_path);
		}


	public function Details(){
		$data =[ 'msg'=>[], 'pro'=>[], 'cat'=>[], 'apple'=>[], 'samsung'=>[], 'dell'=>[], 'sony'=>[], 'slide'=>[] ];
			if(isset($_GET['product_id'])){
			$objProModel = new ProductModel();
			$objCatModel = new CatModel();
			$data['pro'] = $objProModel->getProduct($_GET['product_id']);
			$data['cat'] = $objCatModel->getAllCat();
			if (isset($_POST['compare'])) {
				if (isset($_SESSION['auth'])) {
					$customer_id = $_SESSION['auth']['id'];
					$product_id = $_POST['product_id'];
					$data['msg'] = $objProModel->compareAdd($customer_id,$product_id);
				}else {
					$data['apple'] = $objProModel->getLastedApple();
					$data['samsung'] = $objProModel->getLastedSamsung();
					$data['dell'] = $objProModel->getLastedDell();
					$data['sony'] = $objProModel->getLastedSony();
					$data['slide'] = $objProModel->getSlider();
					$data['msg'] = "<span class='success'>Login to choose compare</span>";
					$this->RenderView('view.login', $data);
				}
			} else if (isset($_POST['wlist'])) {
				if (isset($_SESSION['auth'])) {
					$customer_id = $_SESSION['auth']['id'];
					$product_id = $_POST['product_id'];
					$data['msg'] = $objProModel->wlistAdd($customer_id,$product_id);
				}else {
					$data['apple'] = $objProModel->getLastedApple();
					$data['samsung'] = $objProModel->getLastedSamsung();
					$data['dell'] = $objProModel->getLastedDell();
					$data['sony'] = $objProModel->getLastedSony();
					$data['slide'] = $objProModel->getSlider();
					$data['msg'] = "<span class='success'>Login to choose wishlist</span>";
					$this->RenderView('view.login', $data);
				}
			}
			$this->RenderView('view.details', $data);
			}else {
				$this->RenderView('view.404', $data);	
			}
		}

	public function Productcat(){
		$data =['cat'=>[], 'pro'=>[], 'apple'=>[], 'samsung'=>[], 'dell'=>[], 'sony'=>[], 'slide'=>[] ];
		$objProModel = new ProductModel();
		$objCatModel = new CatModel();
		$data['apple'] = $objProModel->getLastedApple();
		$data['samsung'] = $objProModel->getLastedSamsung();
		$data['dell'] = $objProModel->getLastedDell();
		$data['sony'] = $objProModel->getLastedSony();
		$data['slide'] = $objProModel->getSlider();
		if(isset($_GET['cat_id'])){
			$data['pro'] = $objProModel->getProductCat($_GET['cat_id']);
			$data['cat'] = $objCatModel->getCat($_GET['cat_id']);
				$this->RenderView('view.productbycat', $data);
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
		header('Location: ?act=cart');
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
				$_SESSION['sum'] = null;
				$_SESSION['qtity'] = null;
				if ($res) {
					header('Location: ?act=cart');
				}
			}
			$this->RenderView('view.cart', $data);
		}	

		



	public function Contact()
		{
			$data =['cat'=>[], 'pro'=>[], 'apple'=>[], 'samsung'=>[], 'dell'=>[], 'sony'=>[], 'slide'=>[] ];
			$objProModel = new ProductModel();
			$data['apple'] = $objProModel->getLastedApple();
			$data['samsung'] = $objProModel->getLastedSamsung();
			$data['dell'] = $objProModel->getLastedDell();
			$data['sony'] = $objProModel->getLastedSony();
			$data['slide'] = $objProModel->getSlider();
				$this->RenderView('view.contact', $data);
		}	

	public function Profile()
		{
			$objUserModel = new UserModel();
			if (isset($_SESSION['auth'])) {
				$email = $_SESSION['auth']['email'];
				$data[] = $objUserModel->loadLogin($email);
			}
			$this->RenderView('view.profile', $data);
		}	

	public function Editprofile()
		{
			$data = [ 'msg'=>[], 'user'=>[] ];
			$objUserModel = new UserModel();
			if (isset($_SESSION['auth'])) {
				$email = $_SESSION['auth']['email'];
				$data = $objUserModel->loadLogin($email);
				if (isset($_POST['save'])) {
					$data = $objUserModel->updateProfile($_POST);
					$data['msg'] = "<div class='alert alert-success'>Update success</div>";
					$this->RenderView('view.editprofile', $data);
				}
			} 
			$this->RenderView('view.editprofile', $data);
		}

	public function Payment()
	{
		$data = [ 'msg'=>[] ];
			$ProModel = new ProductModel();
			$objUserModel = new UserModel();
			if (isset($_SESSION['auth'])) {
				$this->RenderView('view.payment', $data);
			} else {
				$data['msg'] = "<div class='alert alert-success'>Login to payment</div>";
				$this->RenderView('view.login', $data);
			}
	}

	public function Offlinepayment()
	{
		$data = [ 'msg'=>[], 'cart'=>[], 'user'=>[] ];
			$objProModel = new ProductModel();
			$objUserModel = new UserModel();
			if (isset($_SESSION['auth'])) {
				$id = $_SESSION['auth']['id'];
				$email = $_SESSION['auth']['email'];
				$data['user'] = $objUserModel->loadLogin($email);
				$data['cart'] = $objProModel->getCart();
				if (isset($_GET['order_id']) && $_GET['order_id'] == 'order') {
					$res = $objProModel->Order($id);
					if ($res == true) {
						$_SESSION['sum'] = null; $_SESSION['qtity'] = null;
						$delCart = $objProModel->delCart();
						header('Location: ?act=success');
					}
				}
				$this->RenderView('view.offlinepayment', $data);
			} else {
				$data['msg'] = "<div class='alert alert-success'>Login to payment</div>";
				$this->RenderView('view.login', $data);
			}
	}

	public function Success()
	{
		$data = [ 'msg'=>[] ];
		if (isset($_SESSION['auth'])) {
				$this->RenderView('view.success', $data);
			} else {
				$data['msg'] = "<div class='alert alert-success'>Login to order</div>";
				$this->RenderView('view.login', $data);
			}
	}
	
	public function Orderdetails()
	{
		$data = [ 'msg'=>[] ];
		$objProModel = new ProductModel();
		if (isset($_SESSION['auth'])) {
			$id = $_SESSION['auth']['id'];
			$data = $objProModel->getOrder($id);
				$this->RenderView('view.orderdetails', $data);
			} else {
				$data['msg'] = "<div class='alert alert-success'>Login to order</div>";
				$this->RenderView('view.login', $data);
			}
	}

	public function Compare()
	{
		$data = [ 'msg'=>[], 'compare'=>[], 'apple'=>[], 'samsung'=>[], 'dell'=>[], 'sony'=>[], 'slide'=>[] ];
		$objProModel = new ProductModel();
		if (isset($_SESSION['auth'])) {
			$id = $_SESSION['auth']['id'];
			$data['compare'] = $objProModel->getCompare($id);
			$data['apple'] = $objProModel->getLastedApple();
			$data['samsung'] = $objProModel->getLastedSamsung();
			$data['dell'] = $objProModel->getLastedDell();
			$data['sony'] = $objProModel->getLastedSony();
			$data['slide'] = $objProModel->getSlider();
				$this->RenderView('view.compare', $data);
			} else {
				$data['msg'] = "<span class='success'>Login to compare view</span>";
				$this->RenderView('view.login', $data);
			}
	}

	public function Wishlist()
	{
		$data = [ 'msg'=>[], 'wishlist'=>[], 'apple'=>[], 'samsung'=>[], 'dell'=>[], 'sony'=>[], 'slide'=>[] ];
		$objProModel = new ProductModel();
		if (isset($_SESSION['auth'])) {
			$id = $_SESSION['auth']['id'];
			$data['wishlist'] = $objProModel->getWishlist($id);
			$data['apple'] = $objProModel->getLastedApple();
			$data['samsung'] = $objProModel->getLastedSamsung();
			$data['dell'] = $objProModel->getLastedDell();
			$data['sony'] = $objProModel->getLastedSony();
			$data['slide'] = $objProModel->getSlider();
				$this->RenderView('view.wishlist', $data);
			} else {
				$data['msg'] = "<span class='success'>Login to wishlist view</span>";
				$this->RenderView('view.login', $data);
			}
	}

	public function Search(){
		 $objProModel=new ProductModel();
		if (isset($_GET['keywords'])) {
			$keywords=$_GET['keywords'];

			$data=$objProModel->SearchData($keywords);
		
		}
			$this->RenderView('view.search', $data);
		}	

	public function Admin()
	{
		$data = [ 'msg'=>[] ];
		if (isset($_SESSION['auth'])) {
			if ($_SESSION['auth']['id'] == 1 || $_SESSION['auth']['id'] == 2) {
			$this->RenderView('admin.index', $data);
			}
		} else {
			$this->RenderView('view.404', $data);
		}
	}

}		

