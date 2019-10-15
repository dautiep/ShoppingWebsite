<?php  
class DBConnect{
	//thuoc tinh
	private $dbh;
	private $stmt;

	//phuong thuc
	//Phuong thuc ket noi co so du lieu
	function __construct(){ //tu dong chay khi thuc thi
		//Su dung try/catch de bat loi khi ket noi co so du lieu
		try{
			$this->dbh = new PDO('mysql:host=localhost;dbname=cua_hang', 'root', ''); // dbh la mot bien de khoi tao ket noi gom co 3 tham so mysql: tendb, host va ten nguoi dung va mat khau
			$this->dbh->exec('SET NAMES utf8'); // hien thi dung font khi truy xuat du lieu
		}catch(PDOException $e){
			echo $e->getMessage();
			return;
		}
	}
	//Chuan bi va kiem tra cau truy van
	function executeQuery($sql){
		$this->stmt = $this->dbh->prepare($sql);
		$check = $this->stmt->execute(); //kiem tra cau truy van
		return $check;
	}

	//Chon mot dong
	function getOneRows($sql){
		$check = $this->executeQuery($sql);
		if($check === true) return $this->stmt->fetch(PDO::FETCH_OBJ); //get data
		return false;
	}

	//Chon nhieu dong
	function getMoreRows($sql){
		$check = $this->executeQuery($sql);
		if($check === true) return $this->stmt->fetchAll(PDO::FETCH_OBJ); //get data
		return false;
	}
}
// $a = new DBConnect;
// $sql = 'SELECT *
// 		FROM customers
// 		WHERE id = 1';
// $r = $a->getMoreRows($sql);
// print_r($r);

?>
