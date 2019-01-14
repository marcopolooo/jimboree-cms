  <?php $this->load->view('layouts/header.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Edit Students
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Edit Students</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
            <div class="col-lg-12">
              <div class="box box-primary">
                <!-- form start -->
                <form role="form" action="<?php echo base_url('master-data/students/update'); ?>" method="post">
                    <div class="box-body">
                      <div class="form-group">
                        <label class="col-lg-2" for="students">Nama Panggilan</label>
                        <div class="col-lg-10">
                          <input type="hidden" value="<?php echo $data[0]['nis']; ?>" name="nis">
                          <input type="text" class="form-control" id="nama-panggilan" placeholder="Enter students" name="nama_panggilan" value="<?php echo $data[0]['nama_panggilan'];?>" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="nama_depan">Nama Depan</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="nama_depan" placeholder="Enter Nama Depan" name="nama_depan" value="<?php echo $data[0]['nama_depan']; ?>" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="nama_tengah">Nama Tengah</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="nama_tengah" placeholder="Enter Nama Tengah" name="nama_tengah" value="<?php echo $data[0]['nama_tengah']; ?>"><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="nama_tengah">Nama Belakang</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="nama_tengah" placeholder="Enter Nama Belakang" name="nama_belakang" value="<?php echo $data[0]['nama_belakang']; ?>"><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="jenis_kelamin">Jenis Kelamin</label>
                        <div class="col-lg-10">
                          <?php 
                            if($data[0]['jenis_kelamin'] == 1){
                              echo '<input type="radio" id="jenis_kelamin" name="jenis_kelamin" value="1" checked required> Laki-laki<br>';
                              echo '<input type="radio" id="jenis_kelamin" name="jenis_kelamin" value="2" required> Perempuan<br><br>';
                            } else {
                              echo '<input type="radio" id="jenis_kelamin" name="jenis_kelamin" value="2" checked required> Perempuan<br>';
                              echo '<input type="radio" id="jenis_kelamin" name="jenis_kelamin" value="1" required> Laki-laki<br><br>';
                            }
                          ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="tempat">Tempat Lahir</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="tempat" placeholder="Enter Tempat Lahir" name="tempat" value="<?php echo $data[0]['tempat']; ?>" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2">Tanggal Lahir</label>
                        <div class="col-lg-10">
                          <div class="input-group" style="margin-bottom: 20px">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                              <input type="text" class="form-control pull-right" id="datepicker" name="tanggal_lahir" value="<?php echo $data[0]['tanggal_lahir']; ?>" data-date-format="yyyy-mm-dd" required><br>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="agama">Agama</label>
                        <div class="col-lg-10">
                          <select class="form-control" name="agama">
                            <?php 
                              echo "<option value='". $data[0]['id_agama'] . "' selected>" . $data[0]['agama'] . "</option>";
                              foreach ($agama as $a ) {
                                if($data[0]['agama'] != $a->nama_agama){
                                  echo "<option value='". $a->id_agama . "'>" . $a->nama_agama . "</option>";
                                }
                              }
                            ?>
                          </select><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="alamat">Alamat</label>
                        <div class="col-lg-10">
                          <textarea class="form-control" name="alamat" id="alamat" rows="3" required><?php echo $data[0]['alamat']; ?></textarea><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="hobi">Hobi</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="hobi" placeholder="Enter Hobi" name="hobi" value="<?php echo $data[0]['hobi']; ?>"><br>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary" >Submit</button>
                      <a href="<?php echo base_url('master-data/students'); ?>" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
              </div>
            </div>
          </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php $this->load->view('layouts/footer.php'); ?>