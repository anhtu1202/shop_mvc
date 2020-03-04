<?php 
require_once app_path.'/Model/CatModel.php';
require_once app_path.'/Model/BrandModel.php';

class BrandController extends ControllerBase
{

	public function Brandlist(){
		$data =['msg'=>[] ];
		$objBrandModel = new BrandModel(); // tạo đối tượng model
		$data = $objBrandModel->getAllBrand(); //gọi hàm trong model để lấy danh sách
		$this->RenderView('admin.brandlist', $data);
	}

	public function Brandadd(){
		$data =['msg'=>[] ,'cat'=>[] ];
		$objBrandModel = new BrandModel(); // tạo đối tượng model
		$objCatModel = new CatModel();
		$data['cat']=$objCatModel->getAllCat();
		if (isset($_POST['submit'])) {
			$brand_name = $_POST['brand_name'];
			$res = $objBrandModel->brandAdd($brand_name); //gọi hàm trong model để lấy danh sách
			if ($res) {
				$data['msg'] = $res;
			}
		}
		$this->RenderView('admin.brandadd', $data);
	}
	
	public function Branddel(){
		$objBrandModel = new BrandModel();
		if (isset($_GET['id'])) {
			$res = $objBrandModel->brandDel($_GET['id']);
			if ($res) {
				$_SESSION['success'] = $res;
			}
		}
		header('Location:' .base_path.'?ct=brand&act=brandlist');
	}

	public function Brandedit(){

		$data =['msg'=>[],'brand'=>[],'cat'=>[]];
		$objBrandModel = new BrandModel();
		$objCatModel= new CatModel();
 	
		 // tạo đối tượng model
		if (isset($_GET['id'])) {
			
			$id = $_GET['id'];

			$data['brand'] = $objBrandModel->getBrand($id); //gọi hàm trong model để lấy danh sách
			$data['cat']=$objCatModel->getAllCat();


			if (isset($_POST['submit'])) {
				$res = $objBrandModel->BrandEdit($id,$_POST['brand_name']); 
				if ($res) {
					$_SESSION['success'] = $res;
				
				}
			}
		}
		$this->RenderView('admin.brandedit', $data); 
	}
}