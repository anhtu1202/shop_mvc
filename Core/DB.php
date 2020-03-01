<?php 
	class DB{
	protected $cnn = null;
	private $db_name = "shop_mvc";
	public function __construct(){

		// khi thay thế sang hướng đối tượng thì bỏ chữ mysqli_ ở đầu tên các hàm mysql trước đây đã dùng đi và gắn phần còn lại vào đối tượng.
		// Bản chất đó là các hàm truy vấn hoàn toàn giống nhau.
	$objConn = new mysqli('localhost', 'root', '');
	if ($objConn->connect_errno) {
	die("Connect Error (" . $objConn->connect_errno . ") ". $objConn->connect_error);
	}
	// myslqi_slect_db($conn, $dbname); // đây là cú pháp cũ
	$check = $objConn->select_db($this->db_name); // đây là cú pháp hướng đối tượng
	if($check === false){
	die("Database khong ton tai"); // nếu không có lỗi thì check là true.
	}
	$objConn->set_charset("utf8");
	$this->cnn = $objConn;
	return $this->cnn;
	}

	// hàm này được kế thừa xuống các lớp con trong model sau này
	public function Query($sql){
	$res = $this->cnn->query($sql);
	if($this->cnn->errno){
	die("Loi truy van CSDL " . $this->cnn->error);
	}
	return $res;
	}

	public function Insert($sql){
	$res = $this->cnn->query($sql);
	if($this->cnn->errno){
	die("Loi truy van CSDL " . $this->cnn->error);
	}
	return $res;
	}

	public function Update($sql){
	$res = $this->cnn->query($sql);
	if($this->cnn->errno){
	die("Loi truy van CSDL " . $this->cnn->error);
	}
	return $res;
	}

	public function Delete($sql){
	$res = $this->cnn->query($sql);
	if($this->cnn->errno){
	die("Loi truy van CSDL " . $this->cnn->error);
	}
	return $res;
	}

		// đóng kết nối csdl
		public function __destruct(){
		if(!empty($this->cnn))
		$this->cnn->close();
		}
	}
 ?>