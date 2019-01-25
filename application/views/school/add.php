<?php $this->load->view('layouts/header.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Add School
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Add School</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
            <div class="col-lg-12">
              <div class="box box-primary">
                <!-- form start -->
                <form role="form" action="<?php echo base_url('master-data/school/store'); ?>" method="post">
                    <div class="box-body">
                      <div class="form-group">
                        <label class="col-lg-2" for="school">Nama Sekolah</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="school" placeholder="Enter School Name" name="name_school" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                      <label class="col-lg-2">Tanggal Pendirian</label>
                      <div class="col-lg-10">
                        <div class="input-group" style="margin-bottom: 20px">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                            <input type="text" class="form-control pull-right" id="datepicker" name="tanggal_pendirian" data-date-format="yyyy-mm-dd" required><br>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2" for="school">Status Sekolah</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="school" placeholder="Enter Status Sekolah" name="status_sekolah" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="school">Akreditasi</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="school" placeholder="Enter Akreditasi" name="akreditasi" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="school">Sertifikasi</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="school" placeholder="Enter Sertifikasi" name="sertifikasi" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="school">Kepala Sekolah</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="school" placeholder="Enter Kepala Sekolah" name="kepala_sekolah" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="school">Alamat</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="school" placeholder="Enter Alamat" name="alamat" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="school">Visi</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="school" placeholder="Enter Visi" name="visi" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="school">Misi</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="school" placeholder="Enter Misi" name="misi" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="school">File URL</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="school" placeholder="Enter URL File" name="file_url" required><br>
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