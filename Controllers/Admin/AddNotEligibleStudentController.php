<?php
use Data\PDOData;
class AddNotEligibleStudentController extends Controller
{
    public function __construct(){
        //xac thuc dang nhap
        $this->authentication();
    }
    public function index()
    {
        $this->renderHTML("Views/Admin/AddNotEligibleStudentView.php");
    }
    public function add()
    {
        include "Assets/phpexcel/Classes/PHPExcel.php";
        $file = $_FILES['file']['tmp_name'];
        $objReader = PHPExcel_IOFactory::createReaderForFile($file);
        $objReader->setLoadSheetsOnly('Sheet1');
        $objExcel = $objReader->load($file);
        $sheetData = $objExcel->getActiveSheet()->toArray('null', true, true, true);
        $highestRow = $objExcel->setActiveSheetIndex()->getHighestRow();
        $db = new PDOData();
        $data1 = $db->doQuery("Select * from kithi where Status=1");
        for ($row = 2; $row <= $highestRow; $row++) {
            $mssv = $sheetData[$row]['B'];
            $name = $sheetData[$row]['C'];
            $ngaysinh = $sheetData[$row]['D'];
            $lopkhoahoc = $sheetData[$row]['E'];
            $mahocphan = $sheetData[$row]['F'];
            $hocphan = $sheetData[$row]['G'];
            $status=0;
            $IDKiThi=$data1[0]['id'];
            $conn = Connection::getInstance();
            $data = $db->doPreparedQuery('Select * from listsubject where StudentID=? and SubjectID=? and IDKiThi=?',array($mssv, $mahocphan,  $IDKiThi));
            if($data == null){
			    $query = $conn->prepare("insert into listsubject set StudentName=:name, StudentID=:mssv, DateOfBirth=:ngaysinh, Class=:lopkhoahoc,SubjectName=:hocphan,SubjectID=:mahocphan,Status=:status, IDKiThi=:IDKiThi");
            }
            else {
                $query = $conn->prepare("update listsubject set StudentName=:name, DateOfBirth=:ngaysinh, Class=:lopkhoahoc,SubjectName=:hocphan,Status=:status where StudentID=:mssv and SubjectID=:mahocphan and IDKiThi=:IDKiThi");
            }
                $query->execute(array("name"=>$name,"mssv"=>$mssv,"ngaysinh" => $ngaysinh,"lopkhoahoc" => $lopkhoahoc,"mahocphan" => $mahocphan,"hocphan" => $hocphan,"status" => $status, "IDKiThi"=> $IDKiThi));
        }
        header('location:them-sv-cam-thi');
    }

    public function addOne()
    {
        $db = new PDOData();
        $data1 = $db->doQuery('Select * from kithi where Status=1');
        $mssv = $_POST['msv'];
        $name = $_POST['fullname'];
        $ngaysinh = $_POST['date'];
        $lopkhoahoc = $_POST['classes'];
        $mahocphan = $_POST['SubjectCode'];
        $hocphan = $_POST['SubjectName'];
        $status=0;
        $IDKiThi=$data1[0]['id'];
        $conn = Connection::getInstance();
        $data = $db->doPreparedQuery('Select * from listsubject where StudentID=? and SubjectID=? and IDKiThi=?',array($mssv, $mahocphan,  $IDKiThi));
        if($data == null){
            $query = $conn->prepare("insert into listsubject set StudentName=:name, StudentID=:mssv, DateOfBirth=:ngaysinh, Class=:lopkhoahoc,SubjectName=:hocphan,SubjectID=:mahocphan,Status=:status, IDKiThi=:IDKiThi");
        }
        else {
            $query = $conn->prepare("update listsubject set StudentName=:name, DateOfBirth=:ngaysinh, Class=:lopkhoahoc,SubjectName=:hocphan,Status=:status where StudentID=:mssv and SubjectID=:mahocphan and IDKiThi=:IDKiThi");
        }
        $query->execute(array("name"=>$name,"mssv"=>$mssv,"ngaysinh" => $ngaysinh,"lopkhoahoc" => $lopkhoahoc,"mahocphan" => $mahocphan,"hocphan" => $hocphan,"status" => $status, "IDKiThi"=> $IDKiThi));

        header('location:them-sv-du-dieu-kien-thi');
    }
}
