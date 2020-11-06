<?php
include "Models/Admin/TaoCaModel.php";
class TaoCaController extends Controller
{
    use TaoCaModel;
    public function __construct(){
        //xac thuc dang nhap
        $this->authentication();
    }
    public function index()
    {
        // $formAction = "index.php?area=Admin&controller=TaoCa&action=add";
        // $this->renderHTML("Views/Admin/TaoCa_ListCaView.php",array("formAction"=>$formAction));
        $dataCathi = $this->fetchAll();
        $formActionCathi = "index.php?area=Admin&controller=TaoCa&action=add";
        $formUpdateCathi = "index.php?area=Admin&controller=TaoCa&action=update";
        $this->renderHTML("Views/Admin/TaoCa_ListCaView.php",array("dataCathi"=>$dataCathi,"formActionCathi"=>$formActionCathi,"formUpdateCathi"=>$formUpdateCathi));
    }
    //lấy tất cả bản ghi
    public function add()
    {
        $this->insert();
        header("location:tao-ca-thi");
    }
    public function update(){
        $hocphan = $_POST["hocphan"];
        $mahocphan = $_POST["mahocphan"];
        //$date = date('d-m-Y', strtotime($_POST["date"]));
        $date = $_POST["ngaythi"];
        $hstart = $_POST["giobatdau"];
        $hstop = $_POST["gioketthuc"];
        $phongmay = $_POST["phongthi"];
        $soluong = $_POST["soluong"];
        $id=$_POST['id'];

        $conn = Connection::getInstance();

        $query = $conn->prepare("UPDATE classes set SubjectID=:mahocphan, SubjectName=:hocphan,Date=:ngaythi,Start=:giobatdau,End=:gioketthuc,Room=:phongthi,Amount=:soluong where id=:id");
        $result = $query->execute(array("mahocphan"=>$mahocphan,"hocphan"=>$hocphan,"ngaythi"=>$date,"giobatdau"=>$hstart,"gioketthuc"=>$hstop,"phongthi"=>$phongmay,"soluong"=>$soluong,"id"=>$id));

        header("location:tao-ca-thi");

    }
    public function delete(){
        if(isset($_GET["id"])){
            $id = $_GET["id"];
        }

        $this->deleteCa($id);
        header("location:tao-ca-thi");
    }
}
