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
                        <h1><strong>DANH SÁCH MÔN THI KÌ HIỆN TẠI</strong></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Trang chủ</a></li>
                            <li><a href="#">Môn Thi</a></li>
                            <li class="active">Danh sách môn thi</li>
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
                                    <th>Mã môn thi</th>
                                    <th>Môn thi</th>
                                    <th>Xem chi tiết</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                        
                                <?php $i=1; ?>
                                <?php foreach ($dataSubject as $item) : ?>
                                <tr id="<?php echo $item->id; ?>">
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $item->mamon ?></td>
                                    <td><?php echo $item->tenmon ?></td>
                                    <td><a class="btn btn-success"  role="button"   href="index.php?area=Admin&controller=DetailSubject&action=showDetailSubject&id=<?php echo $item->idsb; ?>"><i class="fa fa-pencil" aria-hidden="true"></i>    Xem chi tiết</a></td>
                                    <td><a class="btn btn-danger"   role="button"   href="index.php?area=Admin&controller=ShowListSubject&action=deleteSubject&id=<?php echo $item->id; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</a></td>
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