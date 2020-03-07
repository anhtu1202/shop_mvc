<?php 
require_once app_path.'/Model/ProductModel.php';
require_once app_path.'/Model/CatModel.php';
require_once app_path.'/Model/BrandModel.php';

class ProductController extends ControllerBase
{

	public function Productadd(){
		$data =['msg'=>[], 'cat'=>[], 'brand'=>[] ];
		$objCatModel = new CatModel();
		$data['cat'] = $objCatModel->getAllCat();
		if (isset($_POST['submit'])) {
			$res = $objProModel->productAdd($_POST, $_FILES); //gọi hàm trong model để lấy danh sách
			if ($res) {
				$data['msg'] = $res;
			}
		}
		$this->RenderView('admin.productadd', $data);
	}

	public function Productlist(){
		$objProModel = new ProductModel(); // tạo đối tượng model
		$data = $objProModel->getAllPro(); //gọi hàm trong model để lấy danh sách
		$this->RenderView('admin.productlist', $data);
	}

	public function Productdel(){
		$objProModel = new ProductModel();
		if (isset($_GET['id'])) {
			$res = $objProModel->proDel($_GET['id']);
			if ($res) {
				$_SESSION['success'] = $res;
			}
		}
		header('Location:' .base_path.'?ct=product&act=productlist');
	}

	public function Proedit(){
		$data =['msg'=>[] ];
		$objProModel = new PmsModel(); // tạo đối tượng model
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$data = $objProModel->getPro($id); //gọi hàm trong model để lấy danh sách
			if (isset($_POST['submit'])) {
				$res = $objProModel->proEdit($id,$_POST,$_FILES); 
				if ($res) {
					$_SESSION['success'] = $res;
					header('Location:' .base_path.'?ct=pms&act=productlist');
				}
			}
		}
		$this->RenderView('admin.productedit', $data); 
	}
	
	}
