<?php 
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
		$data =['msg'=>[] ];
		$objBrandModel = new BrandModel(); // tạo đối tượng model
		if (isset($_POST['submit'])) {
			$Brand_name = $_POST['brand_name'];
			$res = $objBrandModel->brandAdd($Brand); //gọi hàm trong model để lấy danh sách
			if ($res) {
				$data['msg'] = $res;
			}
		}
		$this->RenderView('admin.Brandadd', $data);
	}
	
	public function Branddel(){
		$objBrandModel = new BrandModel();
		if (isset($_GET['id'])) {
			$res = $objBrandModel->brandDel($_GET['id']);
			if ($res) {
				$_SESSION['success'] = $res;
			}
		}
		header('LoBrandion:' .base_path.'?ct=brand&act=brandlist');
	}

	public function Brandedit(){
		$data =['msg'=>[] ];
		$objBrandModel = new BrandModel(); // tạo đối tượng model
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$data = $objBrandModel->getBrand($id); //gọi hàm trong model để lấy danh sách
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