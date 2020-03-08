<?php
require_once app_path.'/Model/UserModel.php'; // nhúng file model vào để làm việc
class UserController extends ControllerBase{

	public function Inbox()
	{
		$data = [ 'msg'=>[] ];
		$objUserModel = new UserModel();
		if (isset($_SESSION['auth'])) {
			$data = $objUserModel->getOrder();
				$this->RenderView('admin.inbox', $data);
			} else {
				$this->RenderView('view.404', $data);
			}
	}

	public function Customer()
	{
		$data = [ 'msg'=>[] ];
		$objUserModel = new UserModel();
		if (isset($_GET['id'])) {
			$data = $objUserModel->customer($_GET['id']);
				$this->RenderView('admin.customer', $data);
			} else {
				$this->RenderView('view.404', $data);
			}
	}

	public function Ship()
	{
		$data = [ 'msg'=>[] ];
		$objUserModel = new UserModel();
		if (isset($_GET['shipped'])) {
			$id = $_GET['shipped'];
			$time = $_GET['time'];
			$price = $_GET['price'];
			$res = $objUserModel->ship($id,$time,$price);
			if ($res) {
				$data['msg'] = $res;
				$data = $objUserModel->getOrder();
			}
			$this->RenderView('admin.inbox', $data);
		}
	}

	public function Confirm()
	{
		$data = [ 'msg'=>[] ];
		$objUserModel = new UserModel();
		if (isset($_GET['confirm_id'])) {
			$res = $objUserModel->confirm($_GET['confirm_id']);
			if ($res) {
				$data['msg'] = $res;
				$data = $objUserModel->getOrder();
			}
			$this->RenderView('view.orderdetails', $data);
		}
	}

	public function Delshipped()
	{
		$data = [ 'msg'=>[] ];
		$objUserModel = new UserModel();
		if (isset($_GET['id'])) {
			$res = $objUserModel->delShipped($_GET['id']);
			if ($res) {
				$data['msg'] = $res;
				$data = $objUserModel->getOrder();
			}
			$this->RenderView('admin.inbox', $data);
		}
	}

	public function Userlist()
	{
		$data = [ 'msg'=>[] ];
		$objUserModel = new UserModel();
		if (isset($_SESSION['auth'])) {
			$data = $objUserModel->userList();
				$this->RenderView('admin.userlist', $data);
			} else {
				$this->RenderView('view.404', $data);
			}
	}

	public function Userup()
	{
		$data = [ 'msg'=>[] ];
		$objUserModel = new UserModel();
		if (isset($_SESSION['auth'])) {
			if (isset($_GET['id'])) {
				$data['msg'] = $objUserModel->userUp($_GET['id']);
				}
				$data = $objUserModel->userList();
				$this->RenderView('admin.userlist', $data);
			} else {
				$this->RenderView('view.404', $data);
			}
	}

	public function Userdown()
	{
		$data = [ 'msg'=>[] ];
		$objUserModel = new UserModel();
		if (isset($_SESSION['auth'])) {
			if (isset($_GET['id'])) {
				$data['msg'] = $objUserModel->userDown($_GET['id']);
				}
				$data = $objUserModel->userList();
				$this->RenderView('admin.userlist', $data);
			} else {
				$this->RenderView('view.404', $data);
			}
	}

}
