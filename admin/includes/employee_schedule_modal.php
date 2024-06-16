<!-- Edit -->
<!-- Modal untuk mengedit jadwal kerja karyawan -->
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
                <!-- Form untuk mengedit jadwal kerja karyawan -->
                <form class="form-horizontal" method="POST" action="schedule_employee_edit.php">
                    <!-- Input tersembunyi untuk ID karyawan -->
                    <input type="hidden" id="empid" name="id">
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
