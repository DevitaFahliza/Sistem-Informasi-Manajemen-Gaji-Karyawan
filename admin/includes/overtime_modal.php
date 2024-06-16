<!-- Add -->
<!-- Modal untuk menambahkan lembur baru -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Header Modal -->
            <div class="modal-header">
                <!-- Tombol Tutup -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <!-- Judul Modal -->
                <h4 class="modal-title"><b>Add Overtime</b></h4>
            </div>
            <!-- Body Modal -->
            <div class="modal-body">
                <!-- Form untuk menambahkan lembur baru -->
                <form class="form-horizontal" method="POST" action="overtime_add.php">
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
                    <!-- Input Jumlah Jam -->
                    <div class="form-group">
                        <label for="hours" class="col-sm-3 control-label">No. of Hours</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="hours" name="hours">
                        </div>
                    </div>
                    <!-- Input Jumlah Menit -->
                    <div class="form-group">
                        <label for="mins" class="col-sm-3 control-label">No. of Mins</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="mins" name="mins">
                        </div>
                    </div>
                    <!-- Input Tarif -->
                    <div class="form-group">
                        <label for="rate" class="col-sm-3 control-label">Rate</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="rate" name="rate" required>
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
<!-- Modal untuk mengedit lembur -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Header Modal -->
            <div class="modal-header">
                <!-- Tombol Tutup -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <!-- Judul Modal dengan nama karyawan -->
                <h4 class="modal-title"><b><span class="employee_name"></span></b></h4>
            </div>
            <!-- Body Modal -->
            <div class="modal-body">
                <!-- Form untuk mengedit lembur -->
                <form class="form-horizontal" method="POST" action="overtime_edit.php">
                    <!-- Input tersembunyi untuk ID lembur -->
                    <input type="hidden" class="otid" name="id">
                    <!-- Input Tanggal -->
                    <div class="form-group">
                        <label for="datepicker_edit" class="col-sm-3 control-label">Tanggal</label>
                        <div class="col-sm-9"> 
                            <div class="date">
                                <input type="text" class="form-control" id="datepicker_edit" name="date" required>
                            </div>
                        </div>
                    </div>
                    <!-- Input Jumlah Jam -->
                    <div class="form-group">
                        <label for="hours_edit" class="col-sm-3 control-label">No. of Hours</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="hours_edit" name="hours">
                        </div>
                    </div>
                    <!-- Input Jumlah Menit -->
                    <div class="form-group">
                        <label for="mins_edit" class="col-sm-3 control-label">No. of Mins</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="mins_edit" name="mins">
                        </div>
                    </div>
                    <!-- Input Tarif -->
                    <div class="form-group">
                        <label for="rate_edit" class="col-sm-3 control-label">Rate</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="rate_edit" name="rate" required>
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
<!-- Modal untuk menghapus lembur -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Header Modal -->
            <div class="modal-header">
                <!-- Tombol Tutup -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <!-- Judul Modal dengan tanggal lembur -->
                <h4 class="modal-title"><b><span id="overtime_date"></span></b></h4>
            </div>
            <!-- Body Modal -->
            <div class="modal-body">
                <!-- Form untuk menghapus lembur -->
                <form class="form-horizontal" method="POST" action="overtime_delete.php">
                    <!-- Input tersembunyi untuk ID lembur -->
                    <input type="hidden" class="otid" name="id">
                    <div class="text-center">
                        <p>DELETE OVERTIME</p>
                        <!-- Nama karyawan yang akan dihapus lemburnya -->
                        <h2 class="employee_name bold"></h2>
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
