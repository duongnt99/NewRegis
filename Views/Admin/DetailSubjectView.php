<?php
//load file layout vao day
$this->fileLayout = "Views/Admin/Layout.php";
?>

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><strong>CHI TIẾT MÔN THI</strong></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Trang chủ</a></li>
                            <li><a href="#">Môn Thi</a></li>
                            <li class="active">Chi tiết môn</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <!-- <div class="row form-group" style="margin-left: 0px;margin-right: 0px;margin-bottom: 5px;margin-top: 5px;">
                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Thêm danh sách sinh viên</label></div>
                                    <div class="col-12 col-md-8"><input type="file" id="file-input" name="file-input" class="form-control-file"></div>
                                    <button type="submit" class="btn btn-primary btn-sm ">
                                        <i class="fa fa-dot-circle-o"></i> Submit
                                    </button>
                                </div> -->
                    </div>


                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã SV</th>
                                    <th>Họ và tên</th>
                                    <th>Ngày sinh</th>
                                    <th>Lớp khóa học</th>
                                    <th>Mã môn</th>
                                    <th>Tên môn</th>
                                    <th>Tình trạng</th>
                                    <th>Sửa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; ?>
                                <?php foreach ($dataHqt0 as $item) : ?>
                                <tr id="<?php echo $item->id; ?>">
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $item->StudentID ?></td>
                                    <td><?php echo $item->StudentName ?></td>
                                    <td><?php echo $item->DateOfBirth ?></td>
                                    <td><?php echo $item->Class ?></td>
                                    <td><?php echo $item->SubjectID ?></td>
                                    <td><?php echo $item->SubjectName ?></td>
                                    <td><?php if($item->Status==0) echo "Cấm thi"; else echo "Được thi"; ?></td>
                                    <td>
                                    <button type="button" class="btn btn-warning mb-1">
                                    <i class="fa fa-pencil" aria-hidden="true"></i> Sửa</button></td>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>



                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->







<!-- Right Panel -->

<!-- Scripts -->


<script src="assets/js/lib/data-table/datatables.min.js"></script>
<script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
<script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
<script src="assets/js/lib/data-table/jszip.min.js"></script>
<script src="assets/js/lib/data-table/vfs_fonts.js"></script>
<script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
<script src="assets/js/lib/data-table/buttons.print.min.js"></script>
<script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
<script src="assets/js/init/datatables-init.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#bootstrap-data-table-export').DataTable();
});
</script>