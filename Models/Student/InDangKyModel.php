<?php
use Data \ PDOData;
trait InDangKyModel{
	public function fetch(){
		$mssv = $_SESSION['mssv'];
		$db = new PDOData();
		// $conn = Connection::getInstance();
		// $query = $conn->prepare("SELECT * from ketqua where StudentID=:mssv");
		// $query->execute(array("mssv"=>$mssv));
		$data = $db->doPreparedQuery("SELECT * from ketqua
		inner join (select id from kithi where Status=1) kithi on ketqua.IDKiThi = kithi.id
		 where StudentID=?
		",array($mssv));
		return $data;
	}
}
?>