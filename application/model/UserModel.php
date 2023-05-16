<?php
namespace application\model;

class UserModel extends Model{
	// 230516_add 동적 쿼리로 바꿈 -> $pwFlg = true추가
	public function getUser( $arrUserInfo, $pwFlg = true ) {
		// $sql =" select * from user_info where u_id = :id and u_pw = :pw ";
		$sql =" select * from user_info where u_id = :id "; // 230516_change if로 바꿈
		if ($pwFlg) {	 // 230516_add
			$sql .= " AND u_pw = :pw ";
		}

		$prepare = [
			":id" => $arrUserInfo["id"]
			// ,":pw" => $arrUserInfo["pw"] // 230516_del if로 바꿈
		];

		// pw추가 할경우
		if ($pwFlg) {	 // 230516_add
			$prepare[":pw"] = $arrUserInfo["pw"];
		}

		try {
			$stmt = $this->conn->prepare($sql);
			$stmt->execute($prepare);
			$result = $stmt->fetchAll();
		} catch (Exception $e) {
			echo "UserModel->getUser Error : ".$e->getMessage();
			exit();
		}
		// finally {				// userController.php 에서 닫아줌 public function loginPost()참고
		// 	$this->closeConn();
		// }
		return $result;
	}
	
	// Insert User
	public function insertUser($arrUserInfo){
		$sql = " INSERT INTO user_info(u_id,u_pw,u_name) VALUES(:u_id,:u_pw,:u_name) ";

		$prepare = [
			":u_id" => $arrUserInfo["id"]
			,":u_pw" => $arrUserInfo["pw"]
			,":u_name" => $arrUserInfo["name"]
		];
		
		try {
			$stmt = $this->conn->prepare($sql);
			$result = $stmt->execute($prepare);
			return $result;
		} catch (Exception $e) {
			// echo "UserModel->getUser Error : ".$e->getMessage(); // 230516_del usercon _ useinsert 부분으로 대체
			// exit();
			return false;
		}
	}

}