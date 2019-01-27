<?php $this->load->view('layouts/header.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Edit School
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Edit School</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
            <div class="col-lg-12">
              <div class="box box-primary">
                <!-- form start -->
                <form role="form" action="<?php echo base_url('master-data/school/update'); ?>" method="post">
                    <div class="box-body">
                      <div class="form-group">
                        <label class="col-lg-2" for="nama">Nama Sekolah</label>
                        <div class="col-lg-10">
                          <input type="hidden" value="<?php echo $data[0]['id_sekolah']; ?>" name="id_sekolah">
                          <input type="text" value="<?php echo $data[0]['name_school'] ?>" class="form-control" id="class" placeholder="Enter School Name" name="name_school" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2">Tanggal Pendirian</label>
                        <div class="col-lg-10">
                          <div class="input-group" style="margin-bottom: 20px">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                              <input type="text" class="form-control pull-right" id="datepicker" name="tanggal_pendirian" value="<?php echo $data[0]['tanggal_pendirian']; ?>" data-date-format="yyyy-mm-dd" required><br>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="nama">Status Sekolah</label>
                        <div class="col-lg-10">
                            <input type="text" value="<?php echo $data[0]['status_sekolah'] ?>" class="form-control" id="class" placeholder="Enter Status School" name="status_sekolah" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="nama">Akreditasi</label>
                        <div class="col-lg-10">
                            <input type="text" value="<?php echo $data[0]['akreditasi'] ?>" class="form-control" id="class" placeholder="Enter Akreditasi" name="akreditasi" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="nama">Sertifikasi</label>
                        <div class="col-lg-10">
                            <input type="text" value="<?php echo $data[0]['sertifikasi'] ?>" class="form-control" id="class" placeholder="Enter Sertifikasi" name="sertifikasi" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="nama">Kepala Sekolah</label>
                        <div class="col-lg-10">
                            <input type="text" value="<?php echo $data[0]['kepala_sekolah'] ?>" class="form-control" id="class" placeholder="Enter Kepala Sekolah" name="kepala_sekolah" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="nama">Alamat</label>
                        <div class="col-lg-10">
                            <input type="text" value="<?php echo $data[0]['alamat'] ?>" class="form-control" id="class" placeholder="Enter Alamat" name="alamat" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="nama">Visi</label>
                        <div class="col-lg-10">
                            <input type="text" value="<?php echo $data[0]['visi'] ?>" class="form-control" id="class" placeholder="Enter Visi" name="visi" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="nama">Misi</label>
                        <div class="col-lg-10">
                            <input type="text" value="<?php echo $data[0]['misi'] ?>" class="form-control" id="class" placeholder="Enter Misi" name="misi" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="motto">Motto</label>
                        <div class="col-lg-10">
                            <input type="text" value="<?php echo $data[0]['motto'] ?>" class="form-control" id="class" placeholder="Enter Motto" name="motto" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="nama">File URL</label>
                        <div class="col-lg-10">
                            <input type="text" value="<?php echo $data[0]['file_url'] ?>" class="form-control" id="class" placeholder="Enter File URL" name="file_url" required><br>
                        </div>
                      </div>
                      
                      <button type="submit" class="btn btn-primary" >Submit</button>
                      <a href="<?php echo base_url('master-data/school'); ?>" class="btn btn-danger">Cancel</a>
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