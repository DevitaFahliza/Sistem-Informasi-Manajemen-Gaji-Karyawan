<!-- Add -->
<!-- Modal untuk profil admin -->
<div class="modal fade" id="profile">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Header Modal -->
            <div class="modal-header">
                <!-- Tombol Tutup -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <!-- Judul Modal -->
                <h4 class="modal-title"><b>Admin Profile</b></h4>
            </div>
            <!-- Body Modal -->
            <div class="modal-body">
                <!-- Form untuk memperbarui profil admin -->
                <form class="form-horizontal" method="POST" action="profile_update.php?return=<?php echo basename($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
                    <!-- Input Username -->
                    <div class="form-group">
                        <label for="username" class="col-sm-3 control-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $user['username']; ?>">
                        </div>
                    </div>
                    <!-- Input Password -->
                    <div class="form-group">
                        <label for="password" class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-9"> 
                            <input type="password" class="form-control" id="password" name="password" value="<?php echo $user['password']; ?>">
                        </div>
                    </div>
                    <!-- Input Nama Depan -->
                    <div class="form-group">
                        <label for="firstname" class="col-sm-3 control-label">Nama Depan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $user['firstname']; ?>">
                        </div>
                    </div>
                    <!-- Input Nama Belakang -->
                    <div class="form-group">
                        <label for="lastname" class="col-sm-3 control-label">Nama Belakang</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $user['lastname']; ?>">
                        </div>
                    </div>
                    <!-- Input Foto -->
                    <div class="form-group">
                        <label for="photo" class="col-sm-3 control-label">Photo:</label>
                        <div class="col-sm-9">
                            <input type="file" id="photo" name="photo">
                        </div>
                    </div>
                    <hr>
                    <!-- Input Password Saat Ini -->
                    <div class="form-group">
                        <label for="curr_password" class="col-sm-3 control-label">Current Password:</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="curr_password" name="curr_password" placeholder="input current password to save changes" required>
                        </div>
                    </div>
                </div>
                <!-- Footer Modal -->
                <div class="modal-footer">
                    <!-- Tombol Tutup -->
                    <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                    <!-- Tombol Simpan -->
                    <button type="submit" class="btn btn-success btn-flat" name="save"><i class="fa fa-check-square-o"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
