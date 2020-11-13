<?php
trait DetailSubject{

    public function fetchHqt0(){
        $conn = Connection::getInstance();

        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }else{
            $id = $_SESSION['id'];
        }
        $_SESSION['id']= $id;
        
        // $subjectName = str_replace('%20', ' ', $subjectName);
        $query = $conn->query("SELECT * FROM listsubject  where idmonhoc = $id ");
        return $query->fetchAll();

    }
    public function fetchSubjectID(){
        $conn = Connection::getInstance();

        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }else{
            $id = $_SESSION['id'];
        }
        $_SESSION['id']= $id;
        
        // $subjectName = str_replace('%20', ' ', $subjectName);
        $query = $conn->query("SELECT mamon FROM subject  where id = $id ");
        return $query->fetchAll();

    }
}
?>