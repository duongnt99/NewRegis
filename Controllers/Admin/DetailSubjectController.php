<?php
include "Models/Admin/DetailSubjectModel.php";
class DetailSubjectController extends Controller
{
    use DetailSubject;
    public function __construct(){
        //xac thuc dang nhap
        $this->authentication();
    }
    public function index()
    {
    }
    public function showDetailSubject()
    {
        
        $dataHqt0 = $this->fetchHqt0();

        $this->renderHTML("Views/Admin/DetailSubjectView.php",array("dataHqt0"=>$dataHqt0));
    }
}
