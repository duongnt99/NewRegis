<?php
include "Models/Admin/TaoKiModel.php";
class TaoKiController extends Controller
{
    use TaoKiModel;
    public function __construct(){
        //xac thuc dang nhap
        $this->authentication();
    }
    public function index()
    {
        $data = $this->fetchAll();
        $formAction = "index.php?area=Admin&controller=TaoKi&action=add";
        $this->renderHTML("Views/Admin/TaoKiView.php",array("data"=>$data,"formAction"=>$formAction));
        // $this->renderHTML("Views/Admin/TaoKiView.php",array("formAction"=>$formAction));
    }
    public function add()
    {
        $this->insert();
        header("location:tao-ki-thi");
    }

    public function delete(){
        if(isset($_GET["id"])){
            $id = $_GET["id"];
        }

        $this->deleteKi($id);
        header("location:tao-ki-thi");
    }

    public function setActive(){
        if(isset($_GET["id"])){
            $id = $_GET["id"];
        }
        $this->activeKithi($id);
        header("location:tao-ki-thi");
    }


}
