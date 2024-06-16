<!-- Add -->
<!-- Modal untuk menambahkan karyawan baru -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Header Modal -->
            <div class="modal-header">
                <!-- Tombol Tutup -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <!-- Judul Modal -->
                <h4 class="modal-title"><b>Tambah Karyawan</b></h4>
            </div>
            <!-- Body Modal -->
            <div class="modal-body">
                <!-- Form untuk menambahkan karyawan baru -->
                <form class="form-horizontal" method="POST" action="employee_add.php" enctype="multipart/form-data">
                    <!-- Input Nama Depan -->
                    <div class="form-group">
                        <label for="firstname" class="col-sm-3 control-label">Nama Depan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="firstname" name="firstname" required>
                        </div>
                    </div>
                    <!-- Input Nama Belakang -->
                    <div class="form-group">
                        <label for="lastname" class="col-sm-3 control-label">Nama Belakang</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lastname" name="lastname" required>
                        </div>
                    </div>
                    <!-- Input Alamat -->
                    <div class="form-group">
                        <label for="address" class="col-sm-3 control-label">Alamat</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="address" id="address"></textarea>
                        </div>
                    </div>
                    <!-- Input Tanggal Lahir -->
                    <div class="form-group">
                        <label for="datepicker_add" class="col-sm-3 control-label">Tanggal Lahir</label>
                        <div class="col-sm-9"> 
                            <div class="date">
                                <input type="text" class="form-control" id="datepicker_add" name="birthdate">
                            </div>
                        </div>
                    </div>
                    <!-- Input Nomor Hp -->
                    <div class="form-group">
                        <label for="contact" class="col-sm-3 control-label">No Hp</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="contact" name="contact">
                        </div>
                    </div>
                    <!-- Input Jenis Kelamin -->
                    <div class="form-group">
                        <label for="gender" class="col-sm-3 control-label">Jenis Kelamin</label>
                        <div class="col-sm-9"> 
                            <select class="form-control" name="gender" id="gender" required>
                                <option value="" selected>- Select -</option>
                                <option value="Male">Pria</option>
                                <option value="Female">Wanita</option>
                            </select>
                        </div>
                    </div>
                    <!-- Input Posisi -->
                    <div class="form-group">
                        <label for="position" class="col-sm-3 control-label">Position</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="position" id="position" required>
                                <option value="" selected>- Select -</option>
                                <?php
                                  $sql = "SELECT * FROM position";
                                  $query = $conn->query($sql);
                                  while($prow = $query->fetch_assoc()){
                                    echo "
                                      <option value='".$prow['id']."'>".$prow['description']."</option>
                                    ";
                                  }
                                ?>
                            </select>
                        </div>
                    </div>
                    <!-- Input Jadwal Kerja -->
                    <div class="form-group">
                        <label for="schedule" class="col-sm-3 control-label">Jadwal Kerja</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="schedule" name="schedule" required>
                                <option value="" selected>- Select -</option>
                                <?php
                                  $sql = "SELECT * FROM schedules";
                                  $query = $conn->query($sql);
                                  while($srow = $query->fetch_assoc()){
                                    echo "
                                      <option value='".$srow['id']."'>".$srow['time_in'].' - '.$srow['time_out']."</option>
                                    ";
                                  }
                                ?>
                            </select>
                        </div>
                    </div>
                    <!-- Input Foto -->
                    <div class="form-group">
                        <label for="photo" class="col-sm-3 control-label">Photo</label>
                        <div class="col-sm-9">
                            <input type="file" name="photo" id="photo">
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
<!-- Modal untuk mengedit karyawan yang ada -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Header Modal -->
            <div class="modal-header">
                <!-- Tombol Tutup -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <!-- Judul Modal dengan ID Karyawan -->
                <h4 class="modal-title"><b><span class="employee_id"></span></b></h4>
            </div>
            <!-- Body Modal -->
            <div class="modal-body">
                <!-- Form untuk mengedit karyawan -->
                <form class="form-horizontal" method="POST" action="employee_edit.php">
                    <!-- Input tersembunyi untuk ID Karyawan -->
                    <input type="hidden" class="empid" name="id">
                    <!-- Input Nama Depan -->
                    <div class="form-group">
                        <label for="edit_firstname" class="col-sm-3 control-label">Nama Depan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_firstname" name="firstname">
                        </div>
                    </div>
                    <!-- Input Nama Belakang -->
                    <div class="form-group">
                        <label for="edit_lastname" class="col-sm-3 control-label">Nama Belakang</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_lastname" name="lastname">
                        </div>
                    </div>
                    <!-- Input Alamat -->
                    <div class="form-group">
                        <label for="edit_address" class="col-sm-3 control-label">Alamat</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="address" id="edit_address"></textarea>
                        </div>
                    </div>
                    <!-- Input Tanggal Lahir -->
                    <div class="form-group">
                        <label for="datepicker_edit" class="col-sm-3 control-label">Tanggal Lahir</label>
                        <div class="col-sm-9"> 
                            <div class="date">
                                <input type="text" class="form-control" id="datepicker_edit" name="birthdate">
                            </div>
                        </div>
                    </div>
                    <!-- Input Nomor Hp -->
                    <div class="form-group">
                        <label for="edit_contact" class="col-sm-3 control-label">No Hp</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_contact" name="contact">
                        </div>
                    </div>
                    <!-- Input Jenis Kelamin -->
                    <div class="form-group">
                        <label for="edit_gender" class="col-sm-3 control-label">Jenis Kelamin</label>
                        <div class="col-sm-9"> 
                            <select class="form-control" name="gender" id="edit_gender">
                                <option selected id="gender_val"></option>
                                <option value="Male">Pria</option>
                                <option value="Female">Wanita</option>
                            </select>
                        </div>
                    </div>
                    <!-- Input Posisi -->
                    <div class="form-group">
                        <label for="edit_position" class="col-sm-3 control-label">Position</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="position" id="edit_position">
                                <option selected id="position_val"></option>
                                <?php
                                  $sql = "SELECT * FROM position";
                                  $query = $conn->query($sql);
                                  while($prow = $query->fetch_assoc()){
                                    echo "
                                      <option value='".$prow['id']."'>".$prow['description']."</option>
                                    ";
                                  }
                                ?>
                            </select>
                        </div>
                    </div>
                    <!-- Input Jadwal Kerja -->
                    <div class="form-group">
                        <label for="edit_schedule" class="col-sm-3 control-label">Jadwal Kerja</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="edit_schedule" name="schedule">
                                <option selected id="schedule_val"></option>
                                <?php
                                  $sql = "SELECT * FROM schedules";
                                  $query = $conn->query($sql);
                                  while($srow = $query->fetch_assoc()){
                                    echo "
                                      <option value='".$srow['id']."'>".$srow['time_in'].' - '.$srow['time_out']."</option>
                                    ";
                                  }
                                ?>
                            </select>
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
<!-- Modal untuk menghapus karyawan -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Header Modal -->
            <div class="modal-header">
                <!-- Tombol Tutup -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <!-- Judul Modal dengan ID Karyawan -->
                <h4 class="modal-title"><b><span class="employee_id"></span></b></h4>
            </div>
            <!-- Body Modal -->
            <div class="modal-body">
                <!-- Form untuk menghapus karyawan -->
                <form class="form-horizontal" method="POST" action="employee_delete.php">
                    <!-- Input tersembunyi untuk ID Karyawan -->
                    <input type="hidden" class="empid" name="id">
                    <div class="text-center">
                        <p>Hapus Karyawan</p>
                        <!-- Nama karyawan yang akan dihapus -->
                        <h2 class="bold del_employee_name"></h2>
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

<!-- Update Photo -->
<!-- Modal untuk memperbarui foto karyawan -->
<div class="modal fade" id="edit_photo">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Header Modal -->
            <div class="modal-header">
                <!-- Tombol Tutup -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <!-- Judul Modal dengan nama karyawan -->
                <h4 class="modal-title"><b><span class="del_employee_name"></span></b></h4>
            </div>
            <!-- Body Modal -->
            <div class="modal-body">
                <!-- Form untuk memperbarui foto karyawan -->
                <form class="form-horizontal" method="POST" action="employee_edit_photo.php" enctype="multipart/form-data">
                    <!-- Input tersembunyi untuk ID Karyawan -->
                    <input type="hidden" class="empid" name="id">
                    <!-- Input Foto -->
                    <div class="form-group">
                        <label for="photo" class="col-sm-3 control-label">Photo</label>
                        <div class="col-sm-9">
                            <input type="file" id="photo" name="photo" required>
                        </div>
                    </div>
                </div>
                <!-- Footer Modal -->
                <div class="modal-footer">
                    <!-- Tombol Tutup -->
                    <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                    <!-- Tombol Update -->
                    <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
