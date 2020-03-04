<?php 
require_once app_path.'/Model/PmsModel.php';
class PmsController extends ControllerBase
{

	public function Pmslist(){
		$data =['msg'=>[] ];
		$objPmsModel = new PmsModel(); // tạo đối tượng model
		$data = $objPmsModel->getAllPms(); //gọi hàm trong model để lấy danh sách
		$this->RenderView('admin.pmslist', $data);
	}

	public function Rolelist(){
		$data =['msg'=>[] ];
		$objPmsModel = new PmsModel(); // tạo đối tượng model
		if (isset($_POST['submit'])) {
				$id_role = $_POST['role'];
				$id_pms = $_POST['pms'];
				$succes = $objPmsModel->addRolePms($role,$pms);
				$data['msg'] = $succes;
			}
		$data['role_pms'] = $objPmsModel->getAllRolePms();
		$data['role'] = $objPmsModel->getAllRole();
		$data['pms']= $objPmsModel->getAllPms();
		$this->RenderView('admin.rolepms', $data);
	}

	public function Pmsadd(){
		$data =['msg'=>[] ];
		$objPmsModel = new PmsModel(); // tạo đối tượng model
		if (isset($_POST['submit'])) {
			$pms = $_POST['pms'];
			$res = $objPmsModel->pmsAdd($pms); //gọi hàm trong model để lấy danh sách
			if ($data) {
				$data['msg'] = $res;
			}
		}
		$this->RenderView('admin.pmsadd', $data);
	}
	
	public function Pmsdel(){
		$objPmsModel = new PmsModel();
		if (isset($_GET['id'])) {
			$res = $objPmsModel->pmsDel($_GET['id']);
			if ($res) {
				$_SESSION['success'] = $res;
			}
		}
		header('Location:' .base_path.'?ct=pms&act=pmslist');
	}

	public function Pmsedit(){
		$data =['msg'=>[] ];
		$objPmsModel = new PmsModel(); // tạo đối tượng model
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$data = $objPmsModel->getPms($id); //gọi hàm trong model để lấy danh sách
			if (isset($_POST['pms'])) {
				$res = $objPmsModel->pmsEdit($id,$_POST['pms']); 
				if ($res) {
					$_SESSION['success'] = $res;
					header('Location:' .base_path.'?ct=pms&act=pmslist');
				}
			}
		}
		$this->RenderView('admin.pmsedit', $data); 
	}

	
}