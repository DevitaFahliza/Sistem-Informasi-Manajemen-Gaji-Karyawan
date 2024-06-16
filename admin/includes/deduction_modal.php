<!-- Add -->
<!-- Modal untuk menambahkan potongan baru -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Header Modal -->
            <div class="modal-header">
                <!-- Tombol Tutup -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <!-- Judul Modal -->
                <h4 class="modal-title"><b>Add Deduction</b></h4>
            </div>
            <!-- Body Modal -->
            <div class="modal-body">
                <!-- Form untuk menambahkan potongan baru -->
                <form class="form-horizontal" method="POST" action="deduction_add.php">
                    <!-- Input Keterangan -->
                    <div class="form-group">
                        <label for="description" class="col-sm-3 control-label">Keterangan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="description" name="description" required>
                        </div>
                    </div>
                    <!-- Input Jumlah -->
                    <div class="form-group">
                        <label for="amount" class="col-sm-3 control-label">Jumlah</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="amount" name="amount" required>
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
<!-- Modal untuk mengedit potongan yang ada -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Header Modal -->
            <div class="modal-header">
                <!-- Tombol Tutup -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <!-- Judul Modal -->
                <h4 class="modal-title"><b>Update Deduction</b></h4>
            </div>
            <!-- Body Modal -->
            <div class="modal-body">
                <!-- Form untuk mengedit potongan -->
                <form class="form-horizontal" method="POST" action="deduction_edit.php">
                    <!-- Input tersembunyi untuk ID potongan -->
                    <input type="hidden" class="decid" name="id">
                    <!-- Input Keterangan -->
                    <div class="form-group">
                        <label for="edit_description" class="col-sm-3 control-label">Keterangan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_description" name="description">
                        </div>
                    </div>
                    <!-- Input Jumlah -->
                    <div class="form-group">
                        <label for="edit_amount" class="col-sm-3 control-label">Jumlah</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_amount" name="amount">
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
<!-- Modal untuk menghapus potongan -->
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
                <!-- Form untuk menghapus potongan -->
                <form class="form-horizontal" method="POST" action="deduction_delete.php">
                    <!-- Input tersembunyi untuk ID potongan -->
                    <input type="hidden" class="decid" name="id">
                    <div class="text-center">
                        <p>DELETE DEDUCTION</p>
                        <!-- Keterangan potongan -->
                        <h2 id="del_deduction" class="bold"></h2>
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
