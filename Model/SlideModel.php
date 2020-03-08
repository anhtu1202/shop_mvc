<?php 
require_once 'Helper/SimpleImage.php';
	/**
	 * 
	 */
	class SlideModel extends DB
	{
		private $slide = "slide";

		public function getAllSlide()
		{
			$sql = "SELECT * FROM $this->slide ORDER BY slide_id DESC";

			$res = $this->Query($sql);
			$data = [];
			while($row = $res->fetch_assoc()){
				$data[] = $row;
			}
			return $data;
		}

		public function Slideadd($data,$files)
		{
			$slide_name = $data['slide_name'];
			$slide_type = $data['slide_type'];
			$permited = array('jpg','jpeg','png','gif');
			$file_name = $_FILES['image']['name'];
			$file_temp = $_FILES['image']['tmp_name'];
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

			$sql = "INSERT INTO $this->slide (slide_name, slide_image, slide_type) VALUES ('$slide_name','$uploaded_image','$slide_type')";
			$res = $this->Insert($sql);
			if ($res) {
				$alert = "<span class='alert-success'>Add success</span>";
				return $alert;
			}
		}

		public function slideDel($id)
		{
			$sql = "DELETE FROM $this->slide WHERE slide_id = '$id'";
			$res = $this->Delete($sql);
			if ($res) {
				$alert = "<span class='alert-success'>Delete success</span>";
				return $alert;
			}
		}

		public function getSlide($id)
		{
			$sql = "SELECT * FROM $this->slide WHERE slide_id = '$id'";
			$res = $this->Query($sql)->fetch_assoc();
			if ($res) {
				return $res;
			}
		}

		public function slideEdit($id,$data,$files)
		{
			$slide_name = $data['slide_name'];
			$slide_type = $data['slide_type'];
			$permited = array('jpg','jpeg','png','gif');
			$file_name = $_FILES['images']['name'];
			$file_temp = $_FILES['images']['tmp_name'];
			$file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
			$unique_image = mt_rand(100,10000).".".$file_ext;
			$uploaded_image = "Uploads/".$unique_image;

			if ($file_name != "") {
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

			$sql = "UPDATE $this->slide SET slide_name='$slide_name', slide_image='$uploaded_image', slide_type='$slide_type'WHERE slide_id = '$id'";
				$res = $this->Insert($sql);
				if ($res) {
					$alert = "<span class='alert-success'>Update success</span>";
					return $alert;
				}
			} else {
			$sql = "UPDATE $this->slide SET slide_name='$slide_name', slide_type='$slide_type' WHERE slide_id = '$id'";
				$res = $this->Insert($sql);
				if ($res) {
					$alert = "<span class='alert-success'>Update success</span>";
					return $alert;
				}
			}
		}
	}	