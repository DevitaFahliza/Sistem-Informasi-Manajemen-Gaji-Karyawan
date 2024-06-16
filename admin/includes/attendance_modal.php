<!-- Add -->
<!-- Modal untuk menambahkan kehadiran -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Header Modal -->
            <div class="modal-header">
                <!-- Tombol Tutup -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <!-- Judul Modal -->
                <h4 class="modal-title"><b>Add Attendance</b></h4>
            </div>
            <!-- Body Modal -->
            <div class="modal-body">
                <!-- Form untuk menambahkan kehadiran -->
                <form class="form-horizontal" method="POST" action="attendance_add.php">
                    <!-- Input ID Karyawan -->
                    <div class="form-group">
                        <label for="employee" class="col-sm-3 control-label">ID Karyawan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="employee" name="employee" required>
                        </div>
                    </div>
                    <!-- Input Tanggal -->
                    <div class="form-group">
                        <label for="datepicker_add" class="col-sm-3 control-label">Tanggal</label>
                        <div class="col-sm-9"> 
                            <div class="date">
                                <input type="text" class="form-control" id="datepicker_add" name="date" required>
                            </div>
                        </div>
                    </div>
                    <!-- Input Time In -->
                    <div class="form-group">
                        <label for="time_in" class="col-sm-3 control-label">Time In</label>
                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <input type="text" class="form-control timepicker" id="time_in" name="time_in">
                            </div>
                        </div>
                    </div>
                    <!-- Input Time Out -->
                    <div class="form-group">
                        <label for="time_out" class="col-sm-3 control-label">Time Out</label>
                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <input type="text" class="form-control timepicker" id="time_out" name="time_out">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer Modal -->
                <div class="modal-footer">
                    <!-- Tombol Tutup -->
                    <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                    <!-- Tombol Simpan -->
                    <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<!-- Modal untuk mengedit kehadiran -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Header Modal -->
            <div class="modal-header">
                <!-- Tombol Tutup -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <!-- Judul Modal dengan nama karyawan -->
                <h4 class="modal-title"><b><span id="employee_name"></span></b></h4>
            </div>
            <!-- Body Modal -->
            <div class="modal-body">
                <!-- Form untuk mengedit kehadiran -->
                <form class="form-horizontal" method="POST" action="attendance_edit.php">
                    <input type="hidden" id="attid" name="id">
                    <!-- Input Tanggal -->
                    <div class="form-group">
                        <label for="datepicker_edit" class="col-sm-3 control-label">Tanggal</label>
                        <div class="col-sm-9"> 
                            <div class="date">
                                <input type="text" class="form-control" id="datepicker_edit" name="edit_date">
                            </div>
                        </div>
                    </div>
                    <!-- Input Time In -->
                    <div class="form-group">
                        <label for="edit_time_in" class="col-sm-3 control-label">Time In</label>
                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <input type="text" class="form-control timepicker" id="edit_time_in" name="edit_time_in">
                            </div>
                        </div>
                    </div>
                    <!-- Input Time Out -->
                    <div class="form-group">
                        <label for="edit_time_out" class="col-sm-3 control-label">Time Out</label>
                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <input type="text" class="form-control timepicker" id="edit_time_out" name="edit_time_out">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer Modal -->
                <div class="modal-footer">
                    <!-- Tombol Tutup -->
                    <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                    <!-- Tombol Update -->
                    <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<!-- Modal untuk menghapus kehadiran -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Header Modal -->
            <div class="modal-header">
                <!-- Tombol Tutup -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <!-- Judul Modal dengan tanggal kehadiran -->
                <h4 class="modal-title"><b><span id="attendance_date"></span></b></h4>
            </div>
            <!-- Body Modal -->
            <div class="modal-body">
                <!-- Form untuk menghapus kehadiran -->
                <form class="form-horizontal" method="POST" action="attendance_delete.php">
                    <input type="hidden" id="del_attid" name="id">
                    <div class="text-center">
                        <p>HAPUS KEHADIRAN</p>
                        <!-- Nama karyawan -->
                        <h2 id="del_employee_name" class="bold"></h2>
                    </div>
                </div>
                <!-- Footer Modal -->
                <div class="modal-footer">
                    <!-- Tombol Tutup -->
                    <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                    <!-- Tombol Hapus -->
                    <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
