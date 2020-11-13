<?php
include "Models/Admin/ShowListSubjectModel.php";
class ShowListSubjectController extends Controller
{
    use ShowListSubject;
    public function __construct(){
        //xac thuc dang nhap
        $this->authentication();
    }
    public function index()
    {

    }
    public function showListSubject()
    {
        
        $dataSubject = $this->fetchListSubject();
        // var_dump($dataHqt1);die;
        $this->renderHTML("Views/Admin/ShowListSubjectView.php",array("dataSubject"=>$dataSubject));
    }

    public function delete(){
        if(isset($_GET["id"])){
            $id = $_GET["id"];
        }

        $this->deleteSubject($id);
        header("location:danh-sach-mon");
    }
}
