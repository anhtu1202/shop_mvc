<?php 
	/**
	 * 
	 */
	class CatModel extends DB
	{
		private $category = "category";

		public function getAllCat()
		{
			$sql = "SELECT * FROM $this->category ORDER BY cat_id DESC";

			$res = $this->Query($sql);
			$data = [];
			while($row = $res->fetch_assoc()){
				$data[] = $row;
			}
			return $data;
		}

		public function catAdd($data)
		{
			$sql = "INSERT INTO $this->category (cat_name) VALUES ('$data')";
			$res = $this->Insert($sql);
			if ($res) {
				$alert = "<span class='alert-success'>Add success</span>";
				return $alert;
			}
		}

		public function catDel($id)
		{
			$sql = "DELETE FROM $this->category WHERE cat_id = '$id'";
			$res = $this->Delete($sql);
			if ($res) {
				$alert = "<span class='alert-success'>Delete success</span>";
				return $alert;
			}
		}

		public function getCat($id)
		{
			$sql = "SELECT * FROM $this->category WHERE cat_id = '$id'";
			$res = $this->Query($sql)->fetch_assoc();
			if ($res) {
				return $res;
			}
		}

		public function catEdit($id,$cat_name)
		{
			$sql = "UPDATE $this->category SET cat_name = '$cat_name' WHERE cat_id = '$id'";
			$res = $this->Update($sql);
			if ($res) {
				$alert = "<span class='alert-success'>Update success</span>";
				return $alert;
			}
		}
		
	}