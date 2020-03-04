<?php 
require_once app_path.'/Model/SlideModel.php';

class SlideController extends ControllerBase
{

	public function Slideadd(){
		$data =['msg'=>[] ];
		$objSlideModel = new SlideModel();
		if (isset($_POST['submit'])) {
			$res = $objSlideModel->slideAdd($_POST, $_FILES); //gọi hàm trong model để lấy danh sách
			if ($res) {
				$data['msg'] = $res;
			}
		}
		$this->RenderView('admin.slideadd', $data);
	}

	public function Slidelist(){
		$objSlideModel = new SlideModel(); // tạo đối tượng model
		$data = $objSlideModel->getAllSlide(); //gọi hàm trong model để lấy danh sách
		$this->RenderView('admin.slidelist', $data);
	}

	public function Slidedel(){
		$objSlideModel = new SlideModel();
		if (isset($_GET['id'])) {
			$res = $objSlideModel->slideDel($_GET['id']);
			if ($res) {
				$_SESSION['success'] = $res;
			}
		}
		header('Location:' .base_path.'?ct=slide&act=slidelist');
	}

	public function Slideedit(){
		$data =['msg'=>[] ];
		$objSlideModel = new SlideModel(); // tạo đối tượng model
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$data = $objSlideModel->getSlide($id); //gọi hàm trong model để lấy danh sách
			if (isset($_POST['submit'])) {
				$res = $objSlideModel->slideEdit($id,$_POST,$_FILES); 
				if ($res) {
					$_SESSION['success'] = $res;
					header('Location:' .base_path.'?ct=slide&act=slidelist');
				}
			}
		}
		$this->RenderView('admin.slideedit', $data); 
	}

}