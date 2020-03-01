<?php 
require_once app_path.'/Sendmail/sendmail.php';
	/**
	 * 
	 */
	class UserModel extends DB
	{
		
		private $customer = "customer";

		public function addUser($post){
		
			$name = $post['name'];
			$pass = $post['pass'];
			$cp = $post['cp'];
			$fullname = $post['fullname'];
			$email = $post['email'];
			$phone = $post['phone'];

			$check = '/^\w{6,9}$/';
			$checkcp = '/^([a-z]{1,})\w{7,14}$/';
			$checkfn = '/^[a-zA-Z]$/';
			$regex_phone = '/((09|03|07|08|05)+([0-9]{8})\b)/';
			$regex_email = '/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/'; 

			$sql = "SELECT * FROM  $this->customer WHERE name = '$name'";
			$res = $this->Query($sql);
			$sqle = "SELECT * FROM  $this->customer WHERE email = '$email'";
			$rese = $this->Query($sqle);
		if (!preg_match($check, $name)) {
			$alert = "<span class='alert-success'>Tên tài khoản sai định dạng</span>";
				return $alert;
		} else if (!preg_match($checkcp, $cp)) {
			$alert = "<span class='alert-success'>Mật khẩu sai định dạng</span>";
				return $alert;
		} else if (!preg_match($regex_email, $email)) {
			$alert = "<span class='alert-success'>Email sai định dạng</span>";
				return $alert;		
		} else if ($res->num_rows == 1) {
			$alert = "<span class='alert-success'>Tên tài khoản bị trùng</span>";
				return $alert;
		} else if ($rese->num_rows == 1) {
			$alert = "<span class='alert-success'>Email đã được đăng kí</span>";
				return $alert;		
		} else if ($pass != $cp) {
			$alert = "<span class='alert-success'>Mật khẩu nhập lại sai</span>";
				return $alert;	
		} else if (!preg_match($regex_phone, $phone)) {
			$alert = "<span class='alert-success'>Số đêịn thoại sai định dạng</span>";
				return $alert;		
		} else if (!preg_match($checkfn, $fullname)) {
			$password = password_hash($cp, PASSWORD_DEFAULT);
			$sql = "INSERT INTO $this->customer VALUES ('', '$name', '$pass', '$fullname', '$email', '$phone')";
			$res = $this->Query($sql);
			if ($res) {
				$alert = "<span class='alert-success'>Insert success</span>";
					return $alert;
				}
			}
		}

		public function loadLogin($email){
			$sql = "SELECT name,email,password,id_role FROM $this->customer WHERE email = '{$email}'";
			$res = $this->Query($sql);
			if($res->num_rows == 1){
				$user = $res->fetch_assoc();
				return $user;
			}
			return null ;
		}

		public function getAllPms(){

		$sql = "SELECT * FROM $this->tb_pms";
		$res = $this->Query($sql);
		$data = [];
		while($row = $res->fetch_assoc()){
		$data[] = $row;
		}
		return $data;
		}


	}
