<?php
trait TaoKiModel{
    //lấy tất cả bản ghi
     //lấy tất cả bản ghi
    public function fetchAll(){
        $conn = Connection::getInstance();
        $query = $conn->query("SELECT * FROM kithi");
        return $query->fetchAll();

    }
    //thêm kì thi
    public function insert(){
        $tenkithi = $_POST["tenkithi"];
        $namtochuc = $_POST["namtochuc"];
        $hocki = $_POST["hocki"];
        $ghichu = $_POST["ghichu"];
        $conn = Connection::getInstance();
        $query = $conn->prepare("INSERT INTO kithi set TenKiThi=:tenkithi, Năm=:namtochuc, HocKi=:hocki, Note=:ghichu");
        $query->execute(array("tenkithi"=>$tenkithi,"namtochuc"=>$namtochuc,"hocki"=>$hocki,"ghichu"=>$ghichu));
    }

    //thêm kì thi
    public function activeKithi($id){
        $conn = Connection::getInstance();
        $query1 = $conn->query("Update kithi set Status=0");
        $query1->execute();
        $query2 = $conn->prepare("Update kithi set Status = 1 where id=:id");
        $query2->execute(array("id" => $id));
    }
    //thêm kì thi
    public function getActiveKithi(){
        $conn = Connection::getInstance();
        $query = $conn->query("SELECT * FROM kithi where Status = 1");
        return $query->fetchAll();
    }


    public function deleteKi($id)
	{
		$conn = Connection::getInstance();
		$query = $conn->prepare("DELETE from kithi where id=:id");
		$query->execute(array("id" => $id));
	}
}
