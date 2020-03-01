<?php 
	/**
	 * 
	 */
	class ProductModel extends DB
	{
		private $product = "product";

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