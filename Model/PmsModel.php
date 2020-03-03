<?php 
	/**
	 * 
	 */
	class PmsModel extends DB
	{
		private $tb_pms = "tb_pms";


		public function loadPmsByRole($id_role){
			$sql = "SELECT * FROM  $this->tb_pms

			INNER JOIN role_pms on tb_pms.id = role_pms.id_pms
			WHERE role_pms.id_role = {$id_role}";

			$res = $this->Query($sql);
			$data = [];
			while($row = $res->fetch_assoc()){
			$data[] = $row['name_pms'];
			}
			// mảng các quyền được cấp chỉ cần lấy tên quyền.
			return $data;
		}

		public function getAllPms()
		{
			$sql = "SELECT * FROM $this->tb_pms ORDER BY id DESC";

			$res = $this->Query($sql);
			$data = [];
			while($row = $res->fetch_assoc()){
				$data[] = $row;
			}
			return $data;
		}

		public function pmsAdd($data)
		{
			$sql = "INSERT INTO $this->tb_pms (name_pms) VALUES ('$data')";
			$res = $this->Insert($sql);
			if ($res) {
				$sql = "SELECT id FROM  $this->tb_pms WHERE name_pms = '$data'";
				$id_pms = $this->Query($sql)->fetch_assoc();
				if ($id_pms) {
					$id_pms = $id_pms['id'];
					$sql = "INSERT INTO role_pms VALUES (1,'$id_pms')";
					$this->Insert($sql);
				}
			}
			$alert = "<span class='alert-success'>Add success</span>";
				return $alert;
		}

		public function pmsDel($id)
		{
			$sql = "DELETE FROM $this->tb_pms WHERE id = '$id'";
			$res = $this->Delete($sql);
			if ($res) {
				$alert = "<span class='alert-success'>Delete success</span>";
				return $alert;
			}
		}

		public function getPms($id)
		{
			$sql = "SELECT * FROM $this->tb_pms WHERE id = '$id'";
			$res = $this->Query($sql)->fetch_assoc();
			if ($res) {
				return $res;
			}
		}

		public function pmsEdit($id,$name_pms)
		{
			$sql = "UPDATE $this->tb_pms SET name_pms = '$name_pms' WHERE id = '$id'";
			$res = $this->Update($sql);
			if ($res) {
				$alert = "<span class='alert-success'>Update success</span>";
				return $alert;
			}
		}
	}