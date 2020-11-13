<?php
trait ShowListSubject{

    public function fetchListSubject(){
        $conn = Connection::getInstance();
        $query = $conn->query("SELECT *,subject.id as idsb FROM `subject` 
        inner join (select id from kithi where Status=1) kithi on subject.idkithi = kithi.id");
        return $query->fetchAll();
    }
    public function deleteSubject($id)
	{
		$conn = Connection::getInstance();
        
        $query = $conn->prepare("DELETE from listsubject where idmonhoc=:id");
        $query->execute(array("id" => $id));
        
        $query1 = $conn->prepare("DELETE from subject where id=:id");
		$query1->execute(array("id" => $id));
	}
}
?>