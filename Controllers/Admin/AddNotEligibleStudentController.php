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
        $data = $db->doPreparedQuery("Select * from kithi where Status=1");
        echo $data;
        for ($row = 2; $row <= $highestRow; $row++) {
            $mssv = $sheetData[$row]['B'];
            $name = $sheetData[$row]['C'];
            $ngaysinh = $sheetData[$row]['D'];
            $lopkhoahoc = $sheetData[$row]['E'];
            $mahocphan = $sheetData[$row]['F'];
            $hocphan = $sheetData[$row]['G'];
            $status=0;
            $IDKiThi=$data['id'];
            $conn = Connection::getInstance();
			$query = $conn->prepare("insert into listsubject set StudentName=:name, StudentID=:mssv, DateOfBirth=:ngaysinh, Class=:lopkhoahoc,SubjectName=:hocphan,SubjectID=:mahocphan,Status=:status, IDKiThi=:IDKiThi");
			$query->execute(array("name"=>$name,"mssv"=>$mssv,"ngaysinh" => $ngaysinh,"lopkhoahoc" => $lopkhoahoc,"mahocphan" => $mahocphan,"hocphan" => $hocphan,"status" => $status, "IDKiThi"=> $IDKiThi));
        }
        header('location:them-sv-cam-thi');
    }
}
