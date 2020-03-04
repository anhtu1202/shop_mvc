<?php 
require_once app_path.'/Model/CatModel.php';
class CatController extends ControllerBase
{

	public function Catlist(){
		$data =['msg'=>[] ];
		$objCatModel = new CatModel(); // tạo đối tượng model
		$data = $objCatModel->getAllCat(); //gọi hàm trong model để lấy danh sách
		$this->RenderView('admin.catlist', $data);
	}

	public function Catadd(){
		$data =['msg'=>[] ];
		$objCatModel = new CatModel(); // tạo đối tượng model
		if (isset($_POST['submit'])) {
			$cat_name = $_POST['cat_name'];
			$res = $objCatModel->catAdd($cat_name); //gọi hàm trong model để lấy danh sách
			if ($res) {
				$data['msg'] = $res;
			}
		}
		$this->RenderView('admin.catadd', $data);
	}
	
	public function Catdel(){
		$objCatModel = new CatModel();
		if (isset($_GET['id'])) {
			$res = $objCatModel->catDel($_GET['id']);
			if ($res) {
				$_SESSION['success'] = $res;
			}
		}
		header('Location:' .base_path.'?ct=cat&act=catlist');
	}

	public function Catedit(){
		$data =['msg'=>[] ];
		$objCatModel = new CatModel(); // tạo đối tượng model
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$data = $objCatModel->getCat($id); //gọi hàm trong model để lấy danh sách
			if (isset($_POST['submit'])) {
				$res = $objCatModel->catEdit($id,$_POST['cat_name']); 
				if ($res) {
					$_SESSION['success'] = $res;
					header('Location:' .base_path.'?ct=cat&act=catlist');
				}
			}
		}
		$this->RenderView('admin.catedit', $data); 
	}
}