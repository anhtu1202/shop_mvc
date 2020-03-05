<?php 
require_once 'Helper/SimpleImage.php';
	/**
	 * 
	 */
	class ProductModel extends DB
	{
		private $product = "product";

		public function getAllPro()
		{
			$sql = "SELECT * FROM product
			INNER JOIN brand ON product.brand_id=brand.brand_id
			INNER JOIN category ON product.cat_id=category.cat_id
			ORDER BY product_id" ;

			$res = $this->Query($sql);
			$data = [];
			

			while($row = $res->fetch_assoc()){
				$data[] = $row;
			}
			return $data;
		}

		public function productAdd($data, $files)
		{
			$product_name = $data['product_name'];
			$cat_id = $data['category'];
			$brand_id = $data['brand'];
			$product_desc = $data['product_desc'];
			$product_price = $data['product_price'];
			$product_type = $data['product_type'];
			$permited = array('jpg','jpeg','png','gif');
			$file_name = $_FILES['images']['name'];
			$file_temp = $_FILES['images']['tmp_name'];
			$file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
			$unique_image = mt_rand(100,10000).".".$file_ext;
			$uploaded_image = "Uploads/".$unique_image;
			if ($file_ext != $permited[0] && $file_ext != $permited[1] && $file_ext != $permited[2] && $file_ext != $permited[3]) {
				$alert = "<span>File tải lên phải đúng định dạng ảnh!</span>";
				return $alert;
			}
			move_uploaded_file($file_temp, $uploaded_image);
			$info = getimagesize(app_path."/Uploads/".$unique_image);
			if ($info[0] > 800) {
				 $image = new SimpleImage();
				 $image->load(app_path."/Uploads/".$unique_image);
				 $image->resizeToWidth(800);
				 $image->save(app_path."/Uploads/".$unique_image);
				 $info[0] = 800;
			}
			if ($info[1] > 600) {
				 $image = new SimpleImage();
				 $image->load(app_path."/Uploads/".$unique_image);
				 $image->resizeToHeight(600);
				 $image->save(app_path."/Uploads/".$unique_image);
				 $info[1] = 600;
			}
				$sql = "INSERT INTO product (product_name,cat_id,brand_id,product_price,product_image,product_desc,product_type) 
					VALUES ('$product_name','$cat_id','$brand_id','$product_price','$unique_image','$product_desc','$product_type')";
				$res = $this->Insert($sql);
				if ($res) {
					$alert = "<span class='success'>Insert product successfully</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Insert product not success</span>";
					return $alert;
				}
		}

		public function proDel($id)
		{
			$sql = "DELETE FROM product WHERE product_id = '$id'";
			$res = $this->Delete($sql);
			if ($res) {
				$alert = "<span class='success'>Insert product successfully</span>";
				return $alert;
			}
		}

		public function getPro($id)
		{
			$sql = "SELECT * FROM product WHERE product_id = '$id'";
			$res = $this->Query($sql)->fetch_assoc();
			if ($res) {

				return $res;
			}

		}

		public function getProduct($id){
			$sql = "SELECT * FROM product
			INNER JOIN brand ON product.brand_id=brand.brand_id
			INNER JOIN category ON product.cat_id=category.cat_id
			ORDER BY product_id" ;
			$res = $this->Query($sql)->fetch_assoc();
			if ($res) {

				return $res;
			}

		}

		public function proEdit($id,$data,$files)
		{
			$product_name = $data['product_name'];
			$cat_id = $data['category'];
			$brand_id = $data['brand'];
			$product_desc = $data['product_desc'];
			$product_price = $data['product_price'];
			$product_type = $data['product_type'];

			$permited = array('jpg','jpeg','png','gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
			$unique_image = mt_rand(100,10000).".".$file_ext;
			$uploaded_image = "uploads/".$unique_image;
			if ($file_name != "") {

			if ($file_ext != $permited[0] && $file_ext != $permited[1] && $file_ext != $permited[2] && $file_ext != $permited[3]) {
				$alert = "<span class='error'>Field must be not image</span>";
				return $alert;
			}else if ($file_size > 8388608) {
				$alert = "<span class='error'>Image file too large</span>";
				return $alert;
			}else{
			move_uploaded_file($file_temp, $uploaded_image);
				$query = "UPDATE product 
				SET product_name='$product_name',cat_id='$cat_id',brand_id='$brand_id',product_price='$product_price',
				product_image='$unique_image',product_desc='$product_desc',product_type='$product_type'
				WHERE product_id='$product_id'";
				$result = $this->db->update($query);
				if ($result) {
					echo "<script>window.location = 'productlist.php';</script>";
				}else{
					$alert = "<span class='error'>Update product not success</span>";
					return $alert;
				}
			}
			}
			$query = "UPDATE product 
				SET product_name='$product_name',cat_id='$cat_id',brand_id='$brand_id',product_price='$product_price'
				,product_desc='$product_desc',product_type='$product_type'
				WHERE product_id='$product_id'";
				$result = $this->db->update($query);
				if ($result) {
					echo "<script>window.location = 'productlist.php';</script>";
				}else{
					$alert = "<span class='error'>Update product not success</span>";
					return $alert;
				}
		}

		public function getFeaPro()
		{
			$sql = "SELECT * FROM product WHERE product_type = 'Featured'
			ORDER BY product_id DESC LIMIT 8";

			$res = $this->Query($sql);
			$data = [];
			while($row = $res->fetch_assoc()){
				$data[] = $row;
			}
			return $data;
		}

		public function getNewPro()
		{
			$sql = "SELECT * FROM product ORDER BY product_id DESC LIMIT 8";

				$res = $this->Query($sql);
				$data = [];
				while($row = $res->fetch_assoc()){
					$data[] = $row;
				}
			return $data;
		}

		public function getLastedApple()
		{
			$sql = "SELECT * FROM product WHERE brand_id = 3 ORDER BY product_id DESC LIMIT 1";
			$res[] = $this->Query($sql)->fetch_assoc();
				return $res;
		}

		public function getLastedSamsung()
		{
			$sql = "SELECT * FROM product WHERE brand_id = 1 ORDER BY product_id DESC LIMIT 1";
			$res[] = $this->Query($sql)->fetch_assoc();
				return $res;
		}

		public function getLastedSony()
		{
			$sql = "SELECT * FROM product WHERE brand_id = 2 ORDER BY product_id DESC LIMIT 1";
			$res[] = $this->Query($sql)->fetch_assoc();
				return $res;
		}

		public function getLastedDell()
		{
			$sql = "SELECT * FROM product WHERE brand_id = 4 ORDER BY product_id DESC LIMIT 1";
			$res[] = $this->Query($sql)->fetch_assoc();
				return $res;
		}

		public function getSlider()
		{
			$sql = "SELECT * FROM slide WHERE slide_type=0 ORDER BY slide_id DESC;";
			$res = $this->Query($sql);
				$data = [];
				while($row = $res->fetch_assoc()){
					$data[] = $row;
				}
			return $data;
		}
	}