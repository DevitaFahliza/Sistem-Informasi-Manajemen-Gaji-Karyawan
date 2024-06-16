<!-- Add -->
<!-- Modal untuk menambahkan posisi baru -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Header Modal -->
            <div class="modal-header">
                <!-- Tombol Tutup -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <!-- Judul Modal -->
                <h4 class="modal-title"><b>Add Position</b></h4>
            </div>
            <!-- Body Modal -->
            <div class="modal-body">
                <!-- Form untuk menambahkan posisi baru -->
                <form class="form-horizontal" method="POST" action="position_add.php">
                    <!-- Input Judul Posisi -->
                    <div class="form-group">
                        <label for="title" class="col-sm-3 control-label">Position Title</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                    </div>
                    <!-- Input Tarif per Jam -->
                    <div class="form-group">
                        <label for="rate" class="col-sm-3 control-label">Rate per Hr</label>
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
<!-- Modal untuk mengedit posisi -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Header Modal -->
            <div class="modal-header">
                <!-- Tombol Tutup -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <!-- Judul Modal -->
                <h4 class="modal-title"><b>Update Position</b></h4>
            </div>
            <!-- Body Modal -->
            <div class="modal-body">
                <!-- Form untuk mengedit posisi -->
                <form class="form-horizontal" method="POST" action="position_edit.php">
                    <!-- Input tersembunyi untuk ID posisi -->
                    <input type="hidden" id="posid" name="id">
                    <!-- Input Judul Posisi -->
                    <div class="form-group">
                        <label for="edit_title" class="col-sm-3 control-label">Position Title</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_title" name="title">
                        </div>
                    </div>
                    <!-- Input Tarif per Jam -->
                    <div class="form-group">
                        <label for="edit_rate" class="col-sm-3 control-label">Rate per Hr</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_rate" name="rate">
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
<!-- Modal untuk menghapus posisi -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Header Modal -->
            <div class="modal-header">
                <!-- Tombol Tutup -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <!-- Judul Modal -->
                <h4 class="modal-title"><b>Deleting...</b></h4>
            </div>
            <!-- Body Modal -->
            <div class="modal-body">
                <!-- Form untuk menghapus posisi -->
                <form class="form-horizontal" method="POST" action="position_delete.php">
                    <!-- Input tersembunyi untuk ID posisi -->
                    <input type="hidden" id="del_posid" name="id">
                    <div class="text-center">
                        <p>DELETE POSITION</p>
                        <!-- Nama posisi yang akan dihapus -->
                        <h2 id="del_position" class="bold"></h2>
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
