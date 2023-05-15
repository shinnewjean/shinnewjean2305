<?php
namespace application\model;

class UserModel extends Model{
	public function getUser($arrUserInfo) {
		$sql =" select * from user_info where u_id = :id and u_pw = :pw ";
		$prepare = [
			":id" => $arrUserInfo["id"]
			,":pw" => $arrUserInfo["pw"]
		];
		try {
			$stmt = $this->conn->prepare($sql);
			$stmt->execute($prepare);
			$result = $stmt->fetchAll();
		} catch (Exception $e) {
			echo "UserModel->getUser Error : ".$e->getMessage();
			exit();
		} finally {
			$this->closeConn();
		}
		return $result;
	}
}