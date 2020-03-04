<?php 
	/**
	 * 
	 */
	class BrandModel extends DB
	{
		private $brand = "brand";

		public function getAllBrand()
		{
			$sql = "SELECT * FROM $this->brand  INNER JOIN category ON brand.cat_id = category.cat_id ORDER BY brand_id DESC";

							
			$res = $this->Query($sql);
			$data = [];
			while($row = $res->fetch_assoc()){
				$data[] = $row;
			}
			return $data;
		}

		public function BrandAdd($data)
		{
			$sql = "INSERT INTO $this->brand (brand_name) VALUES ('$data')";
			$res = $this->Insert($sql);
			if ($res) {
				$alert = "<span class='alert-success'>Add success</span>";
				return $alert;
			}
		}

		public function BrandDel($id)
		{
			$sql = "DELETE FROM $this->brand WHERE brand_id = '$id'";
			$res = $this->Delete($sql);
			if ($res) {
				$alert = "<span class='alert-success'>Delete success</span>";
				return $alert;
			}
		}

		public function getBrand($id)
		{
			$sql = "SELECT * FROM $this->brand WHERE brand_id = '$id'";
			$res = $this->Query($sql)->fetch_assoc();
			

			if ($res) {
				return $res;
			}
		}

		public function BrandEdit($id,$brand_name)
		{
			$sql = "UPDATE $this->brand SET brand_name = '$brand_name' WHERE brand_id = '$id'";
			$res = $this->Update($sql);

			if ($res) {
				$alert = "<span class='alert-success'>Update success</span>";
				return $alert;
			}
		}
	}