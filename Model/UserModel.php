<?php 
require_once app_path.'/Sendmail/sendmail.php';
	/**
	 * 
	 */
	class UserModel extends DB
	{
		
		private $customer = "customer";
		private $cus_order = "cus_order";

		public function addUser($post){
		
			$name = $post['name'];
            $pass = $post['cppassword'];
            $address = $post['address'];
			$email = $post['email'];
			$phone = $post['phone'];

			$check = '/^[a-zA-Z0-9]{6,10}$/';
			$checkcp = '/^[a-zA-Z0-9]{8,15}$/';
			$checkfn = '/^[a-zA-Z]$/';
			$regex_phone = '/((09|03|07|08|05)+([0-9]{8})\b)/';
			$regex_email = '/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/';

			$sqle = "SELECT * FROM  $this->customer WHERE email = '$email'";
			$rese = $this->Query($sqle);
		if (!preg_match($check, $name)) {
			$alert = "Tên tài khoản phải từ 6 đến 10 kí tự!";
				return $alert;
		} else if (!preg_match($checkcp, $pass)) {
			$alert = "Password không được chứa kí tự đặc biệt dài từ 8-15 kí tự!";
				return $alert;
		} else if (!preg_match($regex_email, $email)) {
			$alert = "Email sai định dạng";
				return $alert;
		} else if ($rese->num_rows == 1) {
			$alert = "Email đã được đăng kí";
				return $alert;
		} else {
			$password = password_hash($pass, PASSWORD_DEFAULT);
			$sql = "INSERT INTO $this->customer (name,address,phone,email,password,id_role) 
			VALUES ('$name', '$address', '$phone', '$email', '$password', 3)";
			$res = $this->Query($sql);
			if ($res) {
                    $subject =$_SERVER["SERVER_NAME"];
        			$to = $post['email'];
    				$content ="Chào bạn ".$post['name']."
    				Chúc mừng bạn đã đăng kí thành công tài khoản của bạn như sau:
    				Username: ".$post['name']."
    				Email: ".$post['email']."
    				Ngày: ".date('Y-m-d');
    				$from ='tuvnph08581@fpt.edu.vn';

    				$sendMail = Send_email_via_smtp_gmail($subject, $to, $content, array(), array(), $from, 0);

    				if ($sendMail['code'] == 1) {
    				    // gui mail thanh cong
    				    $alert = "<span class='alert-success'>Insert success</span>";
                		return $alert;

    				} else {
    				    echo $sendMail['msg'];
    				}
				}
			}
		}

		public function loadLogin($email){
			$sql = "SELECT * FROM $this->customer WHERE email = '{$email}'";
			$res = $this->Query($sql);
			if($res->num_rows == 1){
				$user = $res->fetch_assoc();
				return $user;
			}
			return null ;
		}

		public function updateProfile($post)
		{
			$id = $post['id'];
			$name = $post['name'];
			$address = $post['address'];
			$phone = $post['phone'];
			$email = $post['email'];
			$sql = "UPDATE $this->customer SET name='$name',address='$address',phone='$phone',email='$email' 
			WHERE id='$id'";
				$res = $this->Update($sql);
				if ($res) {
					$sql = "SELECT * FROM $this->customer WHERE id = '{$id}'";
					$res = $this->Query($sql)->fetch_assoc();
					return $res;
				}
		}

		public function getOrder()
		{
			$sql = "SELECT * FROM $this->cus_order ORDER BY day";
			$res = $this->Query($sql);
			$data = [];
			
			while($row = $res->fetch_assoc()){
				$data[] = $row;
			}
			return $data;
		}

		public function customer($id){
			$sql = "SELECT * FROM $this->customer WHERE id = '$id'";
			$res = $this->Query($sql);
			if($res->num_rows == 1){
				$user = $res->fetch_assoc();
				return $user;
			}
			return null ;
		}

		public function ship($id,$time,$price)
		{
			$sql = "UPDATE $this->cus_order SET status=1
			WHERE id='$id' AND price='$price' AND day='$time'";
				$res = $this->Update($sql);
				if ($res) {
					$alert = "<span class='alert-success'>Tiến hành ship</span>";
					return $alert;
				}
		}

		public function confirm($id)
		{
			$sql = "UPDATE $this->cus_order SET status=2 WHERE id='$id'";
				$res = $this->Update($sql);
				if ($res) {
					$alert = "<span class='alert-success'>Đã nhận hàng</span>";
					return $alert;
				}
		}

		public function delShipped($id)
		{
			$sql = "DELETE FROM $this->cus_order WHERE id='$id'";
				$res = $this->Update($sql);
				if ($res) {
					$alert = "<span class='alert-success'>Xóa thành công</span>";
					return $alert;
				}
		}

	}
