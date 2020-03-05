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
            $pass = $post['cppassword'];
            $address = $post['address'];
			$email = $post['email'];
			$phone = $post['phone'];

			$check = '/^\w{6,9}$/';
			$checkcp = '/^[a-zA-Z0-9]{8,15}$/';
			$checkfn = '/^[a-zA-Z]$/';
			$regex_phone = '/((09|03|07|08|05)+([0-9]{8})\b)/';
			$regex_email = '/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/';

			$sql = "SELECT * FROM  $this->customer WHERE name = '$name'";
			$res = $this->Query($sql);
			$sqle = "SELECT * FROM  $this->customer WHERE email = '$email'";
			$rese = $this->Query($sqle);
		if (!preg_match($check, $name)) {
			$alert = "<span class='alert-success'>Tên tài khoản phải từ 6 đến 9 kí tự!</span>";
				return $alert;
		} else if (!preg_match($checkcp, $cp)) {
			$alert = "<span class='alert-success'>Password không được chứa kí tự đặc biệt dài từ 8-15 kí tự!</span>";
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
		} else if (!preg_match($checkfn, $fullname)) {
			$password = password_hash($cp, PASSWORD_DEFAULT);
			$sql = "INSERT INTO $this->customer (name,address,phone,password,id_role) VALUES ('$name', '$address', '$fullname', '$email', '$phone', 3)";
			$res = $this->Query($sql);
			if ($res) {
                    $subject =$_SERVER["SERVER_NAME"];
        			$to = $post['email'];
    				$content ="Chào bạn ".$post['fullname']."
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
			$sql = "SELECT name,email,password,id_role FROM $this->customer WHERE email = '{$email}'";
			$res = $this->Query($sql);
			if($res->num_rows == 1){
				$user = $res->fetch_assoc();
				return $user;
			}
			return null ;
		}


	}
