<!-- Add -->
<!-- Modal untuk menambahkan jadwal kerja baru -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Header Modal -->
            <div class="modal-header">
                <!-- Tombol Tutup -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <!-- Judul Modal -->
                <h4 class="modal-title"><b>Tambah Jadwal Kerja</b></h4>
            </div>
            <!-- Body Modal -->
            <div class="modal-body">
                <!-- Form untuk menambahkan jadwal kerja baru -->
                <form class="form-horizontal" method="POST" action="schedule_add.php">
                    <!-- Input Waktu Masuk -->
                    <div class="form-group">
                        <label for="time_in" class="col-sm-3 control-label">Time In</label>
                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <input type="text" class="form-control timepicker" id="time_in" name="time_in" required>
                            </div>
                        </div>
                    </div>
                    <!-- Input Waktu Keluar -->
                    <div class="form-group">
                        <label for="time_out" class="col-sm-3 control-label">Time Out</label>
                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <input type="text" class="form-control timepicker" id="time_out" name="time_out" required>
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
<!-- Modal untuk mengedit jadwal kerja -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Header Modal -->
            <div class="modal-header">
                <!-- Tombol Tutup -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <!-- Judul Modal -->
                <h4 class="modal-title"><b>Update Jadwal Kerja</b></h4>
            </div>
            <!-- Body Modal -->
            <div class="modal-body">
                <!-- Form untuk mengedit jadwal kerja -->
                <form class="form-horizontal" method="POST" action="schedule_edit.php">
                    <!-- Input tersembunyi untuk ID jadwal -->
                    <input type="hidden" id="timeid" name="id">
                    <!-- Input Waktu Masuk -->
                    <div class="form-group">
                        <label for="edit_time_in" class="col-sm-3 control-label">Time In</label>
                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <input type="text" class="form-control timepicker" id="edit_time_in" name="time_in">
                            </div>
                        </div>
                    </div>
                    <!-- Input Waktu Keluar -->
                    <div class="form-group">
                        <label for="edit_time_out" class="col-sm-3 control-label">Time Out</label>
                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <input type="text" class="form-control timepicker" id="edit_time_out" name="time_out">
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
<!-- Modal untuk menghapus jadwal kerja -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Header Modal -->
            <div class="modal-header">
                <!-- Tombol Tutup -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <!-- Judul Modal -->
                <h4 class="modal-title"><b>Menghapus...</b></h4>
            </div>
            <!-- Body Modal -->
            <div class="modal-body">
                <!-- Form untuk menghapus jadwal kerja -->
                <form class="form-horizontal" method="POST" action="schedule_delete.php">
                    <!-- Input tersembunyi untuk ID jadwal -->
                    <input type="hidden" id="del_timeid" name="id">
                    <div class="text-center">
                        <p>Hapus Jadwal Kerja</p>
                        <!-- Nama jadwal kerja yang akan dihapus -->
                        <h2 id="del_schedule" class="bold"></h2>
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
