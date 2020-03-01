<?php
require_once app_path.'/Model/UserModel.php'; // nhúng file model vào để làm việc
class UserController extends ControllerBase{

	public function DeletePms(){
		$data =['msg'=>[], 'editpms'=>[] ];
		$objUserModel = new UserModel(); // tạo đối tượng model

		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$succes = $objUserModel->deletePms($id);
			$data['msg'] = $succes;
			$data['editpms'] = '';
		}
		$data['pms']= $objUserModel->getAllPms(); //gọi hàm trong model để lấy danh sách
		$this->RenderView('pms.list-all-pms', $data);
	}

	public function ListRolePms(){
		$data =['msg'=>[] ];
		$objUserModel = new UserModel(); // tạo đối tượng model
		if (isset($_POST['submit'])) {
				$role = $_POST['role'];
				$pms = $_POST['pms'];
				$succes = $objUserModel->updateRolePms($role,$pms);
				$data['msg'] = $succes;
			}
		$data['role_pms'] = $objUserModel->getAllRolePms();
		$data['role'] = $objUserModel->getAllRole(); 
		$data['pms']= $objUserModel->getAllPms();
		$this->RenderView('pms.list-role-pms', $data);
	}


}
