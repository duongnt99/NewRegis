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
                        <h1><strong>SINH VIÊN ĐỦ ĐIỀU KIỆN THI</strong></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Trang chủ</a></li>
                            <li><a href="#">Nhập liệu</a></li>
                            <li class="active">Thêm tài khoản sinh viên đủ điều kiện thi</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">

        <div class="card">
            <div class="card-header" style="text-align: center">
                <strong class="card-title">Nhập danh sách sinh viên đủ điều kiện thi</strong>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="index.php?area=Admin&controller=AddEligibleStudent&action=add">
                    <div class="custom-file">
                        <input name="file" type="file" class="custom-file-input" id="validatedCustomFile" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required>
                        <label class="custom-file-label" for="validatedCustomFile">Chọn file excel</label>
                        <div class="invalid-feedback">Tệp không hợp lệ</div>
                    </div>
                    <input onclick="modal();" style="margin-top:10px;" type="submit" name="btnGui" value="Nhập danh sách" class="btn btn-primary">
                    <div class="modal fade bd-example-modal-lg" data-backdrop="static" data-keyboard="false" tabindex="-1">
                        <div class="modal-dialog modal-sm">
                            <div class="lds-hourglass"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- .animated -->
    <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#mediumModal">
            <i class="fa fa-plus-square"></i> Thêm sinh viên
        </button>
    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediumModalLabel" style="text-align: center"><strong>Thêm sinh viên được thi</strong></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="index.php?area=Admin&controller=AddEligibleStudent&action=addOne">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input"
                                        class=" form-control-label"><strong>Mã sinh viên</strong></label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="hocphan" name="msv" placeholder="Mã sinh viên" class="form-control" required><small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input"
                                        class=" form-control-label"><strong>Tên sinh viên</strong></label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="hocphan" name="fullname" placeholder="Họ và tên sinh viên" class="form-control" required><small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input"
                                        class=" form-control-label"><strong>Ngày sinh</strong></label></div>
                                <div class='col-12 col-md-9'>
                                    <div class="form-group">
                                        <div id="filterDate2">

                                            <!-- Datepicker as text field -->
                                            <div class="input-group date" data-date-format="dd/mm/yyyy">
                                                <input type="date" id="date" name="date" class="form-control" placeholder="dd/mm/yyyy">
                                                <div class="input-group-addon">
                                                    <span class="fa fa-calendar"></span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group" class="autocomplete">
                                <div class="col col-md-3"><label for="text-input"
                                        class=" form-control-label"><strong>Lớp học</strong></label></div>
                                <div class="col-12 col-md-9"><input type="text" id="phongmay" name="classes"
                                        placeholder="Lớp học" class="form-control" required><small
                                        class="form-text text-muted"></small></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong>Mã môn học</strong></label></div>
                                <div class="col-12 col-md-9"><input type="text" id="soluong" name="SubjectCode"
                                        placeholder="Mã môn học" class="form-control" required><small
                                        class="form-text text-muted"></small></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong>Tên môn học</strong></label></div>
                                <div class="col-12 col-md-9"><input type="text" id="soluong" name="SubjectName"
                                        placeholder="Tên môn học" class="form-control" required><small
                                        class="form-text text-muted"></small></div>
                            </div>



                            <!-- <input id="timepicker" width="276" /> -->

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                                <button type="submit" class="btn btn-primary">Xác nhận</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
















</div>
<script>
$('#validatedCustomFile').on('change', function() {
    //get the file name
    var fileName = $(this).val();
    //replace the "Choose a file" label
    $(this).next('.custom-file-label').html(fileName);
})
</script>
<script>
function modal() {

    if ($('#validatedCustomFile')[0].files[0]) {
        $('.modal').modal('show');
        setTimeout(function() {
            console.log('hejsan');
            $('.modal').modal('hide');
        }, 20000);
    }

}
</script>